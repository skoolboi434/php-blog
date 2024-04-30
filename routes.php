<?php

$router->get('/', 'HomeController@index');
$router->get('/posts', 'PostController@index');
$router->get('/posts/create', 'PostController@create');
$router->get('/posts/{id}', 'PostController@show');
$router->get('/posts/edit/{id}', 'PostController@edit');

$router->post('/posts', 'PostController@store');

$router->put('/posts/{id}', 'PostController@update');

$router->delete('/posts/{id}', 'PostController@destroy');