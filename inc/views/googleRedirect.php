<?php

$google = new google($conn);

if(isset($_GET['code']))
  $google->handle($_GET['code']);
