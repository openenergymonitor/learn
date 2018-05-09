<?php

$redirect_map = array( 

// AC Power Theory
"ac-power-introduction"=>"electricity-monitoring/ac-power-theory/introduction",
"ac-power-arduino-maths"=>"electricity-monitoring/ac-power-theory/arduino-maths",
"ac-power-advanced-maths"=>"electricity-monitoring/ac-power-theory/advanced-maths",
"3-phase-power"=>"electricity-monitoring/ac-power-theory/3-phase-power",
"EmonTx-in-North-America"=>"electricity-monitoring/ac-power-theory/use-in-north-america",

// CT Sensors
"ct-sensors-introduction"=>"electricity-monitoring/ct-sensors/introduction",
"ct-sensors-interface"=>"electricity-monitoring/ct-sensors/interface-with-arduino",
"report-yhdc-sct-013-000-current-transformer"=>"electricity-monitoring/ct-sensors/yhdc-ct-sensor-report",
"electricity-monitoring/ct-sensors/yhdc-ct-sensor-report"=>"electricity-monitoring/ct-sensors/yhdc-sct-013-000-ct-sensor-report",
"measurement-implications-of-adc-resolution-at-low-current-values"=>"electricity-monitoring/ct-sensors/measurement-implications-of-adc-resolution-at-low-current-values",

// Voltage sensing
"measuring-voltage-with-an-acac-power-adapter"=>"electricity-monitoring/voltage-sensing/measuring-voltage-with-an-acac-power-adapter",
"different-acac-power-adapters"=>"electricity-monitoring/voltage-sensing/different-acac-power-adapters",
"report-mascot-9v-acac-adaptor"=>"electricity-monitoring/voltage-sensing/report-mascot-9v-acac-adaptor",
"report-idealpower-9v-acac-adaptor"=>"electricity-monitoring/voltage-sensing/report-idealpower-9v-acac-adaptor",
"how-to-build-an-arduino-energy-monitor-measuring-current-only"=>"electricity-monitoring/ct-sensors/how-to-build-an-arduino-energy-monitor-measuring-current-only",
"how-to-build-an-arduino-energy-monitor-measuring-current-only?page=1"=>"electricity-monitoring/ct-sensors/how-to-build-an-arduino-energy-monitor-measuring-current-only?page=1",
"how-to-build-an-arduino-energy-monitor-measuring-current-only?page=2"=>"electricity-monitoring/ct-sensors/how-to-build-an-arduino-energy-monitor-measuring-current-only?page=2",
"how-to-build-an-arduino-energy-monitor-measuring-current-only?page=3"=>"electricity-monitoring/ct-sensors/how-to-build-an-arduino-energy-monitor-measuring-current-only?page=3",
"how-to-build-an-arduino-energy-monitor-measuring-current-only?page=4"=>"electricity-monitoring/ct-sensors/how-to-build-an-arduino-energy-monitor-measuring-current-only?page=4",
"how-to-build-an-arduino-energy-monitor-measuring-current-only?page=5"=>"electricity-monitoring/ct-sensors/how-to-build-an-arduino-energy-monitor-measuring-current-only?page=5",
"how-to-build-an-arduino-energy-monitor-measuring-current-only?page=6"=>"electricity-monitoring/ct-sensors/how-to-build-an-arduino-energy-monitor-measuring-current-only?page=6",
"how-to-build-an-arduino-energy-monitor-measuring-current-only?page=7"=>"electricity-monitoring/ct-sensors/how-to-build-an-arduino-energy-monitor-measuring-current-only?page=7",
// Voltage and current
"calibration"=>"electricity-monitoring/ctac/calibration",
"ct-and-ac-power-adaptor-installation-and-calibration-theory"=>"electricity-monitoring/ctac/ct-and-ac-power-adaptor-installation-and-calibration-theory",
"explanation-of-the-phase-correction-algorithm"=>"electricity-monitoring/ctac/explanation-of-the-phase-correction-algorithm",
"emontx-error-sources"=>"electricity-monitoring/ctac/emontx-error-sources",
"how-good-is-your-multimeter"=>"electricity-monitoring/ctac/how-good-is-your-multimeter",
"how-to-build-an-arduino-energy-monitor"=>"electricity-monitoring/ctac/how-to-build-an-arduino-energy-monitor",
"digital-filters-for-offset-removal"=>"electricity-monitoring/ctac/digital-filters-for-offset-removal",

// Pulse counting
"introduction-to-pulse-counting"=>"electricity-monitoring/pulse-counting/introduction-to-pulse-counting",
"interrupt-based-pulse-counter"=>"electricity-monitoring/pulse-counting/interrupt-based-pulse-counter",
"pulse-counting-sleep"=>"electricity-monitoring/pulse-counting/interrupt-based-pulse-counter-sleep",
"12-input-pulse-counting"=>"electricity-monitoring/pulse-counting/12-input-pulse-counting",
"gas-meter-monitoring"=>"electricity-monitoring/pulse-counting/gas-meter-monitoring",

// Temperature
"DS18B20-temperature-sensing"=>"electricity-monitoring/temperature/DS18B20-temperature-sensing",
"DS18B20-temperature-sensing-2"=>"electricity-monitoring/temperature/DS18B20-temperature-sensing-2",
"rtd-temperature-sensing"=>"electricity-monitoring/temperature/rtd-temperature-sensing",

// PV Diversion
"meters"=>"pv-diversion/background/meters",
"overload-protection-of-mains-electrical-circuits"=>"pv-diversion/background/overload-protection-of-mains-electrical-circuits",

// RF Radio
"which-radio-module"=>"electricity-monitoring/networking/which-radio-module",
"rfm12b-wireless"=>"electricity-monitoring/networking/rfm12_69",
"rfm12b2"=>"electricity-monitoring/networking/sending-data-between-nodes-rfm",
"rfm69cw"=>"electricity-monitoring/networking/rfm12_69",

// Other software
"sma-webbox-data-extractor"=>"electricity-monitoring/other-software/sma-webbox-data-extractor",

// Could be removed...
"arduino-sketch-current-only"=>"electricity-monitoring/ct-sensors/how-to-build-an-arduino-energy-monitor-measuring-current-only",

"arduino-sketch-voltage-and-current"=>"electricity-monitoring/ctac/how-to-build-an-arduino-energy-monitor",

"mk2/intro"=>"pv-diversion/mk2/intro",
"mk2/pvmeasurement"=>"pv-diversion/mk2/pvmeasurement",
"mk2/diversion"=>"pv-diversion/mk2/diversion",
"mk2/switchdev"=>"pv-diversion/mk2/switchdev",
"mk2/modes"=>"pv-diversion/mk2/modes",
"mk2/vimeasurement"=>"pv-diversion/mk2/vimeasurement",
"mk2/calibration"=>"pv-diversion/mk2/calibration",
"mk2/build"=>"pv-diversion/mk2/build",
"mk2/versions"=>"pv-diversion/mk2/versions",

"pll/features"=>"pv-diversion/pll/features",
"pll/softwaredesign"=>"pv-diversion/pll/softwaredesign",
"pll/operatingprinciple"=>"pv-diversion/pll/operatingprinciple",
"pll/adcinterrupts"=>"pv-diversion/pll/adcinterrupts",
"pll/integermaths"=>"pv-diversion/pll/integermaths",
"pll/advantagesoveremonlib"=>"pv-diversion/pll/advantagesoveremonlib",
"pll/implementation"=>"pv-diversion/pll/implementation",
"pll/sketchdetail"=>"pv-diversion/pll/sketchdetail",
"pll/hardware"=>"pv-diversion/pll/hardware",
"pll/derivatives"=>"pv-diversion/pll/derivatives",
"pll/references"=>"pv-diversion/pll/references"

// "installing-arduino-libraries"=>"",
// "appliance-inference"=>"",
// "interfacing-with-sma-sunnyboy-pv-inverters-bluetooth"=>"",
// "xbee-link"=>"",
// "simple-rf-link"=>"",
// "master-slave-arduino-networking"=>"",
// "wifi"=>"",
// "7-segment-display"=>"",
// "nokia-3310-lcd"=>"",
// "usb-data-logger"=>"",
// "sd-card-logging"=>"",
// "mains-ac-relay-module"=>"",

);
