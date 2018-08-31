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
        <div class="main-login" >
<div class="login"><p>Sign in</p></div>
            <form action="login_cread.php" method="post" class="login">
              <!-- Votre login :  -->
              <input type="text" name="login" class="">
              <br />
              <!-- Votre mot de passé :  -->
              <input type="password" name="pwd" class=""><br />
              <input type="submit" value="Connexion" class="btn btn-brand center">
              <a href="register.php" >Register</a>
            </form>
        </div>

      </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/chat.js"></script>

  </body>

</html>
