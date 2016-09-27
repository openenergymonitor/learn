## Dynamic building model

In a standard steady state building energy model heat loss is calculated using the standard physics heat conduction equation, where heat loss is equal to the temperature difference between the external an internal surfaces multiplied by the area and u-value of the element.

    Heat loss = U-value x Area x (Internal temperature – External temperature)

The U-value for uniform materials is given by its thermal conductivity divided by the materials thickness.

A simplified dynamic model can be created by extending this slightly by adding one or more elements that represent thermal mass, representing the heat stored in walls, surfaces, furnishings and air. The illustration below shows a 3-stage thermal resistance and capacitance model which for simple single room spaces can produce a good match to measured data.

![rcsimdiagram.png](files/rcsimdiagram.png)

Example of match between simulated internal temperature data (black) and measured temperature data (red) in a simple single space building:

![dynamicheatingmodel.png](files/dynamicheatingmodel.png)

**Segments:** each segment in the model contains a thermal resistance and thermal capacity represented by a resistor and capacitor in the diagram above.

The change of energy in any of the segments divided by the segments thermal capacity gives you the change in temperature for that segment. The heat flowing between each segment is again calculated using the heat conduction equation above.

    Segment temperature change(K) = segment energy change(J) / segment thermal capacity(J/K)

    Heat flow into s1 from s2 = s2 (W/K)  x (temperature of s2 – temperature of s1)

**Main model steps:**

1. First calculate the net heat flow into each segment given the last reading of temperature and input power.
2. Calculate the temperature change of the segment by the energy gained or lost by the segment (net heat flow) divided by its heat capacity.
3. Calculate the new temperature's of each segment
4. We then repeat, iterating through time.

### Example

The above graph showing measured internal temperature vs simulated internal temperature was the result of a real world test in a small single space building (~ 20m2) of fairly traditional stone construction with 100mm of insulation in the roof but no insulation in the walls or floor, double glazed skylights plus a small single glazed window.

The model parameters that best reproduced the internal temperature where:

                Thermal Conductivity (W/K) 	Thermal Capacity (J/K)
    Segment 1 	100 	                    11000000
    Segment 2 	500 	                    2500000
    Segment 3 	800 	                    600000

These where determined by trial and error and are specific to the building under test. These parameters can be determined by monitoring external and internal room temperatures and electrical power input from a heater and then using the dynamic simulation tool in the openbem emoncms module to find the best fit.

The total thermal conductivity of the building is given by:

    total thermal conductivity = 1 / ((1/segment1) + (1/segment2)+(1/segment3))

The total thermal capacity is the sum of the thermal capacities. Both the total thermal conductivity and total thermal capacity should be derivable via a building fabric analysis of the building which is a good way to cross check the trial and error figures.

**Given an outside temperature of 10C, initial temperature's for each segment of 10C and heat input from a heater at a constant 1000W. Calculate the temperature of each segment after the first and second iteration if the iteration step size is 60s.**

### Solution

**Iteration 1**

In the first iteration the segment temperatures are all the same and so no net heat flow should occur between segments. However segment 3 our innermost segment has received net heat input from the heater which has been on for the iteration timestep.

If the heater is set to 1000W heat input and the timestep is 60s then segment 3 gains 60000J of energy in the first iteration.

We then calculate the temperature increment for the segments. Only the energy in segment 3 has changed. The thermal capacity of segment 3 is 600000J/K and so the temperature increase is 60000/600000 = 0.1K (Kelvin).

Segment 3 after the first iteration therefore is at 10.1C while all other segments are at 10C.

**Iteration 2**

Segment 3 is now 0.1C above segment 2 which means there will be heat flow between them. The heat loss factor between segment 2 and 3 is 800 W/K. The heat flow is therefore 800 W/K * 0.1 C = 80 W

Segment 2 gains 80 W for 60s = +4800J
Segment 3 loses 80 W for 60s = -4800J
Segment 3 is still gaining 1000W from the heater. 60000J and so the net heat gain for segment 3 is 60000 - 4800 = 55200J

The temperature increase for segment 2 is 4800J / 2500000J/K = 0.00192K.
The temperature increase for segment 3 is 55200J / 600000J/K = 0.092K

At the end of the second iteration the temperature of segment 1 is still 10C, segment 2 is now 10.00192C and segment 3 is now 10.192C.

And that's it we just keep iterating going forward in time for as long as we want.

If we now set the model outside temperature to the actual monitored outside temperature from a real time monitoring system and the model heat input to the monitored heat input to the room it should reproduce the internal temperature quite closely (under controlled conditions) as in the graph above.

### Source code example

Simulations like this are easiest ran as computer programs, the model described above can be written as a program in around 15 lines of code:

    heatinput = 1000;
    outside = 10;

    for (i=0; i<iterations; i++)
    {
        time = i * timestep ;
        
        net_heatflow_3 = heatinput - u3*(t3 - t2);
        net_heatflow_2 = u3*(t3 - t2) - u2*(t2 - t1);     
        net_heatflow_1 = u2*(t2 - t1) - u1*(t1 - outside);

        t3 += (net_heatflow_3 * timestep) / k3;
        t2 += (net_heatflow_2 * timestep) / k2;
        t1 += (net_heatflow_1 * timestep) / k1;
    }

k1,2,3 is each segments thermal capacity in J/K. u1,2,3 s each segments thermal conductance in W/K

### Model limitations

The model described above is a relatively simple model its important to understand its applicability and limitations. It works best in small single space buildings which can achieve a fairly even temperature throughout. In buildings with multiple rooms where each room may be heated differently the model would need to be extended to take into account the temperature gradients between rooms and different heat inputs in the rooms.

Large errors can be produced between simulated and actual internal temperature if windows and doors are opened and closed for more than a few seconds during a test period as opening a door will increase the heat loss rate.

The model bundles heat loss through windows, walls, floors, roof, infiltration etc all into a single 1 dimensional heat loss pathway to the external environment. In buildings where window area or infiltration rates are of higher significance the heat loss through the window or via infiltration will likely be much more tightly coupled to the external temperature than heat loss through walls which if they contain thermal mass will respond much slower to changes in external temperature.

The model also bundles all gains into the heatinput variable. Its important to include in the heatinput variable both heating heat input and any electrical power input that may be used by electrical appliances and devices in the room. Of course if non-measured heat input is added to a room such as gas cooking or if electrical heat input used to heat water which is then lost down the drain or the heat is released slowly then this will also produce errors between modelled and measured internal temperature.

The model does not take into account the effect of other environmental factors such as wind speed, rain and moisture, humidity although it can be relatively easily extended to take into account solar gains if a pyrometer is added to monitor real-time solar flux.
