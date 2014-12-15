<?php
	session_start();
	require_once('functions.php');
	$errorMessage= '';

	if(isset($_POST['submit'])) {
		require_once('db_connexion.php');
		test_input($_POST);
		extract($_POST);
		$password = md5($pass);
		$sql = $handler->prepare("SELECT * FROM users WHERE login = :login AND password = :password");
		$sql->execute(['login' => $login,'password' => $password]);
		$count = $sql->fetch(PDO::FETCH_NUM);
		if($count > 0) {
			$_SESSION = array('login' => $login ,'password' => $password);
			switch ($login) {
				case 'admin':
					echo "<script type='text/javascript'>document.location.replace('staff_home.php');</script>";
					break;
				
				default:
					echo "<script type='text/javascript'>document.location.replace('hotel_home.php');</script>";
					break;
			}
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
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<h1>Connection</h1>
				<div><input type="text" name="login" placeholder="Login"/></div>
				<div><input type="password" name="pass" placeholder="Password"/></div>
		        <div><input type="submit" name="submit" value="Connection"></div>	
          		<div style="color:black;"><?php echo $errorMessage; ?></div>
		    </form>
		</section>
	</body>
</html>