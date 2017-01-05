/*  Energy monitor and solar power diverter for solar PV system
    based on emonTx hardware from OpenEnergyMonitor http://openenergymonitor.org/emon/
    this version implements a phase-locked loop to synchronise to the 50Hz supply and
    supports a single Dallas DS18B20 temperature sensor.
    
    The triac driver should be connected to the pulse jack via a suitable series resistor.

    Original Author: Martin Roberts 2/12/12
    Modified by PetriK for 3phase monitoring and added LCVD

    History:


*/

//--------------------------------------------------------------------------------------------------
// constants which must be set for each system, calibrate in order of appearance
//--------------------------------------------------------------------------------------------------
#define NODEID 10 //rfm12b node ID
#define NETWORKID 210 //rfm12b network ID

#define SUPPLY_VOLTS 4.83 // Measure using multimeter from uno or emontxshield board
#define VCAL 223 // adjust to have same value on LCD as you measure from Grid with an multimeter
#define LOAD_POWER 999 // power in watts (at 230V) of dump load for diverted power calculation

#define I1CAL 88 // this is for CT1, phase 1, adjust to have same value as apparent power on serial monitor with resistive power
#define I2CAL 88 // this is for CT2, phase 2, -- " " --
#define I3CAL 88 // this is for CT3, phase 3, -- " " --
#define I4CAL 88 // this is for CT4, the solar PV current transformer, -- " " --


//--------------------------------------------------------------------------------------------------
// other system constants, no need to adjust normally
//--------------------------------------------------------------------------------------------------
//
// Should not be needed to adjust these, HASESHIFT ALIGNING STRATEGY: First align I1 and then I4. After that I2 and I3 just linearly in between
//
#define I1PHASESHIFT 0.7 // phase shift in voltage to align to current samples
#define I2PHASESHIFT 0.6
#define I3PHASESHIFT 0.5
#define I4PHASESHIFT 0.4 


#define FREQCORR 0.9989 // Frequency correction for arduino uno
//float SUPPLY_VOLTS;

#define SUPPLY_FREQUENCY 50
#define NUMSAMPLES 36 // number of times to sample each 50Hz cycle, should be as high as possible without PLLerror
#define ENERGY_BUFFER_SIZE 360 // 0.001 kWh = 3600 Joules
#define BUFFER_HIGH_THRESHOLD 270 // energy buffer level to start diversion
#define BUFFER_LOW_THRESHOLD 90 // energy buffer level to stop diversion
#define FILTERSHIFT 13 //13 // for low pass filters to determine ADC offsets
#define PLLTIMERRANGE 100 // PLL timer range limit ~+/-0.5Hz
#define PLLLOCKRANGE 40 // allowable ADC range to enter locked state
#define PLLUNLOCKRANGE 80 // allowable ADC range to remain locked
#define PLLLOCKCOUNT 100 // number of cycles to determine if PLL is locked
#define LOOPTIME 5000 // time of outer loop in milliseconds, also time between radio transmissions
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// constants calculated at compile time
#define V_RATIO ((VCAL * SUPPLY_VOLTS)/1024)
#define I1_RATIO ((I1CAL * SUPPLY_VOLTS)/1024)
#define I2_RATIO ((I2CAL * SUPPLY_VOLTS)/1024)
#define I3_RATIO ((I3CAL * SUPPLY_VOLTS)/1024)
#define I4_RATIO ((I4CAL * SUPPLY_VOLTS)/1024)
#define JOULES_PER_BUFFER_UNIT ((V_RATIO * I1_RATIO)/(SUPPLY_FREQUENCY*NUMSAMPLES))
#define MAXAVAILABLEENERGY ((long)ENERGY_BUFFER_SIZE/JOULES_PER_BUFFER_UNIT)
#define HIGHENERGYLEVEL ((long)BUFFER_HIGH_THRESHOLD/JOULES_PER_BUFFER_UNIT)
#define LOWENERGYLEVEL ((long)BUFFER_LOW_THRESHOLD/JOULES_PER_BUFFER_UNIT)
#define FILTERROUNDING (1<<(FILTERSHIFT-1))
#define TIMERTOP (((20000/NUMSAMPLES)*16)-1) // terminal count for PLL timer
#define PLLTIMERMAX (TIMERTOP+PLLTIMERRANGE)
#define PLLTIMERMIN (TIMERTOP-PLLTIMERRANGE)
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// Arduino I/O pin useage
#define VOLTSPIN 0
#define CT1PIN 1
#define CT2PIN 2
#define CT3PIN 3
#define CT4PIN 4
#define RFMSELPIN 10
#define RFMIRQPIN 2
#define SDOPIN 12
#define W1PIN 4 // 1-Wire pin for temperature
#define SSRandLEDPIN 9 // triac driver pin
//--------------------------------------------------------------------------------------------------
  
