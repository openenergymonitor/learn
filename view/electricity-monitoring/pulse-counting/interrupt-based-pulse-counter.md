## Interrupt based Pulse Counter

Example Arduino sketch for interrupt based pulse counting:

<pre>//Number of pulses, used to measure energy.
long pulseCount = 0;

//Used to measure power.
unsigned long pulseTime,lastTime;

//power and energy
double power, elapsedkWh;

//Number of pulses per wh - found or set on the meter.
int ppwh = 1; //1000 pulses/kwh = 1 pulse per wh

void setup()
{
    Serial.begin(115200);

    // KWH interrupt attached to IRQ 1 = pin3
    attachInterrupt(1, onPulse, FALLING);
}

void loop()
{

}

// The interrupt routine
void onPulse()
{
    //used to measure time between pulses.
    lastTime = pulseTime;
    pulseTime = micros();

    //pulseCounter
    pulseCount++;

    //Calculate power
    power = (3600000000.0 / (pulseTime - lastTime))/ppwh;

    //Find kwh elapsed
    elapsedkWh = (1.0*pulseCount/(ppwh*1000)); //multiply by 1000 to convert pulses per wh to kwh

    //Print the values.
    Serial.print(power,4);
    Serial.print(" ");
    Serial.println(elapsedkWh,3);
}
</pre>

## Accuracy

Range of 0 to 25kW (typical range for solid state pulse output meters):

1000 pulses per kWh

<table border="0" cellspacing="0" cols="5" frame="VOID" rules="NONE"><colgroup><col width="120"> <col width="120"> <col width="120"> <col width="120"> <col width="156"></colgroup>

<tbody>

<tr>

<td align="LEFT" height="48" valign="BOTTOM" width="120">

<font color="#000000">Pulse Gen (kW)</font>

</td>

<td align="LEFT" valign="BOTTOM" width="120">

<font color="#000000">Pulse Counter (kW)</font>

</td>

<td align="LEFT" valign="BOTTOM" width="120">

<font color="#000000">Error (W)</font>

</td>

<td align="LEFT" valign="BOTTOM" width="120">

<font color="#000000">% Error</font>

</td>

<td align="LEFT" valign="BOTTOM" width="156">

<font color="#000000">Std. Deviation</font>

</td>

</tr>

<tr>

<td align="RIGHT" height="17" sdnum="2057;" sdval="0.101" valign="BOTTOM"><font color="#000000">0.101</font></td>

<td align="RIGHT" sdnum="2057;" sdval="0.101" valign="BOTTOM"><font color="#000000">0.101</font></td>

<td align="RIGHT" sdnum="2057;0;#,##0.00" sdval="0" valign="BOTTOM"><font color="#000000">0.00</font></td>

<td align="RIGHT" sdnum="2057;0;0.00&quot;%&quot;" sdval="0" valign="BOTTOM"><font color="#000000">0.00%</font></td>

<td align="RIGHT" sdnum="2057;" sdval="0" valign="BOTTOM"><font color="#000000">0</font></td>

</tr>

<tr>

<td align="RIGHT" height="17" sdnum="2057;" sdval="2.56" valign="BOTTOM"><font color="#000000">2.56</font></td>

<td align="RIGHT" sdnum="2057;" sdval="2.5599" valign="BOTTOM"><font color="#000000">2.5599</font></td>

<td align="RIGHT" sdnum="2057;0;#,##0.00" sdval="0.100000000000211" valign="BOTTOM"><font color="#000000">0.10</font></td>

<td align="RIGHT" sdnum="2057;0;0.00&quot;%&quot;" sdval="0.0000390625000000824" valign="BOTTOM"><font color="#000000">0.00%</font></td>

<td align="RIGHT" sdnum="2057;" sdval="0.00017" valign="BOTTOM"><font color="#000000">0.00017</font></td>

</tr>

<tr>

<td align="RIGHT" height="17" sdnum="2057;" sdval="3.15" valign="BOTTOM"><font color="#000000">3.15</font></td>

<td align="RIGHT" sdnum="2057;" sdval="3.1496" valign="BOTTOM"><font color="#000000">3.1496</font></td>

<td align="RIGHT" sdnum="2057;0;#,##0.00" sdval="0.399999999999956" valign="BOTTOM"><font color="#000000">0.40</font></td>

<td align="RIGHT" sdnum="2057;0;0.00&quot;%&quot;" sdval="0.000126984126984113" valign="BOTTOM"><font color="#000000">0.00%</font></td>

<td align="RIGHT" sdnum="2057;" sdval="0.00049" valign="BOTTOM"><font color="#000000">0.00049</font></td>

</tr>

<tr>

<td align="RIGHT" height="17" sdnum="2057;" sdval="6.89" valign="BOTTOM"><font color="#000000">6.89</font></td>

