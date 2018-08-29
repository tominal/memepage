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
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" charset="utf-8"></script>
  </head>
  <body>
    <?php require(__DIR__.'/inc/nav.php'); ?>
    <div class="container">
      <?php page(); ?>
    </div>
    <div class="footer">
      <?php //echo var_dump($_SESSION); ?>
    </div>
  </body>
</html>
