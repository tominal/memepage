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
