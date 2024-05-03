<?php require '../App/views/partials/header.php'; ?>


<section class="post-header">
  <div class="header-content post-container">
    <a href="/" class="back-home">Back To Home</a>

    <h1 class="header-title"><?php echo $post->title; ?></h1>

    <?php if($post->image) : ?>
    <img src="/uploads/<?php echo $post->image; ?>" alt="" class="header-img">
    <?php else : ?>
    <img
      src="https://dummyimage.com/800x430/5e917f/morbi-dictum.png&text=jsonplaceholder.org"
      alt="" class="header-img">
    <?php endif; ?>
  </div>
</section>



<!-- Posts -->
<section class="post-content container">
  <div class="message-container my-3">
    <?php loadPartial('message'); ?>
  </div>
  <p class="post-text"><?php echo $post->content; ?></p>
  <?php if(Framework\Authorization::isOwner($post->userId)) : ?>
  <div class="btn-container text-center d-flex justify-content-center">
    <a href="/posts/edit/<?php echo $post->id; ?>"
      class="btn btn-custom">Edit</a>
    <form action="" method="POST" class="ms-2">
      <input type="hidden" name="_method" value="DELETE">
      <button type="submit" class="btn btn-custom-danger">Delete</button>
    </form>

  </div>
  <?php endif ; ?>
</section>

<?php require '../App/views/partials/footer.php'; ?>