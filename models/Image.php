<?php
require_once 'DB.php';
class Image
{
  public $url;
  public $title;
  public $author;
  public $private;
  public $collection;

  public function __construct($url = '',$title = '', $author='', $private = False)
  {
    $this->url = $url;
    $this->title = $title;
    $this->author = $author;
    $this->private = $private;

    $collection = get_db()->images;
  }

  public function save()
  {
    get_db()->images->insertOne([
      'url' =>$this->url,
      'title'=>$this->title,
      'author'=>$this->author,
      'private'=>$this->private
    ]);
  }

  public static function get_all()
  {
    return get_db()->images->find();
  }

  public static function get_images_where($query)
  {
    return get_db()->images->find($query);
  }

  public static function get_images_count($query)
  {
    return get_db()->images->count($query);
  }

  public static function get_paginate($page_size, $page_num, $query)
  {
    $skips = $page_size * ($page_num - 1);
    $options = [
        "sort"=>array("_id" => -1 ),
        "limit" => $page_size,
        "skip" => $skips
    ];
    $images = get_db()->images->find([], $options);

    return $images;
  }
}



// mongo wai -u 'wai_web' -p 'w@i_w3b'
