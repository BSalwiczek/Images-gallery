<?php
require_once 'View.php';

class GalleryController
{
  public function index()
  {
    return new View('galleryView',['nav_active'=>0]);
  }
}
