<?php

namespace App\Controllers;

use Framework\Session;
use Framework\Database;
use Framework\Validation;
use Framework\Authorization;
use PDO;

use Traits\CategoryTrait;

class PostController {

  protected $db;

  use CategoryTrait;
  

  public function __construct() {
    $config = require basePath('config/db.php');
    $this->db = new Database($config);
  }

  public function index($params) {
    $categories = $this->getUniqueCategories($this->db);
    
    // Fetch all posts as associative arrays
    $posts = $this->db->query('SELECT * FROM posts ORDER BY createdAt DESC')->fetchAll();

    loadView('posts/index', [
      'posts' => $posts,
      'categories' => $categories,
    ]);
  }

    /**
     * Load the create post view
     * @return void
     */

  public function create() {
    loadView('posts/create');
  }

    /**
     * Show post details page
     * @param mixed $params
     * @return void
     */

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

  /**
   * Store post data in DB
   * @return void
   */

  public function store() {
    $allowedFields = [
      'title',
      'content',
      'image',
      'category',
    ];

    $newPostData = array_intersect_key($_POST, array_flip($allowedFields));

    $newPostData = array_map('sanitize', $newPostData);

    $newPostData['userId'] = Session::get('user')['userId'];

    $requiredFields = [
      'title',
      'content',
      'category',
    ];

    $errors = [];

    // Validate and process the uploaded image
    if (!empty($_FILES['image']['tmp_name'])) {
      $uploadDir = __DIR__ . '/../../public/uploads/';
      $uploadPath = '/uploads/' . basename($_FILES['image']['name']);

      // Ensure the target directory exists, create it if not
      if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
      }

      // Check if the file is an image
      $imageFileType = strtolower(pathinfo($uploadPath, PATHINFO_EXTENSION));
      if (!getimagesize($_FILES['image']['tmp_name'])) {
        $errors['image'] = 'Uploaded file is not an image.';
      }

      // Check file size (adjust max size as needed)
      elseif ($_FILES['image']['size'] > 5000000) {
        $errors['image'] = 'File is too large. Max size is 5MB.';
      }

      // Check if the file type is allowed
      elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        $errors['image'] = 'Only JPG, JPEG, PNG, and GIF files are allowed.';
      }

