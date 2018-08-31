<?php
// session_start();
  include("core/init.php");
// connect to database
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// variable declaration
$username = "";
$email    = "";
$errors   = array();

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    = $_POST['username'];
	$email       = $_POST['email'];
	$password_1  = $_POST['password_1'];
	$password_2  = $_POST['password_2'];

	// form validation: ensure that the form is correctly filled
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password_1)) {
		array_push($errors, "Password is required");
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		// if (isset($_POST['user_type'])) {
		// 	$user_type = e($_POST['user_type']);
      //INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES (NULL, '$username', '$email', '$password');
      //  INSERT INTO `chat` (`message_id`, `user_id`, `message`, `timestamp`) VALUES (NULL, ".(int)$user_id.", '".$this->db->real_escape_string(htmlentities($message))."', CURRENT_TIMESTAMP);

			$query = "INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES (NULL, '$username', '$email', '$password')";

			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: login.php');

	// }
}
}
// // return user array from their id
// function getUserById($id){
// 	// global $db;
//   echo $id;
//   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// 	$query = "SELECT * FROM `users` WHERE `user_id`=. $id";
// 	$result = mysqli_query($db, $query);
//
// 	$user = mysqli_fetch_assoc($result);
// 	return $user;
// }
//
// // escape string
// function e($val){
// 	global $db;
// 	return mysqli_real_escape_string($db, trim($val));
// }
//
// function display_error() {
// 	global $errors;
//
// 	if (count($errors) > 0){
// 		echo '<div class="error">';
// 			foreach ($errors as $error){
// 				echo $error .'<br>';
// 			}
// 		echo '</div>';
// 	}
// }
