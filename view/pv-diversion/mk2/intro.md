## Diverting surplus PV Power, by Robin Emley

### 1: Introduction, and “Power” v. “Energy”

This describes practice in the UK. Practice in other places may vary.

During the last couple of years, PV panels have appeared all over the country. The main incentive for having PV installed is the government's Feed-In Tariff (FIT) whereby a direct payment is made to the owner for every unit of energy (kilowatt Hour, or kWh) that is produced.  Despite its name, the FIT scheme actually applies not only to PV systems that are linked (or “grid-tied”) to the local mains but also to off-grid installations.

Having generated some energy from PV, that energy is freely available for use on the premises. If the energy cannot be used immediately, it flows backwards through the supply meter and out into the local grid. This process is known as “exporting”.

The FIT scheme makes two types of payments to PV owners. Firstly, there is a generous payment for every kWh of energy that is generated. A second, much smaller, payment is made in respect of energy that is exported to the grid.  (Off-grid installations receive the generation payment but not the export payment).

Most domestic installations do not have an “export” meter. For these premises, an assumption is made that 50% of the generated energy will be used on-site, and 50% will be exported. The “export” tariff is therefore paid on exactly half of the energy that has been generated during the period of interest.

For any premises with grid-tied PV, the first call on any generated power is the base-load of the house. This is the power that’s consumed by mains appliances such as fridges, central heating, burglar alarm, phone-chargers etc. As more PV power becomes available, correspondingly less is taken from the mains.

On a good day, when the supply of PV is greater than the base-load demand, surplus power has to go somewhere. Unless an additional load is immediately made available within the premises, that “surplus” power will flow back into the grid as export. For the majority of users, whose FIT payments are not dependent on the actual amount of energy exported, it makes little sense to allow surplus energy to slip away to the grid if it could be beneficially used on-site.

Having explained the nature of “surplus PV”, and why it makes sense for this electricity to be retained on-site, the next stage is to detect when surplus power becomes available, and to then divert it to some suitable appliance. An appliance whose sole purpose is to consume surplus power is often known as a “dump load”.

One approach for detecting and diverting single-phase surplus power is my Mk2 PV Router. This project has been released in various forms, along with associated tools and supporting information including video footage. A summary of all my Mk2 PV Router material is available at [https://openenergymonitor.org/emon/node/1757](https://openenergymonitor.org/emon/node/1757). Various items on that list have been used to illustrate this document.

### Power and Energy

The terms “power” and “energy” are often inter-changed in everyday speech but their meanings are very different. Before going any further, I think it is important to point out the difference.

When thinking about a journey, it is clear to everyone that “distance” and “speed” are not the same. After a few moments thought, most people will agree that:
Distance (in miles) = Average Speed (in miles/hour) × Time_of_Journey (in hours).

In the world of electricity, “energy” is related to “power” in the same way. So: Energy (in kWh) = Power (in kW) × Time_TheApplianceWasOn (in hours).

If a 2 kW heater (its power rating) were to be switched on for a period of 1 Hour (time), then 2 kWh (of energy) would be consumed. Similarly, if a PV installation were to generate electricity at a constant rate of 1 kW (power), and this situation were to be maintained for a period of 2 Hours (time), then 2 kWh (of energy) would have have been generated.

[In the latter example, the PV owner would most likely receive 2 units of “generation” FIT, and 1 unit of “export” FIT, regardless of how their PV-generated electricity had actually been used.]

In the same way that “Speed is the rate at which Distance is covered”, i.e. miles per hour, so “Power is the rate at which Energy is consumed or generated” i.e. kWh per hour, or just kW. In the material which follows about the measurement of mains electricity, it is often helpful to think of power as the rate at which energy flows.

**Further reading**

[Wikipedia article - Feed-in tariff](https://en.wikipedia.org/wiki/Feed-in_tariff)
