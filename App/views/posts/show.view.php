<?php require '../App/views/partials/header.php'; ?>


<section class="post-header">
  <div class="header-content post-container">
    <a href="/" class="back-home">Back To Home</a>

    <h1 class="header-title"><?php echo $post->title; ?></h1>

    <img src="<?php echo $post->image; ?>" alt="" class="header-img">
  </div>
</section>

<!-- Posts -->
<section class="post-content container">
  <p class="post-text"><?php echo $post->content; ?></p>

</section>

<?php require '../App/views/partials/footer.php'; ?>