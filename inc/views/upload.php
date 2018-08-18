<h1>upload box 🤔</h1>
<div class="alert alert-warning">
  please log in first
</div>
<div class="card">
  drag & drop files here
</div>
<?php

$conn = $GLOBALS['conn'];
var_dump($conn->insert("users", ['name', 'avi', 'email'], ['thomas j', 'pepe32.png', 'tom@thomasj.me']));

 ?>
