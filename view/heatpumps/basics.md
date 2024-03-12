# Basics

## Mass flow rate heat transfer

    heat transfer (W) = specific heat (J/kg.K) x flow rate (kg/s) x DT (K)

Where:

    DT = Difference in temperature between flow and return

**Example calculation 1: Heat output of a heat pump from measured flow rate and flow and return temperature<br>(e.g heat metering).**

The flow rate is 15 Litres/minute, the flow temperature is 35°C and return temperature 30°C. The system fluid is plain water with a specific heat of 4200 J/kg.K. What is the heat output from the heat pump?

1\. Convert 15 Litres/minute into kg/s by dividing by 60 seconds giving 0.25 kg/s.

2\. Calculate DT, the difference in temperature between flow and return, 35°C - 30°C = 5 Kelvin (K).

2\. Plug the numbers into the mass flow rate heat transfer equation:

    heat output (W) = specific heat (J/kg.K) x flow rate (kg/s) x DT (K)
    heat output (W) = 4200 J/kg.K x 0.25 kg/s x 5K = 5250 W
    
The heat output from the heat pump at this particular moment in time is 5.25 kW.


**Example calculation 2: Required flow rate for a given heat pump heat output and design DT**

We are designing a heat pump system with a maximum output of 8.5 kW, the system fluid is plain water with a specific heat of 4200 J/kg.K and we are targetting a DT of 5K. What is the required flow rate to transfer this heat.

Rearranging the mass flow rate heat transfer equation to give flow rate:

    flow rate (kg/s) = heat output (W) / (specific heat (J/kg.K) x DT (K))
                     = 8500 W / (4200 J/kg.K x 5K) = 0.4 kg/s
                     
Multiply by 60s to get Liters/minute: `0.4 kg/s x 60s = 24 L/min.`<br>
Multiply by 3600s / 1000 L/m3 to get m3/hr: `0.4 kg/s x 3600s / 1000 kg/m3 = 1.44 m3/hr`

**Useful links**

