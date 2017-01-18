## Solar PV power diversion with emonTx using a PLL, emonGLCD and temperature measurement, by Martin Roberts

***

### 1: Features

- Continuous monitoring, every mains cycle is sampled exactly 50 times.
- Uses 2 current transformers – suitable for a “Type 2” installation.
- Normal transmission to emonGLCD via the RFM12 every few seconds, this also takes account of every mains cycle so you won’t miss short peaks.
- Support for a single DS18B20 temperature sensor.
- Standard, unmodified emonTx hardware, the triac trigger is driven from the pulse detector jack via a suitable resistor.
- Diverted power is calculated and transmitted to emonGLCD.
- Triac pulses can be manually set via the serial interface (e.g. enter 2 to pulse every second mains cycle – remember to put this back to 0!)
- Upper and lower energy thresholds can be set to minimise flicker.
- The design uses one of the ATmega328 timers to interrupt the Arduino sketch approximately every 400 microseconds. The exact timer period is determined by a software phase-locked loop which ensures that the first voltage sample is aligned to the rising zero crossing and the 26<sup>th</sup> sample is aligned to the falling zero crossing. This means that the samples are always taken in the same place on every cycle.

The sampling process occupies about 30% of the CPU time so there’s plenty left for other tasks like transmission, temperature measurement, print statements etc. These are completely decoupled from the timing loop so they don't interfere with the sampling in any way.
