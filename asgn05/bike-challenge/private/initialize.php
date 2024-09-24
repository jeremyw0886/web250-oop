<?php
ob_start(); // turn on output buffering

// Define file paths
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

// Define URL paths
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

require_once('functions.php');

// Load class definitions
foreach(glob('classes/*.class.php') as $file) {
    require_once($file);
}

// Autoload class definitions
function myAutoLoad($class) {
    if(preg_match('/\A\w+\Z/', $class)) {
        include('classes/' . $class . '.class.php');
    }
}
spl_autoload_register('myAutoLoad');
?>
