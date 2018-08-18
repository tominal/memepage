<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'index';

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

function csrf(){
  return md5(sha1(uniqid(mt_rand(), true)));
}

function url3986_encode($str){
  $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
  $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
  return str_replace($entities, $replacements, urlencode($str));
}

function impCols($arr){
  $str = "";
  foreach($arr as $k => $v){
    $str += ($k == (count($arr)-1) ? $v : $v.', ');
  }
  return $str;
}

function qs($arr){
  $str = '';
  for($i = 1;$i <= count($arr);$i++)
    $str += ($i == count($arr) ? '?' : '?, ');
  return $str;
}
