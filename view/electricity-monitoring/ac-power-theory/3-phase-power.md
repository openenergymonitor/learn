# 3-Phase Power

<!-----------------------------3PhaseTutorialVideo----------------------------->

<iframe src="https://www.youtube.com/embed/MnH_ifcRJq4" width="100%" height="300px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

<!----------------------------/3PhaseTutorialVideo----------------------------->

## History

The first electrical systems generated direct current by means of dynamos. It was soon realised that there were serious limits to the area and the number of customers that could be served, and alternating current took over – which as we all know can be transformed from one voltage to another with minimal loss. Very quickly, (in 1885) Italian Galileo Ferraris realised that two windings set at an angle to each other could produce a rotating magnetic field, something of great help when motion is required, and just two years later the 3-phase alternator appeared.

## What is 3-Phase Power?

Three phase power is comprised of 3 related voltage sources supplying the same load. It is a significant improvement over single or two-phase power. The three voltage or current waves follow each other ⅓ cycle apart, and _(ideally)_ if you sum the currents together at any instant, they balance perfectly. For a mechanical analogy, think of a wheel with three elastic bands fixed to the rim 120° apart, all tied together in the centre. The forces there are perfectly balanced, the knot stays at the centre of the wheel. The bands represent the voltages or currents, and it's easy to see that everything balances perfectly.

