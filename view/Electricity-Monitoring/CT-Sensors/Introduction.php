<h2>CT sensors - An introduction</h2>

<p>Often referred to as a current clamp, a CT is in fact, <u><em><strong>not</strong></em></u> a clamp.</p>

<p><em>These</em> are Clamps. On the left are two busbar clamps, on the right, a carpenter&#39;s G-clamp:<br />
<img alt="" src="http://localhost/docs/files/bbar_clamp.jpg" /><img alt="" height="249" src="http://localhost/docs/files/g_clamp.jpg" width="229" /><br />
<em>Note the tensioning screws.</em></p>

<p>&nbsp;</p>

<p>Pictured below, is an example of a Split-Core CT.</p>

<p><u><em><a href="https://openenergymonitor.org/emon/buildingblocks/report-yhdc-sct-013-000-current-transformer">YHDC Current Transformer SCT-013-000 test report</a></em></u></p>

<p><img alt="" height="225" src="http://localhost/docs/files/current100a.jpg" width="300" /></p>

<p>&nbsp;</p>

<p>Here&#39;s an example of a <em>Magnelab</em> <em><strong>split-core</strong></em> CT</p>

<p><img alt="" src="http://localhost/docs/files/SCT-1250_CT.jpg" /></p>

<p>&nbsp;</p>

<p>In addition to the split-core type, solid core, (aka <em><strong>ring core</strong></em>) CTs are available.<br />
Here&#39;s an example of a <em>Magnelab <strong>solid-core</strong> </em>CT<br />
<img alt="" src="http://localhost/docs/files/solid_core_ct.jpg" style="margin-top: 5px; margin-bottom: 5px;" /></p>

<p><strong>Basics</strong></p>

<p>Current transformers (CTs) are sensors that measure alternating current. They are particularly useful for measuring whole building electricity consumption (or generation, for that matter).</p>

<p>The split core type, such as the CT in the picture above, is particularly suitable for DIY use, as it can be clipped onto either the live <strong><em>or</em></strong> neutral wire coming into the building, without the need to do any high voltage electrical work.</p>

<p>Like any other transformer, a current transformer has a primary winding, a magnetic core, and a secondary winding.</p>

<p>In the case of whole building monitoring, the primary winding is the live <em><strong>or</strong></em> neutral wire (not both!) coming into the building, that is passed through the opening in the CT. The secondary winding is made of many turns of fine wire housed within the transformer case.</p>

<p>The alternating current flowing in the primary produces a magnetic field in the core, which induces a current in the secondary winding circuit [1].</p>

<p>The current in the secondary winding is proportional to the current flowing in the primary winding:</p>

<pre>
I<sub>secondary</sub> = CT<sub>turnsRatio</sub> &times; I<sub>primary</sub>

CT<sub>turnsRatio</sub> = Turns<sub>primary</sub> / Turns<sub>secondary</sub></pre>

<p>The number of secondary turns in the CT pictured above, is 2000, so the current in the secondary is one 2000th of the current in the primary.</p>

<p>Normally, this ratio is written in terms of currents in Amps e.g. 100:5 (for a 5A meter, scaled 0 - 100A). The ratio for the CT above would normally be written as 100:0.05.</p>

<p><strong>Burden resistor</strong></p>

<p>A &quot;current output&quot; CT needs to be used with a burden resistor. The burden resistor completes or closes the CT secondary circuit. The burden value is chosen to provide a voltage proportional to the secondary current. The burden value needs to be low enough to prevent CT core saturation.</p>

<p><strong>Isolation</strong></p>

<p>The secondary circuit is galvanically isolated [2] from the primary circuit. (i.e. it has no metallic contact)</p>

<p><strong>Safety</strong></p>

<p>In general, a CT must <strong>never</strong> be open-circuited once it&#39;s attached to a current-carrying conductor.<br />
A CT is potentially dangerous if open-circuited.</p>

<p>If open-circuited with current flowing in the primary, the transformer secondary will attempt to continue driving current into what is effectively an infinite impedance. This will produce a high and potentially dangerous voltage across the secondary&nbsp;[1]</p>

<p>Some CT&#39;s<i>&nbsp;</i>have built-in protection. Some have protective Zener&nbsp;diodes as is the case with the SCT-013-000 recommended for use in this project. If the CT is of the &#39;voltage output&#39; type, it has a built in burden resistor. Thus, it cannot be open-circuited.</p>

<p><strong>Installing a CT</strong></p>

<p>The primary winding of the CT is the wire carrying the current you want to measure. If you clip your CT around a two or three core cable that has wires carrying the same current but in opposite directions, the magnetic fields created by the wires will cancel each other, and your CT will have no output. [3] &amp; [4]</p>

<p>A split-core CT, especially one that has a ferrite core (such as the ones made by YHDC) should&nbsp;<em><strong>never</strong></em>&nbsp;be &quot;clamped&quot; to the cable using any sort of packing material, because the brittle nature of the ferrite core means that it might easily be broken, thus destroying the CT. You should only clamp the CT to the cable or busbar if the housing is specifically designed to do so. Similarly, a ring-core CT should&nbsp;<strong><em>never</em></strong>&nbsp;be forced onto a cable that is too large to pass freely through the centre. The position and orientation of the cable within the CT aperture does <strong><em>not</em></strong> affect the output.</p>

<p><strong>References and further reading</strong></p>

<p><a href="https://openenergymonitor.org/emon/buildingblocks/report-yhdc-sct-013-000-current-transformer" title="Report: Yhdc SCT-013-000 Current Transformer">Test&nbsp;report: Yhdc SCT-013-000 Current Transformer</a></p>

<p><a href="https://www.elkor.net/pdfs/AN0305-Current_Transformers.pdf">Elkor Technologies Inc - Introduction to current transformers</a></p>

<p>[1]&nbsp;<a href="https://en.wikipedia.org/wiki/Current_transformer">Wikipedia article on current transformers</a></p>

<p>[2]&nbsp;<a href="https://en.wikipedia.org/wiki/Galvanic_isolation">Wikipedia article on Galvanic isolation</a></p>

<p>[3] <a href="https://openenergymonitor.org/emon/buildingblocks/ct-and-ac-power-adaptor-installation-and-calibration-theory" title="CT and AC power adaptor installation and calibration theory">CT and AC power adaptor installation and calibration theory</a></p>

<p>[4] <a href="https://openenergymonitor.org/emon/Current_Transformer_Installation" title="Current Transformer Installation">Current Transformer Installation</a></p>

<p>&nbsp;</p>

