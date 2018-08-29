<?php

mid();

// save to memepage_settings row
$settings = $GLOBALS['settings'];
$conn = $GLOBALS['conn'];

$conn->update('memepage_settings', ['auto_sfw', 'auto_copy'], ['tables_written'], [isset($_POST['auto_sfw'])?1:0, isset($_POST['auto_copy'])?1:0, 1]);

header('Location: ./?page=admin');
exit;
