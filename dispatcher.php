<?php
require_once 'routing/Router.php';
require_once 'controllers/Controller.php';
require_once 'View.php';

class Dispatcher
{
  public function __construct() {
  }

  public function dispatch(Router $router, $url)
  {
    $action = '';
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'GET' && array_key_exists($url, $router->get))
      $action = $router->get[$url];
    else if($method=='POST' && array_key_exists($url, $router->post))
      $action = $router->post[$url];
    if($action == '')
      $action = $router->errors['404'];

    $controller = 'Controller';
    $function = 'index';
    if($pos = strpos($action, '@'))
    {
      $controller = substr($action, 0, $pos);
      $function = substr($action, $pos+1, strlen($action));

    }
    require_once("controllers/{$controller}.php");
    return (new $controller)->$function();
  }

  function build_response(View $view)
  {
    if (strlen($view->redirect) > 0) {
      header("Location: " . $view->redirect);
      exit;
    } else {
      $this->render($view);
    }
  }

  function render($view)
  {
    $data = $view->data;
    if(isset($_SESSION['data']))
    {
      $data = array_merge($data,$_SESSION['data']);
      unset($_SESSION['data']);
    }
    extract($data);
    include_once 'views/' . $view->view_name . '.php';
  }
}
