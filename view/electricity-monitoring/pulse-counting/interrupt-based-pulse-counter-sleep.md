## Interrupt driven pulse counter and sleep mode

This sketch detects pulses and prints the character P to the serial port.

In order to reduce power consumption, the Atmega 328 is put into sleep mode between pulses. The interrupt pulse input (digital input pin 2 or 3) is used to wake the device.

Unfortunately a power value can't be calculated as the timers do not run in sleep mode.

Kudos to Donal Morrissey for his clear tutorial on Arduino sleep mode: [Sleeping Arduino](http://donalmorrissey.blogspot.com/2010/04/putting-arduino-diecimila-to-sleep-part.html)

<pre>#include &#60;avr/sleep.h&#62;

#ifndef cbi
#define cbi(sfr, bit) (_SFR_BYTE(sfr) &= ~_BV(bit))
#endif
#ifndef sbi
#define sbi(sfr, bit) (_SFR_BYTE(sfr) |= _BV(bit))
#endif

void setup()
{
  Serial.begin(115200);

  /* Setup the interrupt pin */
  attachInterrupt(1, onPulse, FALLING);

  cbi( SMCR,SE );      // sleep enable, power down mode
  cbi( SMCR,SM0 );     // power down mode
  sbi( SMCR,SM1 );     // power down mode
  cbi( SMCR,SM2 );     // power down mode
}

void loop()
{
  //-------------------------------------------------------------
  // 1) Enter sleep mode
  //-------------------------------------------------------------
  //cbi(ADCSRA,ADEN);    // switch Analog to Digital converter OFF
  set_sleep_mode(SLEEP_MODE_PWR_DOWN);
  sleep_enable();
  sleep_mode();

  // The arduino is now sleeping...

  //-------------------------------------------------------------
  // 2) Program will resume from here on interrupt
  //-------------------------------------------------------------
  sleep_disable();
  sbi(ADCSRA,ADEN);    // switch Analog to Digitalconverter ON

  Serial.print('P');

  delay(10);
}

void onPulse()
{
  // It continues in the main loop
}</pre>
