<?php

$conn = $GLOBALS['conn'];

return $conn->select('*', 'memepage_settings')[0];
