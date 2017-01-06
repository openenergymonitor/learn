## Diverting surplus PV Power, by Robin Emley

### 9: Different versions of the software sketch

All versions of the Mk2 PV Router sketch (apart from the phase-angle variant) will work with the original hardware. The difference between them is simply their efficiency. Mk2i offers substantially better performance than the original Mk2\. It may therefore be a better choice for an application where additional workload is to be placed on the processor. Having said which, all versions can be relied on to heat up a tankful of water in similar times. Every version that has been posted to date is included in the list at [https://openenergymonitor.org/emon/node/1757](https://openenergymonitor.org/emon/node/1757)

Note that the [phase-angle variant of the Mk2 sketch](files/Mk2_PV_phaseAngle.ino_.zip) requires slightly different hardware. These differences are given in the associated post which accompanies that particular version.

A summary of the operation of the [Mk2_PV_Router_mini.ino](files/Mk2_PV_Router_mini.ino_.zip) version now follows. The line numbers are as shown in the editor that forms part of the Arduino’s IDE. Full guidance for setting up this environment is available at [https://openenergymonitor.org/emon/buildingblocks/setting-up-the-arduino-environment](https://openenergymonitor.org/emon/buildingblocks/setting-up-the-arduino-environment).

|Line Nos.|Content|
|---------|-------|
|1 - 74|Global definitions|
|77 - 102|setup() which includes:<br>- initialisation of the Serial interface<br>- pin definitions for outputs|
|105 - 241|- loop(), which is executed for each per pair of V & I samples (~ 400 µS)|
|108|- update the # of samples, for the calculation of average power|
|111 - 113|- copy values from previous loop, to avoid them being overwritten|
|117 - 118|- get the next pair of voltage and current samples|
|121 - 122|- subtract the known DC offset (assumes a shared 2.5V reference)|
|125|- update the HPF for voltage (used with a LPF to find the DC offset)|
|128 - 132|- determine the polarity of the latest voltage sample|
|135 - 227|- if the polarity now is positive:|
|138 - 195|- if this is the first positive sample of a new mains cycle:|
|144 - 145|- update the LP filter with the net sum of ±deltas from last cycle|
|149 - 150|- calculate the energy content of the previous mains cycle|
|153 - 163|- a convenient place to display data, if required|
|165 - 187|- if the system has had time to settle since start-up:|
|169|- update the "energy bucket" with the latest contribution|
|170|- update a parallel bucket for LED use (this one has no limits)|
|174|- adjust the energy bucket's level by any desired safety margin|
|177 - 180|- apply upper and lower limits to the bucket's level|
|189|- set a flag to show that the trigger needs to be armed|
|192 - 194|- clear the per-cycle accumulators|
|198 - 226|- if the trigger needs to be armed:|
|201 - 225|- if the voltage is OK for arming the trigger (>20V typical)|
|208 - 217|- if bucket is at least half full, the trigger is to be 'on', else 'off'
|220|- write this decision to the pin for the external trigger|
|223|- clear the flag (the trigger is armed only once per mains cycle)
|235 - 236|- apply the phasecal algorithm to correct for phase-shift between V and I|
|237|- determine the instantaneous power (using P = V × I)|
|238|- add this latest contribution to the accumulated total for this mains cycle|
|240|- update the per-cycle accumulator for ±deltas|
|241|- end of loop(), and end of the main code|
|246 - 306|checkLedStatus(). This is an optional function which allows LED events at the<br>supply meter to be monitored. By displaying the value of `energyInBucket_4led`,<br>the operation of the measurement system can be compared directly with the<br>operation of the supply meter.|

#### Help and Assistance

When building a Mk2 PV Router for the first time, the OEM forum at [https://community.openenergymonitor.org/](https://community.openenergymonitor.org/) is a valuable resource. The Open Energy Monitor is an open-source project, and most constructors are only too happy to provide assistance to anyone whose project has yet to get off the ground.
