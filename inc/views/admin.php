<?php

mid();

$conn = $GLOBALS['conn'];
$settings = $GLOBALS['settings'];
$users = $conn->select('*', 'users');

?>

<h1>Administration 😠</h1>
<hr>
<div class="row">
  <div class="col-3">
    <nav class="nav flex-column">
      <a class="nav-link" href="./?page=admin#users">Users</a>
      <a class="nav-link" href="./?page=admin#privacy">Privacy</a>
    </nav>
  </div>
  <div class="col-9">
    <h3 id="users">Users</h3>
    <div class="row">
      <?php foreach($users as $user){ ?>
        <div class="col-2">
          <div class="card">
            <img src="<?= $user['avi'] ?>" alt="" class="card-img-top">
            <div class="card-body">
              <?= $user['name'] ?>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <h3 id="privacy">Privacy</h3>
  	<form class="form" method="post" action="./?page=submitSettings">
  	  <div class="row">
  	    <div class="col-6">
    		  <div class="form-group">
      			<label>Auto-SFW &sdot; <small>Make everything uploaded public.</small></label>
      			<input type="checkbox" <?= $settings['auto_sfw'] ? 'checked' : '' ?> name="auto_sfw">
    		  </div>
  	    </div>
    		<div class="col-6">
    		  <div class="form-group">
      			<label>Auto-Copy &sdot; <small>On click, copy direct link to meme.</small></label>
      			<input type="checkbox" <?= $settings['auto_copy'] ? 'checked' : '' ?> name="auto_copy">
    		  </div>
    		</div>
  	  </div>
      <div class="form-group text-right">
        <input type="submit" class="btn btn-success" value="Save">
      </div>
  	</form>

  </div>
</div>
