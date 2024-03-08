# OpenEnergyMonitor Heat Pump Case Studies and Resources

The following case studies and associated resources discuss what we have learnt so far at OpenEnergyMonitor about heat pump design, installation and resulting real-world performance.

Electric heat pumps are a key technology for the decarbonisation of heating, enabling the efficient conversion of electricity to heat. To unlock the highest efficiencies and lowest energy costs, care needs to be taken to ensure good design, installation and operation.

We are interested in an approach that aims for a tight feedback loop between design, installation and monitored results.

## Case study 1: End-terrace, Samsung Gen6 5kW

End-terrace solid stone house in North Wales with a Samsung Gen6 5kW air source heat pump. This case study is available as a youtube video here:

**YouTube:**  [1. How I fitted an Air Source Heat Pump ASHP: Samsung Gen6 5kW](https://www.youtube.com/watch?v=Hyv_vQEvHgo)

  - 0:00 Introduction
  - 3:25 Testing the system
  - 6:54 Heat loss calculation
  - 8:15 Fitting the heat pump
  - 12:35 Frost protection
  - 14:12 Gas boiler removal
  - 20:00 Hot water tank installation
  - 22:34 Hot water tank update
  - 30:38 Hot water cycle data
  - 32:04 Heat pump performance

At 6:54 Glyn discusses how he did his heat loss calculation using [HeatLoss.js](https://openenergymonitor.org/heatlossjs) an open source tool that we have developed at OpenEnergyMonitor. 

Glyn covers briefly the importance of designing for low flow temperatures (35-40C) when it is -3C outside (design temperature) and the related radiator upgrades that he made to enable running the system at these lower flow temperatures.

Note that Glyn used a particularly low air-change rate for his calculation of 0.3 ACH based on the result from a blower door test. These are far lower than the values given in MCS/CIBSE guidance for pre-2000 properties which are usually around 1.5 ACH for properties of this age (range 1.0-3.0 ACH). 

**YouTube:** [2. Air Source Heat Pump 1st Winter Performance in Solid Stone Welsh Cottage](https://www.youtube.com/watch?v=kkNx2oSO-S4)

- 0:00 Introduction
- 3:29 Winter Test
- 4:45 Monitoring System
- 5:45 Heat Pump Performance
- 7:02 Heat Pump Controller
- 8:49 Day 3 Performance
- 9:54 Running Costs
- 13:04 Water Tank
- 14:16 System Overview
- 15:36 Coldest Day
- 16:44 Average Day
- 19:06 Data Analysis
- 20:35 Conclusion

In the introduction, Glyn addresses the validation of his space heating demand estimate through monitored results, highlighting the discrepancy with EPC estimates that, in his case, doubled the projected space heating demand. 

Glyn discusses the result of his blower door test in more detail at 3:10 which suggests an air change rate as low as 0.3 ACH. The video presents results from the coldest day monitored so far where the average heat input from the heat pump was 3.0 kW. This agrees well with the calculated heat demand of 3.3 kW at -3C obtained using these lower air change rate values.

## Case study 2: 1980s Bungalow, Vaillant Arotherm 5kW

**YouTube:** [Solid Fuel to Vaillant Air Source Heat Pump: 1980s Bungalow](https://www.youtube.com/watch?v=bHsp7fDw_bg)

- 0:00 Introduction
- 0:50 Heat loss calculation using the [heatpunk.co.uk](https://heatpunk.co.uk) tool. This part includes a discussion of:
    - Setting lower air change rates again based on the blower door test results. 
    - Heat pump selection, why Glyn choose a 5kW Vaillant Arotherm.
    - Radiator upgrades in order to run at lower flow temperatures.
- 4:58 Removal of old hot water system
- 6:40 Installation of new cylinder, primary pipework & heat pump. 
- Note anti-freeze valve detail at 10:25 and 11:44.
- 12:05 Radiators
- 16:22 Installation complete
- 16:53 Vaillant controller settings & heating curve (0.5)
- 19:43 Monitoring & performance

## Case study 3: Mid-terrace, Mitsubishi Ecodan 5kW

**YouTube:** [A mid terrace heat pump example](https://www.youtube.com/watch?v=m2-_x0XZUSM)

*Note from Trystan: This video is a bit old now and reflects an earlier point in my learning and experience with heat pumps. The heat loss calculated was in hind sight a significant over-estimate as air change rates from the SAP/CIBSE guidance were used. A blower door test done after this video and actual monitored heat loss data suggests that the actual air change rate is closer to 0.4-0.7 ACH. The decision to try a non-thermostatic mixer was definitely going over board and Im now more than happy with the choice of the standard cylinder with large surface area coil rather than alternatives such as a thermal store.*

- 0:00 Introduction
- 2:50 Performance
- 4:50 Heat loss calculation.
- 7:40 Low temperature radiator design
- 11:55 Hot water cylinder, large surface area coil.
- 13:14 System diagram and cost of materials (2018)
- 14:20 Monitored annual consumption vs SAP assessment
- 15:29 January 2020 data example
- 18:17 Octopus Agile January 2020 cost example

**Blog write-up**

- [Home Energy Assessment using SAPjs](https://trystanlea.org.uk/energyassessment)
- [Original heat loss using MCS calculator](https://trystanlea.org.uk/roombyroomheatloss)
- [Updated heat loss calculation using HeatLoss.js and lower air change rates](https://openenergymonitor.org/heatlossjs)
- [Heat pump performance and home energy 2023](https://trystanlea.org.uk/heatpump2023) (See earlier years for further discussion and results).


