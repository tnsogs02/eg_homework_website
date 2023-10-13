<?php
    require_once('dbconn.php');

    $sql = "SELECT id, author, title, content FROM messages";
    $result = $dbconn->query($sql);
    $msgArray = [];
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()) {
        $currentMsg = [
          "id" => $row["id"],
          "title" => $row["title"],
          "content" => $row["content"],
          "author" => $row["author"],
        ];
        array_push($msgArray, $currentMsg);
      }
    }
    echo json_encode($msgArray);
    $dbconn->close();
?>