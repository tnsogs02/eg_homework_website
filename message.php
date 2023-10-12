<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<p><h1>留言板作業</h1></p>
<p id="messageBoard"></p>

<p><form id="sendMsgForm" method="POST">
<input type="text" name="title" value="標題" maxlength="100" style="font-weight: bold;"/><br>
<input type="text" name="content" value="內容" maxlength="2048"/><br>
<input type="submit" id="sendMsgButton" value="送出留言"/>
</form></p>

<script>
  $(document).ready(function(){
    $.get("/getMsg.php",function(data){
      $("#messageBoard").html(data);
    });
  });


  $("#sendMsgForm").on("submit", function(event){
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "/sendMsg.php",
      data: $("#sendMsgForm").serialize(),
      dataType: "text",
      success: function(){
        $.get("/getMsg.php",function(data){
          $("#messageBoard").html(data);
        });
      }
    })
  });
</script>

