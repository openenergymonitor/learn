## Measuring heat flux in and out of a hot water cylinder

The heat input into a solar hot water cylinder is usually measured using a flow meter and two temperature sensors. Flow meters are quite expensive and require plumbing work to install. At OpenEnergyMonitor we're all for non-invasive monitoring methods! So..

Can the heat flux in and out of a hot water cylinder (a fixed volume of water) be approximately calculated by measuring the average temperature change in the cylinder in kelvin per second and then multiplying by the volume of the cylinder and the specific heat of water?

This method may only require two temperature sensors so will be considerably easier and more affordable than installing a flow meter.

I've used an emonTx with two DS18B20 temperature sensors one positioned in the temperature sensor sleeve that is in the bottom half of the cylinder and the other positioned in the temperature sensor sleeve in the top half of the cylinder. The emontx is also monitoring the solar hot water collector temperature, controlling the solar hot water system and monitoring house electric consumption and solar pv electricity generation :)

**Calculating heat flux**

<pre>Heat Flux (Watts J/s) = Specific heat of Water (4186 J/kg/K) x Volume of cylinder (Litres) x temperature change per second (K/s)</pre>

**The result**

The heat flux is the blue plot and average cylinder temperature is the red plot. I have selected a period of time where the immersion heater is on. Feel free to explore the data by using the zoom and pan buttons.

IFRAME MISSING

I'm surprised by how good the initial results seem to be. I know that the immersion heater consumes about 3400W from my electricity monitoring and the heat flow input calculated via the above method gives pretty much the same power input plus or minus a few hundred watts or so. 

**Questions for further development**

What is the minimum number of temperature sensors and what are their optimum positions to give best results? What is the effect of stratification?

Heat loss from a hot water cylinder should be proportional to the temperature differential between the inside and the outside of the cylinder by a constant: Watts of heat loss per kelvin. See [heat conductivity](http://hyperphysics.phy-astr.gsu.edu/hbase/thermo/heatra.html#c2).

Watts of heat loss can be calculated from the temperature reduction per unit time of the average cylinder temperature. If we plot heat loss against average cylinder temperature we should get a linear relationship where the slope of the line of best fit is the heat loss factor, see graph 2 below.

This constant the heat loss factor for a particular cylinder is a useful measure in evaluating the performance of a cylinder.

I wanted to know how much heat would be lost if I leave the immersion heater on all the time at a given temperature and so how much energy our house could save by only putting the immersion heater on specifically when its needed i.e for a bath in the evening.

**The results**

I have selected a period of time here where both hot water and the immersion heater where not used. Leaving only solar hot water heat input and heat loss from the cylinder as the only drivers of the system. The solar hot water coil is in the bottom of the cylinder which heat's the cylinder relatively evenly compared with the immersion heater making it ideal for this test. I have filtered out all positive heat gain so that we can see the heat loss clearly:

<div>IFRAME MISSING

**Conclusion**

The conclusion is that we are saving about 1.6 kWh/d from reduced heat loss (30C temperature difference over 23 hours), which is a good saving from something relatively easy to do. It may be that we are saving more than this from reduced hot water demand in the first place by not having hot water on tap all day but this is another thing to test.

If your monitoring cylinder temperature It would be great to see how these figures compare.

**Download the source code below:**</div>
