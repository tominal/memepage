<?php

$conn = $GLOBALS['conn'];

$tags = $conn->select('*', 'tags');
$imgs = $conn->select('*', 'images');

?>
<h1>browse by tag 🤣</h1>
<div class="card">
  <div class="card-body">
    <?php //foreach($tags as $tag){ ?>
      <!-- <button type="button" class="btn btn-primary">
        Notifications <span class="badge badge-light">4</span>
      </button> -->
    <?php //} ?>
  </div>
</div>

<hr/>

<div class="row">
  <?php foreach($imgs as $img){ ?>
    <div class="col-2">
      <div class="card">
        <img class="card-img-top" src="<?= $img['link'] ?>" alt="">
        <?= $img['name'] ?>
      </div>
    </div>
  <?php } ?>
</div>