//--------------------------------------------------------------------------------------------------
// Dallas DS18B20 commands
#define SKIP_ROM 0xcc 
#define CONVERT_TEMPERATURE 0x44
#define READ_SCRATCHPAD 0xbe
#define BAD_TEMPERATURE 30000 // this value (300C) is sent if no sensor is present
//--------------------------------------------------------------------------------------------------

#include <Wire.h>
#include <SPI.h>
#include <util/crc16.h>
#include <OneWire.h>
#include <LiquidCrystal.h>
//LiquidCrystal lcd(RS, E, D4, D5, D6, D7);
LiquidCrystal lcd(8, 7, 6, 5, 19, 3);
 
typedef struct { int power1, power2, power3, powerPV, powerdiverted, Vrms, temp; } PayloadTx;
PayloadTx emontx;

int sampleV,sampleI1,sampleI2,sampleI3,sampleI4,numSamples;
int voltsOffset=512,I1Offset=512,I2Offset=512,I3Offset=512,I4Offset=512; // start offsets at ADC centre
float Vrms,I1rms,I2rms,I3rms,I4rms;
long sumVsquared,sumI1squared,sumI2squared,sumI3squared,sumI4squared,sumP1,sumP2,sumP3,sumP4;
long cycleVsquared,cycleI1squared,cycleI2squared,cycleI3squared,cycleI4squared,cycleP1,cycleP2,cycleP3,cycleP4;
long totalVsquared,totalI1squared,totalI2squared,totalI3squared,totalI4squared,totalP1,totalP2,totalP3,totalP4;
long sumTimerCount;
float realPower1,apparentPower1,powerFactor1;
float realPower2,apparentPower2,powerFactor2;
float realPower3,apparentPower3,powerFactor3;
float realPower4,apparentPower4,powerFactor4;
byte samples=0;

float divertedPower;
float frequency;
word timerCount=TIMERTOP;
word pllUnlocked=PLLLOCKCOUNT;
word cycleCount;
boolean newCycle,divertedCycle;
int divertedCycleCount;
unsigned long nextTransmitTime;
long availableEnergy;
int manualPowerLevel;

OneWire oneWire(W1PIN);

