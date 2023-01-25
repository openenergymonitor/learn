# Temperature Sensing Using DS18B20 Digital Sensors

The [DS18B20](https://datasheets.maximintegrated.com/en/ds/DS18B20.pdf) is a small temperature sensor with a built in 12bit ADC. It can be easily connected to an Arduino digital input. The sensor communicates over a one-wire bus and requires little in the way of additional components.

The sensors have a quoted accuracy of +/-0.5 deg C in the range -10 deg C to +85 deg C.

## Hardware

Multiple sensors can be connected to the same data bus. Each sensor identifies itself by a unique serial number.

The sensor can operate in normal or parasite mode. In normal mode, a 3-wire connection is needed. In parasite mode the sensor derives its power from the data line. Only two wires, data and ground, are required.

<span style="font-style: italic">**Note:** The Arduino positive supply rail is referred to as V<sub>cc</sub> and the positive supply for the DS18B20 as V<sub>dd</sub>. In this context, the two are the same.</span>

## Normal Mode

In normal mode, each sensor is connected between a power line (V<sub>dd</sub> pin 3) and ground (GND pin 1), and the data output (DQ pin 2) connects to a third, data, line. The data output is a 3-state or open-drain port (DQ pin 2) and requires a 4k7 pull-up resistor. The data line is connected to an available Arduino digital input or Screw Terminal 6 on the emonTx V3, or DIO 4 on the emonTx Shield. GND is available on Screw Terminal 3 and switched power on terminal 5 of the emonTx V3. When using the RJ45 connector on the emonTx V3.4 or the emonPi, the connections are GND: pin 5, power (not switched): pin 2, data: pin 4.

Normal mode is recommended when many devices and/or long cable runs are involved.

## Parasite Mode

Parasite power mode requires both DS18B20 GND (pin 1) and V<sub>dd</sub> (pin 3) to be connected to ground. The DQ pin (pin 2 - the middle pin) is the data/parasite power line. The data line requires a pull-up resistor of 4k7 connected to + 5 V. The data line is connected to an available Arduino digital input or Screw Terminal 6 on the emonTx V3, or DIO 4 on the emonTx Shield.

Parasite mode should be used only with a small number of devices, over relatively short distances.

![](files/ds18b20_connections.png)

## Connecting Multiple Sensors

If the sensors are located relatively close to the Arduino/emonTx, then satisfactory operation should be achieved by making a parallel connection of the sensors at the connection to the Arduino or emonTx . This is called a radial or 'star' arrangement.

If long cable runs are required, consideration should be given to connecting in 'daisy-chain' fashion where one cable runs from the furthest sensor, connecting to each sensor in turn, before ending at the Arduino or emonTx.

There is more about this in the note below.

For short cable runs, unscreened two or three-core cable, or single-core (parasite mode) or twin-core (normal mode) screened audio cable should be suitable. For longer cable runs, low capacitance cable such as RF aerial downlead (parasite mode) has been successfully used over a distance of 10 m. CAT 5 network cable has also been used with success over a distance of 30m, with data & ground using one twisted pair and power & ground using a second twisted pair.

## Cable Length

Up to 20m cable length has been successfully reported by Martin Harizanov with a lower pull-up resistor value of 2K. Adding multiple sensors will reduce the practical length, as will non consistent / nonlinear cable runs, [see app note](https://www.maximintegrated.com/en/app-notes/index.mvp/id/148)

## Software

[Dallas Temperature Control Arduino library by Miles Burton.](http://milesburton.com/Dallas_Temperature_Control_Library#The_Library)

Version 372 works with Arduino 1.0\. download it from [here](http://download.milesburton.com/Arduino/MaximTemperature/)

This library makes interfacing with the sensors very straightforward and comes with examples.

The OneWire protocol communication library is also required. Version 2.0 can be downloaded from [here](http://www.pjrc.com/teensy/td_libs_OneWire.html).

Once the libraries have been extracted to the Arduino libraries folder, and the Arduino IDE restarted, I recommend checking out the ‘simple’ and ‘multiple’ examples which are part of the Dallas Temperature Control Library. These two examples demonstrate two methods to identify and communicate with each sensor.

### Addressing the Sensors

Each sensor has a unique serial number assigned by the manufacturer, and your sketch (unless it is the "low-power" sketch that expects a single sensor) must be programmed with these serial numbers so it can identify and interrogate each sensor. Download the examples from [GitHub emonTx V2 temperature example](https://github.com/openenergymonitor/emontx2/tree/master/firmware/emonTx_temperature_examples). There you will find the [temperature search test sketch](https://github.com/openenergymonitor/emontx2/tree/master/firmware/emonTx_temperature_examples/temperature_search). You need run the sketch only once to extract and list the serial number from each DS18B20\. Then you manually copy the serial numbers into your monitoring sketch. Alternatively, emonLibCM can report and optionally store the sensor addresses, so that each sensor always maintains its place in the list of sensors.

See [Part 2](DS18B20-temperature-sensing-2) for a description of how the order in which the sensors are discovered is decided.

### Error Values

The sensor works by reading and converting the temperature and storing this value in scratchpad memory. The scratchpad memory is then read via the One-wire bus by the Dallas library.

The power-on value in the scratchpad memory is 85 °C. If the scratchpad memory is read before the temperature conversion has completed, then the erroneous temperature value of 85 °C might be returned. Depending on your application, it might not be possible to distinguish this from a genuine reading. This error value might be caused by an intermittent or absent connection of either the power wire (normal mode) or the GND wire.

If the data being read from the scratchpad memory is corrupted in transit, then the checksum will fail and the Dallas library will return a value of -127 °C. This is outside the operating temperature range of the sensor, so can easily be detected in software. This error value might be caused by an intermittent or absent connection of either the data wire (normal mode) or the GND wire, or indeed an absent sensor.

The following error codes have been defined for use with firmware running on OpenEnergyMonitor hardware. [See forum discussion.](https://community.openenergymonitor.org/t/emonpi-temperature-measurement/6792/15)

```
#define UNUSED_TEMPERATURE 300
// this value (300C) is sent if no sensor has ever been detected
#define OUTOFRANGE_TEMPERATURE 302
// this value (302C) is sent if the sensor reports < -55C or > +125C
#define BAD_TEMPERATURE 304
// this value (304C) is sent if no sensor is present or the checksum is bad (corrupted data)
// NOTE: The sensor might report 85C if the temperature is retrieved but the sensor has not been commanded
```

## The emonTx V3

The standard emonTx sketch uses emonLibCM, and temperature sensing is contained within this library. There is provision for up to 3 sensors, which may be connected via the RJ45 connector, the screw terminals, or a combination of both; and a software switch (see the sketch’s documentation for details) allows temperature sensing to be enabled or disabled. The emonLibCM documentation gives full details of the API.

## Cloned or Fake DS18B20 Sensors

Cloned or fake DS18B20 sensors are widely available. Many do not meet the specification of genuine Dallas / Maxim sensors and as such there is no guarantee that they will work, and if they work, produce accurate readings. Potential users are strongly advised to obtain their sensors from a reputable and accredited distributor. 

There is a report of an investigation by Dr Chris Petrich, a Research Associate at the University of Alaska, originally published at https://sintef.brage.unit.no/sintef-xmlui/bitstream/handle/11250/2716073/IAHR_2020_CP_A+Note+on+Remote+Temperature+Measurements+with+DS18B20_Digital+Sensorsfinal.pdf?sequence=2 which is also available on Github at https://github.com/cpetrich/counterfeit_DS18B20, and there is a forum discussion thread here, starting at https://community.openenergymonitor.org/t/ds18b20-and-emontx3cm-firmware/14339/78.

Dr. Petrich’s report contains a list of official distributors. 

## Notes and Further Reading

For large numbers of sensors and longer cable runs, use the [DS2480B](http://www.maxim-ic.com/datasheet/index.mvp/id/2923) 1-wire driver chip. [N.B. Some very helpful information from [ Chris Shucksmith](http://twitter.com/#!/shuckc) appears to have been removed.]

_"If you intend to have a large 1-wire network, it is important that you design the network correctly, otherwise you will have problems with timing/reflection issues and loss of data. For very small networks, it is possible to connect each sensor in a star or radial arrangement. This means that each sensor is connected via its own cable back to a central point and then connected to the 1-wire to serial adapter. However, it is strongly recommend that you connect each sensor to a single continuous cable which loops from sensor to sensor in turn (daisy chain). This will reduce potential misreads due to reflections in the cable. Each sensor should have a maximum of 50mm (2") of cable connected off the main highway. Even using this method, connecting more than 10-15 sensors will still cause problems due to loading of the data bus. To minimise this effect, always place a 100-120 ohm resistor in the data leg of each sensor before connecting to the network."_

quoted from: [http://www.jon00.me.uk/onewireintro.shtml](http://www.jon00.me.uk/onewireintro.shtml)
