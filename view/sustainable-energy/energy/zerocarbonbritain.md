## Learning from the ZeroCarbonBritain Energy Model

By: Trystan Lea

The ZeroCarbonBritain energy model is a 10-year hourly energy model developed by the ZeroCarbonBritain team at the Centre for Alternative Technology. The model underpins their wider zero carbon scenario showing how demand for transport, heat and traditional electricity can be met from a variable renewable supply and biomass based backup system.

The model includes 10 year hourly offshore wind, onshore wind, solar, wave & tidal datasets, these are derived from hourly weather data mapped to relevant offshore and onshore regions. These datasets are normalised and can be multiplied by an installed capacity in order to provide an expected output for a given installed capacity.

On the demand side the model builds up a detailed picture covering everything from lighting, appliances, cooking, water heating, space heating, electric, hydrogen, biofuel vehicles to industrial process demand. A multitude of different short term storage technologies are included from heat and battery stores to pump-storage. Longer term backup is provided with gas turbines run on sabatier enhanced biogas combining hydrogen from excess renewable electricity with the CO2 present in biogas to produce larger quantities of methane.

Energy is provided in the form of electricity, hydrogen, liquid biofuel and methane gas to meet the variety of demand types.

The report is available for free download and underlying hourly energy model is open source: **[ZeroCarbonBritain Reports](https://www.cat.org.uk/info-resources/zero-carbon-britain/)**

**ZeroCarbonBritain Methodology**

Useful technical background covering many different aspects of the ZeroCarbonBritain scenario can be found in the methodology papers, including assumptions around space heating demand reduction, changes in travel distances and how the renewable supply datasets were constructed for offshore & onshore wind, solar and other sources.

[ZeroCarbonBritain Methodology document 2019](https://www.cat.org.uk/download/35608/)

ZeroCarbonBritain is perhaps one of the most thoroughly worked out scenarios for the UK, looking right across the system from electricity supply to land use, with the assumptions and workings transparent and open for scrutiny. I would recommend however to first read Sustainable Energy without the hot air by David MacKay which provides a good framework for understanding energy scenarios, in particular how to do the maths in order to ensure scenarios add up.

#### November 2014: OpenEnergyMonitor and ZeroCarbonBritain Collaboration

In late 2014 I had a meeting to discuss household retrofit modelling software with Philip James, a researcher on the ZeroCarbonBritain project. I wanted to understand in more detail how zero carbon energy systems can work; how demand can be met from a variable renewable supply, and the role of storage and demand response. We were also working with the Carbon Coop on the MyHomeEnergyPlanner open source retrofit software project and they were planning a smart grid project exploring these themes. We were also using the monitoring ourselves to try and shift consumption to times of high solar output.

Philip mentioned that he had recently been converting the ZeroCarbonBritain spreadsheet into a java model and gave a demo of it in action with beautiful graphs showing energy balances over the 10 year model period. He was happy to share the model and made it open source on github here:

- [https://github.com/philJam/energymodel](https://github.com/philJam/energymodel)

In the following weeks I helped convert the java model into a javascript web model while trying my best to get to grips with how the model worked. We worked back and forth for a while developing three variants - covering most of the full ZeroCarbonBritain model. These initial attempts are still available to explore here:

- [http://zerocarbonbritain.org/energy_model/other](http://zerocarbonbritain.org/energy_model/other)
- [CAT Blog: Zero Carbon Britain and OpenEnergyMonitor collaborate on open source energy model](http://blog.cat.org.uk/2015/02/17/zero-carbon-britain-and-openenergymonitor-collaborate-on-open-source-energy-model/)

#### June 2015: Building up the model in steps

Having completed an initial port of most of the ZeroCarbonBritain model I realised that having put everything together at the same time I had missed some of the understanding of how the constituent parts add up to the bigger picture and so in order to try and get to a better understanding I went about breaking the model down and then building it up part by part, writing up the process as a energy model guide. The result of which were published as a web tool which is now integrated in the zero carbon energy model section of this site and also a series of blogs:

- [1. June 10, 2015: Modelling hourly demand and supply for renewable powered domestic electricity,<br>heating with heatpumps and electric vehicles](https://blog.openenergymonitor.org/2015/06/modelling-hourly-demand-and-supply-for/)
- [2. June 11, 2015: Variable Supply](https://blog.openenergymonitor.org/2015/06/hourly-energy-model-example-1-variable/)
- [3. June 12, 2015: Variable supply and flat demand](https://blog.openenergymonitor.org/2015/06/hourly-energy-model-example-2-variable/)
- [4. June 14, 2015: Variable supply and traditional electricity demand](https://blog.openenergymonitor.org/2015/06/hourly-energy-model-example-3-variable/)
- [5. June 18, 2015: Complementarity of different renewable generating technologies](https://blog.openenergymonitor.org/2015/06/hourly-energy-model-example-4/)
- [6. June 22, 2015: Simple space heating model with heatpump's powered by renewable energy](https://blog.openenergymonitor.org/2015/06/hourly-energy-model-example-5-simple/)
- [7. July 2, 2015: Electric vehicles and a renewable energy supply](https://blog.openenergymonitor.org/2015/07/hourly-energy-model-example-5-electric/)
- [8. July 4, 2015: Combining traditional electric, heating and electric vehicle demand.](https://blog.openenergymonitor.org/2015/07/open-source-hourly-zero-carbon-energy/)
- [9. August 2, 2015: Understanding zero carbon energy systems: Energy storage (part 1)](https://blog.openenergymonitor.org/2015/08/understanding-zero-carbon-energy/)

#### September 2016: Completing the household energy model

The step by step guide developed in 2015 got as far as integrating most of the key electrification technologies but did not get as far as replicating the wider ZeroCarbonBritain model including key parts such as 'power to gas' biogas+sabatier backup, household related aviation demand and options to include a mix of heating system and personal transportation technologies and fuels.

The latest version of the zero carbon energy model now integrates these parts and includes finer grained inputs that relate more clearly to sources of household energy demand.

It also brings with it the ability to scale the output by a given number of households to produce energy scenarios at different scales. Rather than only being able to see outputs in TWh and GWh at a fixed national scale its possible to see the output at different scales from a single households share of a large wind turbine to the size of and number of wind turbines or solar farm/s required by a village, town or city.

The model can be explored in full here:

- [**8. Household full energy model**](../zcem/integrated.html#fullhousehold)

#### November 2019: Full ZeroCarbonBritain model published

During 2018 and 2019 I worked with the ZeroCarbonBritain team to update the numbers in their most recent report and as part of this completed the conversion of their full hourly energy model into an online tool:

Full ZeroCarbonBritain hourly energy modelling tool (Includes industry and services):<br>
**https://openenergymonitor.org/zcem/#fullzcb3**

Open source repository for hourly model:<br>
**https://github.com/zerocarbonbritain/hourlymodel**

#### Using the energy model to explore different scenarios

ZeroCarbonBritain is only one of several possible zero carbon scenarios. It is largely a wind and solar scenario with a high degree of heat and transport electrification.

There are of course a lot of different views on what mix of technologies should be used with divergent views on heatpumps, hydrogen vs EV's, nuclear, biomass, wind, solar, degree of building fabric improvement possible and on and on. Perhaps the final results will be a mix of all of these to different degrees.

Examples of different scenario variations:<br>
**https://openenergymonitor.org/zcem/#scenario_variations**

Community scenario guide:<br>
**https://openenergymonitor.org/zcem/#community_scenario**


<script>
  $("table").wrap("<div style='overflow-x:scroll;'></div>");
</script>
