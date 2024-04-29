<?php

namespace App\Controllers;

use Framework\Database;

class PostController {

  protected $db;

  public function __construct() {
    $config = require basePath('config/db.php');
    $this->db = new Database($config);
  }

  public function index() {
    
    $posts = $this->db->query('SELECT * FROM posts')->fetchAll();

    loadView('posts/index', [
      'posts' => $posts
    ]);
  }

  public function create() {
    loadView('posts/create');
  }

  public function show($params) {
    $id = $params['id'] ?? '';

    $params = [
      'id' => $id
    ];

    $post = $this->db->query('SELECT * FROM posts WHERE id = :id', $params)->fetch();

    // Check if post exists
    if(!$post) {
      ErrorController::notFound('Post not found.');
      return;
    }

    loadView('posts/show', [
      'post' => $post
    ]);
  }
}