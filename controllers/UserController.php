<?php
require_once 'View.php';
require_once 'models/User.php';

class UserController
{
  public function loginPage()
  {
    return new View('loginView',['nav_active'=>2]);
  }

  public function registerPage()
  {
    foreach (User::get_all() as $user)
    {
      print_r($user);
    }
    return new View('registerView',['nav_active'=>3]);
  }

  public function login()
  {
    $response = array('errors'=>[]);
    $this->validateLogin($response);
    if(empty($response['errors']))
    {
      $login = $_POST['login'];
      $password = $_POST['password'];
      $user = User::getUserByLogin($login);
      $hashed_password = $user->password;
      if(password_verify($password, $hashed_password)) {
        // $session_id = session_id();
        $_SESSION['username'] = $login;
      }
    }
    return (new View())->redirect('/');
  }

  public function register()
  {
    $response = array('errors'=>[]);
    $this->validateRegister($response);
    if(empty($response['errors']))
    {
      $email = $_POST['email'];
      $login = $_POST['login'];
      $password = $_POST['password'];
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $user = new User($email, $login, $hashed_password);
      $user->save();

      $response['code'] = 200;
    }else{
      $response['code'] = 500;
    }

    $_SESSION['data'] = $response;

    // return new View('registerView',['nav_active'=>2]);

    return (new View())->redirect('/rejestracja');
  }

  private function validateLogin(&$response)
  {
    if(!isset($_POST['login']) || $_POST['login']==='')
      array_push($response['errors'],'No login');
    if(!isset($_POST['password']) || $_POST['password']==='')
      array_push($response['errors'],'No password');
  }

  private function validateRegister(&$response)
  {
    if(!isset($_POST['email']) || $_POST['email']==='')
      array_push($response['errors'],'No email');
    if(!isset($_POST['login']) || $_POST['login']==='')
      array_push($response['errors'],'No login');
    else{
      if(User::checkIfLoginExists($_POST['login']))
      {
        array_push($response['errors'],'Login exists');
      }
    }
    if(!isset($_POST['password']) || $_POST['password']==='')
      array_push($response['errors'],'No password');
    if(!isset($_POST['password2']) || $_POST['password2']==='')
      array_push($response['errors'],'No password2');
    if(isset($_POST['password']) && isset($_POST['password2']))
    {
      if($_POST['password'] !== $_POST['password2'])
        array_push($response['errors'],'No match');
    }
  }
}
