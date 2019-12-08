<?php
require_once 'Router.php';

$router = new Router();

$router->get('/','GalleryController@index');
$router->get('/dodaj-zdjecie','ImagesController@index');
$router->get('/logowanie','UserController@loginPage');
$router->get('/rejestracja','UserController@registerPage');
$router->get('/wyloguj','UserController@logout');
$router->get('/polubione-zdjecia','FavouritesController@index');
$router->get('/wyszukiwarka','SearcherController@index');


$router->post('/zapisz-zdjecie','ImagesController@store');
$router->post('/zapisz-polubione','FavouritesController@saveChecked');
$router->post('/usun-polubione','FavouritesController@removeChecked');
$router->post('/zaloguj','UserController@login');
$router->post('/zarejestruj','UserController@register');
$router->post('/wyszukaj','SearcherController@search');


$router->error404('Controller@_404');
