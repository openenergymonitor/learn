<div style="background-color:#eee; padding:10px; border: 1px solid #aaa; margin-bottom:20px" ><b>Draft:</b> This piece is part of a new series on zero carbon industrial processes and is currently an initial draft.</div>

## Sabatier process

The sabatier process will likely be a key process in the zero carbon energy system allowing for the production of methane from carbon dioxide and hydrogen, where hydrogen is produced from zero carbon energy, e.g at times where wind and solar exceed demand.

The ZeroCarbonBritain scenario uses the sabatier process to increase the methane content of biogas created using anaerobic digestion from around 65% to near 100%. Using the 35% carbon dioxide content of biogas and utilising excess wind and solar energy to generate hydrogen.

Methane is easier to store in large quantities than hydrogen and can be stored at a scale sufficient to cover inter-seasonal differences in supply and demand. The ZeroCarbonBritain scenario uses methane produced via sabatier enhanced anaerobic digestion to fuel high efficiency gas turbines to cover electricity demand where wind and solar are not sufficient.

The Sabatier Reaction was discovered in 1912 by French chemist Paul Sabatier  and involves the reaction of hydrogen with carbon dioxide at elevated temperatures  (300-400C) and pressures in the presence of a catalyst (e.g: Nickel, ruthenium or alumina) to produce methane and water [1]. 

The reaction is described by the following exothermic reaction:

    CO2 + 4H2 → CH4 + 2H2O       ∆H = −165.0 kJ/mol
    
(some initial energy/heat is required to start the reaction)

Diving a little deeper, we can work out the relative mass of each component of the reaction by assigning molecular masses:

    44.009g CO2 + 8.064g 4H2 → 16.043g CH4 + 36.03g  2H2O

Hydrogen has an energy density of 33.3 kWh/kg and Methane an energy density of 15.4 kWh/kg and so we can work out the input and output energy of the component masses above:

    8.064g H2 x 33.3 kWh/kg = 0.269 kWh
    16.043g CH4 x 15.4 kWh/kg = 0.247 kWh

Which suggests an efficiency of 92%. HHV LVH?? 83% actual conversion efficiency... if LVH methane energy density is used 14 kWh/kg, conversion loss is close to delta H -165 kj/mol above.

*Biological conversion of CO2 to CH4 can also be achieved with hydrogenotrophic methanogens.* [2]

### Sabatier enhanced Anaerobic Digestion

Anaerobic digestion is currently used to produce biogas from a mixture of different biodegradable feed stocks such as plant and animal wastes or purposely grown energy crops [3]. By volume biogas is primarily methane (CH4): 50-70% and carbon dioxide (CO2): 30-50% with a mixture of other substances in smaller portions. The high concentration of carbon dioxide in biogas makes it suitable for upgrading with the sabatier reaction, providing the option to increase the methane content from 50-70% up to near 100%.

**Example calculation**

The density of methane at 20C and 1 atm (NTP) is 0.668 kg/m3 [4] and so the weight of the methane content in 1m3 of biogas at 65% methane content is 0.65 x  0.668 = 0.4342 kg. The energy content is therefore  0.4342 kg x 15.4 kWh/kg = 6.7 kWh.

The density of carbon dioxide at 20C and 1 atm (NTP) is 1.842 kg/m3 [4] and so the weight of the carbon dioxide content in 1m3 of biogas at 35% content is 0.35 x  1.842 = 0.645 kg.

Going back to the sabatier reaction equation above we can work out the amount of hydrogen required for combination with the available CO2 in our m3 of biogas and the resulting methane quantity produced.

The ratio between 44.009g CO2 from our reaction equation and 0.645 kg is 14.6, we therefore need 8.064g x 14.6 = 118g of hydrogen to react with the available CO2 in a m3 of biogas. We can also calculate the methane produced as 16.043g x 14.6 = 235g.

Adding the methane produced via the sabatier reaction to the existing methane present in the biogas we get 0.669 kg which is what we would expect from 1m3 of pure methane. The total energy is now 0.669 kg x 15.4 kWh/kg = 10.3 kWh.

118g of hydrogen has an energy content of 33.3 kWh/kg x 0.118 kg = 3.9 kWh. Using a high efficiency electrolyzer 3.9 kWh of hydrogen would require 3.9 kWh / 84% = 4.6 kWh of input electricity. We can therefore upgrade our 6.7 kWh/m3 of biogas to 10.3 kWh/m3 of methane if we have 4.6 kWh of surplus renewable electricity.

The conversion of biomass to biogas is about 60% efficient and so our 6.7 kWh of biogas required 11.2 kWh worth of input wet biomass to create.

The full biomass + hydrogen to methane energy equation therefore works out to being:

    11.2 kWh of biomass + 3.9 kWh of hydrogen = 10.3 kWh of methane

Which is near enough to the energy conversion equation used in the ZeroCarbonBritain model:

    2.0 kWh rotational grasses + 1.0 kWh of hydrogen  = 2.0 kWh of methane

Equivalent via calculation above:

    2.0 kWh rotational grasses + 0.7 kWh of hydrogen  = 1.8 kWh of methane

### Case study: Lemvig Biogas MeGa-stoRE

The Lemvig Biogas MeGa-stoRE project is technical proof of concept of adding sabatier based biogas upgrading to an existing biogas plant in Denmark [5]. The Lemvig Biogas plant is the largest in Denmark. Slurry from about 75 farms and other waste and residual products from industrial production are used to generate heat and power [6].

