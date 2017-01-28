## Gas monitoring

This page pulls together information on DIY gas meter monitoring using pulse counting methods.

If you are very lucky, your gas meter has a connector that provides access to the meters pulse output, enabling you to determine gas consumption via pulse counting, see [introduction-to-pulse-counting](introduction-to-pulse-counting).

### Rotating Ring Counting

The method used counts the revolutions of a dial to determine the volume of gas consumed.

Whilst most meters don't have that capability, many gas meters have a unique "spot" on their rotating disk which can be read with a suitable pickup and electronics. This may be:

1.  A small magnet embedded in the disk. A Hall effect sensor or a reed switch can detect disk rotation.
2.  A reflective spot on the dial that can be read by an infra-red reflective sensor.
3.  A uniquely coloured numeral that can be detected by an infra-red reflective sensor. (can be difficult)

### Magnetic Counting

**Hall Effect**

Hall effect sensors can detect a magnetic field. Sensor output is a voltage which varies in response to a magnetic field. A microcontroller with a Hall effect sensor attached to an interrupt line, can count each complete disk rotation.

The image below shows an Actaris gas meter, suitable for monitoring via this method. The magnetic point is visible as a small silver oval on the rightmost digit. The hall effect sensor can be located on the underside of the cut-out section, pointing upwards, or attached directly to the dial face.

[![](files/uk-gas.jpg)](files/uk-gas.jpg)

Since a gas meter will not usually have a mains power connection located nearby, it's desirable for a Hall effect sensor to be a low-power device. Low power consumption enables use with a battery powered emonTx or JeeNode.

Paul Allen ([MarsFlyer](https://openenergymonitor.org/emon/user/602)) has successfully used a [Melexis MLX90248](http://octopart.com/partsearch#search/requestData&q=MLX90248ESE%20) hall effect sensor. It's average supply current is 10uA. This sensor will react to either a North or South magnetic pole (omnipolar), which simplifies installation. The sensor is supplied as a surface mount SOT23 package which will need to be soldered onto a [breakout board](https://www.sparkfun.com/products/717) to enable wires to be connected.

The sensor mentioned above is difficult to source in the UK, neither RS nor Farnell electronics stock it. A suitable substitute, Diodes AH180N has very similar specifications, is readily available and very low cost. The AH180N is also in a SOT23 package, has an average current consumption of 8-16uA and operates between 2.5 and 5.5 Volts.



#### Resources

- [Reflective Spot Counting on Schroder BK-G4 meter](https://github.com/Bra1nK/HomeMonitor/tree/master/Gas%20Meter%20Pulse%20Creator)

- [http://wattdata.blogspot.com/2011/05/gaslog-arduino-measuring-gas-meter.html](http://wattdata.blogspot.com/2011/05/gaslog-arduino-measuring-gas-meter.html)

- [https://github.com/MarsFlyer/ArduinoEnergyProjects](https://github.com/MarsFlyer/ArduinoEnergyProjects)

- [http://sustburbia.blogspot.com/2010/10/gas-meters-revisited.html](http://sustburbia.blogspot.com/2010/10/gas-meters-revisited.html)

- [Using an optical computer mouse to read a rotating dial](https://github.com/kristopher/PS2-Mouse-Arduino)

- [List of common UK gas meters](https://openenergymonitor.org/emon/node/2001)

- [Hall effect sensors & Reed switch debouncing](https://openenergymonitor.org/emon/node/1585)

- [Direct monitoring of power meter pulse using Raspberry Pi & an LDR](https://openenergymonitor.org/emon/node/2017)

- [Gas meter monitoring with Hall effect sensor & reed switch](https://openenergymonitor.org/emon/node/1732)

- [Monitoring Gas meters without pulsed output or magnet](https://openenergymonitor.org/emon/node/3403)

- [British Gas Smart Meters - Part 1](https://openenergymonitor.org/emon/node/2820)

- [emonTH gas with phototransistor or reed switch](https://openenergymonitor.org/emon/node/3600)

#### Battery power opperation

- [Battery-efficient pulse measurement](https://openenergymonitor.org/emon/node/1943)

- [Power down, watchdog wake up and power computation](https://openenergymonitor.org/emon/node/2489)

#### Pulse processing forum discussion

- [https://openenergymonitor.org/emon/node/3467](https://openenergymonitor.org/emon/node/3467)

- [https://openenergymonitor.org/emon/node/1056](https://openenergymonitor.org/emon/node/1056)
 
- [https://openenergymonitor.org/emon/node/2457](https://openenergymonitor.org/emon/node/2457)
 
- [https://openenergymonitor.org/emon/node/3183](https://openenergymonitor.org/emon/node/3183)
 
- [https://openenergymonitor.org/emon/node/3387](https://openenergymonitor.org/emon/node/3387)
 
- [https://openenergymonitor.org/emon/node/2850](https://openenergymonitor.org/emon/node/2850)
 
- [https://openenergymonitor.org/emon/node/3338](https://openenergymonitor.org/emon/node/3338)