<?php
require_once 'View.php';
require_once 'models/Image.php';

class SearcherController
{
  public function index()
  {
    return new View('searcherView',['nav_active'=>5]);
  }

  public function search()
  {
    if (isset($_POST['search_text']) && !empty($_POST['search_text']))
    {
      $input = $_POST['search_text'];
      $images = Image::get_images_where(["title"=> new \MongoDB\BSON\Regex($input,'i'),"private"=>False]);
      $imgs_arr = iterator_to_array($images);
      return $imgs_arr;

    }else{
      return 0;
    }
  }
}