      // Move the uploaded file to the specified directory
      elseif (empty($errors)) {
        $uploadedFileName = basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $uploadedFileName)) {
          $newPostData['image'] = $uploadedFileName;
        } else {
          $errors['image'] = 'Failed to upload image.';
        }
      }

    }

    foreach ($requiredFields as $field) {
      if (empty($newPostData[$field]) || !Validation::string($newPostData[$field])) {
        $errors[$field] = ucfirst($field) . ' is required';
      }
      
    }

    if(!empty($errors)) {
      // Reload view with errors
      loadView('posts/create', ['errors' => $errors, 'post' => $newPostData]);
    } else {
      // Submit Data

      $fields = [];

      foreach ($newPostData as $field => $value) {
        $fields[] = $field;
      }

      $fields = implode(', ', $fields);

      $values = [];

      foreach ($newPostData as $field => $value) {
        // Convert empty strings to null
        if (empty($newPostData[$field])) {
          $newPostData[$field] = null;
        }

        $values[] = ':' . $field;
      }

      $values = implode(', ', $values);

      $query = "INSERT INTO posts ({$fields}) VALUES ({$values})";

      $this->db->query($query, $newPostData);

      Session::setFlashMessage('success_message', 'Post created successfully.');

      redirect("/posts");
    }
  }

    /**
     * Delete a post
     * @param array $params
     * @return void
     */

  public function destroy($params) {
    $id = $params['id'];

    $params = [
      'id' => $id
    ];

    $post = $this->db->query('SELECT * FROM posts WHERE id = :id', $params)->fetch();

    // Check if post exists
    if(!$post) {
      ErrorController::notFound('Post not found');
      return;
    }

    // Authorization
    if(!Authorization::isOwner($post->userId)) {
      
      Session::setFlashMessage('error_message', 'You are not authorized to delete this post.');
      return redirect('/posts/' . $post->id);
    }

    $this->db->query('DELETE FROM posts WHERE id = :id', $params);

    // Set flash message
    Session::setFlashMessage('success_message', 'Post deleted successfully.');

    redirect('/posts');
  }

    /**
     * Edit post
     * @param mixed $params
     * @return void
     */

  public function edit($params) {
    

    $id = $params['id'];

    $params = [
      'id' => $id
    ];

    $post = $this->db->query('SELECT * FROM posts WHERE id = :id', $params)->fetch();

    // Check if post exists
    if(!$post) {
      ErrorController::notFound('Post not found.');
      return;
    }
    if(!Authorization::isOwner($post->userId)) {
      
      Session::setFlashMessage('error_message', 'You are not authorized to edit this post.');
      return redirect('/posts/' . $post->id);
    }

    loadView('posts/edit', [
      'post' => $post
    ]);
  }

    /**
     * Update post
     * @param array $params
     * @return void
     */

  public function update($params) {
    $id = $params['id'];

    $params = [
      'id' => $id
    ];

    $post = $this->db->query('SELECT * FROM posts WHERE id = :id', $params)->fetch();

    if(!$post) {
      ErrorController::notFound('Post not found');
      return;
    }

    if(!Authorization::isOwner($post->userId)) {
      
      Session::setFlashMessage('error_message', 'You are not authorized to update this post.');
      return redirect('/posts/' . $post->id);
    }

    $allowedFields = [
      'title',
      'content',
      'image',
      'category',
    ];

    $updateValues = [];

    $updateValues = array_intersect_key($_POST, array_flip($allowedFields));

    $updateValues = array_map('sanitize', $updateValues);

    $requiredFields = [
      'title',
      'content',
      'category',
    ];

    $errors = [];

    // Validate and process the uploaded image
     if (!empty($_FILES['image']['tmp_name'])) {
      $uploadDir = __DIR__ . '/../../Public/uploads/';
      $uploadPath = '/uploads/' . basename($_FILES['image']['name']);

      // Ensure the target directory exists, create it if not
      if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
      }

      // Check if the file is an image
      $imageFileType = strtolower(pathinfo($uploadPath, PATHINFO_EXTENSION));
      if (!getimagesize($_FILES['image']['tmp_name'])) {
        $errors['image'] = 'Uploaded file is not an image.';
      }

      // Check file size (adjust max size as needed)
      elseif ($_FILES['image']['size'] > 5000000) {
        $errors['image'] = 'File is too large. Max size is 5MB.';
      }

      // Check if the file type is allowed
      elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        $errors['image'] = 'Only JPG, JPEG, PNG, and GIF files are allowed.';
      }

      // Move the uploaded file to the specified directory
      elseif (empty($errors)) {
        $uploadedFileName = basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $uploadedFileName)) {
          $updateValues['image'] = $uploadedFileName;
        } else {
          $errors['image'] = 'Failed to upload image.';
        }
      }

    }

    foreach ($requiredFields as $field) {
      if (empty($updateValues[$field]) || !Validation::string($updateValues[$field])) {
        $errors[$field] = ucfirst($field) . ' is required';
      }
    }

    if (!empty($errors)) {
      loadView('posts/edit', [
        'post' => $post,
        'errors' => $errors
      ]);
      exit;
    } else {
      // Submit to DB
      $updateFields = [];

      foreach (array_keys($updateValues) as $field) {
        $updateFields[] = "{$field} = :{$field}";
      }

      $updateFields = implode(", ", $updateFields);

      $updateQuery = "UPDATE posts SET $updateFields WHERE id = :id";

      $updateValues['id'] = $id;

      $this->db->query($updateQuery, $updateValues);

      Session::setFlashMessage('success_message', 'Post updated successfully.');

      redirect('/posts/' . $id);

  }
  }

  
}