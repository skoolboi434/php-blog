<?php loadPartial('header'); ?>
<section class="hero alt">
  <div class="home-text container">
    <h2 class="home-title">The Random Blog</h2>
    <span class="home-subtitle">Your source for great random content</span>
  </div>
  <?php loadPartial('message'); ?>
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
    <?php if($post->image) : ?>

    <img class="post-img" src="uploads/<?php echo $post->image; ?>"
      alt="<?php echo $post->title; ?>" class="post-img">
    <?php else : ?>
    <img class="post-img"
      src="https://dummyimage.com/800x430/5e917f/morbi-dictum.png&text=jsonplaceholder.org"
      alt="placeholder image">
    <?php endif; ?>
    <h2 class="category"><?php echo $post->category; ?></h2>
    <a href="/posts/<?php echo $post->id; ?>" class="post-title">
      <?php echo $post->title; ?>
    </a>

    <p class="post-description"><?php echo $post->content; ?></p>
    <div class="profile">
      <!-- <img src="<?php //echo $post->thumbnail; ?>" alt="" class="profile-img"> -->
      <!-- <span class="profile-name">MKBHD</span> -->
    </div>
  </div>
  <?php endforeach; ?>

</section>
<?php loadPartial('footer'); ?>