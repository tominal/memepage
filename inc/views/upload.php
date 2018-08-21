<style>
  .upload {
    padding: 40px 15px; 
  }
</style>

<h1>upload box 🤔</h1>
<?php if(!isset($_SESSION['logged_in'])){ ?>
  <div class="alert alert-warning">
    please log in first
  </div>
<?php } ?>

<?php if(isset($_SESSION['logged_in']) && $_SESSION['scope'] !== 1){ ?>
  <div class="alert alert-warning">
    you do not have permission to upload here. go away.
  </div>
<?php } ?>

<div class="card">
  <div class="upload">
    drag & drop files here
  </div>
</div>
