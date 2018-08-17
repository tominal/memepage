<?php

$page = $_GET['page'] ? $_GET['page'] : 'index';

function page() {
  global $page;
  if(file_exists(__DIR__."/views/$page.php"))
    require_once __DIR__."/views/$page.php";
  else
    require_once __DIR__."/views/404.php";
}

function active($pg){
  global $page;
  if($pg == $page)
    return "active";
}
