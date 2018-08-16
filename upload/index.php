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

require_once(__DIR__.'/../inc/config.php');

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
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
          <a class="navbar-brand">
            <img src="https://cdn.thomasj.me/assets/img/pepe32.png" alt="">
            MemePage
          </a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../">Home</a>
            </li>
            <li class="nav-item active">
              <a href="./upload" class="nav-link">Upload <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">NSFW 👉👌</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <h1>upload box 🤔</h1>
      <div class="card">
        drag & drop files here
      </div>
    </div>
  </body>
</html>
