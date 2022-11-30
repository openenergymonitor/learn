# Choosing an Energy Diverter

## What Does an Energy Diverter Do?

At its simplest, an energy diverter captures excess energy from your private generation system, whether it is photovoltaic, wind or hydro, and uses it locally instead of allowing it to be exported to the grid. The most popular use is for water heating, though there are also examples of use for space heating and battery charging.

## Why Have an Energy Diverter?

Whether you will benefit from a diverter depends wholly on the local rules that apply, and on the difference between the price that you pay for imported energy and the payments you receive for exported energy.

In the UK, from April 2010 a fixed [“Feed-in Tariff”](https://www.ofgem.gov.uk/environmental-and-social-schemes/feed-tariffs-fit) (FIT) paid for energy generated irrespective of whether it is consumed on-site or exported. Although your exported energy may be purchased by the supplier at a rate lower than the one they charge for energy you import, there is often an assumption that 50% of generated energy is exported and payment is made on that basis. Therefore, it makes economic sense to utilise as much of the generated energy as possible, exporting only when no more can be used.

The UK Feed-in Tariff scheme closed to new applications on March 31, 2019, making a great incentive to use your own generated electricity instead of exporting it. Anyone already recieving the Feed-in Tariff will continue to do so for the term of their agreement (usually 20 years).

In January 2020 the [Smart Export Guarantee (SEG)](https://www.ofgem.gov.uk/environmental-and-social-schemes/smart-export-guarantee-seg) was launched to replace the older FIT scheme.

There is no consistent world-wide policy. In some places, it has been reported that exporting electricity is forbidden. In those locations, it is imperative that as much energy is used on-site as possible. Elsewhere, the same tariff rates apply to both imported and exported energy and there is no Feed-in Tariff, hence, no incentive to store energy on-site.

More on FIT: [https://en.wikipedia.org/wiki/Feed-in_tariff](https://en.wikipedia.org/wiki/Feed-in_tariff)

## How Does an Energy Diverter Work?

An energy diverter works by measuring the nett energy flow at the grid connection point, and controlling a load – usually a water heater – such that energy is neither imported nor exported. The method of control can be burst mode, phase control or pulse width modulation. These work by switching the power to the load on and off. The difference is the rate at which switching takes place.

## Burst Mode

The power is switched on and off relatively frequently, the minimum ‘on’ or ‘off’ time may be only a few milliseconds. There is no maximum.

This is the mode generally preferred by amateur constructors. The switching device is an inexpensive triac that requires only a small heat sink. A low-powered microcontroller is capable of performing the necessary calculations and generating a control signal. The load is switched at the instant the mains voltage passes through zero, so little or no interference is generated. However, the varying load on the supply may cause the supply voltage to rise and fall in time with the load switching, giving rise to flicker. This can be disturbing and must be minimised. Flicker is worst with a weak supply and a large load.

## Phase Control

Switching takes place at mains frequency, the ‘on’ time can vary from zero to the whole mains cycle. The switching device is again, an inexpensive triac. The load always switches off at the point where the mains voltage passes through zero. But the load can be switched **_on_** at any point in the cycle, and the resulting voltage transient can generate harmonics that can cause undesirable heating in motors and generally interfere with a wide range of equipment. Heavy and expensive filters are required to keep the harmonics within acceptable limits, making this approach less popular than the others.

## Pulse Width Modulation

Switching takes place many tens of times each mains cycle. Again, the ‘on’ time can vary from zero to the whole of the switching period.

A pair of high voltage, high current MOSFET or IGBT transistors are the switching elements. Fine control requires very short 'on' and 'off' times. Filters are required to remove switching transients, but because of the higher frequencies involved, they can be made much smaller than those used with the phase controlled mode. Although there is at least one commercial PWM system on the market, _we_ aren't aware of any constructor built systems.

More on phase control & burst mode:

[MK2: Switching High Current Loads using a Triac](../mk2/index.md)

## Should I Make or Buy My Energy Diverter?

The energy diverter can be divided into two sections, the input and the control logic that runs at low voltage, and the power switch that handles the load switching, which runs at mains voltage.

For the low voltage section, the choices are:

1.  an emonTx V2
2.  an emonTx V3 or
3.  an Arduino board with a custom signal-conditioning front-end.

For the mains section, the choices are:

1.  a home-built switch principally comprising a trigger IC, triac and heatsink, or
2.  a commercially produced solid-state relay.

The application of the Arduino Uno and the emonTx V2 and the construction of a home-built switch are described in [Diverting surplus PV Power, by Robin Emley](../mk2/index). Robin is able to supply a range of items, from various special items, to a complete kit of parts. [[MK2PVRouter.co.uk](http://MK2PVRouter.co.uk/)]

A slightly different power switch is described by Martin Roberts here: [Diverting surplus PV Power: PLL](../pll/index.md)

Both of the power switches are suitable for use with an emonTx V2 or Arduino Uno. For the emonTx V3 using the ac adapter as the power supply, the circuit below must be used due to the limited current available from the rectifier circuit (note the use of the more sensitive MOC3043M and the increased value of the series resistor). For this reason, operation of the emonTx V3.4 with the RFM69CW radio module is not guaranteed.

![Power switch for emonTx V3](files/Switch_V3_electrical.png)

Care must be taken when choosing a commercial SSR. Apart from the danger of purchasing a sub-standard and potentially dangerous low-cost device from on-line suppliers, care should be taken (especially if you are using an emonTx) to ensure that the SSR can de driven properly by the 3.3 V emonTx output. Problems are less likely if you use an Arduino, as its 5V output will normally drive an SSR without issue.

## Separating the Power Switch from the Control Logic

It will often be necessary, or desirable, to locate the power switch close to the load whilst the control logic is located close to the infeed. A very easy way to do this is to run a twisted pair (e.g. ‘telephone’ or CAT5 cable) between the two locations. A cable run of a few tens of metres should not be a problem.

Alternatively, a remote load can be controlled via radio – already available in the emonTX.

## Multiple Loads

Sometimes there is a requirement to be able to control more than one load. As alluded to above, the emonTx V3 will not be suitable to drive a hard-wired second load if powered by the ac adapter. An external 5 V supply must be provided if more than one power switch is to be driven at the same time. The emonTx V2 and Arduino Uno do not suffer from this restriction. Both emonTx v2 and v3 can use their on-board RFM12B radio to control one or possibly more remote loads.

## Choice of Software

**Control Software**

There are two principal published sources of control software:

1.  MartinR’s Phase Locked Loop:<br>[emonTxSolarControllerTemperaturePLL.zip](files/emonTxSolarControllerTemperaturePLL.zip)
    This sketch controls a single load. Voltage, current, power and frequency are measured continuously. Written for the emonTx v2, with a number of changes to the pin assignments, it will run on the emonTx v3 - see [Part 10 of Solar PV power diversion with emonTx using a PLL, emonGLCD and temperature measurement, by Martin Roberts](../pll/index.md). It should also run on Arduino boards, with the pin assignments changed as necessary.
2.  Robin Emley’s [Mk2 Code variants and associated tools](https://openenergymonitor.org/emon/node/1757). This page lists 20 variants, of which 7 are current. Here is a table that gives a ‘quick reference’ overview.

![Table listing Robin's software](files/robins-variants.png)
