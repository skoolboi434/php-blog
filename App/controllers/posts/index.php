<?php

$config = require basePath('config/db.php');
$db = new Database($config);

$posts = $db->query('SELECT * FROM posts')->fetchAll();


loadView('posts/index', [
  'posts' => $posts
]);