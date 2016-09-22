<h2>YHDC SCT-013-000 Current Transformer</h2>

<p>A Report&nbsp;on the properties of the&nbsp;YHDC Current Transformer&nbsp;and&nbsp;its suitability for use with the&nbsp;OpenEnergy&nbsp;monitor.</p>

<p><em>by&nbsp;Robert&nbsp;Wall&nbsp;B.Sc.,&nbsp;C.Eng.,&nbsp;MIEE.</em></p>

<p><img alt="" src="http://lab.megni.co.uk/oemdocs/files/CT6.jpg" style="height:392px; width:500px" /></p>

<p>Datasheet: <a href="http://lab.megni.co.uk/oemdocs/files/SCT013-000_datasheet_0.pdf">download</a></p>

<h2>Synopsis</h2>

<p>The Yhdc current transformer is manufactured by Beijing YaoHuadechang Electronic Co., Ltd and is widely available from many stockists as Non-invasive AC current sensor (100A max), Model SCT-013-000.</p>

<p>It has no internal burden resistor, but a transient voltage suppressor limits the output voltage in the event of accidental disconnection from the burden. It is capable of developing sufficient voltage to fully drive a 5 V input.</p>

<h2>Test Rig</h2>

<p><img alt="" src="http://lab.megni.co.uk/oemdocs/files/C.T. Test Rig.160705.svg" /></p>

<p>For test currents up to 100 A, the CT primary consists of from 1 to 20 turns of insulated 16/0.2mm wire. The majority of tests were made at 5 A &ndash; thus the primary current seen by the CT could be adjusted in steps of 5 A by enclosing a variable number of turns inside the core. For saturation tests up to 250 A, the primary consists of 50 passes of enamelled copper wire, the current being adjusted in this case.</p>

<p>(Note: The current exceeds the rating of the wire used for the primary, but as the coil is loosely bunched except where it passes through the transformer core, and because each test is of relatively short duration, heating is not a problem).</p>

<p>The primary current was monitored by the 0.33&Omega; shunt. The potentiometers, current limiting resistor and diodes, in both the shunt and the CT outputs, are to protect the computer sound card from over-voltage and switching transients. The potentiometers were adjusted such that the voltage did not exceed 400 mV peak and at this voltage, the diodes did not affect the shape of the monitored waveform.</p>

