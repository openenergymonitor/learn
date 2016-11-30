## Solar PV power diversion with emonTx using a PLL, emonGLCD and temperature measurement, by Martin Roberts

[<< 6: Advantages over emonLib](https://openenergymonitor.org/emon/pvdiversion/pll/advantagesoveremonlib)

[8: The sketch explained in detail. >>](https://openenergymonitor.org/emon/pvdiversion/pll/sketchdetail)

### 7: Implementation

There are several details of the implementation that it is necessary to explain before the sketch is described in detail.

### The clock frequency.

In the description of the PLL, a brief mention was made of changing the frequency of the clock, without saying what the clock was or how. The frequency is actually controlled using the in-built timer-counter of the processor, which is explained in full in section 15 of the data sheet.

The 16-bit timer-counter is normally used to generate accurate output signals, it counts up to a value that we set (and alter, depending on whether our loop is running faster or slower than the mains) and then resets, in the process generating an interrupt. This interrupt – a different one to that which the ADC generates on completion – is our clock ‘tick’ that sets the ADC multiplexer to measure the voltage input channel and starts the ADC conversion process.

### The ADC interrupt handler

This routine is really the heart of the sketch. For each set of samples, three measurements are needed – the voltage and the two currents. We have seen how the conversion process for the voltage is started by the timer-counter, and how the ADC generates an interrupt when the conversion has finished. That is what starts this handler. First, it goes to the location where the ADC put the result and stores it, it then needs to set up the next input to be measured and start the conversion. Once the ADC is working, it can then handle the result from the last conversion, e.g. apply the filter, apply a phase shift if necessary, calculate the instantaneous power and accumulate the power as part of the calculations to get the average; and most importantly on every 50th set of samples it adjust the timer-counter to maintain synchronism with the voltage wave.

### Libraries

The sketch only uses the One-Wire library for the temperature sensor. All the commands for the ADC and the RFM12B radio module are built into the sketch. EmonLib, JeeLib and the Dallas Temperature Library are not required.

[<< 6: Advantages over emonLib](https://openenergymonitor.org/emon/pvdiversion/pll/advantagesoveremonlib)

[8: The sketch explained in detail. >>](https://openenergymonitor.org/emon/pvdiversion/pll/sketchdetail)
