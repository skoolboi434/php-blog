<?php

namespace App\Controllers;

use Framework\Database;

class HomeController {

  protected $db;

  public function __construct() {
    $config = require basePath('config/db.php');
    $this->db = new Database($config);
  }

    /**
     * Show latest listings
     * @return void
     */

  public function index() {
    
    $posts = $this->db->query('SELECT * FROM posts LIMIT 8')->fetchAll();

    loadView('home', [
      'posts' => $posts
    ]);
  }

    /**
     * Show post details page
     * @return void
     */

  public function show() {
    
  }
}