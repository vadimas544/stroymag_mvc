<?php
/*FRONT CONTROLLER*/

//1.Main settings

ini_set('display_errors', 1);
error_reporting(E_ALL);

//include files
//echo dirname(__FILE__);
define('ROOT', dirname(__FILE__));

require_once (ROOT.'/components/Router.php');


//Connect to BD

//Call Router

$router = new Router();
$router->run();