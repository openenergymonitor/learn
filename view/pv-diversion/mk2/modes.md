## Diverting surplus PV Power, by Robin Emley

[<< 4: Switching High Current Loads using a Triac](switchdev)

[6: Different ways of Measuring Voltage and Current >>](vimeasurement)

### 5: Mk2 Controller Operating Modes

The principle on which the Mk2 controller operates works equally well using either Burst Mode or Phase Angle Control to regulate the dump load.

When running in **“burst mode”** the basic Mk2 PV Router has a single energy threshold. The algorithm for diverting power is very simple. Whenever the energy bucket’s level is above this threshold value, power for the dump load is turned on; otherwise it’s turned off. A new decision is made every mains cycle, i.e. 50 times per second. By switching the load on or off in whole cycles, complications with DC are avoided.

When a good amount of surplus power is available, the load is turned on and off many times per second. At half power, the switching rate is likely to be approximately 12.5 Hz. Although the dump load is not adversely affected by this kind of switching, any nearby incandescent lights are likely to “flicker” because of the slight reduction in mains voltage that occurs whenever a high-power load is on and drawing current. This is a fundamental problem which affects all burst mode systems.

An **anti-flicker option** has therefore been included in all recent releases of the Mk2 code. When running in this mode, the frequency at which the dump load is switched on and off is greatly reduced. Correct calibration of the system is essential when running in anti-flicker mode. If the 1Wh ‘sweet zone’ of the supply meter is exceeded, then some surplus energy would be permanently lost, or the user would be charged for some consumption, or both.

Anti-flicker is a topic of ongoing development, a forum thread may be found at [https://openenergymonitor.org/emon/node/1637](https://openenergymonitor.org/emon/node/1637). There is a video demonstration of the problem and a possible solution [here](http://www.youtube.com/watch?v=U-gW0ccroYc).

The **“phase-angle control”** version works slightly differently. The conduction angle of the triac is made proportional to the amount of energy in the bucket, with a correction built in to compensate for the inherent non-linearity of phase control, so that as the energy in the bucket rises and falls, the firing point steadily advances and retards. The phase-angle variant of my Mk2 PV Router can be seen working in a video [here](https://www.youtube.com/watch?v=p_IoNohZJAY).

[<< 4: Switching High Current Loads using a Triac](switchdev)

[6: Different ways of Measuring Voltage and Current >>](vimeasurement)
