## Solar PV power diversion with emonTx using a PLL, emonGLCD and temperature measurement, by Martin Roberts

### 8: The sketch explained in detail.

The version described was published at [https://openenergymonitor.org/emon/node/1535](https://openenergymonitor.org/emon/node/1535) and can be downloaded from [emonTx_Solar_Controller_Temperature_PLL_0.zip](files/emonTx_Solar_Controller_Temperature_PLL_0.zip)

### Calibration & Hardware set-up

Lines 19 – 21
The voltage and current calibration constants for the three inputs. These must be set according to your hardware by comparing with known good values.

Lines 22 & 23
The correction for difference in phase shift between the voltage and current transformers. These must be set to report maximum real power (unity power factor) on a purely resistive load, and drawing a current that is typical of normal use if possible.

Line 24
This is a small adjustment should it be found that the voltage signal is leaking into the current inputs. Normally it should be zero.

Line 26
In the original sketch, the temperature input is used to turn off the diverted power when the desired tank temperature is reached. The value here allows the diverted energy to be calculated. If a standard cylinder thermostat is used instead to switch off the heater, the calculation will give the energy that was _available for diversion_, not the actual energy diverted (which may be considerably less when the water reaches maximum temperature and the thermostat prevents further diversion).

Line 27
Normally, the on-board LED indicates a value transmitted. It may be configured here to indicate that the PLL is locked to mains.

Line 35
3600 J is a common value. The size of the energy buffer may need to be changed according to the size of the meter's energy packet. See [Energy Monitoring: Meters](../../electricity-monitoring/ctac/meters). If this is changed, the thresholds in lines 36 & 37 may need to be changed accordingly.

Line 43
The time between radio transmissions.

Lines 65 – 75
These constants define the I/O pins used, and should be correct for the emonTx. If the emonTx Shield, or an Arduino with custom I/O hardware is used, these will need to be changed accordingly. SYNCPIN and SAMPPIN are useful for debugging but are not necessary for operation. (It has been reported that removing the code for SYNCPIN improves the loop stability – see [https://openenergymonitor.org/emon/node/2679](https://openenergymonitor.org/emon/node/2679))

None of the other preprocessor directives should need to be changed.

Lines 86 – 89
These set up the One-wire library for temperature measurement and the SPI library for the serial connection to the RFM12B radio module.

### RF Data to GLCD, emonBase & emonCMS

Lines 91 & 92 set up the familiar data structure for passing data via the radio module.

### Static variables

Lines 94 – 112 declare the static variables used in the sketch.

### Setup( )

Lines 118 – 127 set the I/O pins as required.

Lines 131 – 134 set the serial interface to the radio module.

Lines 136 – 152 set up the radio module itself.

Line 138 is for setting the RF band: the value for 433 MHz is 0x80D7, for 868 MHz use 0x80E7\. Line 140 sets the frequency within the band and is correct for both bands.

Line 141 sets a lower data rate if range is an issue (the receiver must be set likewise if this is changed).

Lines 159 & 160 'unset' default settings for the ADC made by the Arduino library.

Lines 163 – 172\. These set up Timer1, the 2500 Hz ‘tick’ to allow the PLL to control it and for it to generate the interrupt necessary to start the ADC.

### Loop( )

The main loop comprises just a few lines, lines 176 – 201, because the main body of work is done in the interrupt handlers and in supporting functions.

Line 177
If the start of a new cycle (a positive-going zero crossing of the voltage) is detected by the PLL, then the last cycle's totals for average energy, rms V and I and some miscellaneous variables are accumulated.

Lines 179 – 192
Every 5 s, at nextTransmitTime, the rms values of voltage and current, the average real and apparent powers, the diverted power and frequency are calculated, the temperature from the last time is read from the temperature sensor and the results are sent both by radio and to the Serial port. Then the temperature sensor is instructed to measure the temperature again ready for the next time (the temperature is expected to change slowly so this is not a problem).
If the on-board LED is not being used to indicate that the loop is locked, then it is flashed while this is happening to indicate that data is being sent.
Finally, it’s possible to manually trigger the dump load ‘on’ for a specified number of cycles (1 – 255) by typing a number at the serial console, e.g. enter 2 to pulse every second mains cycle.

### The Timer1 interrupt handler ISR(TIMER1_COMPA_vect)

Lines 204 – 210.
This function is invoked when the interrupt is triggered as the 16-bit timer-counter Timer1 reaches its pre-set limit, thereby generating our 2500 Hz clock ‘tick’.
The two digitalWrite statements put a pulse on SAMPPIN to indicate the start of conversion. The ADC multiplexer is set to the voltage input, and the ADC conversion is started.

### The ADC interrupt handler ISR(ADC_vect)

Lines 213 – 263
This function is invoked when the interrupt is triggered after the ADC completes its conversion.

Lines 215 – 217
The static variables are ones that need to be stored between calls to the function. The others are temporary variables used in the calculations.

Lines 221 & 262
Like the other interrupt handler, a pulse is sent to SAMPPIN while the function is working.

Lines 222 & 223
The important first task is to recover the value from the ADC. It is in ADCH & ADCL and the value is transferred into 'result'.

Line 226
The switch statement checks which input was used to read the analogue value and one of the following 'case' branches is executed.

Lines 228 – 243
Voltage Input.

Lines 229 & 230 set the ADC multiplexer to the next input to be measured (CT1) and start the conversion. While that is happening, the old value from the previous sample is saved for use in the filter, the new value copied and the input offset (more on that later) is subtracted and the resulting value squared and accumulated (line 234). The offset is then updated by adding in a small fraction of the difference between the original value and the present offset – this action making the low-pass filter (lines 236 & 237). An interpolation using this and the last sample (lines 239 & 241) performs a time shift (effectively a phase shift) on the voltage to align it with the current reading associated with the previous voltage sample, and finally (lines 240 & 242) the power is calculated and accumulated.

Lines 244 – 252
Current input 1.

Lines 245 & 246 set the ADC multiplexer to the next input (CT2) and thereafter this follows the same pattern as the voltage input, except of course there is no time shift and no power calculation.

Lines 253 – 260 Current input 2.

This is much the same as the first current input. There is no need to pre-set the voltage input for the multiplexer – this is done separately by the Timer1 ISR, but at the end of this when the 3 inputs have been read, the function to update the PLL is called (line 259).

### Update the PLL

Lines 265 - 339

Lines 267 – 270
The static variables are ones that need to be stored between calls to the function. The others are temporary variables used in the calculations.

The function is split into 3 main sections:

1.  If 50 sets of samples have been completed (_samples>=NUMSAMPLES; line 276_), and if the voltage is rising (determined by whether the voltage at this sample is greater than the last sample) then we take advantage of the fact that the value of the voltage is very conveniently a good number to use to correct the value of Timer1 on which the 2500 Hz tick is based. The voltage is subtracted from the Timer1 value. If the voltage was positive, it meant the time between ticks was too long, the measurement was late and the time will be shortened on the next mains cycle; conversely if the voltage was negative, the time between ticks was too short, the measurement was early and the time will be lengthened on the next mains cycle. This mechanism (lines 281 – 298) is the heart of the PLL.
    <span style="font-style:italic">Note: The ‘loop gain’ – a measure of how the control loop responds to changes and indeed whether it will be stable or not – depends on the slope at the zero crossing which in turn depends on the amplitude of the voltage input being correct. The voltage at the a.c. input socket should give a peak – peak value of about 850 – 900 counts out of the ADC at normal mains voltage.</span>
    Next, the accumulated values for the cycle (V<sup>2</sup>, I<sup>2</sup>, powers etc) are copied into global static variables to be picked up by the main loop (lines 303 – 308) and the cycle values are reset (lines 310 – 318). A most important variable is the flag “newCycle” that indicates to the main loop that this process has been completed, so that it can pick up the accumulated values.
2.  The negative-going zero crossing (at NUMSAMPLES/2) is when SYNCPIN is set low. It was set high at the positive-going crossing so this pin carries a square wave synchronised to mains frequency – it is useful for debugging but is not necessary for operation.
3.  Four samples before the negative-going zero crossing (line 325) is where we determine whether to arm the triac. “availableEnergy” is one of the global static variables that will be updated by the main loop, and is analogous to the “Energy Bucket” of Robin Emley’s article. If the level is above the upper threshold, the triac is turned on (lines 327 & 331 – 335) and it remains on until the level has fallen below the lower threshold (lines 328 & 336) when it is turned off.

### AddCycle

Lines 342 – 356.
This function is called at the start of the main loop when the end of a mains cycle has been detected (newCycle is set by the ADC interrupt handler).
The running totals for the cycle are added to the totals for the 5 s period and the flag is cleared.
DivertedCycleCount is a measure of the energy available for diversion.

### CalculateVIPF

Lines 359 – 393.
This is called to perform the calculations for the average values every 5 s prior to transmitting the results.

Lines 363-365 calculate the mean values and take the square root, then scale the result according to the calibration constants.

Lines 367 – 374 similarly calculate the mean powers, apply the correction (if any – it should be zero), and calculate the apparent powers and power factors.

Line 375 calculates the 'diverted power' (often this will be the power available for diversion).

Line 376 calculates the mains frequency. (Note: the constant may be changed to calibrate this if the actual crystal frequency is known or can be measured.)

Lines 379 – 382 transfer the required values to the emontx structure ready for the radio module.

Lines 384 – 392 finally reset the accumulators.

### SendResults

Lines 395 – 420.
The data already prepared for the radio module is sent (line 397) and the remainder of this function prints values to the serial monitor. The “Offset” values are useful for checking that the hardware bias of the input circuit and the filter is working correctly.

### Rfm_write

Lines 423 – 431.
Sends a word to the radio module via the SPI interface.

### Rfm_send

Lines 434 – 471.
Sends the complete message.

First, the radio module is powered and the transmitter switched on (lines 439 & 440) and line 443 puts it into tx register write mode, allowing multiple bytes to be sent.

In the ‘while’ loop (lines 445 – 463), the message header is constructed first in lines 450 – 456, then the message itself (line 457) followed by the checksum. Line 465 actually transfers the byte to the radio module via the SPI bus. Finally, the transmitter is shut down and the module put into sleep mode.

### ConvertTemperature

Lines 473 – 478.
Starts the temperature conversion process.
Note that if a 2-wire parasitic connection to the temperature sensor is used and problems are experienced, line 477 should be changed to:
    oneWire.write(CONVERT_TEMPERATURE,1);

### ReadTemperature

Lines 480 – 497.
This function reads the temperature from the scratchpad memory in the temperature module and returns the value converted to °C × 100.

The module is set up in lines 488 – 490, the data is read in line 491 and the checksum is computed and compared in line 492\. If good, the temperature is extracted and converted by lines 494 – 496, else an obviously false value of 300 °C is returned to flag the error.
