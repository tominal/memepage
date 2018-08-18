<?php
// create a session so the admin can view some cute sql analytics

session_start();

// if user is logged in, check if user has been idle for more than 30 minutes; log them out if so.
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){
  if(isset($_SESSION['la']) && (time() - $_SESSION['la'] > 1800)){
    session_unset();
    session_destroy();
  }
}

$_SESSION['la'] = time();

// create classes to handle authentication

class google {
  private $gId;
  private $gSec;
  private $gRedir;

  public function __construct(){
    require(__DIR__.'/config.php');

    $this->gId = $googleId;
    $this->gSec = $googleSecret;
    $this->gRedir = $googleRedirect;
  }

  public function getLink(){
    return 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode($this->gRedir) . '&response_type=code&client_id=' . $this->gId . '&access_type=online';
  }

  public function handle(){
    var_dump("authenticated");die();
  }
}
