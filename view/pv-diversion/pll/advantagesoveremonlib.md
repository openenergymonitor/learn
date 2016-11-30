## Solar PV power diversion with emonTx using a PLL, emonGLCD and temperature measurement, by Martin Roberts

[<< 5: Integer maths](/emon/pvdiversion/pll/integermaths)

[7: Implementation >>](/emon/pvdiversion/pll/implementation)

### 6: Advantages over emonLib

The energy monitor library (“emonLib”) designed for use with the emonTx was conceived with operation from either batteries or a 5 V mains adapter being possible. To achieve a reasonable battery life, it adopts the strategy of measuring power for a short time, then (in the standard demonstration sketches) sleeping for a long time. These times are approx. 200 mS and 5 s. This means that the power recorded is a sample and the underlying assumption is that this is representative of the power each side of this sample. Over a long period of time and with steady loads that are only occasionally switched on or off, this is quite reasonable and after careful calibration, agreement with the “official” meter to better than 1% has been reported.

However, this approach is liable to increasing errors if a rapidly switched load, like the burst-mode controller, is present, and the switching times are comparable with the sampling period. The interrupt-driven approach means that measurement is continuous and the average power over the reporting period is accurately measured. Because the reading cycle is locked to the mains frequency, it is also possible to obtain a display of frequency.

Also, as the ADC switches to reading the next input almost instantaneously, rather than returning to the main program to wait for an instruction, readings can be made somewhat faster – meaning that either more samples can be taken in each cycle, or rather more usefully, more inputs can be read with the same sample rate. For example, the PLL sketch reads one voltage input and two current inputs 50 times per cycle with plenty of spare time between readings, the equivalent emonLib method reads about 54 samples of one voltage and one current reading only, with no spare time between readings.

[<< 5: Integer maths](/emon/pvdiversion/pll/integermaths)

[7: Implementation >>](/emon/pvdiversion/pll/implementation)
