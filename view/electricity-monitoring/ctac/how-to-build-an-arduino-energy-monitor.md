## How to build an Arduino energy monitor - measuring mains voltage and current

***

Including voltage measurement via AC-AC voltage adapter and current measurement via a CT sensor.

![](files/currentvoltage_bb.jpg)

This guide details how to build a simple electricity energy monitor on that can be used to measure how much electrical energy you use in your home. It measures voltage with an AC to AC power adapter and current with a clip on CT sensor, making the setup quite safe as no high voltage work is needed.

The energy monitor can calculate real power, apparent power, power factor, rms voltage, rms current. All the calculations are done in the digital domain on an Arduino.

### Step One – Gather Components

**You will need:**

1x Arduino

**Voltage sensing electronics:**

1x 9V AC-AC Power Adapter

1x 100kOhm resistor for step down voltage divider.

1x 10kOhm resistor for step down voltage divider.

2x 470kOhm (for voltage divider, any matching value resistor pair down to 10K)

1x 10uF capacitor

**Current sensing electronics**

1x CT sensor SCT-013-000

1x Burden resistor 18 Ohms if supply voltage is 3.3V or 33 Ohms if supply voltage is 5V.

2x 470kOhm (for voltage divider, any matching value resistor pair down to 10K)

1x 10uF capacitor

**Other**

1x A breadboard and some single core wire.

Oomlout do a good arduino + breadboard bundle [here £29](https://www.oomlout.co.uk/arduino-prototyping-bundle-br-ardp-p-186.html?zenid=1f2d8abc7fe1ce7953446890ca648cbd)

### Step Two – Assemble the electronics

The electronics consist of the sensors (which produce signals proportional to the mains voltage and current) and the sensor electronics that convert these signals into a form the Arduino is happy with.

For a circuit diagram and detailed discussion of sensors and electronics see:

[CT Senors - Introduction](https://openenergymonitor.org/emon/buildingblocks/ct-sensors-introduction)

[CT Sensors - Interfacing with an Arduino](https://openenergymonitor.org/emon/buildingblocks/ct-sensors-interface)

[Measuring AC Voltage with an AC to AC power adapter](https://openenergymonitor.org/emon/buildingblocks/measuring-voltage-with-an-acac-power-adapter)

**Assemble the components as in the diagram above.**

### Step Three – Upload the Arduino Sketch

The Arduino sketch is the piece of software that runs on the Arduino. The Arduino converts the raw data from its analog input into a nice useful values and then outputs them to serial.

**a) Download EmonLib from github and place in your arduino libraries folder.**

Download: [EmonLib](https://github.com/openenergymonitor/EmonLib)

**b) Upload the voltage and current example:**

<pre>#include <span style="color: #006699;">"EmonLib.h"</span>             <span style="color: #7E7E7E;">// Include Emon Library</span>
EnergyMonitor emon1;             <span style="color: #7E7E7E;">// Create an instance</span>

<span style="color: #CC6600;">void</span> <span style="color: #CC6600;">**setup**</span>()
{  
  <span style="color: #CC6600;">**Serial**</span>.<span style="color: #CC6600;">begin</span>(9600);

  emon1.voltage(2, 234.26, 1.7);  <span style="color: #7E7E7E;">// Voltage: input pin, calibration, phase_shift</span>
  emon1.current(1, 111.1);       <span style="color: #7E7E7E;">// Current: input pin, calibration.</span>
}

<span style="color: #CC6600;">void</span> <span style="color: #CC6600;">**loop**</span>()
{
  emon1.calcVI(20,2000);         <span style="color: #7E7E7E;">// Calculate all. No.of wavelengths, time-out</span>
  emon1.serialprint();           <span style="color: #7E7E7E;">// Print out all variables</span>
}
</pre>

**c) Open the arduino serial window**

You should now see a stream of values. These are from left to right: real power, apparent power, rms voltage, rms current and power factor.
