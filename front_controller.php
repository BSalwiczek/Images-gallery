<?php
//display errors in test mode
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

require 'vendor/autoload.php';

require_once 'routing/routing.php';
require_once 'dispatcher.php';

// print_r($router->get);

$action_url = $_GET['action'];

$dispatcher = new Dispatcher();

$view = $dispatcher->dispatch($router,$action_url);

$dispatcher->build_response($view);
