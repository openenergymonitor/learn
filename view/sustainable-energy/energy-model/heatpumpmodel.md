## A very simple heat pump model

This model starts from the heat output that we want the heat pump to provide to our building and works backwards to calculate the electrical power input required to provide this heat output for a given ambient temperature and room temperature.

### Model steps:

**1) Calculate the flow temperature required by the radiators to achieve the desired heat output.**

See [radiator model](http://openenergymonitor.org/emon/node/3011) for full explanation of the following equations:

    Delta_T = ((Heat_output / Rated_Heat_Output) ^ 1/1.3 )  x Rated_Delta_T
    MWT = T_room + Delta_T
    T_flow = MWT + Heat_output / (2 x specific_heat x massflowrate)

**2) Calculate the refrigerant condensing temperature (hot side) as the flow temperature plus an 4K (approximate difference)**

    T_condensing = T_flow + 4K

**3) Calculate the refrigerant evaporating temperature (cold side) as the external temperature minus 6K (approximate difference)**

    T_refrigerant = T_ambient - 6K

(note, the difference may be lower (closer) with quality/expensive units.)

**4) Calculate the Carnot COP**

    Carnot_COP = (T_condensing + 273) / ((T_condensing+273) – (T_evaporating + 273))

Where T_condensing and T_evaporating are in degrees Celsius. The +273 converts Celsius to Kelvin.

**5) Calculate the practical COP**

    Practical_COP = 0.5 x  Carnot_COP (a real-life heat pump achieves about 50% its 'ideal' efficiency)

The correction factor of 0.5 will vary from heat pump to heat pump depending on the efficiency of each thermodynamic process going on inside the heatpump.

**6) Calculate power input**

    Power_input =  Heat_output /  Practical_COP

The model results will be more accurate when the heatpump is nearer steady sate conditions as it does not take into account startup and heatup times of the heatump and dhw system or heatpump defrost cycles. The carnot efficiency equation is used to calculate the ideal COP which is then multiplied by a correction factor to estimate the attainable COP.

The following graph is an example that illustrates that the carnot efficiency equation multiplied by a correction factor can largely reproduce the measured COP under 'normal' operating conditions. The black line is the COP as calculated by the above model and the red line is the COP as measured using an electric meter on the input and heat meter on the output.

**Note**, the above calculates the compressor power, but added to that will be fan and circulation pump power. This can vary considerably. It should be between 5 and 10% of the power input.

For our indicative model this may be sufficient for our requirements.

![calc_cop_vs_measured.png](files/calc_cop_vs_measured.png)

**References**

1. [Heatpumps for the home by John Cantor](http://www.heatpumps.co.uk/HeatPumpBook.htm)
