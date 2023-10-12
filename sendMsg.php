<?php
    require_once('dbconn.php');
    $sql = sprintf("INSERT INTO messages (author, title, content) VALUES ('%s', '%s', '%s')", $_SERVER['REMOTE_ADDR'], $_POST['title'], $_POST['content']);
    $dbconn->query($sql);
?>