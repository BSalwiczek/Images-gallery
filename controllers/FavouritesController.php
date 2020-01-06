<?php
require_once 'View.php';
require_once '../models/Image.php';


class FavouritesController
{
  public function index()
  {
    $query = array('_id'=> array('$in' => array()));

    if(isset($_SESSION['favourites']))
    {
      foreach($_SESSION['favourites'] as $value)
      {
        array_push($query['_id']['$in'],new MongoDB\BSON\ObjectID($value));
      }
    }
    $images = Image::get_images_where($query);
    $imgs_arr = iterator_to_array($images);

    return new View('favouritesView',['nav_active'=>4,'images'=>$imgs_arr]);
  }

  public function saveChecked()
  {
    // unset($_SESSION['favourites']);
    foreach($_POST as $key => $value)
    {
      if(!isset($_SESSION['favourites']))
      {
        $_SESSION['favourites'] = array();
      }

      if(!in_array($key,$_SESSION['favourites']))
        array_push($_SESSION['favourites'], $key);
    }
    return (new View)->redirect('/');
  }

  public function removeChecked()
  {
    // print_r($_SESSION);
    if(isset($_SESSION['favourites']))
    {
      foreach($_POST as $key => $value)
      {
        $index = array_search($key,$_SESSION['favourites']);
        if($index>=0)
          unset($_SESSION['favourites'][$index]);
      }
      if(empty($_SESSION['favourites']))
        unset($_SESSION['favourites']);
    }
    return (new View)->redirect('/polubione-zdjecia');
  }
}
