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
require("redirect_map.php");
$path = get_application_path();

if (class_exists('Redis')) {
  $redis = new Redis();
  $connected = $redis->connect("localhost");
} else {
  $redis = false;
}


$q = "home";
if (isset($_GET['q'])) $q = $_GET['q'];
//$q = rtrim($q,"/");

$format = "html";
$doc_ext = "html";
$content = "Sorry page not found :-(";
$redirected = false;
$redirecterror = false;

if (isset($_GET["redirect"])) {
    $redirecturl = $_GET["redirect"];
    if (isset($redirect_map[$redirecturl])) {
        header("Location: ".$redirect_map[$redirecturl]."?redirected=true");
    } else {
        $redirecterror = true;
        $fh = fopen("/var/log/missing-learn-redirects.log","a");
        fwrite($fh,$redirecturl."\n");
        fclose($fh);
    }
}

if (isset($_GET["redirected"])) $redirected = true;

$filename_parts = explode(".",$q);
   
if (count($filename_parts)==1) {
    if (file_exists("view/$q.html")) { $doc_ext = "html"; $q = "$q.html"; }
    if (file_exists("view/$q.md")) { $doc_ext = "md"; $q = "$q.md"; }
} else {
    $doc_ext = $filename_parts[count($filename_parts)-1];
}

if (file_exists("view/".$q)) {
    
    $content = file_get_contents("view/".$q);
    $github_url="https://github.com/openenergymonitor/learn/blob/master/view/".$q;
    if ($q=="sustainable-energy/zcem/integrated.html") $github_url = "https://github.com/trystanlea/zcem";
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
    if ($doc_ext=="gz") $format = "zip";
    if ($doc_ext=="svg") $format = "svg";
    if ($doc_ext=="pdf") $format = "pdf";
    if ($doc_ext=="py") $format = "py";
    if ($doc_ext=="ino") $format = "ino";
}

if ($redis) {
  if ($doc_ext=="html" || $doc_ext=="md") $redis->incr("learn/$q");
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
    case "py":
        header('Content-Type: text/plain');
        print $content;
        break;
    case "ino":
        header('Content-Type: text/plain');
        print $content;
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
    case "svg":
        header('Content-Type: image/svg+xml');
        print $content;
        break;
    case "pdf":
        header('Content-Type: application/pdf');
        print $content;
        break;
}
