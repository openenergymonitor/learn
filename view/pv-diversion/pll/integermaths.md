## Solar PV Power Diversion with emonTx Using a PLL, emonGLCD and Temperature Measurement, by Martin Roberts

***

### 5: Integer Maths

High level languages like C++ make it easy to write programs by offering a wide range of variable types and functions. Unfortunately, that convenience comes at the price of speed and performance. Although modern compilers can usually optimise a program far better than all but the best human programmers, there are limits to what they can do simply because they can never be totally aware of the actual conditions when the program is running. One area where a prior knowledge of what the variables are and what they mean is invaluable is in the mathematical operations.

Processing decimal numbers – so called “floating point” variables because the decimal point can ‘float’ left and right so that the numbers cover a huge range of values (even though the _precision_ is limited to 6 or 7 digits) – is normally very slow compared to the same operation with integer numbers. Therefore, if we can remove floating point variables from our calculation, we can speed it up significantly. The general principle is to multiply a small decimal number by some value so that when it is truncated to an integer, it still retains adequate precision; and divide a number that is too large to be stored as an integer while still retaining adequate precision. The maths then proceeds using the scaled integer values.

The essential difference is that rather than letting the computer handle the placing of the decimal point in a generalised way, we the programmers take over that responsibility and do it in a way that is often specific to just that line of code.

There is more about this, specifically the filter calculations, at [Electricity Monitoring: Digital filters for offset removal](../../electricity-monitoring/ctac/digital-filters-for-offset-removal).
