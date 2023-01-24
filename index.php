<?php
/*

All Emoncms code is released under the GNU Affero General Public License.
See COPYRIGHT.txt and LICENSE.txt.

---------------------------------------------------------------------
Emoncms - open source energy visualisation
Part of the OpenEnergyMonitor project:
http://openenergymonitor.org

*/

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require("redirect_map.php");

$q = "electricity-monitoring";
if (isset($_GET['q'])) { 
    $q = $_GET['q'];
}

if (isset($_GET["redirect"])) {
    $redirecturl = $_GET["redirect"];
    if (isset($redirect_map[$redirecturl])) {
        header("Location: ".$redirect_map[$redirecturl]."?redirected=true");
        die();
    }
}

$q = str_replace(".html","",$q);
$q = str_replace(".md","",$q);

// If a redirected page  
$redirects = array(
  "home"=>"electricity-monitoring",
  "electricity-monitoring"=>"electricity-monitoring",
  
  "sustainable-energy"=>"sustainable-energy/introduction.html",
  "sustainable-energy/introduction"=>"sustainable-energy/introduction.html",
  "sustainable-energy/energy/introduction"=>"sustainable-energy/introduction.html",
  
  "electricity-monitoring/ac-power-theory"=>"electricity-monitoring/ac-power-theory/index.html",
  "electricity-monitoring/arduino-ide"=>"electricity-monitoring/arduino-ide/index.html",
  "electricity-monitoring/ctac"=>"electricity-monitoring/ctac/index.html",
  "electricity-monitoring/ct-sensors"=>"electricity-monitoring/ct-sensors/index.html",
  "electricity-monitoring/networking"=>"electricity-monitoring/networking/index.html",
  "electricity-monitoring/programmers"=>"electricity-monitoring/programmers/index.html",
  "electricity-monitoring/pulse-counting"=>"electricity-monitoring/pulse-counting/index.html",
  "electricity-monitoring/temperature"=>"electricity-monitoring/temperature/index.html",
  "electricity-monitoring/voltage-sensing"=>"electricity-monitoring/voltage-sensing/index.html",
  
  "pv-diversion"=>"pv-diversion",
  "pv-diversion/mk2"=>"pv-diversion/mk2",
  "pv-diversion/mk2/intro"=>"pv-diversion/mk2/index.html",
  "pv-diversion/mk2/modes"=>"pv-diversion/mk2/modes.html",
  "pv-diversion/mk2/pvmeasurement"=>"pv-diversion/mk2/index.html",
  "pv-diversion/mk2/switchdev"=>"pv-diversion/mk2/index.html",
  "pv-diversion/mk2/diversion"=>"pv-diversion/mk2/index.html",
  "pv-diversion/mk2/calibration"=>"pv-diversion/mk2/index.html",
  "pv-diversion/mk2/build"=>"pv-diversion/mk2/index.html#building-a-mk2-pv-router",
  "pv-diversion/mk2/switchdev"=>"pv-diversion/mk2/index.html",
  "pv-diversion/mk2/versions"=>"pv-diversion/mk2/index.html",
  "pv-diversion/mk2/vimeasurement"=>"pv-diversion/mk2/index.html",

  "pv-diversion/pll"=>"pv-diversion/pll/index.html",
  "pv-diversion/pll/adcinterrupts"=>"pv-diversion/pll/index.html",
  "pv-diversion/pll/advantagesoveremonlib"=>"pv-diversion/pll/index.html",
  "pv-diversion/pll/derivatives"=>"pv-diversion/pll/index.html",
  "pv-diversion/pll/features"=>"pv-diversion/pll/index.html",
  "pv-diversion/pll/hardware"=>"pv-diversion/pll/index.html",
  "pv-diversion/pll/implementation"=>"pv-diversion/pll/index.html",
  "pv-diversion/pll/integermaths"=>"pv-diversion/pll/index.html",
  "pv-diversion/pll/operatingprinciple"=>"pv-diversion/pll/index.html",
  "pv-diversion/pll/pll"=>"pv-diversion/pll/index.html",
  "pv-diversion/pll/references"=>"pv-diversion/pll/index.html",
  "pv-diversion/pll/sketchdetail"=>"pv-diversion/pll/index.html",
  "pv-diversion/pll/softwaredesign"=>"pv-diversion/pll/index.html"
);