<p>When the shape of the waveform was of interest, the primary current and CT voltage waveform were recorded using a software oscilloscope (Soundcard Oscilloscope from <a href="https://www.zeitnitz.de/Christian/scope_en">https://www.zeitnitz.de/Christian/scope_en</a>) and the recorded waveform imported into a spreadsheet and subsequently calibrated against the actual voltage read either by a multimeter or a real oscilloscope connected directly across the CT output.</p>

<p>Since early 2012, when samples of this CT were first tested, YHDC has made many incremental changes to the design and construction of this device, and apparently the core material has also been changed. The latest model tested (with a single TVS diode instead of firstly, discrete 22 V zener diodes, then SMT zener diodes) is distinguished by the black lead with a moulded-on plug. The unit tested is identified as CT No.6, thereby distinguishing it from the earlier versions.</p>

<h2>The YHDC Current Transformer</h2>

<p>Internal Components.</p>

<p><img alt="Internal Components of 'new' black-cable YHDC-013-000" src="http://lab.megni.co.uk/oemdocs/files/CT6-inside.jpg" style="width: 300px; height: 217px;" /></p>

<p>Circuit Diagram.</p>

<p><img alt="" src="http://lab.megni.co.uk/oemdocs/files/Circuit.svg" style="height:144px; width:300px" /></p>

<p>The current arrow represents current flowing out of the face of the transformer labelled &ldquo;SCT-013-000&rdquo;, i.e. in the direction of the arrows moulded into the housing, then the plug tip (white wire) is positive with respect to the sleeve (red wire).</p>

<p>The ring of the plug is not connected.</p>

<p>The purpose of the transient voltage suppressor is to limit the voltage that may appear on the plug and across the windings to a safe value should the transformer be unplugged from the burden in the transmitter/instrument, whilst the primary is energised.</p>

<h2>Tests</h2>

<p>The following tests were conducted:</p>

<ul>
	<li>
	<p>Check the ratio</p>
	</li>
	<li>
	<p>Establish the useful range</p>
	</li>
	<li>
	<p>Establish the phase error</p>
	</li>
	<li>
	<p>Check operation with no external burden</p>
	</li>
	<li>
	<p>Establish the maximum output when saturated</p>
	</li>
</ul>

<p>Some tests that were carried out on the earlier versions have not been repeated. Details of the results of those tests can be found in the earlier issue of this report, which is available for download as a PDF file <a href="http://lab.megni.co.uk/oemdocs/files/Yhdc CT Report (Iss 6).pdf">here</a>.</p>
<!-- A second link at the end also! -->

<p>&nbsp;</p>

<h3><strong>1. Ratio &amp; Saturation.</strong></h3>

<p>The ratio was checked from 0.5 A to 250 A with a multimeter on the a.c. mA range as the burden.</p>

<table border="0" cellpadding="2" cellspacing="2">
	<thead>
		<tr>
			<th style="background-color:rgb(153, 153, 153); text-align:center; width:120px">
			<p>Primary Current</p>
			</th>
			<th style="background-color:rgb(153, 153, 153); text-align:center; width:120px">
			<p>Secondary Current</p>
			</th>
			<th style="background-color:rgb(153, 153, 153); text-align:center; width:120px">
			<p>Design Secondary Current</p>
			</th>
			<th style="background-color:rgb(153, 153, 153); text-align:center; width:120px">
			<p>error</p>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>0.5</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>0.2534</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>0.25</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1.36%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>0.504</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>0.5</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>0.80%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1.5</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>0.75</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>0.75</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>0.00%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>2</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1.012</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1.20%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>5</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>2.45</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>2.5</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>-2.00%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>10</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>5</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>5</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>0.00%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>20</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>10.07</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>10</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>0.70%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>30</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>15.25</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>15</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1.67%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>40</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>20.31</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>20</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1.55%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>50</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>25.35</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>25</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1.40%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>60</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>30.6</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>30</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>2.00%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>70</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>35.56</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>35</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1.60%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>80</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>40.63</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>40</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1.58%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>90</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>45.69</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>45</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1.53%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>100</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>50.72</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>50</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1.44%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>120</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>60.2</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>60</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>0.33%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>140</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>68.7</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>70</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>-1.86%</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>160</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>74.5</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>80</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>180</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>78.7</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>90</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>200</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>81.9</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>100</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>225</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>84.5</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>112.5</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>250</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>87.4</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>125</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>&nbsp;</p>
			</td>
		</tr>
	</tbody>
</table>

<p>The measured ratio is comfortably within the specification ( &plusmn; 3% over the range 10 A to 120 A).</p>

<p>The error becomes meaningless above about 140 A as saturation sets in. In this area, the waveform becomes increasingly distorted and unusable for measurement purposes.</p>

<p>The test was repeated with a 22 &Omega; resistor as the burden, and this time measuring the burden voltage. Currents up to 250 A were applied in order to observe the effect of core saturation.</p>

<p>The saturation curve (showing rms current or voltage) fails to reveal the true situation because in any case, the peak-peak burden voltage &ndash; which in saturation is no longer directly related to the rms voltage &ndash; exceeds the emonTx &amp; emonPi input range at a little over 100 A, and currents above this maximum value risk damaging the ADC input.</p>

<p><img src="http://lab.megni.co.uk/oemdocs/files/CT6-lin.svg" style="width:528px; height:347px" /></p>

<p><img src="http://lab.megni.co.uk/oemdocs/files/CT6-sat.svg" style="width:528px; height:337px" /></p>

<h3>2. Phase error.</h3>

<p>The phase error was measured for 3 values of burden resistor. The values chosen were 22&nbsp;&Omega; as used in the emonPi and emonTx Version&nbsp;3; 120&nbsp;&Omega;, which is the value used for the high sensitivity input of the emonTx V3; and 220&nbsp;&Omega;, which would give a maximum current of about 10 A with the emonTx or 16 A with the emonTx Shield (with the burden resistor changed appropriately).</p>

<p><img src="http://lab.megni.co.uk/oemdocs/files/CT6-phase.svg" style="width:531px; height:330px" /></p>

<p>&nbsp;</p>

<p>It was difficult to make meaningful measurements below 250 mA (representing a load of around 60 W) due to noise and pick-up.</p>

<p>&nbsp;</p>

<p>These results show a notable improvement over the earlier versions, especially when the 22 &Omega; burden is used, when the phase error is commendably flat (within a band factionally more than 1 degree wide) over the entire measurable range.</p>

<p>These results also show that increasing the burden resistor value in order to increase sensitivity comes at a price: the phase error increases, more so at lower currents. Even so, this result still shows an improvement over the earlier production samples.</p>

<p>(To put these numbers into perspective, the &lsquo;discrete sample&rsquo; sketch samples a voltage and current pair every 7&deg; approximately.)</p>

<h2>Conclusions</h2>

<p>The Yhdc current transformer is suitable for use with the OpenEnergy emonTx and emonPi. It can develop sufficient voltage to fully utilise the resolution of the Arduino&#39;s analogue input, and waveform distortion due to saturation at this secondary voltage is negligible for normal purposes. The maximum phase error of a little over 4&deg; with the 22 &Omega; burden is insignificant (representing a power factor error of less than 0.0029 at unity power factor), but the error of nearly 8&deg; with a 120 &Omega; burden could be troublesome with low current loads having a poor power factor where this input is most likely to be used.</p>

<p>&nbsp;</p>

<p>The earlier report is available for download as a PDF file <a href="http://lab.megni.co.uk/oemdocs/files/Yhdc CT Report (Iss 6).pdf">here</a>.</p>

<h2>Appendix</h2>

<p>Measurements on non-sinusoidal waveforms.</p>

<p>Most budget multimeters measure the rectified average value of an alternating wave, then the reading is scaled to display the root mean square (rms) value assuming the shape of the wave is a sinusoid. (The rms value is the value of a direct voltage or current that would give the same heating effect in a purely resistive load).</p>

<p>For many purposes, this approach is entirely adequate. When the wave shape departs from the sinusoid, this has to be taken into account. When the shape departs markedly from the sinusoid, the difference can be large.</p>

<p>The software oscilloscope used to capture the illustrations above has the capability to export the data points to a text file. That file can then be imported into a spreadsheet for processing. Taking that approach, these values were calculated for the &ldquo;15 &Omega; burden, 250 A&rdquo; waves from the tests on the early models of this CT:</p>

<table border="0" cellpadding="2" cellspacing="2">
	<thead>
		<tr>
			<th style="background-color:rgb(153, 153, 153); text-align:center">
			<p>Calculation</p>
			</th>
			<th style="background-color:rgb(153, 153, 153); text-align:center">
			<p>Current (divisions)</p>
			</th>
			<th style="background-color:rgb(153, 153, 153); text-align:center">
			<p>Burden Voltage (divisions)</p>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>Peak-peak</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>14.47</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>6.41</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>Rectified average (measured value)</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>4.62</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1.30</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>Rectified average x 1.11 (displayed value)</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>5.13</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1.45</p>
			</td>
		</tr>
		<tr>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>rms</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>5.16</p>
			</td>
			<td style="background-color:rgb(204, 204, 204); text-align:center">
			<p>1.66</p>
			</td>
		</tr>
	</tbody>
</table>

<p>The multiplier 1.11 is the &#39;form factor&#39; for a sine wave. The shape of the current wave is quite close to a sine wave, so the true rms value (5.16) is very close to the value that a budget meter would indicate (5.13 &ndash; reading 0.6% low). That is not true for the burden voltage &ndash; the meter would read 12.6% low.</p>

<p>The situation is even worse if the displayed value is used to calculate the peak-peak value. The true peak-peak burden voltage is 6.41. Taking the average voltage as measured with a budget meter, multiplied (internally) by 1.11, then taking that displayed value (1.45) and multiplying by 2&radic;2 to give the peak-peak value, assuming a sine wave, yields the incorrect result of 4.10. The calculated value is low by 36%, a significant error. The form factor for the burden voltage wave turns out to be 1.28.</p>

<p>(Note: A true rms meter will only calculate the correct value over a limited range of form factors).</p>

