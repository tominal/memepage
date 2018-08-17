<?php

function page() {
  $page = $_GET['page'] ? $_GET['page'] : 'index';
  require_once __DIR__."/views/$page.php";
}