void setup()
{
  pinMode(19,OUTPUT);
  lcd.begin(20, 2);
  // Print a message to the LCD.
  lcd.print("Initializing");
  pinMode(SSRandLEDPIN,OUTPUT);
  digitalWrite(SSRandLEDPIN,LOW);
  pinMode (RFMSELPIN, OUTPUT);
  digitalWrite(RFMSELPIN,HIGH);
  manualPowerLevel=0;
  convertTemperature(); // start initial temperature conversion
  // start the SPI library:
  SPI.begin();
  SPI.setBitOrder(MSBFIRST);
  SPI.setDataMode(0);
  SPI.setClockDivider(SPI_CLOCK_DIV8);
  // initialise RFM12
  delay(200); // wait for RFM12 POR
  rfm_write(0x0000); // clear SPI
   // rfm_write(0x80D7); // EL (ena dreg), EF (ena RX FIFO), 12.0pF, 434Mhz
  rfm_write(0x80E7); // EL (ena dreg), EF (ena RX FIFO), 12.0pF for 868MHz
  rfm_write(0x80D7); // EL (ena dreg), EF (ena RX FIFO), 12.0pF 
  rfm_write(0x8208); // Turn on crystal,!PA
  rfm_write(0xA640); // 
  rfm_write(0xC606); // approx 49.2 Kbps, as used by emonTx
  //rfm_write(0xC657); // approx 3.918 Kbps, better for long range
  rfm_write(0xCC77); // PLL 
  rfm_write(0x94A0); // VDI,FAST,134kHz,0dBm,-103dBm 
  rfm_write(0xC2AC); // AL,!ml,DIG,DQD4 
  rfm_write(0xCA83); // FIFO8,2-SYNC,!ff,DR 
  rfm_write(0xCEd2); // SYNC=2DD2
  rfm_write(0xC483); // @PWR,NO RSTRIC,!st,!fi,OE,EN 
  rfm_write(0x9850); // !mp,90kHz,MAX OUT 
  rfm_write(0xE000); // wake up timer - not used 
  rfm_write(0xC800); // low duty cycle - not used 
  rfm_write(0xC000); // 1.0MHz,2.2V 
  
  nextTransmitTime=millis();
  Serial.begin(9600); // You can comment this line to disable serial print statements
  
  // change ADC prescaler to /64 = 250kHz clock
  // slightly out of spec of 200kHz but should be OK
  ADCSRA &= 0xf8;  // remove bits set by Arduino library
  ADCSRA |= 0x06; 

  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Running");

  //set timer 1 interrupt for required period
  noInterrupts();
  TCCR1A = 0; // clear control registers
  TCCR1B = 0;
  TCNT1  = 0; // clear counter
  OCR1A = TIMERTOP; // set compare reg for timer period
  bitSet(TCCR1B,WGM12); // CTC mode
  bitSet(TCCR1B,CS10); // no prescaling
  bitSet(TIMSK1,OCIE1A); // enable timer 1 compare interrupt
  bitSet(ADCSRA,ADIE); // enable ADC interrupt
  interrupts();
}

void loop()
{
  if(newCycle) addCycle(); // a new mains cycle has been sampled

  if((millis()>=nextTransmitTime) && ((millis()-nextTransmitTime)<0x80000000L)) // check for overflow
  {
    calculateVIPF();
    emontx.temp=readTemperature();
    sendResults();
    convertTemperature(); // start next conversion
    nextTransmitTime+=LOOPTIME;
  }

  if(Serial.available())
  {
    manualPowerLevel=Serial.parseInt();
    manualPowerLevel=constrain(manualPowerLevel,0,255);
    Serial.print("manual power level set to ");
    Serial.println(manualPowerLevel);
  }
}

// timer 1 interrupt handler
ISR(TIMER1_COMPA_vect)
{
  ADMUX = _BV(REFS0) | CT4PIN; // start ADC conversion with reverse order, i.e. least significant to start with
  ADCSRA |= _BV(ADSC);
}

