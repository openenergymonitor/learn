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

if (file_exists("view/".$q)) {

    $filename_parts = explode(".",$q);
    $doc_ext = $filename_parts[count($filename_parts)-1];
    
    $content = file_get_contents("view/".$q);
    
    // Parse markdown if page is markdown
    if ($doc_ext=="md") {
        include "lib/Parsedown.php";
        $Parsedown = new Parsedown();
        $content = $Parsedown->text($content);
    }
    
    if ($doc_ext=="png") $format = "png";
    if ($doc_ext=="jpg") $format = "jpg";
    if ($doc_ext=="js") $format = "js";
    if ($doc_ext=="zip") $format = "zip";
}

switch ($format) 
{
    case "html":
        header('Content-Type: text/html');
        if (!isset($_GET['raw'])) {
            print view("theme/theme.php", array("content"=>$content));
        } else {
            print $content;
        }
        break;
    case "text":
        header('Content-Type: text/plain');
        print $content;
        break;
    case "zip":
        header("Content-Type: application/zip");
        print $content;
        break;
    case "js":
        header('Content-Type: application/javascript');
        print $content;
        break;
    case "json":
        header('Content-Type: application/json');
        print json_encode($content);
        break;
    case "png":
        header('Content-Type: image/png');
        print $content;
        break;
    case "jpg":
        header('Content-Type: image/jpeg');
        print $content;
        break;
        
}
