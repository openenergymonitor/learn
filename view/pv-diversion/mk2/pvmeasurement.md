## Diverting surplus PV Power, by Robin Emley

[<< 1: Introduction, and “Power” v. “Energy”](intro)

[3: Diversion and Use of surplus PV >>](diversion)

### 2: Detection and Measurement of surplus PV

By the use of non-invasive sensors for measuring voltage and current, the rate of energy flow (i.e. Power) is routinely determined in Open Energy Monitor applications. The underlying principles are described in the section “[Different ways of Measuring Voltage and Current](vimeasurement)”.

Energy from the grid normally flows **into** the premises where consumption is taking place (when importing power). In this situation, the voltage and current waveforms are in-phase; they always have the same polarity.

The situation is reversed whenever surplus PV becomes available. To get energy to flow **away from** the premises (when exporting power), the instantaneous voltage at the PV's inverter must always be slightly greater than that of the mains. While in this state, the voltage and current are 180° out-of-phase; their polarities are always opposite.

_(If the output from the PV were to exactly match the load, then there would be no flow of current at the grid supply point, in either direction.)_

To detect whether energy is being imported or exported at any given moment, it is only necessary to ascertain whether the instantaneous value of Power at the grid connection point (i.e. Voltage × Current) is positive or negative. There is a full explanation of how the direction of energy flow may be detected in [this Building Blocks page](https://openenergymonitor.org/emon/buildingblocks/ac-power-introduction). However, it is also necessary to determine _how much_ surplus power is available so that the right amount of power can be diverted for an alternative purpose.

The [standard OEM sketch for V & I](https://openenergymonitor.org/emon/buildingblocks/arduino-sketch-voltage-and-current) runs for a short period of time (around a second or two) and then indicates the average power which has been flowing during that period. By repeated use of this routine, a “dump load” can be made to switch on and off as necessary in order to consume any surplus power. This type of system can work very effectively, and many tankfuls of hot water have been provided by this means. The development of several such systems is described at [https://openenergymonitor.org/emon/node/176](https://openenergymonitor.org/emon/node/176). My own first system, which was of this type, can be seen working [here](http://www.youtube.com/watch?v=-lk6Me3cwuw), and the sketch is [here](files/Mk1_in_Garage_2.ino_.zip).

With the above type of system, power to the load is diverted on the basis of surplus power that is _predicted_ to be available over the next period. If conditions change, then too much or too little power could be diverted. The response time is also rather slow, and measurements are not continuous.

For the purpose of detecting surplus energy, the concept of an “energy bucket” has recently found great favour with DIY constructors. This concept is central to all versions of my Mk2 PV Router sketch. When using this system, the energy content of every individual mains cycle is calculated (no gaps!), and a running total of their sum is held in a suitably named variable in the controller's code such as `energyInBucket`. Surplus energy is only diverted when there is sufficient virtual energy in the “energy bucket”.

The “energy bucket” approach is directly analogous to the operation of the utility meter at the grid connection point. The Mk2 PV Router monitors the flow of energy adjacent to the supply meter and adjusts power to the dump load in order to maintain zero net flow.

[<< 1: Introduction, and “Power” v. “Energy”](intro)

[3: Diversion and Use of surplus PV >>](diversion)
