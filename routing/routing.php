<?php
require_once 'Router.php';

$router = new Router();

$router->get('/','GalleryController@index');
$router->get('/dodaj-zdjecie','ImagesController@index');
$router->get('/logowanie','UserController@loginPage');
$router->get('/rejestracja','UserController@registerPage');

$router->post('/zapisz-zdjecie','ImagesController@store');
$router->post('/zaloguj','UserController@login');
$router->post('/zarejestruj','UserController@register');


$router->error404('Controller@_404');