if (isset($redirects[$q])) learn_redirect($redirects[$q]);

$valid_pages = array(
"electricity-monitoring/ac-power-theory/3-phase-power",
"electricity-monitoring/ac-power-theory/advanced-maths",
"electricity-monitoring/ac-power-theory/arduino-maths",
"electricity-monitoring/ac-power-theory/introduction",
"electricity-monitoring/ac-power-theory/use-in-north-america",
"electricity-monitoring/arduino-ide/macoside",
"electricity-monitoring/arduino-ide/macoslib",
"electricity-monitoring/arduino-ide/ubuntuide",
"electricity-monitoring/arduino-ide/ubuntulib",
"electricity-monitoring/arduino-ide/windows10ide",
"electricity-monitoring/arduino-ide/windows10lib",
"electricity-monitoring/ctac/acac-buffered-voltage-bias",
"electricity-monitoring/ctac/calibration",
"electricity-monitoring/ctac/ct-and-ac-power-adaptor-installation-and-calibration-theory",
"electricity-monitoring/ctac/digital-filters-for-offset-removal",
"electricity-monitoring/ctac/emonlib-calibration-theory",
"electricity-monitoring/ctac/emontx-error-sources",
"electricity-monitoring/ctac/explanation-of-the-phase-correction-algorithm",
"electricity-monitoring/ctac/how-good-is-your-multimeter",
"electricity-monitoring/ctac/how-to-build-an-arduino-energy-monitor",
"electricity-monitoring/ct-sensors/extending-ct-cable",
"electricity-monitoring/ct-sensors/how-to-build-an-arduino-energy-monitor-measuring-current-only",
"electricity-monitoring/ct-sensors/installation",
"electricity-monitoring/ct-sensors/interface-with-arduino",
"electricity-monitoring/ct-sensors/introduction",
"electricity-monitoring/ct-sensors/measurement-implications-of-adc-resolution-at-low-current-values",
"electricity-monitoring/ct-sensors/yhdc-sct006-ct-sensor-report",
"electricity-monitoring/ct-sensors/yhdc-sct-013-000-ct-sensor-report",
"electricity-monitoring/networking/rfm12_69",
"electricity-monitoring/networking/sending-data-between-nodes-rfm",
"electricity-monitoring/networking/which-radio-module",
"electricity-monitoring/programmers/ftdi-programmer",
"electricity-monitoring/programmers/wicked-device",
"electricity-monitoring/pulse-counting/accuracy-and-precision",
"electricity-monitoring/pulse-counting/gas-meter-monitoring",
"electricity-monitoring/pulse-counting/introduction-to-pulse-counting",
"electricity-monitoring/temperature/DS18B20-temperature-sensing",
"electricity-monitoring/temperature/DS18B20-temperature-sensing-2",
"electricity-monitoring/temperature/rtd-temperature-sensing",
"electricity-monitoring/voltage-sensing/acac-component-tolerances",
"electricity-monitoring/voltage-sensing/different-acac-power-adapters",
"electricity-monitoring/voltage-sensing/measuring-voltage-with-an-acac-power-adapter",
"electricity-monitoring/voltage-sensing/report-idealpower-9v-acac-adaptor",
"electricity-monitoring/voltage-sensing/report-mascot-9v-acac-adaptor",
"electricity-monitoring/voltage-sensing/why-cant-i-use-a-single-transformer",
"pv-diversion/background/meters",
"pv-diversion/background/overload-protection-of-mains-electrical-circuits",
"pv-diversion/introduction/choosing-an-energy-diverter",
"pv-diversion/usingmultiplediverters/usingmultiplediverters"
);

// If a known page
if (in_array($q,$valid_pages)) {
    header("Location: https://docs.openenergymonitor.org/$q.html");
    die();
}

// ELSE

echo "<h2>Learn has now moved to <a href='https://docs.openenergymonitor.org/electricity-monitoring/index.html'>OpenEnergyMonitor: Docs</a></h2>";
die();

function learn_redirect($page) {
    header("Location: https://docs.openenergymonitor.org/$page");
    die();
}

