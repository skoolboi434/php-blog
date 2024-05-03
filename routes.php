<?php

$router->get('/', 'HomeController@index');
$router->get('/posts', 'PostController@index');
$router->get('/posts/create', 'PostController@create', ['auth']);
$router->get('/posts/{id}', 'PostController@show');
$router->get('/posts/edit/{id}', 'PostController@edit', ['auth']);
$router->get('/posts/search', 'PostController@search');

$router->post('/posts', 'PostController@store', ['auth']);

$router->put('/posts/{id}', 'PostController@update', ['auth']);

$router->delete('/posts/{id}', 'PostController@destroy', ['auth']);

// User Routes

$router->get('/auth/register', 'UserController@create', ['guest']);
$router->get('/auth/login', 'UserController@login', ['guest']);

$router->post('/auth/register', 'UserController@store', ['guest']);
$router->post('/auth/login', 'UserController@authenticate', ['guest']);
$router->post('/auth/logout', 'UserController@logout', ['auth']);