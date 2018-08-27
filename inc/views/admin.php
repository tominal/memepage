<?php

$conn = $GLOBALS['conn'];
$users = $conn->select('*', 'users');

?>

<h1>Administration 😠</h1>
<hr>
<div class="row">
  <div class="col-3">
    <nav class="nav flex-column">
      <a class="nav-link" href="./?page=admin#users">Users</a>
      <a class="nav-link" href="./?page=admin#privacy">Privacy</a>
      <a class="nav-link" href="./?page=admin#settings">Settings</a>
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

    <h3 id="settings">Settings</h3>
  </div>
</div>
