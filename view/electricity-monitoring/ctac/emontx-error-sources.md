## Sources of error in the emonTx voltage and current inputs.

***

There are three main sources of error when using the emonTx as a measuring instrument. The input transducers that are the first stage in converting and scaling the quantity to be measured, the input circuitry that completes the task of conditioning the signal, and the A to D converter itself.

#### The transformers

1.  Current transformer.  
    The current transformer operates on the magnetic field that surrounds a current-carrying conductor. There are two main parts: a ferromagnetic core that concentrates the flux, and a secondary winding that picks up the changing magnetic flux and generates an electric current. Being a ferro-magnetic material, the flux in the core is only linearly related to the magnetising force of the current at relatively low values, at high values the flux reaches a limit known as 'saturation'. The designer will normally ensure the transformer is linear within acceptable limits over its normal operating range. The standard SCT-013-000 CT is linear to within 3% over its rated current range. The data sheet gives no value for the accuracy of the turns ratio — as it is a matter of counting, we can only assume it is accurate to a very high degree, probably a few turns, or a small fraction of 1%. However, it is normal practice to adjust the turns ratio to account for the energy required to magnetise the core, so it is reasonable to assume that the overall accuracy will still be within 3%. Measurements indicate the maximum error occurs around 70% of maximum current; over a limited current range below this you can expect the linearity to be significantly better, although there will be a ratio error that can be compensated for by calibration. Mention was made of the magnetic flux and the core material: because the core is split, there might be some contamination of the faces of the core that introduces an air gap. This can lead to large and unpredictable errors, but is easily dealt with once it has been detected.
    
2.  Voltage transformer.  
    The voltage transformer recommended for use in the UK and Europe has its no-load output voltage of 11.6 V specified to an accuracy of ±3%, not to be confused with the difference from the nominal output of 9 V which is specified at full load (both with 240 V input).

#### The input circuitry

There are two main parts to the input circuitry — the scaling components and the bias components. Only the scaling components are of interest. Although the bias components can affect the measurement range, they do not contribute to any measurement errors.

1.  Current inputs.  
    The burden resistor, required to convert the current output of the CT to a voltage, is the sole scaling component. It is a standard item, with a manufacturing tolerance of 1%. Unless maltreated, it will most likely stay at its manufactured value, for life. However, its value is  temperature dependent. For example, a metal film resistor will have a temperature coefficient of ±100 ppm/°C, meaning that the resistance may change by up to 0.25% for a 25 °C change in ambient temperature.

2.  Voltage input.  
    The input voltage is applied to a potential divider comprising two resistors, each having a 1% tolerance,. The worst case gives an error in the division ratio of 1.83% (assuming both change in the same proportion due to temperature variations and so their ratio does not change due to temperature).

#### The A-D converter

The A-D converter is the final stage of the input process. There are two main sources of error: accuracy of the conversion process and the accuracy of the reference voltage. Possible errors in the conversion process are described in detail in the [Atmel data sheet](https://www.atmel.com/Images/doc8161.pdf) [PDF download – 12 MB] (and in yet more detail in [Atmel Application Note AVR120: Characterization and Calibration of the ADC on an AVR](https://www.atmel.com/images/doc2559.pdf) [PDF download]) and under worst case conditions, the typical error is 4.5 LSB (counts).

There are two sources of reference voltage, the internal band gap reference, or the analogue supply voltage AVcc. If the emonTx is to powered by batteries, the analogue supply voltage is obviously not a viable reference.

Whilst the internal reference is expected to be very stable — generic band-gap references are stable to within around 100 ppm/°C, it is also subject to a very large uncertainty in the initial value — the voltage may lie anywhere between 1.0 and 1.2 V. This represents an initial uncertainty of 9.1% around the nominal value of 1.1 V.

If the analogue supply voltage AV<sub>CC</sub> is used, the error in this is of course entirely dependant on the regulator. The 3.3 V supply for the emonTx V2 comes from a MCP1702 regulator. The output voltage specification is 'typically' ±0.4%, with maximum and minimum at +3% and -3% respectively. This is at constant temperature, constant input voltage and constant load. The variation with temperature is 'typically' 50 ppm / °C with no limit quoted, so a variation of about 0.1% over a 20 °C temperature range is expected — both ambient temperature and self-heating contribute to this. The line regulation — the variation with input voltage — is typically ±1% / V (±3% / V limit value) so if it is supplied from a USB power pack that might vary between 4.75 V and 5.25 V, the variation may be typically 0.5% up to a limit of ±0.75%. Finally, there is the load regulation. The load will change as a result of powering a chain of temperature sensors, or driving a few LED indicators, or transmitting with the radio module. Line regulation is typically ±1% (±2.5% limit value) for a load current change from 1 mA to 250 mA. The RFM12B draws approx. 25 mA, so this can be expected to cause the voltage to change by typically 0.1% up to a limit of 0.25%.  
Adding all these together, it is possible that external influences — temperature, load and supply changes — can cause the output to vary by typically around 1.1%, but it may be over 4%.

For the emonTx V3, the AV<sub>CC</sub> supply voltage is always used as the reference (though you can change this, if you wish). When powered by batteries or USB, the regulator is a XC6206P332MR which has an output accuracy of ±1%, line regulation is 0.25%/V and load regulation is 3 mV for a swing of 100 mA and temperature is 100 ppm per °C (say 0.2%). Adding these up as above, gives around 1.75% variation in the worst case. When powered by the ac adapter, the regulator is a MCP1754, which has a 'typical' voltage tolerance of 0.4%, line regulation of 0.05%/V, load regulation over the range we use of about 0.15%, and a temperature coefficient of 22 ppm/°C. Adding these up we get slightly worse than 1% possible variation from the nominal value.

#### Adding up the errors…  
<span style="font-weight:normal">(emonTx V3 / emonPi in brackets)</span>

<table>

<tbody>

<tr>

<td>Current transformer</td>

<td>±3%</td>

</tr>

<tr>

<td>burden</td>

<td>±1.25%</td>

</tr>

<tr>

<td>analogue reference</td>

<td>±9.1% (±1.1%)</td>

</tr>

<tr>

<td>TOTAL</td>

<td>+13.78% -12.93% (+5.33% -5.27%)</td>

</tr>

<tr>

<td>AC Adapter</td>

<td>±3%</td>

</tr>

<tr>

<td>voltage divider</td>

<td>±1.83%</td>

</tr>

<tr>

<td>analogue reference</td>

<td>±9.1% (±1.1%)</td>

</tr>

<tr>

<td>TOTAL</td>

<td>+14.43% -13.44% (+6.04% -5.82%)</td>

</tr>

<tr>

<td>Power error</td>

<td>+30.2% -24.6% (+11.7% -10.7%)</td>

</tr>

</tbody>

</table>

#### Summary

For the emonTx V2, under the worst possible conditions and before calibration, a voltage or current measurement might be in error by nearly 15% and a power (real or apparent) measurement might be in error by about 30%.

For the emonTx V3, that improves dramatically so that the power error might be about 11.7% in the worst case before calibration.