- [Calculators by John Cantor](https://heatpumps.co.uk/calculators)
- [Heating Simulator by John Cantor](https://heatpumps.co.uk/heating-simulator-for-radiators/)

## Carnot COP equation

The expected efficiency of a heat pump can be estimated using the carnot COP equation. The correlation between monitored COP with full electric and heat metering and the results from using the carnot COP equation can be suprisingly close.

Results will be more accurate when the heatpump is nearer steady sate conditions as it does not take into account startup and heatup times of the heatump and dhw system or heatpump defrost cycles. Other factors are also important such as the heat pump compressors efficiency curve.

1\. Calculate the refrigerant condensing temperature (hot side) as the flow temperature plus an 2K (approximate difference)

    T_condensing = T_flow + 2K

2\. Calculate the refrigerant evaporating temperature (cold side) as the external temperature minus 6K (approximate difference)
    
    T_evaporating = T_ambient - 6K

3\. Calculate the Carnot COP

    Carnot_COP = (T_condensing + 273) / ((T_condensing+273) – (T_evaporating + 273))

Where T_condensing and T_evaporating are in degrees Celsius. The +273 converts Celsius to Kelvin.

4\. Calculate the practical COP

    Practical_COP = 0.5 x  Carnot_COP (a real-life heat pump achieves about 50% its 'ideal' efficiency)
    
The correction factor of 0.5 will vary from heat pump to heat pump depending on the efficiency of each thermodynamic process going on inside the heatpump.

**Example calculation 1:** What COP might we expect from a heat pump during typical UK January temperatures when the flow temperature is 35°C?

    T_condensing = T_flow + 2K = 35°C + 2K = 37°C
    T_evaporating = T_ambient - 6K = 6°C - 6K = 0°C
    Carnot_COP = (T_condensing + 273) / ((T_condensing+273) – (T_evaporating + 273))
               = (37°C+273K) / ((37°C+273K) - (0°C+273K)) = 8.4
    Practical_COP = 0.5 x  Carnot_COP = 0.5 x 8.4 = 4.2
    
The carnot COP equation suggests with our practical efficiency and offset assumptions that we might expect a COP of 4.2 from our heat pump.

**Example calculation 2:** What COP might we expect from a heat pump during typical UK January temperatures when the flow temperature is 45°C?

    T_condensing = T_flow + 2K = 45°C + 2K = 47°C
    T_evaporating = T_ambient - 6K = 6°C - 6K = 0°C
    Carnot_COP = (T_condensing + 273) / ((T_condensing+273) – (T_evaporating + 273))
               = (47°C+273K) / ((47°C+273K) - (0°C+273K)) = 6.8
    Practical_COP = 0.5 x  Carnot_COP = 0.5 x 6.8 = 3.4
    
We can see that by increasing the flow temperature from 35°C to 45°C we have dropped our COP from 4.2 to 3.4. If our electricity unit price is 34 p/kWh this makes the difference between heat delivered at 8.1 p/kWh and 10 p/kWh.

**Useful links**

- [COP Estimator by John Cantor](https://heatpumps.co.uk/cop-estimator)

## Radiator output

A standard [1200mm x 600mm K2 radiator](https://www.toolstation.com/kudox-premium-type-22-steel-panel-radiator/p80524) has a rated heat output of 2112W at a difference in temperature between the mean water temperature of the radiator and the room temperature of 50 Kelvin. 

The mean water temperature at this rated output is therefore 70°C. *(The standard test procedure for radiators manufactured in Europe is given by the BS EN442 standard. Under this standard the temperature of the water going to the radiator (the flow temperature) is set to 75C, the room is set to 20C and then the flow rate is adjusted until the return temperature is 65C)*

These temperatures are much higher than those that we would target with a heat pump for efficient low cost operation. 

The carnot COP equation above suggests that a heat pump would only achieve a COP of 2.3 at a flow temperature of 75°C (This would require a high temperature heat pump).

The heat output of a radiator at different water temperatures can be calculated with the following equation:

    Delta_T = Mean water temperature (MWT) - Room temperature

    Heat_output = Rated_Heat_Output x (Delta_T / Rated_Delta_T) ^ 1.3

**Example calculation 1:** We target a flow temperature of 35°C and return temperature of 30°C from our heat pump. This gives a mean water temperature (MWT) of `(35°C+30°C)/2 = 32.5°C`. What is the heat output at this MWT from a 1200mm x 600mm K2 radiator which has a rated heat output of 2112W at DT50?

    Delta_T = Mean water temperature (MWT) - Room temperature
            = 32.5°C - 20°C = 12.5K
    Heat_output = Rated_Heat_Output x (Delta_T / Rated_Delta_T) ^ 1.3
                = 2112W x (12.5K / 50K) ^ 1.3 = 348W
                
Our radiator is now only giving 16% of the rated heat output!

**Example calculation 2:** When we size radiators we need to match the heat output of the radiator/s with the heat requirement for the room it is heating at a design outside temperature and room temperature.

Lets say our room requires 1500W at a design outside temperature of -3°C and a room temperature of 20°C. We set the weather compensation curve for the heat pump to target a flow temperature of 45°C at this minimum design outside temperature. The return temperature is 40°C. How many 1200mm x 600mm K2 radiator's do we need to meet the heat demand of this room?

    Mean water temperature (MWT) = (45°C + 40°C) / 2 = 42.5°C

    Delta_T = Mean water temperature (MWT) - Room temperature
            = 42.5°C - 20°C = 22.5K
    Heat_output = Rated_Heat_Output x (Delta_T / Rated_Delta_T) ^ 1.3
                = 2112W x (22.5K / 50K) ^ 1.3 = 748W
                
Each 1200mm x 600mm K2 radiator would output ~750W at these temperatures, we would therefore require 2x of these radiators to meet the heat requirement.

The carnot COP equation above would suggest a COP of 2.9 at a flow temperature of 45°C and outside temperature of -3°C.

**Example calculation 3:** The weather warms to typical UK January outside temperatures of 6°C, the heat requirement for the room has now reduced to 913W to keep the room at 20°C. What is the flow temperature required in our two radiators to meet this lower heat requirement with a dT of 5K between flow and return?

    Delta_T = (Heat_output / Rated_Heat_Output)^(1/1.3) x Rated_Delta_T
    Delta_T = (913W / (2112W x 2))^(1/1.3) x 50K = 15.4K
    
    Mean water temperature (MWT) = Room temperature + Delta_T
    MWT = 20°C + 15.4K = 35.4°C
    
    flow temperature = MWT + 5K/2 = 37.9°C
    
Using the carnot COP equation we can work out that our COP would therefore increase to 3.9 at typical January temperatures.

**Useful links**

- [Calculators by John Cantor](https://heatpumps.co.uk/calculators)
- [Heating Simulator by John Cantor](https://heatpumps.co.uk/heating-simulator-for-radiators/)

