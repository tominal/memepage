<?php

$google = new google($GLOBALS['conn']);

if(isset($_GET['code']))
  $google->handle($_GET['code']);