// ADC interrupt handler
ISR(ADC_vect)
{
  static int newV,new3V,newI1,newI2,newI3,newI4;
  static int lastI1,lastI2,lastI3,lastI4;
  
  static int lastV,last3V;
  static long fVoltsOffset=512L<<FILTERSHIFT,fI1Offset=512L<<FILTERSHIFT,fI2Offset=512L<<FILTERSHIFT,fI3Offset=512L<<FILTERSHIFT,fI4Offset=512L<<FILTERSHIFT;
  long result=0;
  long phaseShiftedV,phaseShifted3V;
  static long phaseV[NUMSAMPLES];  //array where samples are stored for 3 phase calculations
  static int phasesample;                 // used temporarily to calculate which sample to call for 3 phase calculations
  unsigned int low, high;
  
  while (bit_is_set(ADCSRA,ADSC)); //just in case
  low = ADCL;
  high = ADCH;
  result = (high<<8) | low;
  
  // determine which conversion just completed
  switch(ADMUX & 0x0f)
  {
    case CT1PIN:
      ADMUX = _BV(REFS0) | VOLTSPIN; 
      ADCSRA |= _BV(ADSC);
      sampleI1 = result;
      newI1=sampleI1-I1Offset;
      //sumI1squared+=((long)newI1*lastI1); 
      sumI1squared+=((long)newI1*(lastI1+(((((long)newI1-lastI1)*0.3))))); 
      fI1Offset += (sampleI1-I1Offset); 
      I1Offset=(int)((fI1Offset+FILTERROUNDING)>>FILTERSHIFT);
      lastI1=newI1;
      
      break;

    case CT2PIN:
      ADMUX = _BV(REFS0) | CT1PIN; 
      ADCSRA |= _BV(ADSC);
      sampleI2 = result;
      newI2=sampleI2-I2Offset;
      //sumI2squared+=((long)newI2*lastI2); 
      sumI2squared+=((long)newI2*(lastI2+(((((long)newI2-lastI2)*0.3))))); 
      fI2Offset += (sampleI2-I2Offset); 
      I2Offset=(int)((fI2Offset+FILTERROUNDING)>>FILTERSHIFT);
      lastI2=newI2;
      break;

    case CT3PIN:
      ADMUX = _BV(REFS0) | CT2PIN; 
      ADCSRA |= _BV(ADSC);
      sampleI3 = result;
      newI3=sampleI3-I3Offset;
      //sumI3squared+=((long)newI3*lastI3);
      sumI3squared+=((long)newI3*(lastI3+(((((long)newI3-lastI3)*0.3))))); 
      fI3Offset += (sampleI3-I3Offset); 
      I3Offset=(int)((fI3Offset+FILTERROUNDING)>>FILTERSHIFT);
      lastI3=newI3;
      break;

    case CT4PIN:
      ADMUX = _BV(REFS0) | CT3PIN; 
      ADCSRA |= _BV(ADSC);
      sampleI4 = result;
      newI4=sampleI4-I4Offset;
      //sumI4squared+=((long)newI4*lastI4);
      sumI4squared+=((long)newI4*(lastI4+(((((long)newI4-lastI4)*0.5)))));
      fI4Offset += (sampleI4-I4Offset);
      I4Offset=(int)((fI4Offset+FILTERROUNDING)>>FILTERSHIFT);
      lastI4=newI4;

      break;

   case VOLTSPIN:
      lastV=newV;
      sampleV = result;
      newV=sampleV-voltsOffset;
      phaseV[samples]=newV; //store sample to an array where it will be later called for 3phase calculations
      sumVsquared+=((long)newV * newV);

      // update low-pass filter for DC offset
      fVoltsOffset += (sampleV-voltsOffset); 
      voltsOffset=(int)((fVoltsOffset+FILTERROUNDING)>>FILTERSHIFT);

      // Phase 1 is same as AC voltage phase, use phaseshifted voltage for phases 2&3 later
      phaseShiftedV=lastV+((((long)newV-lastV)*I1PHASESHIFT));
      sumP1+=(phaseShiftedV*newI1);

      // PV generation is connected to Phase 1 which is in the same phase as AC voltage phase
      phaseShiftedV=lastV+((((long)newV-lastV)*I4PHASESHIFT));
      sumP4+=(phaseShiftedV*newI4);

      //
      // For phases 2 & 3 need to use samples from previous cycle which are 120 and 240 degree apart
      //
      phasesample=samples - (int)(NUMSAMPLES * 249/360); // phase2 is -240degrees
      if (phasesample < 0) phasesample = phasesample + NUMSAMPLES; new3V=phaseV[phasesample];
      if (phasesample <= 0) last3V=phaseV[NUMSAMPLES]; else last3V=phaseV[phasesample - 1];
      phaseShifted3V=last3V+((((long)new3V-last3V)*I2PHASESHIFT));
      sumP2+=(phaseShifted3V*newI2);
      
      phasesample=samples - (int)(NUMSAMPLES * 120/360); // phase3 is -120degrees
      if (phasesample < 0) phasesample = phasesample + NUMSAMPLES; new3V=phaseV[phasesample]; 
      if (phasesample <= 0) last3V=phaseV[NUMSAMPLES]; else last3V=phaseV[phasesample - 1];
      phaseShifted3V=last3V+((((long)new3V-last3V)*I3PHASESHIFT));
      sumP3+=(phaseShifted3V*newI3);

      updatePLL(newV,lastV);

      
      break;


  }
}

