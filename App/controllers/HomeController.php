<?php

namespace App\Controllers;

use Framework\Database;

use Traits\CategoryTrait;

class HomeController {

  protected $db;

  public function __construct() {
    $config = require basePath('config/db.php');
    $this->db = new Database($config);
  }

  use CategoryTrait;

    /**
     * Show latest listings
     * @return void
     */

  public function index() {
    
    $posts = $this->db->query('SELECT * FROM posts LIMIT 8')->fetchAll();

    $categories = $this->getUniqueCategories($this->db);

    loadView('home', [
      'posts' => $posts,
      'categories' => $categories
    ]);
  }

    /**
     * Show post details page
     * @return void
     */

  public function show() {
    
  }
}