## Diverting surplus PV Power, by Robin Emley

[<< 3: Diversion and Use of surplus PV](diversion)

[5: Mk2 Controller Operating Modes >>](modes)

### 4: Switching High Current Loads using a Triac

#### The Triac

![Triac symbol](/emon/sites/default/files/triac_symbol.png)

A triac is a controlled bi-directional semiconductor switch. It is a 3-terminal device, there are two **Main Terminals**, A1 and A2 that carry the heavy current being switched, and a control terminal, the **Gate**, G, which accepts the control signal to turn the switch on.

But the triac, like its uni-directional cousin the thyristor, cannot be turned off using the gate. Once turned on, the triac will conduct forever. The only way to turn it off is to remove the current by some other means. Fortunately, in an alternating current circuit, the current passes through zero every half-cycle, so a triac will always turn off at the end of a half-cycle.
_In order to simplify that description, there are many half-truths above. Triac operation is exhaustively described in [this Wikipedia article](https://en.wikipedia.org/wiki/TRIAC)._

#### Using a triac

A triac can be turned on at any time, and turns off at the end of each half-cycle. Clearly this enables us to control the current, and hence, the power in the circuit. If the triac is turned on at the beginning of each half-cycle, then current flows all of the time, and maximum power is delivered to the load. If we turn the triac on later in the half-cycle, or if we turn it on only sometimes, then less power is delivered. Depending on when and how often we turn on the triac, gives us two modes of operation. If we turn the triac on at the same relative point in each half-cycle, this is called **phase control**. If we turn the triac on for a cycle or two and then leave it off, it is called **burst fire** or sometimes whole cycle control.

<embed alt="animated diagram of triac phase control waveforms" height="220" src="/emon/sites/default/files/triac_phase.svg" type="image/svg+xml" width="600">

Phase Control
Maximum power is delivered to the load when the triac conducts for all of each half-cycle. The power ramps down continuously (but not linearly) to zero when the triac does not conduct at all.

<embed alt="animated diagram of triac burst fire control waveforms" height="250" src="/emon/sites/default/files/triac_burst.svg" type="image/svg+xml" width="600">

Burst Fire
Maximum power is delivered to the load when the triac conducts for every cycle. As fewer cycles conduct, the average power falls in steps (of 20% in this case).

### Firing (triggering) the triac

For this task, there are a number of ICs that not only generate the appropriate signal but also provide isolation between the mains and the control electronics. Two examples are the MOC3021 for phase control and MOC3041 for burst fire, both from Fairchild and others.

The MOC3021 Random Phase Driver I.C.

As always, the data sheet gives full details, an application circuit diagram and it is advisable to follow this exactly. As far as the Arduino processor is concerned, the driver looks very much like an ordinary LED. It needs a series resistor to limit the current and the value for this can be calculated in the normal way knowing the drive capability of the Arduino digital output pin and the voltage dropped by the LED, and the current it requires. The software sketch must provide a sufficiently long pulse at the correct instant in each half-cycle so the triac is turned on at the correct time.

The MOC3041 Zero-Cross Optoisolator Driver I.C.

Again, the data sheet gives full details, an application circuit diagram and it is advisable to follow this exactly. Again, the Arduino sees the device as an LED and the series resistor is calculated in the same way. However, it differs from the MOC3021 in that it contains a zero crossing detector circuit. In operation, the trigger is ‘primed’ by sending it a ‘turn-on’ signal during the preceding half-cycle, specifically after the voltage has risen above 20 V (the ‘Inhibit Voltage’ on the data sheet). The software now needs to look ahead and prime the zero-crossing trigger a little while after the previous half-cycle has started. So that rectification does not occur, the ‘turn-on’ signal is left on until the corresponding point one whole cycle later, at which point it is either turned off or left on as necessary.

#### Dip or Flicker

Any electricity supply has a finite impedance, a property of the cables, transformers, switchgear and ultimately even the generators that make up the system. And like every impedance, when you draw a current, a voltage appears across it that causes the supply voltage to drop. The amount the voltage dips is generally expressed as a percentage of the normal voltage.

If you have your own supply, it is under your control, but in general this is not the case, and you share the electricity supply with anything from a handful to many tens, possibly hundreds, of neighbours. Therefore every time you switch a load on, the voltage to everyone will dip, and recover when you switch the load off. If this happens repeatedly and frequently, it is called flicker. Incandescent lamps are highly sensitive to voltage variation, the light output is roughly proportional to V<sup>3.4</sup> and so there are strict limits that define the maximum allowable voltage change, which is related to how often the changes take place. [See Reference] Flicker is a problem for burst fire controllers.

#### Harmonics & RFI

Each time an electrical circuit is switched on by the triac, and assuming there is a voltage across the triac, the load current rises from zero to some value in a very short time. The value and rate of change are both determined by the load, and in the case of a pure (or nearly so) resistance, the rate of change can be very high. The resulting ‘edge’ generates a wide spectrum of noise which may easily extend high into the radio frequency bands and interfere with the operation of nearby electronic equipment, unless proper filtering is used.

At the same time, the act of chopping up the sine wave also generates harmonics of the line frequency. If the wave is chopped symmetrically, only odd harmonics will be present. (You can easily illustrate the reverse of this in spreadsheet: plot a sine wave, then add in the third harmonic at <sup>1</sup>/<sub>3</sub>rd the amplitude, the fifth harmonic at <sup>1</sup>/<sub>5</sub>th the amplitude and so on. Eventually you get a square wave.)

Again, because of the finite impedance of the mains supply, a load that draws harmonic currents will cause distortion of the voltage wave, and this in turn will cause currents at those harmonics in every other load connected to the system. This may cause undesirable heating in and again, there are strict limits for the amount of current that may be drawn at any given harmonic. In general, a filter must be included that will reduce both the radio frequency interference and the harmonics that are injected into the supply. [See Reference]

Harmonics are a major problem for phase-angle controllers, and for burst-fire controllers if switching point moves significantly away from the zero-crossing.

#### References & Data sheets

[MOC3021 Driver http://www.fairchildsemi.com/an/AN/AN-3003.pdf](http://www.fairchildsemi.com/an/AN/AN-3003.pdf)

[MOC3041 Driver http://www.fairchildsemi.com/ds/MO/MOC3041M.pdf](http://www.fairchildsemi.com/ds/MO/MOC3041M.pdf)

[Harmonics and Flicker - the low frequency end of the EMC spectrum
By Dr. Philip D Slade, Exeter University
http://www.compliance-club.com/archive/old_archive/990619.html](http://www.compliance-club.com/archive/old_archive/990619.html)

[<< 3: Diversion and Use of surplus PV](diversion)

[5: Mk2 Controller Operating Modes >>](modes)
