<?php
require_once "../../vendor/autoload.php";

use \Logger\GeneralLogger;

var_dump(class_exists("\Composer\Autoload\ClassLoader"));

$logger = new GeneralLogger("txt", 'test2');
$logger->log(['123123', '12412', true, -2], "TEST");
////
//