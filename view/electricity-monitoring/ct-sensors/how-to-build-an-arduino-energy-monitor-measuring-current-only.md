# How to Build an Arduino Energy Monitor - Measuring Mains Current Only

![](files/currentOnly_bb.png)

This guide details how to build a simple energy monitor on a breadboard that can be used to measure how much electrical energy you use in your home. It measures current, but uses an assumed fixed value for voltage (230V, if you're in the UK) and calculates apparent power. Although not as accurate as a monitor that measures voltage as well as current, it is a method commonly used in commercially available whole house energy monitors for reasons of simplicity and cost.

Here's how to build it:

## Step 1: Gather Components

**You will need:**

1 x Arduino

**Current sensing electronics**

1 x CT sensor YHDC SCT-013-000<br>
1 x Burden resistor 18 Ohms if supply voltage is 3.3V, or 33 Ohms if supply voltage is 5V<br>
2 x 10k Ohm resistors (or any equal value resistor pair up to 470k Ohm)<br>
1 x 10uF capacitor<br>

**Other**

A breadboard and some single core wire.

## Step 2: Assemble the Electronics

The monitor consists of the current sensor (which produces a signal proportional to the mains current) and the sensor electronics that convert the signal into a form the Arduino can use.

For a circuit diagram and detailed discussion of sensors and electronics see:

- [CT Sensors - Introduction](introduction)
- [CT Sensors - Interfacing with an Arduino](interface-with-arduino)

**Assemble the components per the diagram above.**

## Step 3: Upload the Arduino Sketch

The sketch is the software that runs on the Arduino. The Arduino converts the raw data from its analog input into human readable values, then sends them to the serial port monitor.

**a) Download EmonLib from github and place it in your Arduino libraries folder.**

Download: [EmonLib](https://github.com/openenergymonitor/EmonLib)

**b) Upload the "current only" example:**

<pre>#include <span style="color:#006699;">"EmonLib.h"</span>
<span style="color: #7E7E7E;">// Include Emon Library</span>
EnergyMonitor emon1;
<span style="color: #7E7E7E;">// Create an instance</span>
<span style="color: #CC6600;">void</span> <span style="color: #CC6600;"><strong>setup</strong></span>()
{
  <span style="color: #CC6600;"><strong>Serial</strong></span>.<span style="color: #CC6600;">begin</span>(9600);

  emon1.current(1, 111.1);             <span style="color: #7E7E7E;">// Current: input pin, calibration.</span>
}

<span style="color: #CC6600;">void</span> <span style="color: #CC6600;"><strong>loop</strong></span>()
{
<span style="color: #CC6600;">double</span> Irms = emon1.calcIrms(1480);  <span style="color: #7E7E7E;">// Calculate Irms only</span>
<span style="color: #CC6600;"><strong>Serial</strong></span>.<span style="color: #CC6600;">print</span>(Irms*230.0);	       <span style="color: #7E7E7E;">// Apparent power</span>
  <span style="color: #CC6600;"><strong>Serial</strong></span>.<span style="color: #CC6600;">print</span>(<span style="color:#006699;">" "</span>);
  <span style="color: #CC6600;"><strong>Serial</strong></span>.<span style="color: #CC6600;">println</span>(Irms);		       <span style="color: #7E7E7E;">// Irms</span>
}

</pre>

**c) Open the Arduino serial window**

You should now see two columns of values. Apparent power on the left, RMS current on the right.

**See also:**

- [How to build an Arduino energy monitor - measuring mains voltage and current](https://learn.openenergymonitor.org/electricity-monitoring/ctac/how-to-build-an-arduino-energy-monitor)
- [EmonTx Arduino Shield](https://github.com/openenergymonitor/emontx-shield): Our open-hardware energy monitoring Arduino compatible shield featuring the above circuit alongside voltage measurement for real power calculation.
