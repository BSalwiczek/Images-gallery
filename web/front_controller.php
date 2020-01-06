<?php
//display errors in test mode
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

require '../vendor/autoload.php';

require_once '../routing/routing.php';
require_once 'dispatcher.php';
require_once 'View.php';

// print_r($router->get);

$action_url = $_GET['action'];

$dispatcher = new Dispatcher();

$controller_response = $dispatcher->dispatch($router,$action_url);

if($controller_response instanceof View) //normal request
  $dispatcher->build_response($controller_response);
else //API request
{
  if(is_array($controller_response))
    print(json_encode($controller_response));
  else
    print($controller_response);
}
