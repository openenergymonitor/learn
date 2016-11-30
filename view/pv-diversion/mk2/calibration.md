## Diverting surplus PV Power, by Robin Emley

[<< 6: Different ways of Measuring Voltage and Current](vimeasurement)

[8: Building a Mk2 PV Router >>](build)

### 7: Calibration of power and voltage, plus phase-alignment

#### Calibration of Power.

Unless operating in anti-flicker mode, calibration of any Mk2 system with regards to power is generally not required, the measurement system just needs to be linear.

When operating in anti-flicker mode (or with phase-angle control), accurate calibration with regards to power is essential. Later Mk2 builds include ‘tallymode’ which allows accurate calibration of power to be easily achieved. Full guidance about this mode may be found in the code and supporting posts on the OEM forum.

#### Calibration of Voltage.

Calibration of the voltage sensor may be required for correct operation of the power diversion system which uses a triac. Full guidance about this may be found in any of the Mk2 sketches, and tools are available to assist with this process. Providing that the voltage sensor is constructed in the standard way, the default values are likely to work fine without any need for adjustment.

#### Phase-alignment.

When an AC voltage source is applied to a resistive load, the resulting AC current is perfectly aligned with the voltage. With a resistive load, the Power Factor is one (or unity), and “apparent power” and “real power” are both the same. With other types of load, the current can be advanced or retarded with respect to the voltage. In either case, the Power Factor is then less than one.

Utility meters measure “real power”, so any measurement system for diverting surplus power should do likewise. In simple terms, this means that the measured waveforms for voltage and current should be closely aligned when a resistive load is applied.

Because voltage and current are sampled alternately, that process introduces some temporal shift between the two waveforms. Each of the non-invasive sensors also introduces some phase-shift into the waveform that is produced. Some means therefore needs to be included whereby the voltage and current waveforms can be realigned prior to each pair of samples being processed. This alignment process is achieved by applying the standard OEM ‘phasecal’ algorithm.

Phasecal is generally applied to the voltage waveform, its purpose being to calculate the appropriate time-shifted value of voltage which corresponds to each sample of current. This algorithm makes use of the two most recent sample values for voltage, and then calculates the appropriate value for the “correct” moment by linear interpolation. If the required moment lies beyond these two points, then the algorithm applies extrapolation rather than interpolation. The phasecal process is described in more detail on a [Building Blocks page](https://openenergymonitor.org/emon/buildingblocks/explanation-of-the-phase-correction-algorithm).

For the purpose of diverting surplus power, the value of phasecal has been found to be relatively unimportant. The default value of 1.0 has been generally found to work fine. For alternative types of application, much better alignment may be required between voltage and current.

A sketch, [PhasecalChecker](files/PhasecalChecker.ino_.zip), is available which allows the optimum value of phasecal to be determined for any arrangement of hardware. This is included in the list of associated Mk2 items at [https://openenergymonitor.org/emon/node/1757](https://openenergymonitor.org/emon/node/1757).

[<< 6: Different ways of Measuring Voltage and Current](vimeasurement)

[8: Building a Mk2 PV Router >>](build)
