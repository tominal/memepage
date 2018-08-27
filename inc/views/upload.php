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

    <?php } ?>

  <?php } ?>

</div>
