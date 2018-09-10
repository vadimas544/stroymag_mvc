<?php

define('DS', DIRECTORY_SERARATOR);
define('ROOT', dirname(dirname(__FILE__)));

$uri = $_SERVER['REQUEST_URI'];
print_r($uri);