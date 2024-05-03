<?php
namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;
class UserController
{
  protected $db;
  public function __construct() {
    $config = require basePath('config/db.php');
    $this->db = new Database($config);
  }

  public function create() {
    loadView('/users/create');
  }

  public function login() {
    loadView('/users/login');
  }

  public function store()
  {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['password_confirmation'];

    $errors = [];

    // Validation
    if(!Validation::email($email)){
      $errors['email'] = 'Please enter a valid email address';
    }

    if(!Validation::string($username, 2, 50)){
      $errors['username'] = 'Username must be between 2 and 50 characters';
    }

    if(!Validation::string($password, 6, 50)){
      $errors['password'] = 'Password must be at least 6 characters';
    }

    if(!Validation::match($password, $passwordConfirmation)){
      $errors['password_confirmation'] = 'Passwords do not match';
    }

    if(!empty($errors)) {
      loadView('users/create', ['errors'=> $errors, 'user' => ['username' => $username, 'email' => $email]]);
      exit;
    }

    // Check if email exists
    $params = ['email' => $email];

    $user = $this->db->query('SELECT * FROM users WHERE email = :email', $params)->fetch();

    if($user) {
      $errors['email'] = 'That email already exists';
      loadView('users/create', ['errors' => $errors]);
      exit;
    }

    // Create user account
    $params = [
      'username' => $username,
      'email'=> $email,
      'password' => password_hash($password, PASSWORD_DEFAULT),
    ];

    $this->db->query('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)', $params);

    // Get new user ID
    $userId = $this->db->conn->lastInsertId();

    Session::set('user', [
      'userId'=> $userId,
      'username'=> $username,
      'email'=> $email,

    ]);

    
    redirect('/');
    
  }

  /**
   * Logout a user and clear session
   * 
   * @return void
   */

   public function logout() {
    Session::clearAll();

    $params = session_get_cookie_params();

    setcookie('PHPSESSID', '', time() - 86400, $params['path'], $params['domain']);

    $_SESSION['success_message'] = 'You have logged out successfully.';

    redirect('/');
    
   }

   /**
   * Authenticate user with email and password
   * 
   * @return void
   */

  public function authenticate()
  {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];

    // Validation
    if (!Validation::email($email)) {
      $errors['email'] = 'Please enter a valid email';
    }

    if (!Validation::string($password, 6, 50)) {
      $errors['password'] = 'Password must be at least 6 characters';
    }

    // Check for errors

    if (!empty($errors)) {
      loadView('users/login', [
        'errors' => $errors
      ]);
      exit;
    }

    // Check for email
    $params = [
      'email' => $email
    ];

    $user = $this->db->query('SELECT * FROM users WHERE email = :email', $params)->fetch();

    if (!$user) {
      $errors['email'] = 'Incorrect credentials';
      loadView('users/login', [
        'errors' => $errors
      ]);
      exit;
    }

    // Check if password is correct
    if (!password_verify($password, $user->password)) {
      $errors['email'] = 'Incorrect credentials';
      loadView('users/login', [
        'errors' => $errors
      ]);
      exit;
    }

    // Set user session
    Session::set('user', [
      'userId' => $user->userId,
      'username' => $user->username,
      'email' => $user->email,
    ]);

    redirect('/');

  }
}