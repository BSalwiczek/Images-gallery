<?php
require_once 'View.php';
require_once 'models/Image.php';

class ImagesController
{
  public function index()
  {
    return new View('sendImageView',['nav_active'=>1]);
  }

  public function store()
  {
    $response = array('nav_active'=>1,'errors'=>[]);

    $this->validate($response);
    if(empty($response['errors']))
    {
      $author = $_POST['author'];
      $title = $_POST['title'];
      $watermarkText = $_POST['watermark'];
      $img = $_FILES['image'];

      $img_name = $this->generateImageName($img['name']);
      $target_img = "storage/images/".$img_name;
      $target_watermarked = "storage/images/watermarked/".$img_name;
      $target_thumbnail = "storage/images/thumbnail/".$img_name;

      $extension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
      $this->watermarkImage($extension, $img['tmp_name'], $target_watermarked, $watermarkText);
      $this->generateThumbnail($extension, $img['tmp_name'], $target_thumbnail);

      if(move_uploaded_file($img['tmp_name'],$target_img)) //chown -R www-data folder
      {
        $private = False;
        if(isset($_SESSION['username']) && isset($_POST['privacy']))
        {
          if($_POST['privacy'] == 'private')
            $private = True;
        }
        $image = new Image($img_name, $title, $author,$private);
        $image->save();
        $response['code'] = 200;
      }
      else
        $response['code'] = 500;
    }else
      $response['code'] = 500;

    $_SESSION['data'] = $response;
    return (new View())->redirect('dodaj-zdjecie');

  }

  private function validate(&$response)
  {
    if(!isset($_POST['title']) || $_POST['title']==='')
      array_push($response['errors'],'No title');
    if(!isset($_POST['author']) || $_POST['author']==='')
      array_push($response['errors'],'No author');
    if(!isset($_POST['watermark']) || $_POST['watermark']==='')
      array_push($response['errors'],'No watermark');
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

    if(isset($_SESSION['username']) && !isset($_POST['privacy']))
      array_push($response['errors'],'No privacy');

  }

  private function generateImageName($image_name)
  {
    return time()."_".$image_name;
  }

  private function generateThumbnail($extension, $img, $target)
  {
    ($extension == 'jpg') ? $image = imagecreatefromjpeg($img) : $image = imagecreatefrompng($img);

    $image = imagescale($image, 200, 115);

    ($extension == 'jpg') ? imagejpeg($image, $target) : imagepng($image, $target);

    imagedestroy($image);

  }
  private function watermarkImage($extension, $img, $target, $txt)
  {
    ($extension == 'jpg') ? $image = imagecreatefromjpeg($img) : $image = imagecreatefrompng($img);

    $black = imagecolorallocatealpha($image, 255, 255, 255,100);
    $font = "web/fonts/Roboto.ttf";

    $width = imagesx($image);
    $height = imagesy($image);

    $text_size = imagettfbbox($width/9, 0, $font, $txt);
    $text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
    $text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);

    $centerX = CEIL(($width - $text_width) / 2);
    $centerX = $centerX<0 ? 0 : $centerX;
    $centerY = CEIL(($height - $text_height) / 2);
    $centerY = $centerY<0 ? 0 : $centerY;

    imagettftext($image, $width/9, 5, $centerX, $centerY, $black, $font, $txt);

    ($extension == 'jpg') ? imagejpeg($image, $target) : imagepng($image, $target);

    imagedestroy($image);

  }

}
