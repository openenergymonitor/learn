## Solar PV power diversion with emonTx using a PLL, emonGLCD and temperature measurement, by Martin Roberts

### 4: The ADC and interrupts

The analogue to digital converter (ADC) in the Atmel processor can run in one of two modes. The data sheet lists features that are key to how we use the ADC:

*   Free Running or Single Conversion Mode
*   Interrupt on ADC Conversion Complete

EmonLib uses “Single Conversion Mode”. In this mode, the main program sends a command to set the input channel and start the conversion process, and waits until that has finished before carrying on to use the value it measured. We also use single conversion mode, which we start by sending the command to measure the voltage at a frequency controlled ultimately by our PLL.

The second feature “Interrupt on ADC Conversion Complete” means that when the ADC finishes the conversion and it has put the answer in a standard place, it “interrupts” the main program to say the conversion is done. A special function, the “interrupt handler” or “Interrupt Service Routine (ISR)” then runs to pick up the result and does something useful with it (and it starts the measurement on the next channel) and when that finishes, the main program carries on where it left off. That way, we don’t have to wait in our main program while the ADC conversion is taking place.
