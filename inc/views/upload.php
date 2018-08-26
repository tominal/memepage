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
        you do not have permission to upload here. go away.
      </div>

    <?php } else { ?>

      <div class="upload">
        <form class="dropzone" action="/?page=fileupload" id="myDropzone">

        </form>
      </div>
    <script src="//memescdn.thomasj.me/assets/js/dropzone.js" charset="utf-8"></script>
    <script>

	  </script>

    <?php } ?>

  <?php } ?>

</div>
