# Installation and Calibration

## Installation

This section discusses the voltage sensor (alternatively called Potential Transformer, Voltage Transformer, AC Adaptor), and the non-invasive current sensor (alternatively called Current Transformer, CT).

For installations with more than one feed e.g. a 3-phase installation or a photo-voltaic installation, a current sensor is required for each (i.e. a total of 3 for a 3-phase supply without PV, or two for a domestic single phase supply and PV installation).

### 1\. Voltage Sensor

**(a)** Single phase supply with or without PV:
Using the Mascot AC Adaptor: A BS.1363 (13 A) socket outlet is required within approximately 1 m of the electricity supply meter or distribution board / consumer unit. Assemble the DC Power Plug so the inner connector goes to the side of the reversible 2-pin plug marked “-”.

[Since the above was written, I have checked two more samples of the adapter. One was phased as described but the other was opposite. Therefore, the advice is: if your power direction is wrong, reverse the DC Power plug, or turn your CT around to face the opposite direction.]

Using the Ideal AC Adaptor: A BS.1363 (13 A) socket outlet is required within approimately 1 m of the electricity supply meter or distribution board / consumer unit. It is not possible to change the polarity of the adapter, therefore, if the power direction is wrong, turn the c.t. around to face the opposite direction.

**(b)** Three phase supply: The recommended method is to monitor one phase as above, then add software in the sketch to derive an approximation for the voltages of the other two phases. Provided the supply is reasonably solid – it has a high fault level and a low impedance - is balanced and the loads are reasonably balanced, this should be adequate for monitoring purposes (but clearly, it will not be accurate enough for billing).

### 2\. Non-Invasive Current Sensor

Using the YHDC SCT-013-000 split core clip-on current transformer:

**(a)** Single phase supply: Plug the lead from the CT into the EmonTx then clip the CT around one cable that runs from the meter to the consumer unit. If you use the line cable (normally the outside one of the four coming out of the meter, red or brown insulation might be visible where the cable enters the meter terminal block), the face of the CT marked “ SCT-013-000” should point towards the meter. It is possible to install the CT on the supply side of the meter, in that case the face of the CT marked “SCT-013-000” should point away from the meter. This will ensure that imported power is shown as positive. If you use the neutral cable (normally the inner), then the face of the CT marked “SCT-013-000” should point the opposite way: away from the meter on the load side or towards the meter on the supply side. Do not put both cables through the CT.

**(b)** Three phase supply: Plug the leads from each of the CTs into the EmonTx and then clip each CT around one of the three line cables that run from the meter to the distribution board. Do not use the neutral cable. The face of the CT marked “SCT-013-000” should point towards the meter. This will ensure that imported power is shown as positive.

**(c)** Single phase supply with PV: Plug the leads from the CTs into the EmonTx then clip one CT around the line cable coming out of the mains supply meter (red or brown insulation might be visible where the cable enters the meter terminal block, and it is normally the outside one of four coming out of the meter), the face of the CT marked “SCT-013-000” should point towards the meter. This will ensure that imported power is shown as positive. Similarly, locate the line feed from the PV inverter where it feeds into the system (possibly into the consumer unit) and clip the CT on. The face of the CT marked “SCT-013-000” should point towards the PV inverter. This will ensure that generated power is shown as positive, and total consumption will be the algebraic sum of the two powers.

### Accuracy

One major factor that can significantly impair the accuracy of a split-core CT is misalignment of the cores, which may introduce an air gap. Even a very small gap might cause the output to drop by 10% or more and is accompanied by a huge phase shift, so it is important to ensure that the faces of the core are clean and properly aligned when the CT is installed.

For example, introducing a thin piece of paper (0.004” - 0.1 mm thick) into one side of the core caused the output to drop by 7% at 100 A, and the phase to change by 15°.

The core of the YHDC CT is ferrite, a brittle material, so care should also be taken not to chip or break the core.

---

## Calibration Theory

(These notes were written with the emonTx V2 in mind. If you have an emonTx V3, the theory remains applicable but changed component values mean the actual numbers may be different.)

