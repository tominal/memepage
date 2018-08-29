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
    <script type="text/javascript">
      function loadMeme(name, link, clipboard){
        var column = $(document.createElement("div")).addClass('col-2');
        var card = $(document.createElement("div")).addClass('card');
        var meme = $(document.createElement("div")).addClass(clipboard ? 'copyMeme' : 'Meme');
        var cardBody = $(document.createElement("div")).addClass('card-body');
        var name = $(document.createElement("p")).addClass("card-text").attr('data-toggle', 'modal').attr('data-target', '#memeModal').html(name);
        var img = $(document.createElement("img")).addClass('card-img-top').attr('src',link);
        if(clipboard){
          meme.attr('data-clipboard-text', link);
          var overflow = $(document.createElement("span")).addClass("hideOverflow");
          overflow.append(img);
          meme.append(overflow);
        } else
          meme.append(img);
        cardBody.append(name);
        card.append(meme);
        card.append(cardBody);
        column.append(card);
        $('.memes.row').append(column);
        /*<div class="col-2">
          <div class="card">
            if(clipboard){
              <div class="copyMeme" data-clipboard-text="link">
                <span class="hideOverflow">
                  <img class="card-img-top" src="link" alt="">
                </span>
              </div>
            } else {
              <div class="Meme">
                <img class="card-img-top" src="link" alt="">
              </div>
            }
            name
          </div>
        </div>*/
      }
    </script>
  </head>
  <body>
    <?php require(__DIR__.'/inc/nav.php'); ?>
    <div class="container">
      <?php page(); ?>
    </div>
    <div class="footer">
      <?php //echo var_dump($_SESSION); ?>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.js" charset="utf-8"></script>
    <script type="text/javascript">
      function clearTooltip(e){
        e.currentTarget.setAttribute('class','copyMeme');
        e.currentTarget.removeAttribute('aria-label');
      }
      function showTooltip(e){
        e.setAttribute('class','copyMeme tooltipped tooltipped-n tooltipped-no-delay border p-2');
        e.setAttribute("aria-label","Copied!");
      }

      var clipboard = new ClipboardJS('.copyMeme');
      clipboard.on('success', function(e){
        e.clearSelection();
        showTooltip(e.trigger);
      });

      var btns = document.querySelectorAll('.copyMeme');
      for(var i = 0;i<btns.length;i++)
        btns[i].addEventListener('mouseleave',clearTooltip);
    </script>
  </body>
</html>
