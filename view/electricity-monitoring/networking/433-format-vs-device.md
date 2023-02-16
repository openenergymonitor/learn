# 433MHz Radio Format vs Device

There are 3 types of Radio Format in use;
1. `JeeLib Classic` Backwards Compatibility
2. `JeeLib Native` rfm69n (for LibCM on emonPi)
3. `LowPowerLabs (LPL)` Standard (RF Encryption)(inc. acknowledge/retry)

| Device | `JeeLib Classic` | `JeeLib Native` | `LowPowerLabs (LPL)` |
| --- | --- | --- | --- |
| emonPi (discrete sampling) | **default** | not available | not available |
| emonPi (continuous monitoring) | not supported | available \*2 | available |
| emonBase (RFM69Pi) | **default** | available \*2,\*7 | available \*7 |
| emonBase V2 (RFM69SPI) \#| not supported | not available | **default** |
| emonTx Shield | **default** | available \*2 | ? |
| emonTx V2 | **default** | available \*2 | ? |
| emonTx V3.2 | **default** | available \*2 | available |
| emonTx V3.4 | **default** | available \*2 | available |
| emonTx V4 \# | available (shop option) | available \*1 | **default** |
| emonTH V2 | **default** | available \*2 | available |
| GLCD Display | **default** | available \*2,\*3,\*6 | ? |
| Mk2 PV Router \*4 | optional\*5 | not available | not available |

? means unknown

\# - available in OEM Shop 19/12/2022

\*1 [https://github.com/openenergymonitor/emontx4/tree/main/firmware/EmonTxV4/compiled](https://github.com/openenergymonitor/emontx4/tree/main/firmware/EmonTxV4/compiled) note: files for all three formats are available here

\*2 [https://community.openenergymonitor.org/t/the-emonpicm/18173](https://community.openenergymonitor.org/t/the-emonpicm/18173)

\*3 need to edit JeeLib files

\*4 [https://mk2pvrouter.co.uk/index.html](https://mk2pvrouter.co.uk/index.html)

\*5 needs selection of correct hardware (e.g. including RFM69) and firmware

\*6 see [https://community.openenergymonitor.org/t/the-emonpicm/18173/15](https://community.openenergymonitor.org/t/the-emonpicm/18173/15) onwards

\*7 The RFM69Pi module has all three formats available at [https://docs.openenergymonitor.org/emonbase/rfm69-pi.html](https://docs.openenergymonitor.org/emonbase/rfm69-pi.html) It can also be programmed from the emomSD software update page.

## RFM Packet Formats

![RFM Formats](files/RF-Formats-compared.png)

