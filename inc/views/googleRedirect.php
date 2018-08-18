<?php

$google = new google();

if(isset($_GET['code']))
  $google->handle();
