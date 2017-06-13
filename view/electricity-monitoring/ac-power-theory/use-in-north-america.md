## Use in North America

***

In order to understand how these units can be used in North America, it might be helpful to give a brief outline of the UK power system and the differences from UK practice.

#### Supply Characteristics – UK

In the UK, the final distribution transformer tends to be large. In urban areas, it may be around 1 MVA, and may serve a few hundred homes. It will be three-phase with star-connected secondaries. The star point, which is the neutral, will be earthed. The secondary voltage is nominally 240 V line–neutral, giving 415 V between phases. The frequency is 50 Hz ± 1%. Although large commercial and industrial premises will have a 3-phase supply, many small industrial units will have only a single phase. Anything other than a single phase supply is very rare for domestic consumers.

The normal rating of the domestic supply will be 80 or 100 A. The supply authority will provide a fuse, a neutral link and a meter. From that point on, the wiring is the responsibility of the consumer. The cables between the meter and the “consumer unit” are called “meter tails” and will normally be 16 mm<sup>2</sup> or 25 mm<sup>2</sup> copper, with a maximum diameter over the sheath of about 10.5 mm. High current appliances, such as cookers or showers, will normally be fed by a dedicated circuit breaker, but the socket outlets for general use with portable appliances are almost always fed by a [“ring final sub-circuit”](https://en.wikipedia.org/wiki/Ring_circuit) – comprising essentially a loop of cable starting and ending at a 32 A circuit breaker, which feeds an unlimited number of socket outlets, subject to a maximum floor area served of 100 m<sup>2</sup>. Each appliance plug is fitted with a fuse rated at between 1 A & 13 A. Lighting points are normally daisy-chained and supplied by a 6 A circuit breaker.

#### Supply Characteristics – North America

Compared to the UK, the North American final distribution transformer tends to be quite small, serving only a few homes. The normal domestic supply is 240 V, 60 Hz centre-tapped, and the centre tap is the neutral, which is also earthed.

![N.American Electricity Supply - final transformer voltages](files/N_America_Fig_1.svg)
<p style="font-size: smaller">Figure 1\. North American Domestic Electricity Supply - final transformer voltages.</p>

The voltage tolerance is ±5% and the imbalance between the two legs has been reported to be better than 2 V, although there is no actual specification regarding voltage imbalance. Load centre (circuit breaker panel) layout enables an electrician to distribute the loads between the two legs when the wiring is installed. Standard practice among US electricians is to connect the circuits to the breakers in numerical sequence, with odd numbered breakers connected to one leg and even numbered breakers connected to the other leg. Thus, half of them will be on one leg, half on the other leg, with the aim being to balance the load evenly.

The frequency tolerance is ±0.02 Hz. The effect of the higher frequency will, for most purposes, be marginal. Transformers, both current and voltage, will have slightly different losses and phase errors, and the delay between measuring voltage and current will also be different (in terms of angle), all of which will imply slightly different values for phase calibration. Inside the emonTx, capacitors in the ac side will have a lower impedance. On the firmware side, the sketches will sample at the same rate, but there will be fewer samples per cycle. In theory, this will mean the highest harmonic number that can be measured is lower, but in practice, the energy that will be missed will be insignificant. The major exceptions are the monitoring sketches that employ the phase locked loop (PLL) principle. These require adjustment to the timing in order to lock to the higher frequency. (That adjustment might be by changing a value in the sketch, or there might be a separate version for each frequency.)

#### Measuring Whole-house Power

Because there are three wires (discounting the protective earth conductor), classical theory dictates that two wattmeters are needed, and for ‘wattmeter’ read a pair of voltage and current measurements. Unfortunately, the emonTx has only one voltage input, therefore a compromise is required. Fortunately, because the voltage balance between the two legs is good, little error is introduced by assuming the voltages are equal in magnitude. However, two current measurements are always necessary. Again, in theory it does not matter which voltages and currents are measured, but in general, it will be more convenient to arrange the voltage transformer to measure the voltage of one leg to neutral, and to attach a current transformer to each leg.

![N.American Electricity Supply - Measuring whole-house power](files/N_America_Fig_2.svg)
<p style="font-size: smaller">Figure 2\. North American Domestic Electricity Supply - Measuring whole-house power.</p>

In Fig 2, assume for simplicity the loads are all purely resistive. (If they are not, which will almost certainly be the case in practice, the same principle applies but the maths is a little more complicated.)

CT 1 sees the total current of the upper 120 V load and the 240 V load: I<sub>1</sub> + I<sub>3</sub>
CT 2 sees the total current of the lower 120 V load and the 240 V load: I<sub>2</sub> + I<sub>3</sub>
Note that CT 1 faces to the right and CT 2 faces to the left, as indicated by the ‘phase dots’. If we assume the lower leg voltage is identical in magnitude to the upper, and we add the powers together in software, then the total power as measured will be

V × I<sub>CT1</sub> + V × I<sub>CT2</sub>
= V × (I<sub>1</sub> + I<sub>3</sub>) + V × (I<sub>2</sub> + I<sub>3</sub>)
= V × I<sub>1</sub> + V × I<sub>2</sub> + 2 × V × I<sub>3</sub>

which is correct.

Other arrangements are possible:

![N.American Electricity Supply - Measuring whole-house power](files/N_America_Fig_3a.svg) ![N.American Electricity Supply - Measuring whole-house power](files/N_America_Fig_3b.svg)
<p style="font-size: smaller">Figure 3a-b. North American Domestic Electricity Supply - Alternative arrangements for measuring whole-house power.</p>

Fig 3a: I<sub>CT1</sub> = I<sub>1</sub> + I<sub>3</sub>

I<sub>CT2</sub> = I<sub>2</sub> + I<sub>3</sub>

Total Power = ½ × V × I<sub>CT1</sub> + ½ × V × I<sub>CT2</sub>

Fig 3b: I<sub>CT1</sub> = I<sub>1</sub> + I<sub>3</sub>

I<sub>CT2</sub> = I<sub>2</sub> - I<sub>1</sub>

Total Power = 2 × V × I<sub>CT1</sub> + V × I<sub>CT2</sub>

#### Measuring Individual Circuits

Individual circuits may be either 120 V using a connection between one leg and neutral, or they may be 240 V, i.e. connected to both legs.

![N.American Electricity Supply - Measuring individual circuits](files/N_America_Fig_4a_0.svg) ![N.American Electricity Supply - Measuring whole-house power](files/N_America_Fig_4b_0.svg)
![N.American Electricity Supply - Measuring whole-house power](files/N_America_Fig_4c_0.svg)
<p style="font-size: smaller">Figure 4a-c. North American Domestic Electricity Supply - Alternative arrangements for measuring individual circuits.</p>

Fig 4a: Power = V × I = EnergyMonitor::realPower

Fig 4b: Power = V × I = EnergyMonitor::realPower

Fig 4c: Power = 2 × V × I = 2 × EnergyMonitor::realPower

If the circuit is 120 V, only one CT is required and the set-up is as shown in Fig 4a or Fig 4b above. Note: The orientation of the CT In Fig 4b is not symmetrical with the CT in Fig 4a.

If the circuit is purely 240 V, i.e. there is no neutral connection, again only one CT is required. However, the power must be doubled, as the voltage measured is only half the voltage applied to the load, as in Fig 4c.

If the circuit is “mixed” 120 V and 240 V, i.e. the main load is 240 V but there is a neutral connection to supply for example a timer, an indicator lamp or similar low power device, then it might be acceptable to ignore the 120 V load and treat the load as a “pure” 240 V load and the arrangement of Fig 4c can be used. There will however, be a small error.

If the 120 V load cannot be ignored, i.e. the error is unacceptable, the load should be treated as a “whole house” with one of the arrangements of Fig 3 shown in the section above.

#### Connecting the Current Transformers

The obvious way to connect the current transformers is to have each connected directly to an input. This arrangement is necessary if, for example, it is desirable or necessary to be able to balance the currents in each leg of the supply. But if only the total power is required, then a single input can be used, releasing the second for another circuit.

![N.American Electricity Supply - Measuring whole-house power, CT arrangement](files/N_America_Fig_5a.svg) ![N.American Electricity Supply - Measuring whole-house power, CT arrangement](files/N_America_Fig_5b.svg)
![N.American Electricity Supply - Measuring whole-house power, CT arrangement](files/N_America_Fig_5c.svg)
<p style="font-size: smaller">Figure 5a-c. North American Domestic Electricity Supply - Connecting the Current Transformers.
Fig 5a – One input per CT – voltage type with internal burden or current type with burden in the emonTx
Fig 5b – CTs in parallel with a common burden in the emonTx – using a single input
Fig 5c – ‘Voltage output’ CTs or CTs with individual burdens – using a single input</p>

In Fig 5a, the burden and calibration coefficient are calculated in the standard way. The burden value is calculated to give approx 1.1 V rms for the emonTx, or 1.6 V for the emonTx Shield, at maximum measured current. The calibration coefficient is then calculated:

current coefficient = (CT ratio) / (Burden resistance)

or for a ‘voltage output’ CT with an internal burden:

current coefficient = (CT rated primary current) / (CT rated output voltage)

This arrangement is suitable for ‘voltage output’ CTs having an output voltage of 1.0 V at rated current.

In Fig 5b, the CT currents are summed in a single burden resistor; the burden value is calculated to give half the maximum input voltage for the maximum current either leg. The CTs should have the same current ratio, the calibration coefficient must be calculated knowing the burden voltage at a specified total current:

current coefficient = (total CT primary currents) / (burden voltage)

A ‘voltage output’ CT is not suitable for this connection arrangement.

In Fig 5c, the burden voltages are summed; each burden value is calculated to give half of the maximum input voltage for the maximum current. If the CTs are not identical, the burden resistors must be chosen so that they develop the same voltage for the same primary current.

current coefficient = (total CT primary currents) / (total burden voltage)

This arrangement is suitable for ‘voltage output’ CTs, but the output voltage at rated current should be approximately 0.55 V (0.75 V for the emonTx Shield).

#### Suitable Current Transformers

_Note: The manufacturer adjusts the turns ratio to give the correct output current._
The burden & calibration coefficient are calculated for Fig 5a arrangement only.

#### Magnelab solid core series

<div class="xaxiswrapper">

<table>

<tbody>

<tr>

<th>Imax</th>

<th>Catalog
Part No.</th>

<th>Nominal Ratio</th>

<th >Aperture</th>

<th>Burden
(E24 series,
0.25 W, 1%)</th>

<th>Calibration coefficient</th>

</tr>

<tr>

<td >30 A</td>

<td >UCT-0300-000</td>

<td >1:880</td>

<td >0.3”</td>

<td >33 Ω</td>

<td >26.667</td>

</tr>

<tr>

<td >60 A</td>

<td >UCT-0500-000</td>

<td >1:360</td>

<td >0.5”</td>

<td >6.8 Ω</td>

<td >52.94</td>

</tr>

<tr>

<td >100 A</td>

<td >UCT-0750-000</td>

<td >1:3000</td>

<td >0.75”</td>

<td >33 Ω</td>

<td >90.91</td>

</tr>

<tr>

<td >200 A</td>

<td >UCT-1000-000</td>

<td >1:1000</td>

<td >1.0”</td>

<td >5.6 Ω</td>

<td >178.57</td>

</tr>

<tr>

<td >400 A</td>

<td >UCT-1250-000</td>

<td >1:1200</td>

<td >1.25”</td>

<td >3.3 Ω, 0.5 W</td>

<td >363.64</td>

</tr>

</tbody>

</table>

</div>

#### Magnelab split core series

<div class="xaxiswrapper">

<table>

<tbody>

<tr>

<th>Imax</th>

<th>Catalog
Part No.</th>

<th>Nominal Ratio</th>

<th >Aperture</th>

<th>Burden
(E24 series,
0.25 W, 1%)</th>

<th>Calibration coefficient</th>

</tr>

<tr>

<td >75 A</td>

<td >SCT-0400-000</td>

<td >1:3000</td>

<td >0.4”</td>

<td >43 Ω</td>

<td >69.77</td>

</tr>

<tr>

<td >200 A</td>

<td >SCT-0750-000</td>

<td >1:7500</td>

<td >0.75”</td>

<td >39 Ω</td>

<td >192.31</td>

</tr>

<tr>

<td >800 A</td>

<td >SCT-1250-000</td>

<td >1:7500</td>

<td >1.25”</td>

<td >10 Ω</td>

<td >750</td>

</tr>

<tr>

<td>1500 A</td>

<td >SCT-2000-000</td>

<td >1:7500</td>

<td >2.0”</td>

<td >5.6 Ω</td>

<td >1339.3</td>

</tr>

<tr>

<td >3000 A</td>

<td >SCT-3000-000</td>

<td >1:8400</td>

<td >3” × 5”</td>

<td >3.0 Ω, 0.5 W</td>

<td >2800</td>

</tr>

</tbody>

</table>

</div>

Magnelab offers a 1, 2 & 5 Volt output option on both the UCT and the SCT ranges of split-core CTs, which are available through their distributor, [Aim Dynamics](https://www.aimdynamics.com).

For consistency with the standard YHDC CT supplied by the shop, connect the white wire to the plug tip and the black wire to the sleeve. There should be no connection to the ring.

#### Wattcore split core series

<div class="xaxiswrapper">

<table>

<tbody>

<tr>

<th >Imax</th>

<th >Catalog
Part No.</th>

<th >Nominal Ratio</th>

<th >Aperture</th>

<th>Burden
(internal)</th>

<th>Calibration coefficient</th>

</tr>

<tr>

<td >100 A</td>

<td >WC1-100</td>

<td >-</td>

<td >0.72” × 0.62”</td>

<td >1 V (custom)</td>

<td >100</td>

</tr>

<tr>

<td >400 A</td>

<td >WC2-300</td>

<td >-</td>

<td >1.0” × 1.4”</td>

<td >1 V (custom)</td>

<td >400</td>

</tr>

<tr>

<td >300 A</td>

<td >WC3-300</td>

<td >-</td>

<td >0.75” × 0.93”</td>

<td >1 V (custom)</td>

<td >300</td>

</tr>

<tr>

<td >400 A</td>

<td >WC4-400</td>

<td >-</td>

<td >1.3” × 1.7”</td>

<td >1 V (custom)</td>

<td >400</td>

</tr>

<tr>

<td >1000 A</td>

<td >WC5-1000</td>

<td >-</td>

<td >2.0” × 3.5”</td>

<td >1 V (custom)</td>

<td >1000</td>

</tr>

<tr>

<td >2000 A</td>

<td >WC6-2000</td>

<td >-</td>

<td >2.0” × 5.5”</td>

<td >1 V (custom)</td>

<td >2000</td>

</tr>

</tbody>

</table>

</div>

For consistency with the standard YHDC CT supplied by the shop, connect the white wire to the plug tip and the black wire to the sleeve. There should be no connection to the ring.

Note: [Byram Labs](https://www.byramlabs.com) offer a full range of Wattcore CTs, in particular the WC4 for 100 A, 200 A, 300 A or 400 A input, and in 0.5 V and 1.0 V output versions.

#### Continental Control Systems - ACT-0750 Series Split-Core Current Transformers

<div class="xaxiswrapper">

<table>

<tbody>

<tr>

<th>Imax</th>

<th>Catalog
Part No.</th>

<th>Nominal Ratio</th>

<th >Aperture</th>

<th>Burden
(internal)</th>

<th>Calibration coefficient</th>

</tr>

<tr>

<td >5 A</td>

<td >ACT-0750-005</td>

<td >-</td>

<td >0.78” × 0.78”</td>

<td >1 V (Option 1V)</td>

<td >5</td>

</tr>

<tr>

<td >20 A</td>

<td >ACT-0750-020</td>

<td >-</td>

<td >0.78” × 0.78”</td>

<td >1 V (Option 1V)</td>

<td >20</td>

</tr>

<tr>

<td >50 A</td>

<td >ACT-0750-050</td>

<td >-</td>

<td >0.78” × 0.78”</td>

<td >1 V (Option 1V)</td>

<td >50</td>

</tr>

<tr>

<td >100 A</td>

<td >ACT-0750-100</td>

<td >-</td>

<td >0.78” × 0.78”</td>

<td >1 V (Option 1V)</td>

<td >100</td>

</tr>

<tr>

<td >200 A</td>

<td >ACT-0750-200</td>

<td >-</td>

<td >0.78” × 0.78”</td>

<td >1 V (Option 1V)</td>

<td >200</td>

</tr>

<tr>

<td >250 A</td>

<td >ACT-0750-250</td>

<td >-</td>

<td >0.78” × 0.78”</td>

<td >1 V (Option 1V)</td>

<td >250</td>

</tr>

</tbody>

</table>

</div>

Note that these are calibrated at 60 Hz, “Option 50 Hz” must be specified for use on a 50 Hz system. “Option 1V” & “Option NL” must be specified for use with the emonTx or emonPi.

“Revenue Grade” versions (having better accuracy) are also available, see the [manufacturer's website](https://www.ccontrolsys.com/w/ACT_Series_Split-Core_Current_Transformers#Options) for details. CCS also makes CTs that are rated up to 6 kA primary current.

For consistency with the standard YHDC CT supplied by the shop, connect the white wire to the plug tip and the black wire to the sleeve. There should be no connection to the ring.

#### Sentran - MODEL 4LSF (Small Group) Split-Core Current Transformers

![Sentran CT dimensions](files/N_America_Sentran_dims.png)

<div class="xaxiswrapper">

<table>

<tbody>

<tr>

<th >Basic Part No</th>

<th>XXX = Full Load Current (50/60Hz)</th>

<th>W = Aperture
(inches / mm)</th>

<th>A
(inches / mm)</th>

<th>B
(inches / mm)</th>

<th>C
(inches / mm)</th>

<th>Burden
(see note)</th>

<th>Calibration
coefficient</th>

</tr>

<tr>

<td >4LSF-XXX-100mA-0.75</td>

<td >XXX = 10, 20, 30, 50, 100 A</td>

<td >0.75
19</td>

<td >2.69
65.9</td>

<td >2.4
61</td>

<td >0.94
32.8</td>

<td >11 Ω</td>

<td >XXX × 0.9091</td>

</tr>

<tr>

<td >4LSF-XXX-100mA-1.0</td>

<td >XXX = 20, 30, 50, 70, 75, 100, 150, 200, 250, 300 A</td>

<td >1.0
25.4</td>

<td >3.24
82.3</td>

<td >2.87
72.9</td>

<td >1.11
28.2</td>

<td >11 Ω</td>

<td >XXX × 0.9091</td>

</tr>

<tr>

<td >4LSF-XXX-100mA-1.25</td>

<td >XXX = 50, 75, 100, 125, 150, 200, 250, 300, 400 A</td>

<td >1.25
31.75</td>

<td >3.22
81.9</td>

<td >3.31
84.1</td>

<td >1.14
29</td>

<td >11 Ω</td>

<td >XXX × 0.9091</td>

</tr>

<tr>

<td >4LSF-XXX-100mA -1.5</td>

<td >XXX = 50, 60, 70, 75, 100, 150, 200, 250, 300, 400, 500, 600, 800 A</td>

<td >1.5
38.1</td>

<td >3.75
95.3</td>

<td >3.6
92.4</td>

<td >1.15
29.2</td>

<td >11 Ω</td>

<td >XXX × 0.9091</td>

</tr>

</tbody>

</table>

</div>

The 11 Ω burden is very easily arranged in both the emonTx and emonPi by soldering a 22 Ω wire-ended resistor **in parallel with** the internal 22 Ω burden resistor, using the holes provided immediately behind the CT input socket. Do not remove the SMT burden resistor. A 14 V transient voltage suppressor is fitted internally inside the CT to protect against dangerous voltages.
The accuracy is better than ±1%.
For consistency with the standard YHDC CT supplied by the shop, connect the white wire to the plug tip and the black wire to the sleeve. There should be no connection to the ring.
Other output currents and voltage output versions & “Revenue Grade” versions (having better accuracy) are also available, see the [manufacturer's website](http://www.sentrancorp.com/product-category/small-group-current-transformer/small-split-current-transformers-model-4lsf/) for details.

#### YHDC 100A/200A/400A Split core current transformer SCT023R

![yhdc_sct023r.png](files/yhdc_sct023r.png)
![yhdc_sct023r_drawing.png](files/yhdc_sct023r_drawing.png)

<div class="xaxiswrapper">
<table>
<thead>
<tr>
<th>Rated Current (IPN)</th>
<th>Maximum Input (IPM)</th>
<th>Rated Output</th>
<th>Maximum Burden</th>
</tr>
</thead>
<tbody>
<tr>
<td>100 A</td>
<td>150 A</td>
<td>50 mA</td>
<td>100 Ω</td>
</tr>
<tr>
<td>200 A</td>
<td>300 A</td>
<td>50 mA</td>
<td>80 Ω</td>
</tr>
<tr>
<td>400 A</td>
<td>480 A</td>
<td>50 mA</td>
<td>50 Ω</td>
</tr>
</tbody>
</table>
</div>

For all variants:

    Accuracy: ± 0.5%
    Linearity:  ± 0.5%
    Phase shift:  ≤ 30‘
    
The rated output current of 50 mA means that no change is necessary when used with the emonTx, the emonTx Shield or the emonPi.

If it is desired to increase the sensitivity, then the burden resistor may be changed to a higher value, up to the maximum given in the table above. Alternatively, the burden resistor may be reduced in value to decrease the sensitivity, whilst remaining below the maximum input current.

A 3.5 mm ‘stereo’ jack plug is required. For consistency with the standard YHDC CT supplied by the shop, connect the white wire to the plug tip and the black wire to the sleeve. There should be no connection to the ring.

Note that the mounting screws must not be allowed to damage the insulation of the cable on which the transformer is mounted. 

See the [manufacturer’s website](http://www.yhdc.com/en/product/900) for further details.

If you use an alternate CT, i.e **_not_** the YHDC CT sold in the OEM shop and the emonTX's on-board SMT burden resistor is the wrong value or is not required, then you must remove it and, if (and only if) that CT is unburdened, add a wire-ended resistor in its place using the holes provided.

This list is not exclusive, other suitable current transformers are available.

_If you have any doubt as to the correct current transformer to specify, please enquire in the forums._

### Suitable AC-AC Adapter

A suitable ac-ac adapter is available from [the shop](https://shop.openenergymonitor.com/ac-ac-power-supply-adapter-ac-voltage-sensor-us-plug/).

This adapter is only suitable for connecting Line–Neutral at 120 V (As in Fig 2, Fig 3b, Fig 3c or Fig 4 a-c).

The voltage calibration constant is

voltage coefficient = (adapter voltage ratio at no load) × (voltage divider ratio)

where both are numbers greater than 1\. For the emonTx V3.4, the voltage divider ratio = 13; for the 77DA-10-09 adapter, its voltage ratio at no load is 10.0\. Taken together, these give a nominal voltage calibration coefficient = 130.0

### Private Generation Tariffs

In general, there is no legal requirement for the local energy provider to purchase customer generated power. However, most energy providers _will_ pay the customer for excess energy generation, but at a rate substantially less than the rate at which the customer pays for energy.

### Metering

Metering is regulated by the local energy provider, city government, energy cooperative, etc.

All modern meters used in the US, both mechanical and electronic, employ anti-theft mechanisms, i.e. their displays register an increase in energy consumption regardless of the direction the energy flows through the meter. It is possible an owner of a PV system could end up paying for the excess energy they produce. US Meter sockets are built in a manner that allows insertion of a meter in the socket in two ways, i.e. the meter can be inserted in the socket upside down. It wasn't uncommon, especially for rural customers, to break the meter seal, pull the meter out of its socket and re-insert the meter in the socket upside down. The meter—Ferarris type—would spin backwards, and decrement the reading. When the energy providers caught on to this, they installed ratchet mechanisms in the meters that prevented the reverse rotation, but they still lost revenue. Even though the meter did not turn backwards, it didn’t turn at all if it was in the socket upside down. With the advent of electronic meters, the solution was simple, build the meter so that it incremented the count regardless of the direction the energy flowed through the meter. Changing the construction of the meter such that it could be inserted in the socket only one way would have solved the issue, but that never happened.

In some locales, If a customer has energy generating equipment, installation of a net meter will be required. This will depend entirely on the energy provider's rules regarding customer-generated energy. If it is not a requirement, it is likely the customer can request net metering. The net meter has three “registers” that tally kWh delivered to the customer, kWh delivered to the grid, and the nett difference between those two amounts. The display on a net meter typically “rotates” through the three readings, pausing on each for a few seconds, as compared to the regular meter’s static display.

Almost anyone who has a net meter should know it, since they had to ask their energy provider for it. If a person didn’t actually make the request for the net meter e.g. they buy a home with a PV system, and have no knowledge of PV, they might not know they have a net meter.

### The need for an energy diverter?

If a customer-owned energy generation system is producing excess energy, and net metering is not in place, an energy diverter will be needed to avoid the scenario described above.

However, net metering is employed by most, if not all, US energy providers. Therefore, the need for a diverter might be temporary, or non-existent. It depends on the energy provider’s rules regarding customer-owned generating equipment and connecting said equipment to the grid, and the tariff structure. The larger cities tend to be much stricter than the smaller communities. In much of rural America, energy providers have no experience with, or knowledge of, PV systems.

_(Bill Thomson writes: That was the scenario I encountered when I contacted my energy provider, the town public works department, to connect my PV system to the grid. They kept telling me “We don’t know anything about solar panels.” It took about 9 months, but I eventually did get a net meter installed. In the meantime, one of Robin’s Mk2 diverters served nicely to keep me from paying for the excess energy I was producing.)_

The OpenEnergyMonitor guide [Choosing an energy diverter](../../pv-diversion/introduction/choosing-an-energy-diverter.md) might provide some further useful information.

### Changes for MartinR’s PLL Energy Diverter

Martin Roberts’ PLL design for the emonTx V2 has been adapted for 3 CTs and 60 Hz operation by Dan Woodie. Details are posted at [https://openenergymonitor.org/emon/node/2624](https://openenergymonitor.org/emon/node/2624) and [https://openenergymonitor.org/emon/node/2679](https://openenergymonitor.org/emon/node/2679)

Note: For the emonTx V3.4 the following changes are required:

<pre>#define VOLTSPIN 0
#define CT1PIN 1
#define CT2PIN 2
#define CT3PIN 3
#define LEDPIN 6
#define SYNCPIN 7    // this output will be a 50Hz square wave locked to the 50Hz input
#define SAMPPIN 7    // this output goes high each time an ADC conversion starts
                     // or completes
#define RFMSELPIN 10
#define RFMIRQPIN 2
#define SDOPIN 12
#define W1PIN 1      // 1-Wire pin for temperature
#define TRIACPIN 3   // triac driver pin
</pre>

Spare digital outputs for SYNCPIN & SAMPPIN are not available. DIO7 is available on a pad and _might_ be usable for either, with care. These outputs are intended for development & testing only, and are not required in normal operation.

### Changes for Robin Emley’s Energy Diverter

(See [Diverting surplus PV Power, by Robin Emley](../../pv-diversion/mk2/index))
The only change necessary is to alter CYCLES_PER_SECOND to 60.

### Glossary / Translation

<div class="xaxiswrapper">

<table>

<tbody>

<tr>

<th></th>

<th>UK</th>

<th>N. America</th>

</tr>

<tr>

<td>Wires supplying electrical energy
to the premises

<td>Incomers

<td>Service Entrance Wires

</tr>

<tr>

<td>A supply conductor at elevated voltage</td>

<td>Line
(Multiphase: Line 1, Line 2, Line 3 )</td>

<td>Line
Multiphase: Phase A, Phase B, Phase C</td>

</tr>

<tr>

<td>The supply conductor at or near earth potential</td>

<td>Neutral</td>

<td>Neutral</td>

</tr>

<tr>

<td>A protective conductor connected to the general mass of the earth</td>

<td>Earth</td>

<td>Ground</td>

</tr>

<tr>

<td>The general (low voltage) electricity supply</td>

<td>Mains</td>

<td>Line</td>

</tr>

<tr>

<td>The operating frequency of the supply</td>

<td>Mains frequency</td>

<td>Line frequency</td>

</tr>

<tr>

<td>A current-carrying conductor</td>

<td>Live
(both Line and Neutral are considered ‘Live’ when energised)</td>

<td>Live
(both Line and Neutral are considered ‘Live’ when energised)</td>

</tr>

<tr>

<td>Customer premises switch that disconnects equipment from the Mains</td>

<td>Isolator</td>

<td>Disconnect</td>

</tr>

<tr>

<tr>

<td>Distribution panel incorporating a main switch and MCBs or fuses</td>

<td>Consumer Unit</td>

<td>Load Center</td>

</tr>

<tr>

<td>Current Transformer that can be opened to allow a cable to be inserted</td>

<td>Split Core Current Transformer</td>

<td>Split Core CT</td>

</tr>

<tr>

<td>Current Transformer that cannot be opened to allow a cable to be inserted</td>

<td>Ring Core Current Transformer</td>

<td>Solid Core CT</td>

</tr>

<tr>

<td>3-phase windings where one end of each meet at a common point</td>

<td>Star</td>

<td>Wye or Star</td>

</tr>

<tr>

<td>A conductor operating above its rated current</td>

<td>Hot</td>

<td>Overheated, over-temperature</td>

</tr>

<tr>

<td>A live conductor at elevated voltage</td>

<td>Live</td>

<td>Hot</td>

</tr>

</tbody>

</table>

</div>
