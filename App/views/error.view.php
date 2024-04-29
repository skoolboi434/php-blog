<?php loadPartial('header'); ?>
<section class="hero error">
  <div class="container mt-5">
    <div class="text-center text-3xl mb-4 font-bold p-3">
      <h3 class="home-text"><?= $status ?></h3>
    </div>
    <p class="home-subtitle text-center">
      <?= $message ?>
    </p>
  </div>
</section>

<?php loadPartial('footer'); ?>