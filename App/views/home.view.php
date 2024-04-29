<?php loadPartial('header'); ?>

<section class="hero home">
  <div class="home-text container">
    <h2 class="home-title">The Random Blog</h2>
    <span class="home-subtitle">Your source for great random content</span>
  </div>
</section>


<!-- Post Filter -->
<div class="post-filter container">
  <span class="filter-item active-filter" data-filter='all'>All</span>
  <?php foreach ($categories as $category): ?>
  <span class="filter-item"
    data-filter='<?php echo $category->category; ?>'><?php echo $category->category; ?></span>
  <?php endforeach ?>
</div>

<!-- Posts -->
<section class="post container">
  <?php foreach($posts as $post) : ?>
  <div class="post-box <?php echo $post->category; ?>">
    <img src="<?php echo $post->image; ?>" alt="" class="post-img">
    <h2 class="category"><?php echo $post->category; ?></h2>
    <a href="/posts/<?php echo $post->id; ?>" class="post-title">
      <?php echo $post->title; ?>
    </a>
    <span
      class="post-date"><?php echo date('F j, Y', strtotime($post->createdAt)); ?></span>
    <p class="post-description"><?php echo $post->content; ?></p>
    <div class="profile">
      <img src="<?php echo $post->thumbnail; ?>" alt="" class="profile-img">
      <span class="profile-name">MKBHD</span>
    </div>
  </div>
  <?php endforeach; ?>

</section>
<div class="btn-container text-center">
  <a href="/posts">Show All Posts</a>
</div>
<?php loadPartial('footer'); ?>