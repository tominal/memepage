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

require_once(__DIR__.'/inc/devconfig.php');
require_once(__DIR__.'/inc/helpers.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MemePage</title>
    <link rel="stylesheet" href="//cdn.thomasj.me/assets/css/bootstrap4.1.min.css">

    <script src="//cdn.thomasj.me/assets/js/jquery3.js" charset="utf-8"></script>
    <script src="//cdn.thomasj.me/assets/js/bootstrap4.1.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php require(__DIR__.'/inc/nav.php'); ?>
    <div class="container">
      <?php page(); ?>
    </div>
  </body>
</html>
