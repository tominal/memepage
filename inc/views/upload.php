<?php

$settings = $GLOBALS['settings'];

?>

<style>
  .dz-default {
    padding: 40px 15px;
    text-align: center;
  }
  .card .alert {
    margin-bottom: 0;
  }
</style>

<h1>upload box 🤔</h1>

<div class="card">
  <?php if(!isset($_SESSION['logged_in'])){ ?>

    <div class="alert alert-warning">
      please log in first
    </div>

  <?php } else { ?>

    <?php if($_SESSION['scope'] !== 1){ ?>

      <div class="alert alert-warning">
        you have not been given permission to upload here.
      </div>

    <?php } else { ?>

      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">

      <div class="upload">
        <form class="dropzone" method="post" enctype="multipart/form-data" action="./?xhr=fileupload" id="memesDropzone">

        </form>
      </div>

	<script src="//cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js" charset="utf-8"></script>
	<script>
	  Dropzone.options.memesDropzone = {
		paramName: "file",
		maxFilesize: 5,
		init: function () {
		  this.on("complete", function (file) {
			if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
			  // doSomething();
			  console.log("Upload done: " + file);
			}
		  });
		}
	  };
	  </script>

	  <?php if($_SESSION['scope']){ $conn = $GLOBALS['conn']; $imgs = $conn->query("SELECT * FROM `images` WHERE (tags is null) OR (JSON_CONTAINS(tags, '[\"\"]'));"); ?>
		<h3>Untagged memes</h3>
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
	  <?php } ?>

    <?php } ?>

  <?php } ?>

</div>
