<?php

$conn = $GLOBALS['conn'];
$settings = $GLOBALS['settings'];

$tags = $conn->select('*', 'tags');
$imgs = $conn->raw("SELECT * FROM `images` WHERE JSON_CONTAINS(tags, '[\"sfw\"]');");

?>

<h1>browse by tag 🤣</h1>
<div class="card">
  <div class="card-body">
    <?php if(!$imgs){ ?>
      <div class="alert alert-primary text-center" style="margin-bottom:0">no tags here!</div>
    <?php } ?>
    <?php //foreach($tags as $tag){ ?>
      <!-- <button type="button" class="btn btn-primary">
        Notifications <span class="badge badge-light">4</span>
      </button> -->
    <?php //} ?>
  </div>
</div>

<hr/>

<?php if(!$imgs){ ?>
<div class="alert alert-primary text-center">no images here!</div>
<?php } ?>

<div class="memes row">
  <script type="text/javascript">
    var imgs = <?= json_encode($imgs); ?>;
    imgs.forEach(function(e){
      if(e.type == "image/gif" || e.type == "image/png" || e.type == "image/jpeg")
        loadMeme(e, <?= $settings['auto_copy'] ?>);
    });
  </script>
</div>