The following diagram from the MeGa-stoRE project report provides an overview of the material and energy flows in the pilot plant, showing the sabatier methanisation reactor and hydrogen production from renewable electricity:

![sabatierAD.png](files/sabatierAD.png)

We can read from this diagram that ‘for every hour’ 1713 m3 of biogas is produced with an energy content of 12.3 MWh. The energy content reflects the methane content which is 1114 m3. 

*Cross check: Using our value for the density of methane above 0.668 kg/m3 and energy density 15.4 kWh/kg suggests 11.5 MWh which suggests a difference in methane pressure and temperature.*

The diagram shows 600 m3 of CO2 being combined with 2400 m3 of hydrogen to produce 600m3 of methane via the sabatier process and in energy terms 8.4 MWh of hydrogen producing 6.6 MWh of methane.

*Cross check: Hydrogen at NTP (20C, 1atm) has a density of 0.0838 kg/m3 [7] and so 2400 m3 of hydrogen corresponds to 201 kg. The energy density of hydrogen is 33.3 kWh/kg, multiplied by 201 kg = 6.7 MWh which is a fair bit lower than the 8.4 MWh above?*

Methane as NTP has a density of 0.668 kg/m3 and so 600m3 corresponds to 401 kg, at an energy density 15.4 kWh/kg suggests 6.2 MWh, slightly lower than the 6.6 MWh above.

Assuming a 60% biomass to biogas conversion efficiency and using the figures from the diagram above.

20.5 MWh biomass should produce 12.3 MWh of biogas. This is then combined with 8.4 MWh of hydrogen to produce a total of 18.9 MWh of methane. Scaling these figures for easier comparison with the figures in ZeroCarbonBritain we can see that the result is in close agreement:

    2.0 kWh biomass + 0.82 kWh of hydrogen = 1.84 kWh of methane.

Using the figures from our cross checks. 11.5 MWh of biogas corresponding to 19.2 MWh of biomass, is combined with 6.7 MWh of hydrogen to produce 17.7 MWh of methane. Scaling these figures again for easier comparison with the figures in ZeroCarbonBritain:

    2.0 kWh biomass + 0.70 kWh of hydrogen = 1.84 kWh of methane.

Cross check 2: Using figures from table on page 27

    Volume:	0.65 CH4 + 0.35 CO2 + 1.4 H2	= 0.65 CH4 + 0.35 CH4
    Energy:	7.15 kWh + 0.00 kWh + 5.9 kWh	= 7.15 kWh + 3.85 kWh
    11.9 kWh of biomass + 5.9 kWh of hydrogen = 11 kWh of methane

scaled:

    2.0 kWh of biomass + 1.0 kWh of hydrogen = 1.85 kWh of methane

Difference between HHV and LHV?

- HHV: water vapour is condensed = more heat is recovered
- LHV: water vapour remains as vapour – less heat is recovered

Methane:

- HHV: 55.5 MJ/kg
- LHV: 50.0 MJ/kg

### Direct air capture

An alternative to the use of carbon dioxide present in biogas could be to couple  a sabatier reactor to a carbon dioxide direct air capture plant, pulling carbon dioxide from the air for combination with hydrogen produced from excess renewable energy. A key advantage to this approach could be the potential to avoid the land area requirements of growing crops such as rotational grasses for biogas production, however direct-air-capture has an energy cost associated with it, where every kg of carbon dioxide captured requires 2.5 kWh of 100C heat and 0.5 kWh of electricity:

*Driving the Climeworks process uses 2.5 megawatt hours (MWh) of heat, at around 100C, for each tonne of CO2, along with 0.5MWh of power. This energy requirement is roughly equivalent to the 12GJ/tCO2 estimates set out above, though the firm hopes to shave 40% off this figure, bringing it down to around 7GJ/tCO2. Gebald says an increase in energy resources – he points to wind and solar – would be needed to scale up direct capture.* - https://www.carbonbrief.org/swiss-company-hoping-capture-1-global-co2-emissions-2025

    44.009 g CO2 + 8.064 g H2 → 16.043 g CH4 + 36.03 g  2H2O

H2: 183g (6.1 kWh, 7.3 kWh el)
CH4: 365g (5.6 kWh)

Methane production from direct air capture:

    DAC: 2.5 kWh of 100C heat
    DAC: 0.5 kWh of electric
    7.3 kWh for hydrogen production
    Output: 5.6 kWh of methane.
    Electric input = 7.8 kWh

Recovered heat from sabatier reaction max = 1.2 + 0.5 kWh = 1.7 kWh.
Lets say 1.2 kWh practical meaning a further 1.3 kWh electrical heat required.
Electric input 1.3+7.8 = 9.1 kWh produces 5.6 kWh of methane.
At 50% gas turbine efficiency result is 2.8 kWh of electric an overall 30% efficiency.

### References

[1] https://en.wikipedia.org/wiki/Sabatier_reaction

[2] https://en.wikipedia.org/wiki/Methanogen

[3] https://en.wikipedia.org/wiki/Anaerobic_digestion

[4] http://www.engineeringtoolbox.com/gas-density-d_158.html

[5] http://www.lemvigbiogas.com/MeGa-stoREfinalreport.pdf

[6] http://www.lemvigbiogas.com/GB.htm

[7] https://h2tools.org/tools


