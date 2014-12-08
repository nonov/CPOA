<?php 
	session_start();
	$errorMessage  = '';

	extract($_POST);
	$pass = md5($pass);
	if(isset($_POST['submit'])) {
		require_once("db_connexion.php");
		$sql = $handler->query(" SELECT * FROM users WHERE login = '$login' AND password = '$pass' ");
		$result = $sql->rowCount();
		if($result > 0) {
			$_SESSION = array('login' => $login, 'password' => $pass);
			switch ($login) {
				case 'admin':
					header("Location: staff_home.php");
					break;
				default:
					header("Location: hotel_home.php");
					break;
			}
		} else {
			$errorMessage = 'Mauvais login/password !';
		}
	}
?><!doctype html> 
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title> Bienvenue au Festival de Cannes </title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<section>	
			<form action="index.php" method="post">
				<h1>Connection</h1>
				<div><input type="text" name="login" placeholder="Login"/></div>
				<div><input type="password" name="pass" placeholder="Password"/></div>
		        <div><input type="submit" name="submit" value="Connection"></div>	
          		<div style="color:black;"><?php echo $errorMessage; ?></div>
		    </form>
		</section>
	</body>
</html>

