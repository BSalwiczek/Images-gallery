<?php
require_once 'View.php';
require_once 'models/Model.php';

class ImagesController
{
  public function index()
  {
    return new View('sendImageView',['nav_active'=>1]);
  }

  public function store()
  {
    $response = array('nav_active'=>1,'errors'=>[]);

    //validation
    if(!isset($_POST['title']) || $_POST['title']==='')
      array_push($response['errors'],'No title');
    if(!isset($_POST['author']) || $_POST['author']==='')
      array_push($response['errors'],'No author');
    if(!isset($_FILES['image']) || $_FILES['image']['name'] === '')
      array_push($response['errors'],'No image');
    else
    {
      $img_type = $_FILES['image']['type'];
      $img_size = $_FILES['image']['size'];

      if($img_size > 1000000)
        array_push($response['errors'],'Too big image');

      $allowed_image_extension = array("png","jpg");
      $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
      if(!in_array($file_extension, $allowed_image_extension))
        array_push($response['errors'],'Bad extension');
    }

    if(empty($response['errors']))
    {
      $author = $_POST['author'];
      $title = $_POST['title'];
      $img = $_FILES['image'];

      $img_name = $this->generateImageName($img['name']);
      $target = "storage/images/".$img_name;
      //chown -R www-data folder
      if(move_uploaded_file($img['tmp_name'],$target))
        $response['code'] = 200;
      else
        $response['code'] = 500;

    }else
      $response['code'] = 500;

    $_SESSION['data'] = $response;
    return (new View())->redirect('dodaj-zdjecie');

  }

  private function generateImageName($image_name)
  {
    return time()."_".$image_name;
  }

  private function generateThumbnail()
  {

  }

}
