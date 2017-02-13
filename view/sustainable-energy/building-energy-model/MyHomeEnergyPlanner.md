# MyHomeEnergyPlanner: Getting Started

Low energy building technology: highly insulated, air-tight buildings can deliver space heating energy savings of up to 50-90% while simultaneously increasing our comfort.

[MyHomeEnergyPlanner](http://github.com/emoncms/MyHomeEnergyPlanner) is an open source energy assessment tool to help you explore how you can achieve this level of performance improvement in your own home - developed as a collaboration between OpenEnergyMonitor and CarbonCoop, currently maintained by [Carlos Alonso Gabizon](https://github.com/cagabi) at Carbon Coop.

The model used is based on the 2012 version of SAP (Standard Assessment Procedure for UK EPC's (Energy Performance Certificate's)) developed by the Building Research Establishment for which the full specification can be downloaded from BRE here: [SAP-2012_9-92.pdf](http://www.bre.co.uk/filelibrary/SAP/2012/SAP-2012_9-92.pdf).

#### Example 1: Semi-detached 3 bedroom 1950 ex-council house, Wales, UK.

This guide is work in progress, aiming to provide an example of using MyHomeEnergyPlanner to do a household energy assessment in order to work out the best combination of measures to apply in order to achieve the performance standards suggested in the ZeroCarbonBritian scenario.

The guide currently provides a rough overview of the initial baseline assessment entry stage. There is a lot more to add in order to really get the most out of the tool which will be added in due course.

The next step is to extend it with an example of cross checking the model results with actual current energy use - from meter readings, energy and temperature monitoring.

### Measuring up your home

Start by drawing a floor plan of the house, this could be on paper or using a program such as paint, open office draw or a CAD package. Draw an indication of wall widths and include internal walls.

Measure each wall dimension without initially taking into account the window's and doors, place the dimension on the floor plan. 

Draw the windows and doors on the floor plan and note each windows width and height.

Label each room and note the room height.

Here's an example floor plan, showing wall dimensions, windows and room heights. We will be using this example house throughout this guide.

The example will start with an uninsulated, draughty house with single glazed windows and then explore the energy savings possible through carrying out a retrofit.

![floor plan example](files/floorplan.png)

Start in the top-left corner and work clockwise labelling each external wall with a unique name: E1, E2, E3 etc

Then do the same for the windows.

### Create a MyHomeEnergyPlanner assessment

- Login or create an account in emoncms: [http://myhome.emoncms.org](http://myhome.emoncms.org)
- Create and then open a new assessment, you can give the assessment a name and a description.

### 1. Context: 

Calculate the area of each floor not including internal walls of each floor, enter each floor in the floor section of the calculator.

In our example here there are two floors each 6 meters by 8 meters and 2.5m high:

<img style="border: 2px solid #ddd" src="files/1-context.png">

### 2. Ventilation

A key cause of heat loss is ventilation and infiltration. The movement of heated air from inside the house into its surroundings and its replacement by cold air from outside. The ventilation and infiltration section allows selection of both deliberate ventilation sources and infiltration through the building fabric and other sources of draughts.

<img style="border: 2px solid #ddd" src="files/2-ventilation.png">

### 3. Fabric

The Fabric section is used to enter the dimensions, u-values and other thermal properties of all external and internal walls, floors, the roof and windows of your building. 

#### Walls

Enter each wall in order following the floor plan labelling. In our example the first wall section E1 has a length of 3.85m, a height given by the room height of 2.5m and is an uninsulated cavity wall with a U-value of 1.3 W/K.m2 and K-value of 110 kJ/K.m2. E2 has a length of 1.0m, a height of 2.5m and is a continuation of the uninsulated cavity wall with a U-value of 1.3 W/K.m2 and K-value of 110 kJ/K.m2:

U-values and K-values for several types of common construction can be found in the [Element Library](ElementLibrary.md).

MyHomeEnergyPlanner has built in element libraries. Element types can be selected from these libraries and U-values can be changed as required by editing the libraries.

<img style="border: 2px solid #ddd" src="files/3-walls.png">

#### Floor and Roof

In the example the ground floor area is 48m2 and is an uninsulated solid floor with a U-value of 0.7 W/K.m2 and a K-value of 75 kJ/K.m2 from the Element Library. 

The Roof is also 48m2 measured as the area of the loft, an is insulated with 100mm of loft insulation resulting in a U-value of 0.4 W/K.m2.

The area's can be used directly in the element list rather than entering a length and height, enter the floor and roof in the same element list as the walls.

<img style="border: 2px solid #ddd" src="files/4-floorloft.png">

#### Windows

The window section requires additional inputs in order to calculate the contribution to heating from solar gains. Its also possible to subtract window area's from particular wall sections. This both simplifies the calculation procedure for wall areas and provides a convenient way of associating a window with a wall for reference.

Enter each window, its width, height, orientation, overshading level and U-value from the Element Library.

**Example:** Window 1 (W1) is 2.5m wide and 1.25m high, it is positioned in external wall E1. It faces North and is averagely shaded.

<img style="border: 2px solid #ddd" src="files/5-windows.png">

Once a window has been entered and the wall that it is to be subtracted from is selected from the dropdown menu the wall list will update with the window area and show the resultant net wall area:

<img style="border: 2px solid #ddd" src="files/6-subtractedwindows.png">

With the ventilation and fabric sections completed the house heat loss graphic should now show all the sources of heat loss and their relative magnitudes:

<img style="border: 2px solid #ddd" src="files/7-heatloss.png">


### 4. Lighting, Appliances & Cooking

Lighting, appliances and cooking all contribute heat gains into a house reducing the amount of additional heat required. It is possible to either use a SAP based calculation as part of this section or a more detailed SAP for lighting and appliance list for appliances and cooking approach. For quick results we will start with the SAP estimates and come back to this section later.

Select the relevant fuel sources if using a mixture of economy 7 and standard tariff electricity or gas and other fuels for cooking.

### 5. Heating

**Hot water demand:** 

The heating section starts with a section on hot water demand. It is possible to either use the SAP based estimate or enter your own figures here in order to achieve a more accurate result.

**Space heating demand:** 

Adjust the living area to cover the area for which the house is kept at the target temperature most of the time. Set the target temperature as close to the temperature achieved during the time heating is on, If your thermostat is well positioned this will likely be near the thermostat temperature.

**Heating systems:** 

Add heating systems as required. Our example house has storage heaters and two wood stoves for space heating and instantaneous electric water heating. The fraction of each system can be entered in the fraction boxes and needs to add up to 1.0.

The bottom of the page provides an overview of end use heating requirements. 

- Hot water energy requirement 1383.95 kWh/year
- Space heating energy requirement 11490.53 kWh/year

### 6. Fuel Requirements

The final page provides an overview of all the different end use energy demands and their fuel sources and gives an opportunity to amend the fuel costs. The total modelled energy cost of our example household comes to £1512.79/year. The overview at the top provides comparative figures for space heating demand, primary energy, CO2 and per person energy use.

Our example house has a space heating demand that is the same as the UK average but a higher primary energy demand due to use of storage electric heaters.

<img style="border: 2px solid #ddd" src="files/overview.png">

### Cross checking with current energy use: meter readings, energy and temperature monitoring

To be written

### Improving the building fabric

To be written

### Changing the heating system

To be written


