<?php
/*FRONT CONTROLLER*/

//1.Main settings

ini_set('display_errors', 1);
error_reporting(E_ALL);

//include files
echo dirname(__FILE__);
define('ROOT', dirname(__FILE__));

require_once '/components/Router.php';
