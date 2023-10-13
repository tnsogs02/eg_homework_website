<div><h1>留言板作業</h1></div>
<div id="messageBoard"></div>

<div><form id="sendMsgForm" method="POST">
<input type="text" name="title" value="標題" maxlength="100" style="font-weight: bold;"/><br>
<input type="text" name="content" value="內容" maxlength="2048"/><br>
<input type="submit" id="sendMsgButton" value="送出留言"/>
</form></div>

<script>

  function escapeChar(input) {
    let div = document.createElement('div');
    div.innerText = input;
    return div.innerHTML;
  }

  function getMsg () {
    let req = new XMLHttpRequest(); 
    req.open('GET', '/getMsg.php', true);
    req.responseType = 'json';
    req.send();
    req.onload = function () {
      if (this.status == 200) {
        let msgDisplay = "";
        let resp = this.response
        if (resp.length > 0) {
          for(let i = 0; i < resp.length; i++) {
            msgDisplay += '<hr>';
            msgDisplay += `<h3>#${escapeChar(resp[i].id)} ${escapeChar(resp[i].title)}</h3>${escapeChar(resp[i].content)}<br>from: ${escapeChar(resp[i].author)}`;
          }
        } else {
          msgDisplay += '<h3>留言板上什麼也沒有</h3>';
        }
        msgDisplay += '<hr>';
        document.querySelector('#messageBoard').innerHTML = msgDisplay;
      }
    }
  }
  
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

