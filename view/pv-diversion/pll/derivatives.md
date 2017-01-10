## Solar PV power diversion with emonTx using a PLL, emonGLCD and temperature measurement, by Martin Roberts

### 10: Derivatives

Two notable derivatives of this design have been published.

1.  A three-phase 50 Hz version using only one voltage reference for the emonTx Shield, by Petrik.
    Originally published at [https://openenergymonitor.org/emon/node/2339#comment-13967](https://openenergymonitor.org/emon/node/2339#comment-13967), the updated sketch can be found at [files/emonTx_Solar_Controller_Temperature_PLL_LCD_3Phase.ino](files/emonTx_Solar_Controller_Temperature_PLL_LCD_3Phase.ino)
    In this design, still in development, a single phase dump load is connected, but power is measured across all three phases. The hardware is an emonTx Shield with a local liquid crystal display, directly connected, as well as the radio module. The number of samples per cycle has been reduced to 36 to accommodate the additional readings (now 4 current and one voltage), and the voltage samples are stored in an array so that a delayed copy of the Phase 1 voltage can be used to calculate the real power of phases 2 & 3.
2.  A 60 Hz single phase 120 V North American version for the emonTx by Dan Woodie.
    The final version is published at [https://openenergymonitor.org/emon/node/2679](https://openenergymonitor.org/emon/node/2679), earlier versions and discussion at [https://openenergymonitor.org/emon/node/2624]( https://openenergymonitor.org/emon/node/2624) and [https://openenergymonitor.org/emon/node/2720]( https://openenergymonitor.org/emon/node/2720)
    This design caters for 3 current inputs and has compile-time switches to include or exclude the load controller (if excluded, it becomes a power monitor only) and to include or exclude temperature measurement and the drive to SYNCPIN.

Although the design was originally for the emonTx V2, it can be used with the emonTx V3\. The points to note are:

1.  If the emonTx V3 is to be powered only by the ac-ac adapter, a 'high-sensitivity' opto-trigger must be used. See [Choosing an Energy Diverter](../introduction/choosing-an-energy-diverter) for further details and a circuit diagram.
2.  Changes must be made to the IO pin assignments in MartinR's original sketch:

    <table border="1" cellpadding="1" cellspacing="1" style="width: 400px;">

    <tbody>

    <tr>

    <td class="rtecenter">

    **Analogue pin assignments**

    </td>

    <td class="rtecenter">**EmonTx V2**</td>

    <td class="rtecenter">**EmonTx V3**</td>

    </tr>

    <tr>

    <td>VOLTSPIN</td>

    <td class="rtecenter">2</td>

    <td class="rtecenter">0</td>

    </tr>

    <tr>

    <td>CT1PIN</td>

    <td class="rtecenter">3</td>

    <td class="rtecenter">1</td>

    </tr>

    <tr>

    <td>CT2PIN</td>

    <td class="rtecenter">0</td>

    <td class="rtecenter">2</td>

    </tr>

    <tr>

    <td>CT3PIN (if implemented)</td>

    <td class="rtecenter">1</td>

    <td class="rtecenter">3</td>

    </tr>

    <tr>

    <td>CT4PIN (if possible)</td>

    <td class="rtecenter">-</td>

    <td class="rtecenter">4</td>

    </tr>

    <tr>

    <td>PWRPIN (temp sensor power)</td>

    <td class="rtecenter">-</td>

    <td class="rtecenter">5</td>

    </tr>

    <tr>

    <td class="rtecenter">**Digital pin assignments**</td>

    </tr>

    <tr>

    <td>LEDPIN</td>

    <td class="rtecenter">9</td>

    <td class="rtecenter">6</td>

    </tr>

    <tr>

    <td>SYNCPIN</td>

    <td class="rtecenter">6</td>

    <td class="rtecenter">10</td>

    </tr>

    <tr>

    <td>SAMPPIN</td>

    <td class="rtecenter">5</td>

    <td class="rtecenter">9</td>

    </tr>

    <tr>

    <td>RFMSELPIN</td>

    <td class="rtecenter">10</td>

    <td class="rtecenter">4</td>

    </tr>

    <tr>

    <td>RFMIRQPIN</td>

    <td class="rtecenter">2</td>

    <td class="rtecenter">3</td>

    </tr>

    <tr>

    <td>SDOPIN</td>

    <td class="rtecenter">12</td>

    <td class="rtecenter">12</td>

    </tr>

    <tr>

    <td>W1PIN</td>

    <td class="rtecenter">4</td>

    <td class="rtecenter">5</td>

    </tr>

    <tr>

    <td>TRIACPIN</td>

    <td class="rtecenter">3</td>

    <td class="rtecenter">2</td>

    </tr>

    </tbody>

    </table>

    SYNCPIN & SAMPPIN are provided to facilitate testing and checking the timing with an oscilloscope.
    PWRPIN in the emonTx V3 is used to supply power to the temperature sensor. It needs to be set permanently high if temperature measurement is required. (It is so that when battery power is used (not relevant in this application), the temperature sensor can be powered only when it is required to take a reading, thus potentially extending battery life.)
