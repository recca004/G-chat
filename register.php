<?php include('register_functions.php') ?>

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
<div class="login"><p>Register</p></div>
					<form method="post" action="register_functions.php" class="login">

							<!-- <label>Username</label> -->
							<input type="text" name="username" value="" placeholder="Username">

<br />
							<!-- <label>Email</label> -->
							<input type="email" name="email" value="" placeholder="Email">
<br />
							<!-- <label>Password</label> -->
							<input type="password" name="password_1" placeholder="Password">
<br />
							<!-- <label>Confirm password<?php //echo $errors; ?></label> -->
							<input type="password" name="password_2" placeholder="Password 2">
<br />
							<button type="submit" class="btn btn-brand center" name="register_btn">Register</button>
								<a href="login.php">Sign in</a>




					</form>
        </div>

      </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/chat.js"></script>

  </body>

</html>
