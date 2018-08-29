<?php

mid();

// save to memepage_settings row
$settings = $GLOBALS['settings'];
$conn = $GLOBALS['conn'];

$tags = preg_split('/\r\n|\r|\n/', trim($_POST['tags']));

// update meme
$conn->update('images', ['name', 'tags'], ['id'], [$_POST['name'], json_encode($tags), $_POST['id']]);

// find each tag in table. if a tag doesnt turn up, create a large insert.
// $tags = $conn->select(['images'], 'tags');
// $conn->update('tags', ['images'])

header('Location: ./?page='.$_GET['returnto']);
exit;