void updatePLL(int newV, int lastV)
{
  static int oldV;
  static boolean divertFlag, diverting=false;
  static int manualCycleCount=-1;
  boolean rising;

  rising=(newV>lastV); // synchronise to rising zero crossing
  
  samples++;
  if(samples>=NUMSAMPLES) // end of one 50Hz cycle
  {
    samples=0;
    if(rising)
    {
      // if we're in the rising part of the 50Hz cycle adjust the final timer count
      // to move newV towards 0, only adjust if we're moving in the wrong direction
      if(((newV<0)&&(newV<=oldV))||((newV>0)&&(newV>=oldV))) timerCount-=newV;
      // limit range of PLL frequency
      timerCount=constrain(timerCount,PLLTIMERMIN,PLLTIMERMAX);
      OCR1A=timerCount;
      if(abs(newV)>PLLUNLOCKRANGE) pllUnlocked=PLLLOCKCOUNT; // we're unlocked
      else if(pllUnlocked) pllUnlocked--;
    }
    else // in the falling part of the cycle, we shouldn't be here
    {
      OCR1A=PLLTIMERMAX; // shift out of this region fast
      pllUnlocked=PLLLOCKCOUNT; // and we can't be locked
    }
    
    oldV=newV;
    
    // save results for outer loop
    cycleVsquared=sumVsquared;
    cycleI1squared=sumI1squared;
    cycleI2squared=sumI2squared;
    cycleI3squared=sumI3squared;
    cycleI4squared=sumI4squared;
    cycleP1=sumP1;
    cycleP2=sumP2;
    cycleP3=sumP3;
    cycleP4=sumP4;
    divertedCycle=divertFlag;
    // and clear accumulators
    sumVsquared=0;
    sumI1squared=0;
    sumI2squared=0;
    sumI3squared=0;
    sumI4squared=0;
    sumP1=0;
    sumP2=0;
    sumP3=0;
    sumP4=0;
    divertFlag=false;
    newCycle=true; // flag new cycle to outer loop
    if(manualPowerLevel) manualCycleCount++;
    else manualCycleCount=-1; // manual power is off
  }
  else if(samples==(NUMSAMPLES/2))
  {
    // negative zero crossing
  }
  else if(samples==((NUMSAMPLES/2)-4)) // fire triac ~1.6ms before -ve zero crossing
  {
    if(availableEnergy > HIGHENERGYLEVEL) diverting=true;
    else if(availableEnergy < LOWENERGYLEVEL) diverting=false;
    
    if(diverting || (manualCycleCount>=manualPowerLevel))
    {
      digitalWrite(SSRandLEDPIN,HIGH);
      divertFlag=true;
      manualCycleCount=0;
    }
    else digitalWrite(SSRandLEDPIN,LOW);
  }
}

// add data for new 50Hz cycle to total
void addCycle()
{
  totalVsquared+=cycleVsquared;
  totalI1squared+=cycleI1squared;
  totalI2squared+=cycleI2squared;
  totalI3squared+=cycleI3squared;
  totalI4squared+=cycleI4squared;
  totalP1+=cycleP1;
  totalP2+=cycleP2;
  totalP3+=cycleP3;
  totalP4+=cycleP4;
  
  numSamples+=NUMSAMPLES;
  sumTimerCount+=(timerCount+1); // for average frequency calculation
  availableEnergy-=cycleP1 + cycleP2 + cycleP3; // Solar energy is negative at this point
  availableEnergy=constrain(availableEnergy,0,MAXAVAILABLEENERGY);
  
  if(divertedCycle) divertedCycleCount++;
  cycleCount++;
  newCycle=false;
}

