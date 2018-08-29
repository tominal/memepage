<?php

/**
 *
 *  Project: MemePage
 *  Author: Thomas Johnson
 *  Website: https://thomasj.me
 *  Description:
 *    A web program combining dropbox and imgur.
 *
 */

ini_set("display_errors", "-1");
error_reporting(E_ALL);

$page = isset($_GET['page']) ? $_GET['page'] : 'index';

require_once(__DIR__.'/inc/helpers.php');
require_once(__DIR__.'/inc/pdo.php');
require_once(__DIR__.'/inc/auth.php');

$settings = require(__DIR__.'/inc/fetchsettings.php');

if(isset($_GET['xhr']))
  xhr();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?= csrf() ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MemePage</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/primer-tooltips@1.5.7/build/build.css">
    <link rel="stylesheet" href="//cdn.thomasj.me/assets/css/bootstrap4.1.min.css">
    <link rel="stylesheet" href="./assets/css/styles.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js" charset="utf-8"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="./assets/js/scripts.js" charset="utf-8"></script>
  </head>
  <body>
    <?php require(__DIR__.'/inc/nav.php'); ?>
    <div class="container">
      <?php page(); ?>
      <div class="modal" id="memeModal" tabindex="-1" role="dialog" aria-labelledby="memeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="meme"></div>
              <hr/>
              <?php if($_SESSION['scope']){ ?>
                <form class="form" action="./?page=submitMeme&returnto=<?= $page ?>" method="post">
                  <input type="hidden" name="id" value="">
                  <div class="form-row">
                    <div class="col">
                      <label>Name</label>
                      <input type="text" name="name" value="" class="form-control">
                    </div>
                    <div class="col">
                      <label>Tags</label>
                      <textarea name="tags" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col">
                      <br/>
                      <div class="form-group text-right">
                        <input type="submit" class="btn btn-success" value="Save">
                      </div>
                    </div>
                  </div>
                </form>
              <?php } ?>
            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <?php //echo var_dump($_SESSION); ?>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.js" charset="utf-8"></script>
    <script type="text/javascript">
      function clearTooltip(e){
        e.currentTarget.setAttribute('class','Meme');
        e.currentTarget.removeAttribute('aria-label');
      }
      function showTooltip(e){
        e.setAttribute('class','Meme tooltipped tooltipped-n tooltipped-no-delay border p-2');
        e.setAttribute("aria-label","Copied!");
      }

      var clipboard = new ClipboardJS('.Meme');
      clipboard.on('success', function(e){
        e.clearSelection();
        showTooltip(e.trigger);
      });

      var btns = document.querySelectorAll('.Meme');
      for(var i = 0;i<btns.length;i++)
        btns[i].addEventListener('mouseleave',clearTooltip);
    </script>
  </body>
</html>
