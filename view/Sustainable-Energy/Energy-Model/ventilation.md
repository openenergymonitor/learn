## Ventilation and infiltration

The second primary cause of heat loss is ventilation and infiltration. The movement of heated air from inside the house into its surroundings and its replacement by cold air from outside.

The rate of air movement is typically measured in air-changes per hour. An air-change is when the full volume of air inside a house is replaced with a new volume of air. This happens suprisingly frequently.

The heat lost is equall to the energy stored in the warm air relative to the external temperature, which can be found with another fundamental physics equation, the equation for specific heat:

    HLOSS = c x m x (TINTERNAL - TEXTERNAL)

Where:

    c = Specific heat of air (1006 J/kg.K)
    m = Mass of air that has moved out of the building per second

(HyperPhysics: [Specific heat](http://hyperphysics.phy-astr.gsu.edu/hbase/hframe.html))

**Example:**

A house that measures 7 meters wide, 7 meters long and 6 meters high encloses a volume of: 294 m3. The house had an average air tightness for a modern house of around 1.5 air changes an hour and the internal temperature is 20C while the external temperaure is 13C.

The first step is to work out the m: the mass of air that has moved out of the building per second. We know the volume of air that has moved and the rate at which the volume moved and so we can calculate the mass from this.

    mass of one air change = volume x air density

There are 1.5 air changes per hour or 1.5 / 3600 air changes per second. The mass of air that has moved per second is therefore:

    m = (air-change / 3600) x volume x air density

The division by density of air and 3600 and also the mutiplication by the specific heat of air is in many models bundled together into one constant to reduce on the calculation steps:

    m x c = air-change x volume x (density x c / 3600)

Where:

    density x c / 3600 = 1.205 x 1005 / 3600 = 0.336

The heat loss from ventilation and infiltration becomes:

    HLOSS = 0.33 x air-change x volume x (TINTERNAL - TEXTERNAL)

This is the form of the equation used in the SAP model. 0.336 has been rounded down to 0.33 in accordance with the SAP value. The density and specific heat figures above come from: [http://www.engineeringtoolbox.com/air-properties-d_156.html](http://www.engineeringtoolbox.com/air-properties-d_156.html)

Entering our example values in the simplifed equation, we get:

    HLOSS = 0.33 x 1.5 x 294 x (20 - 13) = 1018.71 Watts

### Working out air-changes per hour

The hard part in the equation above to work out is of course the air changes per hour of a building. The most accurate way to find it out is to perform an air tightness test of the building. This involves de-pressurising the building with specialist fans attached to an external door.

The SAP model provides a method to estimate the air-change rate in the absence of a measured value. This method takes into account factors from number of chimneys and flues to wind speed and the degree the building is sheltered from the wind.

### Typical air-change per hour values

As a guide Pat Borer and Cindy Harris give the following values in the Whole House Book.

    Old undraught stripped house: 4 air changes per hour
    Average modern house: 1 to 2 air changes per hour
    Very tight, super-insulated house: 0.6 air changes per hour
