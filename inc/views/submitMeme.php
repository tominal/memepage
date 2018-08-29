<?php

mid();

// save to memepage_settings row
$settings = $GLOBALS['settings'];
$conn = $GLOBALS['conn'];

$tags = preg_split('/\r\n|\r|\n/', trim($_POST['tags']));

$conn->update('images', ['name', 'tags'], ['id'], [$_POST['name'], json_encode($tags), $_POST['id']]);

header('Location: ./?page='.$_GET['returnto']);
exit;
