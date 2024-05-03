<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100;1,400&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/custom.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'
    rel='stylesheet'>
  <title>PHP Blog</title>
</head>

<body>
  <?php use Framework\Session; ?>
  <header>
    <div class="nav container">
      <div class="logo-container">
        <a href="/" class="logo">Waff<span>ling</span></a>
      </div>
      <?php if(Session::has('user')) : ?>
      <div class="welcome-container">
        <span class="text-capitalize text-white">
          Welcome <?= Session::get('user')['username']; ?>!
        </span>
      </div>

      <div class="btn-container d-flex">
        <a href="/posts/create" class="btn-custom me-2">Create Post</a>
        <form action="/auth/logout" method="POST">
          <button type="submit" class="btn btn-custom">Logout</button>
        </form>
      </div>
      <?php else : ?>
      <div class="btn-container">
        <!-- Login Button -->
        <a href="/auth/login" class="btn-custom">Login</a>
        <a href="/auth/register" class="btn-custom">Register</a>
      </div>
      <?php endif; ?>


    </div>
  </header>