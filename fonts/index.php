<?php

/*

Source code is released under the GNU Affero General Public License.
See COPYRIGHT.txt and LICENSE.txt.

---------------------------------------------------------------------

Part of the OpenEnergyMonitor project:
http://openenergymonitor.org

*/

error_reporting(E_ALL);
ini_set('display_errors', 'on');
date_default_timezone_set('Europe/London');

require "core.php";
$path = get_application_path();

$q = "home";
if (isset($_GET['q'])) $q = $_GET['q'];

$format = "html";
$themed = true;
$content = "Sorry page not found";

if ($q=="home") {
    $themed = false;
    $content = view("pages/home.php", array());
}

if ($q=="about") {
    $themed = false;
    $content = view("pages/about.php", array());
}

if ($q=="search") {
    $themed = false;
    $content = view("pages/search.php", array());
}

switch ($format)
{
    case "html":
        header('Content-Type: text/html');
        if ($themed) {
            print view("theme/theme.php", array("content"=>$content));
        } else {
            print $content;
        }
        break;
    case "text":
        header('Content-Type: text/plain');
        print $content;
        break;
}
