<?php
require_once 'Router.php';

$router = new Router();

$router->get('/','GalleryController@index');
$router->get('/dodaj-zdjecie','ImagesController@index');
$router->post('/zapisz-zdjecie','ImagesController@store');

$router->error404('Controller@_404');