More importantly, the power is continuous and constant, so three phase motors run more smoothly (we've all heard bottles rattling in the refrigerator, which is usually powered by a single phase motor that vibrates as a result of the power pulses at twice mains frequency).

There are important advantages for the power companies. If all the currents balance exactly, they don't need a neutral conductor. Look at a high voltage overhead line and you'll see 6 bunches of main conductors and a thin single conductor at the top. The three bunches on one side are the three phases of one circuit, a second circuit is on the other side, and the single conductor is an earth which has probably an optical fibre core for signaling and communications. There is no neutral conductor. Likewise, there are also savings to be made on the amount of iron in transformers, because the magnetic fluxes balance where they meet.

The main advantage comes with motors. The three phase currents set up a rotating magnetic field inside the motor and so the motor will start to rotate on its own. No special mechanism is required. e.g. A phase shift capacitor and extra winding usually used with a single-phase motor.

## Naming

Traditionally in the UK, the three phases were identified by the colours Red, Yellow (or White) and Blue; with Black for the neutral and Green for earth. Pan-European harmonisation in 2004 led to the standard becoming: Line 1 – Brown, Line 2 – Black, Line 3 – Grey, Neutral – Blue, Earth – Green/Yellow stripes. [A comprehensive table of the colours used in various countries can be found here: [https://en.wikipedia.org/wiki/Three-phase_electric_power](https://en.wikipedia.org/wiki/Three-phase_electric_power)].

Note: The phase conductor is “Line”, not “Live”. Live refers to the state of the circuit, a neutral conductor that is carrying current is considered “live.”

## Identifying a 3-Phase Supply

The obvious way to tell if you have a 3-phase supply is to locate your meter and distribution board / consumer unit. Not counting green or green/yellow earth cables, if you have four reasonably thick cables connecting to the meter, two of which go to your consumer unit or fuse-board, you don’t have a three- phase supply. If you have eight reasonably thick cables connecting to the meter, four of which go to your consumer unit or fuse-board, and your main circuit breaker has 3 or 4 sections with one operating lever working all three or four – known as a 3-pole or 4-pole linked MCB, then you have a three-phase supply.

![Single- and 3-phase meters & incomers](files/meters-incomers.png)

(a) Single phase meter (UK)
(b) Single phase double pole circuit breaker
(c) Terminal block of a 3-phase meter, showing 8 main & 2 auxiliary terminals.
(d) 3-pole linked circuit breaker, in a 3-phase installation. (Germany)

## Mathematics of a 3-Phase Supply

When dealing with a single-phase mains supply and purely resistive (or nearly so) loads, normal maths (V = I.R, P = V² / R, etc) is adequate. When reactive components (inductors, capacitors) are taken into account, we need a graphical representation to help us visualise the relationship between voltage and current in different parts of the circuit. To do that, we employ a device called a ‘phasor’. A phasor is quite simply a line that has a length, a direction, and rotates. The length represents the magnitude of the voltage or current, the angle represents its relationship to some reference (that we can choose to suit our circumstances). We can illustrate the relationship between the three voltages of a 3-phase electrical supply with three phasors 120° apart. If we connected a 3-channel oscilloscope to the supply we might see something like this:

<!----------------------------------------------------------------------------->

<div class="xaxiswrapper">

<embed alt="animated diagram of 3-phase waveforms" height="250" src="files/phasors.svg" type="image/svg+xml" width="500">

</div>

<!------------------------------------------------------------------------------->

The phasors rotate at the supply frequency. The three phasors are 120° apart, and the three voltage waveforms are 120° apart — 1 complete cycle being 360°.

The diagram illustrates one of the fundamental properties of a 3-phase supply. If the voltage is the UK standard 240 V, that is, the voltage between one line and neutral, the length of the arrow represents this. The voltage between any two phases is clearly larger. Trigonometry will show that it is in fact √3 times larger – the distance between the tips of the arrows, so the line–line voltage is 415.7 V (usually given as 415 V). Also, the line-to–line voltages are shifted in phase by 30° relative to the line–neutral voltages. The power delivered by a 3-phase system is three times the power per phase, or assuming a unity power factor, 3 × line-neutral voltage × line current or √3 × line-to-line voltage × line current.

As it stands, that diagram illustrates the relationship between the 3 voltages. It need not be restricted to voltage, we can use it for current too. Its real value comes when we show both together.

## Effect of Unbalanced Loads

Suppose a small factory is supplied by an electricity sub-station. In the sub-station, the neutral point of the transformer secondary windings is earthed. Cables feed two factories, the first of which has loads connected between each of the phases and neutral. The question is, what effect does this have on the voltage the second factory receives?

![Line diagram of a factory estate power distribution system](files/unbalanced-load.png)

The sub-station transformer windings and the cable all have impedances (for simplicity we’ll assume it is resistance only, and they are equal), which add together and are represented by R<sub>line</sub>. We’ll also assume that the factory loads are all equal resistances too.

The combination forms a voltage divider, so the voltage received by the first factory is reduced by the factor R<sub>load</sub> / (R<sub>line</sub> + R<sub>load</sub>). Because the loads are equal, there is no neutral current, so the neutral voltage is zero.

If the loads are unequal, it starts to get complicated so use our phasor diagram. We’ll assume for clarity in the diagram, that the load on Line 3 is very small, but that the other two loads are very large (much larger than would be permitted in the real world). The phasor diagram looks like this:

<!----------------------------------------------------------------------------->

<div class="xaxiswrapper">

<embed alt="animated diagram of unbalanced 3-phase waveforms" height="250" src="files/phasors-unbalanced.svg" type="image/svg+xml" width="500">

</div>

<!----------------------------------------------------------------------------->

In (a) the long arrows represent the no-load voltages of the transformer. The voltage on line 1 (red) is reduced by the voltage drop in R<sub>line 1</sub>, at the same time the neutral voltage is raised towards line 1 (the short arrows). A similar thing happens to line 2 (yellow). Line 3 (blue) carries a very small current that we ignore, so its voltage remains the same. The result (b) is the neutral point is moved towards the midpoint between lines 1 & 2 (i.e away from line 3), the voltages between Line 1 and neutral, and between Line 2 and neutral, are much reduced while the voltage between Line 3 and neutral is much increased. There is now a voltage on the neutral conductor, in anti-phase with line 3\. The angles between the three voltages are no longer 120°.

In the real world, while the cables are to a first approximation purely resistive, the same cannot be said of the transformer impedance and the load, both of which are likely to be inductive to varying degrees. That would mean the voltage drop phasors are no longer parallel to the line voltages, and further phase shifts are introduced. However, the principle remains the same.

## Measuring 3-Phase Power

To measure 3-phase power you need 3 wattmeters or — in OpenEnergyMonitor terms — 3 emonTxs <sub>(See note)</sub>. You simply measure the three phases in the same way as you would measure three single-phase installations. You need a current transformer and a voltage monitor on each phase, and the total power is the sum of the 3 powers.

![Measuring 3-phase power with 3 emonTxs](files/3-phase-power.png)

If you have a 3-wire balanced system and no neutral connection, then it can be shown that you need only two wattmeters or emonTxs, and the total power is _still_ the sum of the two powers. In this case, you will be measuring the line-to-line voltage rather than the line-to-neutral voltage, so you need voltage transformers that can operate safely at 440 Volts.

## An Approximate Method to Estimate 3-Phase Power with an Unmodified emonTx

If access to measure the voltages of the three phases is difficult, or you do not want to add extra hardware or use 3 emonTx’s, then it is possible to do this with a single emonTx, measuring the voltage on one phase and using that measurement to derive an approximate value for the voltages on the other two phases. This method assumes the voltages will be relatively close to each other, and the phase disturbances small - though as we've seen above, neither of these are necessarily the case. If the power system is reasonably well balanced (which it should be), it is likely this method will nevertheless be more accurate than simply relying on a nominal assumed voltage and power factor.

The principle is to sample the voltage of the first phase at intervals (as per the normal sketch and library routines). The measured voltage is used immediately to calculate the power etc. in the first phase, then immediately stored. ⅓ cycle later, the stored value is retrieved and used with the current measurement of the second phase to calculate the power there, and ⅓ cycle after that, with the current measurement of the third phase to calculate that power.

The power and other measurements on the first phase (the one we measured the voltage of) will be accurate (to within the normal limits). The accuracy of the measurements for the other two phases will be degraded because primarily, as has already been mentioned, the voltages of the three phases will not track each other exactly. There is also an inherent assumption that the phase relationships of the voltages remain constant, which will not necessarily be true, although any change here is not likely to contribute significantly to any error.

[See emonTx V3.4 approximate three-phase firmware](https://github.com/openenergymonitor/emontx-3phase)

['Full Fat' three-phase monitor using 3 x emonTx units](https://openenergymonitor.org/emon/node/1170)

## Dangers

The principal danger of course, is the higher voltage that exists between lines — around 400 V. The probability that an electric shock resulting from accidental contact would be lethal, is that much higher. For this reason, it is not a good idea to have outlets supplied from different phases in the same room.

There is a less obvious danger from the possibility that one phase may become disconnected, then a 3-phase motor would be likely to suffer damage as it would be running on only one phase. A _<u>linked</u>_ 3-pole or 4-pole circuit breaker (breaking also the neutral), is essential for any such load. Fuses are not a good idea. If one fuse 'blows’ the result is single-phasing.
