<?php loadPartial('header'); ?>

<section class="post-header with-form">
  <div class="header-content post-container">

    <h1 class="header-title">It's ok to edit your randomness.</h1>
    <span class="home-subtitle">Edit Post</span>
    <div class="create-form-container">
      <?php if(isset($errors)) :?>
      <?php foreach($errors as $error) : ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php endforeach; ?>
      <?php endif; ?>
      <form method="POST" action="/posts/<?php echo $post->id ?>"
        enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group mb-3">
          <input type="text" name="title" id="title" class="form-control"
            placeholder="Enter Title" value="<?= $post->title; ?>">
        </div>

        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="form-group mb-3">
              <input type="text" name="category" id="category"
                class="form-control" placeholder="Enter Category"
                value="<?= $post->category; ?>">
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="form-group mb-3">
              <input type="file" name="image" id="image" class="form-control">
            </div>
          </div>
        </div>

        <div class="form-group mb-3">
          <textarea name="content" id="content" cols="30" rows="7"
            class="form-control"
            placeholder="Enter Content..."><?= $post->content; ?></textarea>
        </div>

        <div class="btn-container text-center">
          <button type="submit" class="btn btn-custom">Update Post</button>
          <button type="submit" class="btn btn-custom-danger">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</section>

<?php loadPartial('footer'); ?>