## AC Power Theory - Arduino Maths

***

### Instantaneous Voltage and Current

As the name suggests, AC Voltage and current continually alternate. If we draw a picture of the voltage and current waveform over time, it will look something like the image below. Depending on the type of load consuming power, the current waveform - blue in the diagram below - is what you get if you look at a typical laptop computer power supply. (There's an incandescent light bulb present, as well).

The image was made by sampling the mains voltage and current at high frequency, which is exactly what we do on the emontx or Arduino. We make between 50 and 100 measurements every 20 milliseconds. 100 if sampling only current. 50, if sampling voltage _and_ current. We're limited by the Arduino analog read command and calculation speed.

**Each individual sample is an instantaneous voltage or current reading.**

![](files/instvi.png)

### Calculating Real Power on an Arduino

Real power is the average of instantaneous power. The calculation is relatively straightforward.

First we calculate the instantaneous power by multiplying the instantaneous voltage measurement by the instantaneous current measurement. We sum the instantaneous power measurement over a given number of samples and divide by that number of samples:

<pre><span style="color: #CC6600;">for</span> (n=0; n<number_of_samples; n++)
{
  <span style="color: #7E7E7E;">// inst_voltage and inst_current calculation from raw ADC input goes here</span>

  inst_power = inst_voltage * inst_current;

  sum_inst_power += inst_power;
}

real_power = sum_inst_power / number_of_samples;

</pre>

### Root-Mean-Square (RMS) Voltage

The root-mean-square is calculated in the way the name suggests. First we square the quantity, then we calculate the mean and finally, the square-root of the mean of the squares, this is how its done:

<pre><span style="color: #CC6600;">for</span> (n=0; n<number_of_samples; n++)
{
  <span style="color: #7E7E7E;">// inst_voltage calculation from raw ADC input goes here.</span>

  squared_voltage = inst_voltage * inst_voltage;

  sum_squared_voltage += squared_voltage;
}

mean_square_voltage = sum_squared_voltage / number_of_samples;
root_mean_square_voltage = <span style="color: #CC6600;">sqrt</span>(mean_square_voltage);
 </pre>

### Root-Mean-Square (RMS) Current

Same as the RMS voltage calculation:

<pre><span style="color: #CC6600;">for</span> (n=0; n<number_of_samples; n++)
{
  <span style="color: #7E7E7E;">// inst_current calculation from raw ADC input goes here.</span>

  squared_current = inst_current * inst_current;

  sum_squared_current += squared_current;
}

mean_square_current = sum_squared_current / number_of_samples;
root_mean_square_current = <span style="color: #CC6600;">sqrt</span>(mean_square_current);

</pre>

### Apparent Power

<pre>apparent_power = root_mean_square_voltage * root_mean_square_current;</pre>

As RMS voltage is generally a fixed value such as: 230V (+10% -6% in the UK). It's possible to approximate apparent power without making a voltage measurement by setting the RMS voltage to 230V. This is a common practice used by commercially available energy monitors.

### Power Factor

<pre>power_factor = real_power / apparent_power;
</pre>

That's the fundamentals of AC power measurement on the emontx or an Arduino.

### EmonLib

We have packaged these calculations into an Arduino library called EmonLib to simplify Arduino energy monitor sketches. The library can be found on github here: [https://github.com/openenergymonitor/EmonLib](https://github.com/openenergymonitor/EmonLib)

**Next: [AC Power Theory - Advanced maths](advanced-maths)** - The code snippets on this page are expressed in strict mathematical terms.
