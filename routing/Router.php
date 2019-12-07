<?php

class Router
{
  public $get;
  public $post;
  public $errors;

  public function __construct() {
    $this->get = [];
    $this->post = [];
  }
  public function get($path, $action)
  {
    $this->get[$path] = $action;
  }

  public function post($path, $action)
  {
    $this->post[$path] = $action;
  }

  public function error404($action)
  {
    $this->errors['404'] = $action;
  }
}
