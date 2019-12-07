<?php
require_once 'View.php';

class Controller
{
  public function _404()
  {
    return new View('error404View',['nav_active'=> -1]);
  }
}
