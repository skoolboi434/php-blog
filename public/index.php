<?php require '../App/views/partials/header.php'; ?>
<?php require '../helpers.php'; ?>

<section class="home" id="home">
  <div class="home-text container">
    <h2 class="home-title">The Random Blog</h2>
    <span class="home-subtitle">Your source for great random content</span>
  </div>
</section>

<!-- Post Filter -->
<div class="post-filter container">
  <span class="filter-item active-filter" data-filter='all'>All</span>
  <span class="filter-item" data-filter='tech'>Tech</span>
  <span class="filter-item" data-filter='automotive'>Automotive</span>
  <span class="filter-item" data-filter='mobile'>Mobile</span>
</div>

<!-- Posts -->
<section class="post container">
  <div class="post-box mobile">
    <img src="img/post-1.jpg" alt="" class="post-img">
    <h2 class="category">Mobile</h2>
    <a href="/post-page.php" class="post-title">
      How To Create Best UX Design With Figma
    </a>
    <span class="post-date">12 Feb 2024</span>
    <p class="post-description">Lorem ipsum dolor, sit amet consectetur
      adipisicing elit. Dolorum soluta excepturi doloribus ad sed quam
      praesentium vitae? Quas, numquam, fugit quod deleniti aperiam molestias
      distinctio fuga sunt esse natus placeat.</p>
    <div class="profile">
      <img src="img/profile-1.jpg" alt="" class="profile-img">
      <span class="profile-name">MKBHD</span>
    </div>
  </div>

  <div class="post-box tech">
    <img src="img/post-2.jpg" alt="" class="post-img">
    <h2 class="category">Tech</h2>
    <a href="/post-page.php" class="post-title">
      How To Create Best UX Design With Figma
    </a>
    <span class="post-date">12 Feb 2024</span>
    <p class="post-description">Lorem ipsum dolor, sit amet consectetur
      adipisicing elit. Dolorum soluta excepturi doloribus ad sed quam
      praesentium vitae? Quas, numquam, fugit quod deleniti aperiam molestias
      distinctio fuga sunt esse natus placeat.</p>
    <div class="profile">
      <img src="img/profile-1.jpg" alt="" class="profile-img">
      <span class="profile-name">MKBHD</span>
    </div>
  </div>

  <div class="post-box automotive">
    <img src="img/post-3.jpg" alt="" class="post-img">
    <h2 class="category">Automotive</h2>
    <a href="/post-page.php" class="post-title">
      How To Create Best UX Design With Figma
    </a>
    <span class="post-date">12 Feb 2024</span>
    <p class="post-description">Lorem ipsum dolor, sit amet consectetur
      adipisicing elit. Dolorum soluta excepturi doloribus ad sed quam
      praesentium vitae? Quas, numquam, fugit quod deleniti aperiam molestias
      distinctio fuga sunt esse natus placeat.</p>
    <div class="profile">
      <img src="img/profile-1.jpg" alt="" class="profile-img">
      <span class="profile-name">MKBHD</span>
    </div>
  </div>

  <div class="post-box mobile">
    <img src="img/post-4.jpg" alt="" class="post-img">
    <h2 class="category">Mobile</h2>
    <a href="/post-page.php" class="post-title">
      How To Create Best UX Design With Figma
    </a>
    <span class="post-date">12 Feb 2024</span>
    <p class="post-description">Lorem ipsum dolor, sit amet consectetur
      adipisicing elit. Dolorum soluta excepturi doloribus ad sed quam
      praesentium vitae? Quas, numquam, fugit quod deleniti aperiam molestias
      distinctio fuga sunt esse natus placeat.</p>
    <div class="profile">
      <img src="img/profile-1.jpg" alt="" class="profile-img">
      <span class="profile-name">MKBHD</span>
    </div>
  </div>

  <div class="post-box tech">
    <img src="img/post-5.jpg" alt="" class="post-img">
    <h2 class="category">Tech</h2>
    <a href="/post-page.php" class="post-title">
      How To Create Best UX Design With Figma
    </a>
    <span class="post-date">12 Feb 2024</span>
    <p class="post-description">Lorem ipsum dolor, sit amet consectetur
      adipisicing elit. Dolorum soluta excepturi doloribus ad sed quam
      praesentium vitae? Quas, numquam, fugit quod deleniti aperiam molestias
      distinctio fuga sunt esse natus placeat.</p>
    <div class="profile">
      <img src="img/profile-1.jpg" alt="" class="profile-img">
      <span class="profile-name">MKBHD</span>
    </div>
  </div>
</section>

<?php require '../App/views/partials/footer.php'; ?>