# Sending Data Between Nodes Using the JeeLib “Classic” Format

The data is sent by radio between the sensor nodes (e.g emonTX, emonTH), the base station (emonPi / emonBase - RFM69Pi). This page describes the way the data is assembled and addressed in order to pass values between units. The same approach could be used when integrating other units with the OpenEnergyMonitor system.

The Arduino & RFM12/69 based OpenEnergyMonitor modules are programmed with application sketches that make use of the [JeeLib library](https://github.com/jcw/jeelib) to handle transmission and reception of the data, using the function calls provided by the library. Appendix 1 contains instructions for configuring the RFM69Pi / RFM12Pi Raspberry Pi module.

RF data is transmitted using the [JeeLib RF Packet format](http://jeelabs.org/2011/06/09/rf12-packet-format-and-design/).

## Configuring & Addressing

All the devices that communicate with each other must use the same frequency. For the Arduino-based devices, this is specified in the software and must be one of the pre-defined constants. It must match the frequency of the hardware. (You should check which frequencies are permitted in your locality. It is possible to operate at the wrong frequency, e.g. 868 MHz hardware at 433 MHz, but the range will be very reduced).

The addressing scheme has two parts, the *Network Group* and *Node ID*. The JeeLib library supports 250 network groups. Only devices that belong to the same group can talk and listen to each other.

Within each network group, there can be up to 31 Node IDs. Nodes 0 and 31 are reserved. Node 0 is used for On-Off Keying (OOK) and node 31 for broadcast messages. Each device must have a unique ID. Appendix 2 lists our standardised Node IDs.

There is another limitation: As all the devices in all the network groups all use the same frequency, only one transmitter may be active at any time, otherwise, data loss is likely to occur. Data packet transmissions are small, collisions are unlikely to occur.

## Setting up the RF link

To set up the link, we use the function

    rf12_initialize(nodeID, freq, networkGroup);

The `nodeID` is set for each device, and transmitted as part of each message, thus, all receivers know where each message originates from.
The `freq` (frequency) must be one of the pre-defined constants mentioned above and listed in the comments in the example sketches.
The `networkGroup` must be the same for all devices in the system — we have standardised on 210.

## Assembling the data

The library accepts a variable length data packet. Maximum length is 66 bytes. For data sent by the emonTx, the most convenient way to organise this is to use the 'structure' feature of the C language. The packet set up declaration looks like this:

    typedef struct {
      int power1, power2, power3, Vrms;
    } PayloadTX;

This statement creates a new type of variable called `PayloadTX`, and is made up of 4 integers called `power1`, `power2`, `power3` and `Vrms`.

## Scaling the data

To keep packet size down and make it easier to interpret the data in emonCMS, we have standardised on signed integer data. You must limit maximum packet size to 66 bytes. This introduces a restriction, but there is an easy work around. If you need to transmit a floating point number, (say the temperature, to a tenth of a degree), then it is multiplied by 10 or 100 first, and at the receiving end divided by 10 or 100 to restore the value. Power is in Watts, so can be sent unchanged, but divided by 1000 if display in kW is desired.
(If you are not using emonCMS, you can put what you like into the structure, but you must still limit the maximum size to 66 bytes. An _integer_ or _word_ is 2 bytes, a _long_, _float_ or _double_ is 4 bytes, a _char_ or _byte_ is one byte. The Arduino IDE Help Reference gives the sizes of all the variable types).

In order to use this new variable type, you need to create an instance of it:

    PayloadTX emontx;

which creates a variable called `emontx` of type `PayloadTX`. The packet **must** be called `emontx` because this name is hard-coded into the file `emontx_lib.ino`.

The important thing to note is this: **you must use the same definition of payload at each end of the link**. The radio link has absolutely no idea of the meaning of the data. What goes in one end, comes out the other. If you use a different definition for the data packet at each end of your link, then unless you really know what you are doing, it is probable your data will be scrambled.

**Warning: Here is an example of how to get it wrong:**

In the emonTx sketch:

    typedef struct {
      int power1, power2, power3, Vrms;
    } PayloadTX;
    PayloadTX emontx;

In the emonGLCD sketch:

    typedef struct {
      int Vrms, power1, power2, power3;
    } PayloadTX;
    PayloadTX emontx;

So although both data packets are called `emontx`, the number you put into `power1` at the emonTx end comes out of `Vrms` at the GLCD end.
(Why? Because those two are **the first 2 bytes** in the data packet).

Or in `emonHub.conf`, assuming the emonTx is Node 6:

```
[[6]]
    nodename = emontx
    [[[rx]]]
       names = Vrms, power1, power2, power3
       datacode = h
       scales = 0.01,1,1,1,1
       units = V,W,W,W,W
```

In this case, power1 will again come out in emonCMS in first place at the top of the Inputs list and called Vrms, but multiplied by 0.01 and with the unit of volts.

## Accessing the data

The data in the structure is accessed with the name of the structure and the name of the member joined by the familiar dot operator, e.g. emontx.power1 You assign a value like this:

    emontx.power1 = realPower;

and extract it:

    totalPower1 +=  emontx.power1;

## Sending the data

When the members of the data packet structure have had values assigned to them, a simple call to the function `send_rf_data( )`, which already knows what data to send, suffices. (This is the how it’s done in the emonTx – it is slightly different for the base sending the time to emonGLCD).

## Receiving the data

Receiving the data is somewhat more complicated. Here is the part of the standard emonGLCD code where the data is actually received:

```
  if (rf12_recvDone())
	{
	  if (rf12_crc == 0 && (rf12_hdr & RF12_HDR_CTL) == 0)
	  {
	    int node_id = (rf12_hdr & 0x1F);
	    if (node_id == TXNODE)
	    {
	      emontx = *(PayloadTX*) rf12_data;
	      last_emontx = millis();
	    }

	    if (node_id == BASENODE)
	    {
	      RTC.adjust(DateTime(2012, 1, 1, rf12_data[1],
	      rf12_data[2], rf12_data[3]));
	      last_emonbase = millis();
	    }
	  }
	}
```


Let us work through the code line by line:

    rf12_recvDone()

checks to see if a packet has been received, returning true if it has, thus the block that follows is executed, otherwise execution continues below this block. (which doesn’t concern us here).

The next line,

    if {rf12_crc ...}

checks that the packet was received without error. That being the case, the `node_ID` is extracted — now we know where the packet came from. If it is one of the two we are interested in (we have already set `BASENODE` and `TXNODE` at the top of the program to the node numbers of our emonBase and emonTx respectively), then we do something with the data. Otherwise, we ignore it.

How we handle the data is different in each case. If it is the time from emonCMS via the emonBase, we use a method slightly different to the one explained above to parcel up the time data. The data is in the format “thms” – the letter t followed by 3 more bytes, the second byte is hours, the third is minutes and the fourth is seconds. Thus, we can pick out the elements from the array `rf12_data[ ]` and put those into the function to set the real-time clock with:

    RTC.adjust(...)

In the case of the power data from the emonTx, we need to use our structure. The way this is done takes a little picking apart. Look at this line:

    emontx = *(PayloadTX*) rf12_data;

`rf12_data` is actually a ‘pointer’. It is the _address_ of the first byte of received data and is waiting to be extracted. It is _not_ the data itself. The ` * ` prefixed to `(PayloadTX*)` means “that which rf12_data points to” and `(PayloadTX*)` is a cast to assure the compiler that, although the data types are different, it‘s OK to interpret it as our structure and to copy the data into our emontx structure.

And so the data becomes available in the format it was transmitted.

**A note about the ‘multinode’ base sketches.**
These sketches listen for all Node_IDs, assume the data is always a sequence of integers, and forward it to emonCMS prefixed with the node number it originated from, without attempting to interpret it. The assignment to the true variables is done by you, the user, when you configure emonCMS.

## SUMMARY

*   All units must use the same *frequency*
*   All units must use the same *networkGroup* number
*   Each unit must have a unique *Node_ID*
*   Each non-multinode receiver must be told the *Node_ID* of each sender it must listen for and decode
*   Each end of a link must use the same data structure (usually a struct or an array) or must be flexible (multi-node)

For a simple example of Arduino > Arduino (or emonTx to emonBase) RFM12B transmission sketch see: [https://github.com/openenergymonitor/RFM12B_Simple](https://github.com/openenergymonitor/RFM12B_Simple)

### Appendix 1 - The RFMPi / RFM69Pi Adapter board

RFMPi / RFM69Pi board adds wireless (433 or 868MHz) RF transceiver capability to the Raspberry Pi. The RFMPi has an on-board ATMega328 microcontroller pre-loaded with firmware to receive and pass the radio payload of the RFM packets from JeeNode and OpenEnergyMonitor modules onto Raspberry Pi’s internal serial UART port. The correct frequency board needs to be purchased to match the rest of your system.

EmonHub then reads the byte data string generated by the RFMPi adapter board from the serial port and decodes it using the decoder specification set in `emonhub.conf`.

See github documentation page for the RFM12Pi / RFM69Pi [https://github.com/openenergymonitor/rfm2pi](https://github.com/openenergymonitor/rfm2pi)

### Appendix 2 - Standard Node IDs

The recommended standard for Node IDs is:

| ID      | Node Type      |
| ------- | -------------- |
| 0	      | Special allocation in JeeLib RFM12 driver reserved for OOK use
| 1 – 5   | Base Station & logging nodes
| 6       | EmonTx Shield
| 7 – 10  | EmonTx (single-phase)
| 11 – 14 | EmonTx (3-phase)
| 15 – 16 | EmonTx (CM)
| 17 – 18 | EmonTx4
| 19 – 26 | EmonTH
| 27 – 30 | unallocated
| 31	    | Special allocation in JeeLib RFM12 driver. Node31 can communicate with nodes on any network group

There is no intention to enforce this as a standard. If you choose your own Node IDs you will need to ensure that you change the example sketches to match your numbering scheme.

### Extending Range

A node can be setup as a packet forwarder to extend the range of a network, see JeeLabs post: [http://jeelabs.org/2011/01/12/relaying-rf12-packets/](http://jeelabs.org/2011/01/12/relaying-rf12-packets/)
