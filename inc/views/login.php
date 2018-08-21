<?php

$google = new google($GLOBALS['conn']);

if(isset($_GET['action']) && $_GET['action'] === 'localhost')
  $google->localhost();

?>

<h1>choose how to log in</h1>
<p><a href="<?= $google->getLink(); ?>">google</a></p>
<p><a href="./?page=login&action=localhost">localhost</a></p>
<p>discord?</p>
<p>what else do the hip kids use</p>