// calculate voltage, current, power and frequency
void calculateVIPF()
{
  if(numSamples==0) return; // just in case
  
  Vrms = V_RATIO * sqrt(((float)totalVsquared)/numSamples); 
  I1rms = I1_RATIO * sqrt(abs((float)totalI1squared)/numSamples);
  I2rms = I2_RATIO * sqrt(abs((float)totalI2squared)/numSamples); 
  I3rms = I3_RATIO * sqrt(abs((float)totalI3squared)/numSamples); 
  I4rms = I4_RATIO * sqrt(abs((float)totalI4squared)/numSamples); 

  realPower1 = (V_RATIO * I1_RATIO * (float)totalP1)/numSamples;
  apparentPower1 = Vrms * I1rms;

  realPower2 = (V_RATIO * I2_RATIO * (float)totalP2)/numSamples;
  apparentPower2 = Vrms * I2rms;
  powerFactor2=abs(realPower2 / apparentPower2);

  realPower3 = (V_RATIO * I3_RATIO * (float)totalP3)/numSamples;
  apparentPower3 = Vrms * I3rms;
  powerFactor3=abs(realPower3 / apparentPower3);

  realPower4 = (V_RATIO * I4_RATIO * (float)totalP4)/numSamples;
  apparentPower4 = Vrms * I4rms;
  powerFactor4=abs(realPower4 / apparentPower4);
  
  divertedPower=((float)divertedCycleCount*LOAD_POWER)/cycleCount;
  divertedPower=divertedPower*((float)Vrms/230)*((float)Vrms/230); // correct power for actual voltage
  frequency=((float)cycleCount*16000000)/(((float)sumTimerCount)*NUMSAMPLES)*FREQCORR;

  emontx.power1=(int)(realPower1+0.5);
  emontx.power2=(int)(realPower2+0.5);
  emontx.power3=(int)(realPower3+0.5);
  emontx.powerPV=(int)(realPower4+0.5);
  emontx.powerdiverted=(int)(divertedPower+0.5);
 
  emontx.Vrms=(int)(Vrms*100+0.5);
  
  totalVsquared=0;
  totalI1squared=0;
  totalI2squared=0;
  totalI3squared=0;
  totalI4squared=0;
  totalP1=0;
  totalP2=0;
  totalP3=0;
  totalP4=0;
  numSamples=0;
  cycleCount=0;
  divertedCycleCount=0;
  sumTimerCount=0;
}

