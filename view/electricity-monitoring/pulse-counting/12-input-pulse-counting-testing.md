## 12 output Pulse Generator for bench testing

by Glyn Hudson

**Download** pulse generator sketch: [PulseGenerator3Nov.zip](files/PulseGenerator3Nov.zip)

To enable bench-testing of the pulse counting Arduino, another Arduino was setup to generate pulses outputs to simulate 5 pulse output electricity meters. The code we used to do this can be downloaded from the link above.

The program runs for a finite period of time (currently one minute) then prints the number of pulses generated for each output. The number of pulses generated can then be compared to the number detected. The set power values for each pulse output can also be compared with the values measured. Check out the page on Accuracy and precision to see the results of a test we did.

The power output, pulse width, run time and amount of energy each pulse represents, can be set in the variable declaration section of the code.