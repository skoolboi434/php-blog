<?php

$config = require basePath('config/db.php');
$db = new Database($config);

$posts = $db->query('SELECT * FROM posts LIMIT 8')->fetchAll();


loadView('home', [
  'posts' => $posts
]);