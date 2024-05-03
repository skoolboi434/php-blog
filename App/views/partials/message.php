<?php

use Framework\Session; ?>

<?php $successMessage = Session::getFlashMessage('success_message'); ?>
<?php if($successMessage !== null ) : ?>
<div class="alert alert-success text-center">
  <?php echo $successMessage; ?>
</div>
<?php endif; ?>

<?php $errorMessage = Session::getFlashMessage('error_message'); ?>
<?php if($errorMessage !== null ) : ?>
<div class="alert alert-danger text-center">
  <?php echo $errorMessage; ?>
</div>
<?php endif; ?>