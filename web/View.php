<?php

class View
{
  public $view_name;
  public $data;
  public $redirect;
  public function __construct($view_name = '', $data = [], $redirect = '')
  {
    $this->view_name = $view_name;
    $this->data = $data;
    $this->redirect = $redirect;
  }

  public function redirect($redirect)
  {
    $this->redirect = $redirect;
    return $this;
  }
}