<td align="RIGHT" sdnum="2057;" sdval="6.888" valign="BOTTOM"><font color="#000000">6.888</font></td>

<td align="RIGHT" sdnum="2057;0;#,##0.00" sdval="1.99999999999978" valign="BOTTOM"><font color="#000000">2.00</font></td>

<td align="RIGHT" sdnum="2057;0;0.00&quot;%&quot;" sdval="0.000290275761973843" valign="BOTTOM"><font color="#000000">0.00%</font></td>

<td align="RIGHT" sdnum="2057;" sdval="0.001" valign="BOTTOM"><font color="#000000">0.001</font></td>

</tr>

<tr>

<td align="RIGHT" height="17" sdnum="2057;" sdval="9.56" valign="BOTTOM"><font color="#000000">9.56</font></td>

<td align="RIGHT" sdnum="2057;" sdval="9.556" valign="BOTTOM"><font color="#000000">9.556</font></td>

<td align="RIGHT" sdnum="2057;0;#,##0.00" sdval="4.00000000000134" valign="BOTTOM"><font color="#000000">4.00</font></td>

<td align="RIGHT" sdnum="2057;0;0.00&quot;%&quot;" sdval="0.000418410041841144" valign="BOTTOM"><font color="#000000">0.00%</font></td>

<td align="RIGHT" sdnum="2057;" sdval="0.0019" valign="BOTTOM"><font color="#000000">0.0019</font></td>

</tr>

<tr>

<td align="RIGHT" height="17" sdnum="2057;" sdval="10.63" valign="BOTTOM"><font color="#000000">10.63</font></td>

<td align="RIGHT" sdnum="2057;" sdval="10.625" valign="BOTTOM"><font color="#000000">10.625</font></td>

<td align="RIGHT" sdnum="2057;0;#,##0.00" sdval="5.00000000000078" valign="BOTTOM"><font color="#000000">5.00</font></td>

<td align="RIGHT" sdnum="2057;0;0.00&quot;%&quot;" sdval="0.000470366886171287" valign="BOTTOM"><font color="#000000">0.00%</font></td>

<td align="RIGHT" sdnum="2057;" sdval="0.0024" valign="BOTTOM"><font color="#000000">0.0024</font></td>

</tr>

<tr>

<td align="RIGHT" height="17" sdnum="2057;" sdval="19.62" valign="BOTTOM"><font color="#000000">19.62</font></td>

<td align="RIGHT" sdnum="2057;" sdval="19.6" valign="BOTTOM"><font color="#000000">19.6</font></td>

<td align="RIGHT" sdnum="2057;0;#,##0.00" sdval="19.9999999999996" valign="BOTTOM"><font color="#000000">20.00</font></td>

<td align="RIGHT" sdnum="2057;0;0.00&quot;%&quot;" sdval="0.00101936799184503" valign="BOTTOM"><font color="#000000">0.00%</font></td>

<td align="RIGHT" sdnum="2057;" sdval="0.008" valign="BOTTOM"><font color="#000000">0.008</font></td>

</tr>

<tr>

<td align="RIGHT" height="17" sdnum="2057;" sdval="22.56" valign="BOTTOM"><font color="#000000">22.56</font></td>

<td align="RIGHT" sdnum="2057;" sdval="22.535" valign="BOTTOM"><font color="#000000">22.535</font></td>

<td align="RIGHT" sdnum="2057;0;#,##0.00" sdval="24.9999999999986" valign="BOTTOM"><font color="#000000">25.00</font></td>

<td align="RIGHT" sdnum="2057;0;0.00&quot;%&quot;" sdval="0.00110815602836873" valign="BOTTOM"><font color="#000000">0.00%</font></td>

<td align="RIGHT" sdnum="2057;" sdval="0.0111" valign="BOTTOM"><font color="#000000">0.0111</font></td>

</tr>

<tr>

<td align="RIGHT" height="17" sdnum="2057;" sdval="24.98" valign="BOTTOM"><font color="#000000">24.98</font></td>

<td align="RIGHT" sdnum="2057;" sdval="24.95" valign="BOTTOM"><font color="#000000">24.95</font></td>

<td align="RIGHT" sdnum="2057;0;#,##0.00" sdval="30.0000000000011" valign="BOTTOM"><font color="#000000">30.00</font></td>

<td align="RIGHT" sdnum="2057;0;0.00&quot;%&quot;" sdval="0.00120096076861494" valign="BOTTOM"><font color="#000000">0.00%</font></td>

<td align="RIGHT" sdnum="2057;" sdval="0.0126" valign="BOTTOM"><font color="#000000">0.0126</font></td>

</tr>

</tbody>

</table>
<br>
## Notes

If the Serial monitor displays values rapidly, and at excessive power levels, try connecting a 10k pull down resistor to the digital input.