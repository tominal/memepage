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

    <?php } else { include __DIR__.'/../config.php'; ?>

      <div class="upload">
        <form class="dropzone" action="https://s3.amazonaws.com/<?= $aws_bucket ?>/" id="myDropzone">

        </form>
      </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js" charset="utf-8"></script>
    <script>
      $.ajaxSetup({
        beforeSend: function(xhr, type){
          if (!type.crossDomain)
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        }
      });

      $(document).ready(function(){
        // var uploader = new Dropzone('#myDropzone', {
        //   url: $('#myDropzone').attr('action'),
        //   method: "post",
        //
        // })
      });
	  </script>

    <?php } ?>

  <?php } ?>

</div>
