<?php
    require_once('dbconn.php');

    $separator_msg = '====================';

    $sql = "SELECT id, author, title, content FROM messages";
    $result = $dbconn->query($sql);
    
    echo $separator_msg;
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()) {
        $msgLine = sprintf("<p><h3>#%d %s</h3>%s<br>from: %s</p>", $row["id"], $row["title"], $row["content"], $row["author"]);
        echo $msgLine;
        echo $separator_msg;
      }
    } else {
      echo "<h1>留言板上什麼也沒有</h1>";
    }
    $dbconn->close();
?>