void sendResults()
{
char str[20];

rfm_send((byte *)&emontx,sizeof(emontx));

  lcd.clear();
  
  lcd.setCursor(0,0); 
  dtostrf(Vrms,3,0,str);
  strcat(str,"V");
  lcd.print(str);

  lcd.setCursor(5,0);  if(pllUnlocked) {lcd.print("PLLerr");} else {
    lcd.print(frequency);
    lcd.setCursor(10,0);lcd.print("Hz");}
  
  lcd.setCursor(16,0);  
  dtostrf(divertedPower,3,0,str);
  strcat(str,"W");
  lcd.print(str);

  lcd.setCursor(0,1);  
  dtostrf(realPower1,4,0,str);
  strcat(str,"W");
  lcd.print(str);

  lcd.setCursor(6,1);  
  dtostrf(realPower2,3,0,str);
  strcat(str,"W");
  lcd.print(str);

  lcd.setCursor(11,1);  
  dtostrf(realPower3,3,0,str);
  strcat(str,"W");
  lcd.print(str);

  lcd.setCursor(16,1);  
  dtostrf(realPower4,3,0,str);
  strcat(str,"W");
  lcd.print(str);

{
  Serial.print(SUPPLY_VOLTS);
  Serial.print(" ");
  Serial.print(voltsOffset);
  Serial.print(" ");
  Serial.print(I1Offset);
  Serial.print(" ");
  Serial.print(I2Offset);
  Serial.print(" ");
  Serial.print(I3Offset);
  Serial.print(" ");
  Serial.print(I4Offset);
  Serial.print(" Vrms:");
  Serial.print(Vrms);
  Serial.print(" rP1:");
  Serial.print(realPower1);
  Serial.print(" aP1:");
  Serial.print(apparentPower1);
   Serial.print(" rP2:");
  Serial.print(realPower2);
  Serial.print(" aP2:");
  Serial.print(apparentPower2);
  Serial.print(" rP3:");
  Serial.print(realPower3);
  Serial.print(" aP3:");
  Serial.print(apparentPower3);
  Serial.print(" rP4:");
  Serial.print(realPower4);
  Serial.print(" aP4:");
  Serial.print(apparentPower4);
  Serial.print(" dP:");
  Serial.print(divertedPower);
  Serial.print(" TC:");
  Serial.print((float)emontx.temp/100);
  Serial.print(" aW:");
  Serial.print((float)availableEnergy * JOULES_PER_BUFFER_UNIT);
  
  if(pllUnlocked) Serial.print(" PLL is unlocked ");
  else
 {
  Serial.print(" f:");
  Serial.print(frequency);

 } 
  Serial.println();
}
}

// write a command to the RFM12
word rfm_write(word cmd)
{
  word result;
  
  digitalWrite(RFMSELPIN,LOW);
  result=(SPI.transfer(cmd>>8)<<8) | SPI.transfer(cmd & 0xff);
  digitalWrite(RFMSELPIN,HIGH);
  return result;
}

// transmit data via the RFM12
void rfm_send(byte *data, byte size)
{
  byte i=0,next,txstate=0;
  word crc=~0;
  
  rfm_write(0x8228); // OPEN PA
  rfm_write(0x8238);

  digitalWrite(RFMSELPIN,LOW);
  SPI.transfer(0xb8); // tx register write command
  
  while(txstate<13)
  {
    while(digitalRead(SDOPIN)==0); // wait for SDO to go high
    switch(txstate)
    {
      case 0:
      case 1:
      case 2: next=0xaa; txstate++; break;
      case 3: next=0x2d; txstate++; break;
      case 4: next=NETWORKID; txstate++; break; // network ID
      case 5: next=NODEID; txstate++; break; // node ID
      case 6: next=size; txstate++; break;
      case 7: next=data[i++]; if(i==size) txstate++; break;
      case 8: next=(byte)crc; txstate++; break;
      case 9: next=(byte)(crc>>8); txstate++; break;
      case 10:
      case 11:
      case 12: next=0xaa; txstate++; break; // dummy bytes (if <3 CRC gets corrupted sometimes)
    }
    if((txstate>4)&&(txstate<9)) crc = _crc16_update(crc, next);
    SPI.transfer(next);
  }
  digitalWrite(RFMSELPIN,HIGH);

  rfm_write( 0x8208 ); // CLOSE PA
  rfm_write( 0x8200 ); // enter sleep
}

void convertTemperature()
{
  oneWire.reset();
  oneWire.write(SKIP_ROM);
  oneWire.write(CONVERT_TEMPERATURE);
}

int readTemperature()
{
  byte buf[9];
  int result;
  
  oneWire.reset();
  oneWire.write(SKIP_ROM);
  oneWire.write(READ_SCRATCHPAD);
  for(int i=0; i<9; i++) buf[i]=oneWire.read();
  if(oneWire.crc8(buf,8)==buf[8])
  {
    result=(buf[1]<<8)|buf[0];
    // result is temperature x16, multiply by 6.25 to convert to temperature x100
    result=(result*6)+(result>>2);
  }
  else result=BAD_TEMPERATURE;
  return result;
}

