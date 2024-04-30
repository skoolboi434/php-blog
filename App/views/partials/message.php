<?php if(isset($_SESSION['success_message'])) : ?>
<div class="alert alert-success text-center">
  <?php echo $_SESSION['success_message']; ?>
</div>
<?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<?php if(isset($_SESSION['error_message'])) : ?>
<div class="alert alert-danger text-center">
  <?php echo $_SESSION['error_message']; ?>
</div>
<?php unset($_SESSION['error_message']); ?>
<?php endif; ?>