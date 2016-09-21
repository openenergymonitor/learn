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
        
require("core.php");
$path = get_application_path();

$q = "";
if (isset($_GET['q'])) $q = $_GET['q'];
//$q = rtrim($q,"/");

$format = "html";
$content = "Sorry page not found";

$format = "html";
if (file_exists("view/".$q)) {
    $content = view("view/".$q,array());
}

if ($content=="Sorry page not found" && !$session) {
    $format = "html";
    $content = view("view/login.php",array());
}

switch ($format) 
{
    case "html":
        header('Content-Type: text/html');
        print view("theme/theme.php", array("content"=>$content));
        break;
    case "text":
        header('Content-Type: text/plain');
        print $content;
        break;
    case "json":
        header('Content-Type: application/json');
        print json_encode($content);
        break;
}
