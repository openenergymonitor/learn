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
  "electricity-monitoring"=>"electricity-monitoring",
  "sustainable-energy/energy/introduction"=>"sustainable-energy/introduction.html"
);

if (isset($redirects[$q])) learn_redirect($redirects[$q]);

// If a known page
if (file_exists("view/$q.html") || file_exists("view/$q.md")) {
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

