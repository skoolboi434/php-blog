<?php 

$router->get('/', 'App/controllers/home.php');
$router->get('/posts', 'App/controllers/posts/index.php');
$router->get('/post', 'App/controllers/posts/show.php');
$router->get('/posts/create', 'App/controllers/posts/create.php');