### Voltage Sensor – Calibration Theory

We are measuring the mains voltage. In order to do that, it is first transformed down to a safe voltage, then divided further before being applied to one of the analog inputs of the microcontroller.

The voltage transformer output is nominally 9 V for 230 V input, but this is at full load. When used as a voltage monitor for the EmonTx, it is effectively running unloaded, and the voltage is approximately 20% higher (this is called the transformer “regulation” and the value depends on the design of the transformer. 20% is typical for this type and size).

On the EmonTx PCB, the voltage is further reduced by the potential divider formed by R13 and R14, the ratio being 1/11 in the emonTx V2 but 1/13 in the emonTx V3\. This voltage is then measured by the analog input of the microcontroller relative to its supply voltage (in this case 3.3 V), which is used as the reference, and scaled so that the reference voltage would give the maximum count of 2<sup>10</sup> ( = 1024).

The input voltage to the microcontroller has a constant bias added to it, but this is immediately removed by a software filter, so we can ignore it when calculating the calibration constant. Likewise, we can work in RMS values for both voltage and counts.

Thus the number seen by the microcontroller is:

    counts = (input pin voltage ÷ 3.3) × 1024

where

    input pin voltage = adapter output voltage ÷ 11  (or 13)

and

    adapter output voltage = mains voltage × transformer ratio

In software, in order to convert the count back to a meaningful voltage, it has to be multiplied by a calibration constant.

    Vmains = count × a constant

However, the microcontroller is able to measure its own reference voltage, this and the full scale count are already included in the program. This removes these steps and simplifies the calculation, so for the emonTx V2 the constant should be

    voltage constant = 230 × 11 ÷ (9 × 1.20) = 234.26

This simplifies even further to:

    voltage constant = alternating mains voltage ÷ alternating voltage at ADC input pin

The calibration constant is passed into the calculation as the second parameter to the method EnergyMonitor::voltage( ) in the file EmonLib.cpp. It is hard-coded as a constant in the call in the sketch.

### Voltage Sensor – Practice

In practice, the constant we calculated can be adjusted to take account of manufacturing tolerances in the components – the transformer and the resistors.

The manufacturer of the transformer does not state the ratio, only the voltage at full load, therefore it must be measured. One sample measured 11.2 V with 240 V input, but this was subject to a possible measurement error of 3.3%.

The resistors supplied in the kit have a tolerance of 5%, therefore these might contribute 10% to the possible error. However, the internal 1.1 V reference can also be in error by up to 9%, so the total error might be 19.5%.

Therefore, the expected range for the voltage constant is 182 – 287.6

### Current Sensor – Calibration Theory

The supplied current is measured using a current transformer, and the resulting (small) current converted into a voltage by the burden resistor. This voltage is measured by the analog input of the microcontroller.

This voltage is measured relative to the processor supply voltage (in this case 3.3 V), which is used as the reference, and scaled so that the reference voltage would give the maximum count of 2<sup>10</sup> ( = 1024).

The input voltage to the microcontroller has a constant bias added to it, but this is immediately removed by a software filter, so we can ignore it when calculating the calibration constant. Likewise, we can work in RMS values for currents, voltages and counts.

Thus the number seen by the processor is:

    counts = (input pin voltage ÷ 3.3) × 1024

where

    input pin voltage = secondary current × burden resistance

and

    secondary current = primary current ÷ transformer ratio

The CT burden resistor is 18 Ω in the emonTx V2, or 22 Ω  and 120 Ω in the emonTx V3\. The ratio of the current transformer is normally specified by the manufacturer as the ratio of maximum primary current to secondary current, e.g. 100 A : 50 mA.

In software, in order to convert the count back to a meaningful current, it has to be multiplied by a calibration constant.

    Isupply = count × a constant

where

    a constant = current constant × (3.3 ÷ 1024)

and, for the emonTx V2

    current constant = (100 ÷ 0.050) ÷ 18 = 111.11

