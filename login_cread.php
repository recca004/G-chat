<?php
   require_once 'core/classes/Config.php';
// On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site
	session_start ();

// on teste si nos variables sont définies
if (isset($_POST['login']) && isset($_POST['pwd'])) {

	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
						//if ($login_valide == $_POST['login'] && $pwd_valide == $_POST['pwd']) {
	// dans ce cas, tout est ok, on peut démarrer notre session
	$login_valide=$_POST['login'];
	$pwd_valide=$_POST['pwd'];
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	$query="SELECT * FROM `users` WHERE username='$login_valide' and password= md5('$pwd_valide')";
	$result=mysqli_query($db,$query) or die(mysqli_error($db));
	$count=mysqli_num_rows($result);


	// on la démarre :)

	// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['pwd'] = $_POST['pwd'];
	// $_SESSION['user'] = 4;//$_POST['login'];
	// $_SESSION['pwd'] = $_POST['pwd'];

	// on redirige notre visiteur vers une page de notre section membre




	if ($count==1){
		// $_SESSION['login'] = $_POST['login'];
		echo "Hello ".$_SESSION['login']." ";
		echo "This is the membre area <br>";
		// This is in the PHP file and sends a Javascript alert to the client
		$message = "Hello ".$_SESSION['login']. " <br> This is the membre area <br>";
		// echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<a href='logout.php'>Logout</a>";
		$_SESSION['login_success']="true";
		// header ('location: index.php');
	}else{
		echo "Invalid login credentials.";

		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Membre non reconnu...\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="3" ;URL=login.php">';
	}
}
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
        <div class="main-login" >
<div class="login">
  <p>Profile</p>
  <img src="https://placeimg.com/75/75/people" alt="" class="profile-photo">
  <p class="username"><?php echo $_SESSION['login']; ?> | Born 29.01.2000</p>
  <div class="exchange">
<img src="https://placeimg.com/25/25/people" alt="" class="profile-photo">
<p class="">message exchange</p><p>1211</p>

</div>
<a href="Groupe-chat.php" class="btn btn-Profile center" >Chat</a>
<a href="logout.php" class="btn btn-Profile center" >Logout</a>
<a href="#" class="btn btn-Profile center" >Delete Account</a>

        </div>

      </div>

    </div>
  </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/chat.js"></script>

  </body>

</html>
