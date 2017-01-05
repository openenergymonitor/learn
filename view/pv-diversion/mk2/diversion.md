## Diverting surplus PV Power, by Robin Emley

#### 3: Diversion and Use of surplus PV

Various schemes for storing surplus energy are possible, including the charging of batteries. For most users, however, the most practical use for any surplus PV energy is to heat their Domestic Hot Water using an immersion heater. [This arrangement is not directly suitable for households where hot-water is supplied by an instant boiler, such as a “combi”. In such cases, some other means of making effective use of surplus PV energy would need to be devised.]

A typical immersion heater is rated at 3 kW. Surplus PV will be generally be less than this, so it is necessary for the dump load to be on for only some of the time. With power being rationed in this way, the water in the tank will still get hot but at a proportionately slower rate.

To consume a variable amount of surplus PV energy, power to the dump load needs to be cycled on and off as necessary in order to maintain an accurate balance between import and export. When power is cycled in this way, the effect on the supply meter needs to be considered.

All supply meters allow a certain range within which energy can flow freely in either direction. The extent of this range is typically 1 Wh or 3600 Joules. Providing that the net flow of energy into or out of the premises never exceeds this value, there will be no charge to the user nor will any surplus energy be lost. We call this the “sweet zone”, and the capacity of the energy bucket in all Mk2 PV Router systems to date has been set to 3600 J to match. Any system that diverts power needs to be able to operate reliably within this zone, and in order to do this, power to the dump load needs to be switched on and off at precisely defined times. The switching device that is normally used for this is a triac.

![Diagram illustrating how energy is diverted](/emon/sites/default/files/energyflow.png)

#### Further reading

[Building Blocks - Energy Meters](/emon/buildingblocks/meters)

[<< 2: Detection and Measurement of surplus PV](pvmeasurement)

[4: Switching High Current Loads using a Triac >>](switchdev)
