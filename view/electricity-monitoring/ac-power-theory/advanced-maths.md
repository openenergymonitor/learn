# AC Power Theory - Advanced Maths

This page covers the mathematics behind calculating real power, apparent power, power factor, RMS voltage and RMS current from instantaneous Voltage and Current measurements of single phase AC electricity. Discrete time equations are detailed since the calculations are carried out in the Arduino in the digital domain.

For a much nicer Arduino code snippet version of this page, see: [AC Power theory - Arduino maths](arduino-maths).

## Real Power

Real power (also known as active power) is defined as the power used by a device to produce useful work.

Mathematically it is the definite integral of voltage, u(t), times current, i(t), as follows:

 ![](files/equation1.png)

**_Equation 1._** _Real Power Definition._

U - Root-Mean-Square (RMS) voltage.

I - Root-Mean-Square (RMS) current.

_cos(φ) -_ Power factor.

The discrete time equivalent is:

 ![](files/equation2.png)

**_Equation 2._** _Real Power Definition in Discrete Time._

u(n) - sampled instance of u(t)

i(n) - sampled instance of i(t)

N - number of samples.

Real power is calculated simply as the average of N voltage-current products. It can be shown that this method is valid for both sinusoidal and distorted waveforms.

## RMS Voltage and Current Measurement

An RMS value is defined as the square root of the mean value of the squares of the instantaneous values of a periodically varying quantity, averaged over one complete cycle. The discrete time equation for calculating voltage RMS is as follows:

 ![](files/equation3.png)

**_Equation 3._** _Voltage RMS Calculation in Discrete Time Domain._

RMS current is calculated using the same equation, substituting voltage samples, u(n), for current samples, i(n).

## Apparent Power and Power Factor

Apparent power is calculated, as follows:

_Apparent power = RMS Voltage x RMS current_

and the power factor is calculated from the definition:

_Power Factor = Real Power / Apparent Power_

## Harmonics, Non-Linear Loads and Power Factor

A non-linear load, such as a fluorescent light, a computer power supply or a variable speed drive in a washing machine, will distort the mains current wave and generate harmonics of the fundamental mains frequency, and a side effect is the voltage wave will also be distorted. This leads to power existing not only at the mains frequency, but at harmonics of that frequency too. This has implications for the accuracy of power measurements. References where this is covered are given below.

## Adding RMS Values

The combined r.m.s. value of a signal with harmonic components is the square root of the sum of the squares of each component:

![am_equation_1.webp][am_equation_1]

[am_equation_1]: files/am_equation_1.webp "RMSTotal=RMS12+RMS22+...."

The d.c. bias voltage added to the input to the analogue to digital converter can be removed if we recognise that the d.c. value can be represented by RMS<sub>1</sub>, the wanted input less the bias offset by RMS<sub>2</sub>, and the value we have from the ADC is RMS<sub>Total</sub>. Or:

![am_equation_2.webp][am_equation_2]

[am_equation_2]: files/am_equation_2.webp "rmsofsignal+offset=signal2+offset2"

That is the method used in emonLibCM in the rearranged form:

![am_equation_3.webp][am_equation_3]

[am_equation_3]: files/am_equation_3.webp "Vrms=rmsofsignal+offset2−offset2"

This method is much faster than applying a digital filter to each individual sample, and it is valid because it is reasonable to assume that the offset – the average value of all the samples – will remain sensibly constant for the duration of the sampling period.

## References

Pages 12-15 of Atmel's application note for the 'AVR465: Single-Phase Power/Energy Meter with Tamper Detection':

http://ww1.microchip.com/downloads/en/Appnotes/Atmel-2566-Single-Phase-Power-Energy-Meter-with-Tamper-Detection_Ap-Notes_AVR465.pdf

'How Harmonics Have Contributed to Many Power Factor Misconceptions', Anthony (Tony) Hoevenaars, P. Eng, Mirus International Inc.:
  
https://www.mirusinternational.com/downloads/MIRUS-TP003-A-How%20Harmonics%20have%20Contributed%20to%20Many%20Power%20Factor%20Misconceptions.pdf

<a href="files/How_Harmonics_Have_Contributed_to_Many_Power_Factor_Misconceptions.pdf">How Harmonics Have Contributed to Many Power Factor Misconceptions (PDF)</a>

A Wikipedia page:

https://en.wikipedia.org/wiki/Power_factor
