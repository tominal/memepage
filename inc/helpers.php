<?php

$page = $_GET['page'] ? $_GET['page'] : 'index';

function page() {
  require_once __DIR__."/views/$page.php";
}

function active($pg){
  global $page;
  if($pg == $page)
    return "active";
}