Or to put it in words, the current constant is the value of current you want to read when 1 V is produced across the burden resistor.

The calibration constant is passed into the calculation as the second parameter to the method EnergyMonitor::current( ) in the file EmonLib.cpp. It is hard-coded as a constant in the call to current( ) in the sketch.

**If you use a current transformer with a built-in burden (voltage output type)**

Look at the last line of the theory where the current constant is derived:

    current constant = (100 ÷ 0.050) ÷ 18 = 111.11

"100" is the current transformer primary current, and "0.050 × 18" is in fact the voltage across the burden resistor for the standard CT and burden at that current, so to arrive at your current constant you simply substitute your transformer's rated current in place of "100" and the voltage it gives in place of "0.050 × 18". For example, the YHDC SCT-013-030 gives 1 V at a rated current of 30 A, so for this transformer you have:

    current constant = 30 ÷ 1 = 30

Or to put it in words, the current constant is the value of current you want to read when 1 V is produced at the analogue input.

### Current Sensor – Practice

The CT output is accurate to 1%. The CT burden resistor is a 1% tolerance component. However, the internal 1.1 V reference can be in error by up to 9%, so the total error should less than 11%.  (This is not as bad as it might appear, the reference is very stable even though the actual value is imprecise, so once calibrated the error due to temperature variation and other factors should be less than 2%.)

Therefore, the expected range for the current constant is 98.77 – 123.32

### Phase Angle (Power Factor) Constant

Checks of the phase response of the current and voltage sensors reveal that both have a phase error that varies in magnitude. In the case of the voltage sensor, it increases approximately linearly with increasing voltage; in the case of the current sensor, it falls rapidly at first with increasing current, then reaches a minimum before rising again as saturation sets in.

Approximate values for the voltage sensor are: 3½° at 225 V, 4½° at 240 V and 5½° at 253V; and for the current sensor with a 15 Ω burden: 3½° at 3 A, 2½° at 30 A and 2° at 60 A. Fortunately, these errors are in the same direction, so the nett error can be very small. At 240 V and 1 A, the error was too small to measure. The largest error is likely to be at medium to high load and high system voltage, when the nett error could reach 3½°.

There is another source of phase error to be considered. In the software, the voltage and current are sampled in that order and conversion takes approximately 100 μs, thus the voltage is measured earlier than current by about 2° (all measurements were done at 50 Hz).

Hence the nett error is likely to vary between 2° and 5½°. Note that if voltage and current were to be sampled in the reverse order (current first), then the nett error would range between -2° and +1½°.

(It is worth considering the effect of these errors on the calculated values: power factor is the cosine of the phase angle, so when the power factor is close to 1, cos(2°) = 0.9994,  cos(5½°) = 0.9954 so the power factor is in error by between 0.0006 and 0.0046\. However, if the power factor is very poor (say 0.1), then the phase angle is 84.3° and error range becomes much larger – power factor will be calculated as 0.065 to 0.004\.  Or with reversed order of sampling, from 0.135 to 0.074, an error of about 0.03).

The calibration constant is passed into the calculation as the third parameter to the method EnergyMonitor::voltage( ) in the file EmonLib.cpp. It is hard-coded as a constant in the call in the sketch.

The correction algorithm in the software applies a proportion (the constant) of the difference between the present sampled value and the previous sampled value to the previous sample. Hence 1 returns the present value, zero returns the previous value and -1 will return (approximately) the value before that. By modifying the software to report the time it takes to complete the inner measurement loop and the number of samples recorded, the time between samples was measured as 377 μs. This equates to 6.79° (360° takes 20 ms).

Note that the correction is centred around 1, i.e. a value of 1 applies no correction, zero and 2 apply approximately 7° of correction in opposite directions. A value of 1.28 will correct the inherent software error of 2° that arises from the delay between sampling voltage and current.

For a detailed explanation of the correction algorithm, see [Explanation of the phase correction algorithm](https://openenergymonitor.org/emon/buildingblocks/explanation-of-the-phase-correction-algorithm)
