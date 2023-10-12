<?php
    require_once('dbconn.php');

    $query_insertMsg = $dbconn->prepare("INSERT INTO messages (author, title, content) VALUES (?, ?, ?)");
    $query_insertMsg->bind_param("sss", $_SERVER['REMOTE_ADDR'], $_POST['title'], $_POST['content']);
    $query_insertMsg->execute();
    $query_insertMsg->close();
?>