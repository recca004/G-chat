<?php
  session_start();


  require 'core/classes/Core.php';
  require 'core/classes/Chat.php';
  require 'function.php';

  $chat=new Chat();
  // $chat->throwMessage(3, 'This is a message');
  // $dbname =new Chat();
  //
  // $dbnamedel =new Chat();
  // $dbnamedel->delChatPrivite();
// echo __toString($dbname);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>AJAX Chat</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
  <body>
    <div class="full_container">
      <div class="container">
        <div class="center logo" >G-chat</div>
        <div class="main-container" >
          <h2>Your customers will love you
          one minute from now.</h2>
          <p>See how your users experience your website in realtime or view
          trends to see any changes in performance over time.</p>
          <p><a href="login.php" class="btn btn-brand center">Login</a> ¦
          <a href="register.php" class="btn btn-brand-grey center">register</a></p>
        </div>

      </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/chat.js"></script>

  </body>

</html>
