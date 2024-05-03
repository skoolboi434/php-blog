<?php loadPartial('header'); ?>

<section class="post-header with-form">
  <div class="header-content post-container">

    <h1 class="header-title">Welcome back to the home of randomness</h1>
    <span class="home-subtitle">Login to your account</span>
    <div class="flex justify-center items-center mt-20 m-auto">
      <div
        class="custom-form-container  bg-white p-8 rounded-lg shadow-md w-full md:w-500 mx-6">
        <?php loadPartial('errors', ['errors' => $errors ?? []]); ?>
        <form method="POST" action="/auth/login">

          <div class="mb-4">
            <input type="email" name="email" placeholder="Email Address"
              class="w-full px-4 py-2 border rounded focus:outline-none"
              value="<?= $user['email'] ?? '' ?>" />
          </div>
          <div class="mb-4">
            <input type="password" name="password" placeholder="Password"
              class="w-full px-4 py-2 border rounded focus:outline-none" />
          </div>
          <button type="submit" class="btn btn-custom">
            Login
          </button>

          <p class="mt-4 text-gray-500">
            Don't have an account?
            <a class="text-blue-900" href="/auth/register">Register</a>
          </p>
        </form>
      </div>
    </div>


  </div>
</section>

<?php loadPartial('footer'); ?>