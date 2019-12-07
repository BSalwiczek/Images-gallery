<?php
require_once 'View.php';
require_once 'models/Image.php';

class GalleryController
{
  public function index()
  {
    $current_page = 1;
    $images_on_page = 20;
    $images_count = Image::get_images_count();
    $all_pages = ceil($images_count/$images_on_page);
    if(isset($_GET['page']) && intval($_GET['page'])<=$all_pages && intval($_GET['page'])>0){
      $current_page = $_GET['page'];
    }

    $images = Image::get_paginate($images_on_page,$current_page);
    return new View('galleryView',
    ['nav_active'=>0,'images'=>$images,
    'pagination'=>[
      'current_page'=>$current_page,
      'all_pages'=>$all_pages
    ]]);
  }
}
