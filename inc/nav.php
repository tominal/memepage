<nav class="navbar navbar-expand-md navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarNav">
      <a class="navbar-brand">
        <img src="./assets/img/pepe32.png" alt="">
        MemePage
      </a>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?= active('index') ?>">
          <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?= active('upload') ?>">
          <a href="./?page=upload" class="nav-link">Upload</a>
        </li>
        <li class="nav-item <?= active('nsfw') ?>">
          <a class="nav-link disabled">NSFW 👉👌</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <?php if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== 1){ ?>
          <li class="nav-item <?= active('login') ?>">
            <a href="./?page=login" class="nav-link">Login</a>
          </li>
        <?php } else { ?>
          <?php if($_SESSION['scope'] == 1){ ?>
            <li class="nav-item <?= active('admin') ?>">
              <a href="./?page=admin" class="nav-link">Admin</a>
            </li>
          <?php } ?>
          <li class="nav-item <?= active('logout') ?>">
            <a href="./?page=logout" class="nav-link">Logout</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
