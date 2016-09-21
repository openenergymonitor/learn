<?php

/*

    All Emoncms code is released under the GNU Affero General Public License.
    See COPYRIGHT.txt and LICENSE.txt.

    ---------------------------------------------------------------------
    Emoncms - open source energy visualisation
    Part of the OpenEnergyMonitor project:
    http://openenergymonitor.org

*/

// no direct access

function get_application_path()
{
    // Default to http protocol
    $proto = "http";

    // Detect if we are running HTTPS or proxied HTTPS
    if (server('HTTPS') == 'on') {
        // Web server is running native HTTPS
        $proto = "https";
    } elseif (server('HTTP_X_FORWARDED_PROTO') == "https") {
        // Web server is running behind a proxy which is running HTTPS
        $proto = "https";
    }

    if( isset( $_SERVER['HTTP_X_FORWARDED_SERVER'] ))
        $path = dirname("$proto://" . server('HTTP_X_FORWARDED_SERVER') . server('SCRIPT_NAME')) . "/";
    else
        $path = dirname("$proto://" . server('HTTP_HOST') . server('SCRIPT_NAME')) . "/";

    return $path;
}

function controller($controller_name)
{
    $output = array('content'=>"#UNDEFINED#");

    if ($controller_name)
    {
        $controller = $controller_name."_controller";
        $controllerScript = "Modules/".$controller_name."/".$controller.".php";
        if (is_file($controllerScript))
        {
            // Load language files for module
            $domain = "messages";
            bindtextdomain($domain, "Modules/".$controller_name."/locale");
            bind_textdomain_codeset($domain, 'UTF-8');
            textdomain($domain);

            require_once $controllerScript;
            $output = $controller();
        }
    }
    return $output;
}

function view($filepath, array $args)
{
    extract($args);
    ob_start();
    include "$filepath";
    $content = ob_get_clean();
    return $content;
}

function get($index)
{
    $val = null;
    if (isset($_GET[$index])) $val = $_GET[$index];
    
    if (get_magic_quotes_gpc()) $val = stripslashes($val);
    return $val;
}

function post($index)
{
    $val = null;
    if (isset($_POST[$index])) $val = $_POST[$index];
    
    if (get_magic_quotes_gpc()) $val = stripslashes($val);
    return $val;
}

function prop($index)
{
    $val = null;
    if (isset($_GET[$index])) $val = $_GET[$index];
    if (isset($_POST[$index])) $val = $_POST[$index];
    
    if (get_magic_quotes_gpc()) $val = stripslashes($val);
    return $val;
}

function server($index)
{
    $val = null;
    if (isset($_SERVER[$index])) $val = $_SERVER[$index];
    return $val;
}
