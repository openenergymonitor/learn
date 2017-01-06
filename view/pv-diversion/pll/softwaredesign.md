## Solar PV power diversion with emonTx using a PLL, emonGLCD and temperature measurement, by Martin Roberts

### 2: Software Design Overview

The PLL Power Diversion sketch uses advanced techniques to achieve a performance that is in several respects superior to that which is achievable with the standard demonstration sketches and emonLib. This is not to denigrate emonLib nor the other libraries that the demonstration sketches employ, those are designed for general use and as such need to cover all eventualities. In a closely controlled application, it is possible to bypass these general purpose functions and, at the expense of more advanced programming, control both the processor itself and the external devices – radio and temperature sensor – at much lower level to achieve an enhanced performance.

The sketch uses a phase locked loop to synchronise to the mains frequency, it uses the much faster integer maths to speed up the calculations, and the ADC runs in the background communicating with the main program via interrupts.

This design builds on top of the excellent work done by Robin Emley ([“Diverting surplus PV Power”](https://openenergymonitor.org/emon/mk2)) and on the emonLib library.

The basic power diversion algorithm is the same as Robin Emley’s and sections 1 – 6 of “Diverting surplus PV Power” provide a good explanation of the principles and basic operation. If you are not familiar with that, I suggest you read those pages before continuing.
