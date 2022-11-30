# How good is your multimeter?

In order to make accurate measurements that will help when fault-finding, and to calibrate the emonTx, a multimeter is normally used. These range in price from a few pounds to many thousands.

The “headline” accuracy of any meter is usually the best accuracy on one or more of the d.c. voltage ranges. When measuring on other ranges, particularly alternating voltages and currents, the accuracy can be spectacularly different, and it is often necessary to consult the operating manual to determine the accuracy of each individual reading.

Accuracy is normally quoted in terms of a percentage of the quantity being measured plus a number of display digits, for each measuring range. So as well as varying from range to range, the accuracy in percentage terms varies according to the actual value being measured. For example, taking the Mestek DM100C measuring 3.3 V d.c; the scale used is 10 V and the accuracy on that range is quoted as ±(1.5% + 3 digits). Therefore 3.3 V may be converted to 3.3495 or 3.2505 V at the two extremes, this is rounded to 3 decimal places, 3.350 or 3.250 V (the same as the display), and a further 3 digits of uncertainty is added to become the reading on the display. Therefore the display can read 3.353 or 3.247 or anything in between, and the accuracy has become ±1.61%. However, when reading 9 V on the same range, the accuracy (doing the same maths) has improved to ±1.53%.

Here is a table of a selection of multimeters. The meters were chosen because they were generally available in the UK and by mail order, have the ranges required to measure typical voltages and currents to calibrate an emonTx, and each is approximately double the price of the one before it. Prices range from around £30 to about £650 (GBP, in October 2020). All are hand-held multimeters of the kind most hobbyists would purchase. Although clamp ammeters incorporating voltage ranges are available, they tend to have broadly similar performance to a general purpose instrument in the same price range. The table shows the accuracy when measuring some quantities that you might measure around an emonTx. Only the upper limit value is shown, in some cases rounding might make the accuracy asymmetrical.

*Nothing here implies a recommendation, endorsement or criticism of a particular make or model of meter or supplier.*

A multimeter costing less than £70 (if chosen carefully) should calibrate your emonTx or emonPi reading power (W) or apparent power (VA) to within 3%. You would need to spend around ten times that to get to within about 1%.

---

## Safety Rating

All the meters mentioned below, except for the Mestek DM100C, have a safety rating of at least Cat III at 600 V, meaning that they can be used on the mains electricity supply at the consumer unit or fuseboard/distribution board and below.

![](files/meters.png)
