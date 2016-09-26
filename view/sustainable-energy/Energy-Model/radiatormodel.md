## Radiator model

### Problem

If a central heating system radiator has a specified heat output of 1430W at a 'Mean Water Temperature' of 70C and an ambient temperature of 20C what is the flow temperature at a heat output of 500W? (assume that the flow rate stays constant)

To calculate the flow temperature from the heat output may seem like the wrong way around. The reason this example is given is that this is the calculation that is being done in the heatpump model.

Example radiator: [Kudox Double Panel Convector 600x800](http://www.screwfix.com/p/kudox-premium-type-22-double-panel-double-convector-radiator-white-600x800/70404)

### Background

The standard test procedure for radiators manufactured in Europe is given by the BS EN442 standard. Under this standard the temperature of the water going to the radiator (the flow temperature) is set to 75C, the room is set to 20C and then the flow rate is adjusted until the return temperature is 65C.

The heat output of the radiator is then given by:

    Heat_output = specific_heat x massflowrate x (T_flow - T_return) 

    Where:

    Heat_output = Heat output from radiator in Watts (J/s)
    specific_heat = Specific heat capacity of fluid (J/kg.K) (Water: 4186J/kg.K)
    massflowrate = Mass flow rate (kg/s)
    T_flow = Temperature of water going in to the radiator (C).
    T_return = Temperature of water going out of the radiator (C).

A flow temperature of 75C and a return temperature of 65C gives a 'Mean Water Temperature' (MWT) of 70C which is the radiator temperature usually given in a radiators product brochure.

The actual mean radiator temperature may not be at mean water temperature as calculated by the average equation below, in reality it depends on the radiator design such as the water flow passage through the radiator. But for our purposes we will assume it is close enough.

The difference between the MWT and the room temperature (Delta_T) of 20C = 50 Kelvin is also often quoted.

    MWT = (T_flow + T_return) / 2

    Delta_T = MWT - T_room

When you reduce the mean water temperature of a radiator its heat output does not reduce linearly. The heat output at a Delta_T of 25K (half the standard test Delta_T of 50K) is less than half of the heat output given at 50K. The heat output given by a radiator at different values of Delta_T is usually determined using a correction factor table:

    Delta_T 	Correction Factor
    20          0.30
    25          0.41
    30 	        0.52
    35 	        0.63
    40 	        0.75
    45 	        0.87
    50 	        1.00

*Correction factor's from [Heatpumps for the home by John Cantor](http://www.heatpumps.co.uk/HeatPumpBook.htm) taken from manufacturer's data. These figures are also consistent with the Worcester Bosch [radiator-sizing-for-heatpumps.pdf](http://openenergymonitor.org/emon/sites/default/files/radiator-sizing-for-heat-pumps.pdf) guide. Correction factor tables can be found by searching for 'radiator correction factors'*

To determine the correction factor at smaller increments of Delta_T the following equation gives a good fit to the above data:

    Correction Factor = (Delta_T / Rated_Delta_T) ^ 1.3

    Heat_output = Rated_Heat_Output x (Delta_T / Rated_Delta_T) ^ 1.3

To calculate the Delta_T at a given heat output we can rearrange this equation to give:

    Delta_T = ((Heat_output / Rated_Heat_Output) ^ 1/1.3 )  x Rated_Delta_T

We can then calculate the mean water temperature as:

    MWT = T_room + Delta_T

**Flow temperature from heat output and flow rate**

The temperature drop across the radiator (for a specific heat output) is dependant on the water flow rate.

    Heat_output = specific_heat x massflowrate x (T_flow - T_return)

rearranging gives:

    (T_flow - T_return) = Heat_output / specific_heat x massflowrate

Half of the difference between flow temperature and return temperature is the amount that the flow temperature is above and that the return temperature is below the mean water temperature.

For a given mean water temperature the flow temperature is therefore:

    T_flow = MWT + Heat_output / (2 x specific_heat x massflowrate)

### Solution

Coming back to the problem outlined above. Here's the solution:

**1) Calculate Delta_T:**

    Delta_T = ((Heat_output / Rated_Heat_Output) ^ 1/1.3 )  x Rated_Delta_T

    Delta_T = ((500W / 1430W) ^ 1/1.3 )  x 50K = 22.3K

**2) Calculate Mean Water Temperature**

    MWT = T_room + Delta_T = 20.0C + 22.3K = 42.3C

**3) Calculate flow rate**

To calculate the flow temperature we need to know the flow rate or mass flow rate (volumetric flow rate x density). In the problem above we assume that the flow rate at 500W output is the same as the flow rate required to give 1430W at a T_flow of 75C and T_return of 65C.

    massflowrate = Heat_output / specific_heat x (T_flow - T_return)
    massflowrate = 1430W / 4186J/kg.K x (75C-65C) = 0.0342 kg/s

**4) Calculate flow temperature**

    T_flow = MWT + Heat_output / (2 x specific_heat x massflowrate)
    T_flow = 42.3C + 500W / (2 x 4186J/kg.K x 0.0342kg/s) = 44.0C

**References**

1. [Heatpumps for the home by John Cantor](http://www.heatpumps.co.uk/HeatPumpBook.htm) - thanks to John Cantor for helping with this guide
2. [http://www.plumbingpages.com/featurepages/CorrectionFactors.cfm](http://www.plumbingpages.com/featurepages/CorrectionFactors.cfm)
3. Worcester Bosch Google cache: [radiator-sizing-for-heatpumps.pdf](http://openenergymonitor.org/emon/sites/default/files/radiator-sizing-for-heat-pumps.pdf)
