<p><h1>留言板作業</h1></p>
<p id="messageBoard"></p>

<p><form id="sendMsgForm" method="POST">
<input type="text" name="title" value="標題" maxlength="100" style="font-weight: bold;"/><br>
<input type="text" name="content" value="內容" maxlength="2048"/><br>
<input type="submit" id="sendMsgButton" value="送出留言"/>
</form></p>

<script>

  function getMsg () {
    let req = new XMLHttpRequest(); 
    req.open('GET', '/getMsg.php', true);
    req.send();
    req.onload = function () {
      document.querySelector('#messageBoard').innerHTML = this.responseText;
    };
  };
  
  getMsg();

  document.querySelector('#sendMsgButton').addEventListener('click', function (event) {
    event.preventDefault();
    let req = new XMLHttpRequest()
    const msgFormData = new FormData(document.querySelector('#sendMsgForm'))
    req.open('POST', "/sendMsg.php", true);
    req.send(msgFormData)
    req.onload = getMsg;
  });
</script>

