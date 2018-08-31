<?php
  session_start();
  $_SESSION['user']=(isset($_GET['user'])===true) ? (int)$_GET['user']:2;

  // echo $_SESSION['user'];


  require 'core/classes/Core.php';
  require 'core/classes/Chat.php';

  $chat=new Chat();
  // $chat->throwMessage(3, 'This is a message');



  // echo $_SESSION['login'];
  $id = $_SESSION["login"];
  $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $check = $db->query("SELECT user_id FROM users WHERE username='$id'");
  $num_check = $check->num_rows;
  $fetch_check = $check->fetch_object();
  $id2 = $fetch_check->user_id;

  $_SESSION["user_id"] =$id2;

  if($num_check) {
  // User Exists
  echo $id2;
  } else {
  echo "You don't exist.";
  }
  echo $_SESSION['user_id'];


  // echo $_GET['user']
  // $sql = 'SELECT user_id FROM users WHERE username = "' . mysql_real_escape_string($_SESSION['login']) . '"';



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
    <div class="main-chat" >
<div class="login">
<p>Groupe chat</p>
<div class="chat">
    <div class="messages"></div>
    <textarea class="entry" placeholder="Type here"></textarea>
</div>

</div>

<a href="logout.php" class="btn btn-Profile center" >Logout</a>
<a href="login_cread.php" class="btn btn-Profile center" >Profile</a>


    </div>

  </div>

</div>







    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/chat.js"></script>

  </body>

</html>
