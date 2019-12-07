<?php
require_once 'models/DB.php';

class User
{
  public $email;
  public $login;
  public $password;

  public function __construct($email = '',$login = '', $password)
  {
    $this->email = $email;
    $this->login = $login;
    $this->password = $password;

    $collection = get_db()->users;
  }

  public static function checkIfLoginExists($login)
  {
    return get_db()->users->count(['login'=>$login]);
  }

  public static function getUserByLogin($login)
  {
    return get_db()->users->findOne(['login'=>$login]);
  }

  public static function get_all()
  {
    return get_db()->users->find();
  }

  public function save()
  {
    get_db()->users->insertOne([
      'email' =>$this->email,
      'login'=>$this->login,
      'password'=>$this->password,
    ]);
  }
}
