<?php
namespace MyApp\Webroot;

use MyApp\dispatcher;

require ("../vendor/autoload.php");
define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
$dispatch = new Dispatcher();
$dispatch->dispatch();
