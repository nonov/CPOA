<?php
	session_start();

	extract($_POST);
	if (isset($submit)) {
		require_once("db_connexion.php");
		$sql = $handler->prepare("INSERT INTO users(`login`,`password`,`email`) VALUES (:login,:password,:email)");
		$sql->execute(['login' => $login, 'password' => md5($password), 'email' => $email]);
		echo "<script type='text/javascript'>document.location.replace('staff_home.php');</script>";

		$to = $email; 
		$from = "noe.viricel@orange.fr";
		$subject = "Identifiants Cannes";
		$body = '
     		<html>
      			<body>
      				<p>Voici vos identifiant pour le Festival de Cannes: </p>
       				<table>
        				<tr>
         					<th>Login</th>
         					<th>Password</th>
        				</tr>
        				<tr>
         					<td>'.$login.'</td>
         					<td>'.$password.'</td>
         				</tr>
       				</table>
      			</body>
     		</html>';
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
     	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			
		if (mail($to, $subject, $body, $headers)) {
			$errorMessage = 'Message envoyé ! ';
		} else {
			echo 'Erreur, message non envoyé ! ';
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
		<p><?php echo $_SESSION['login']; ?></p>
		<section>
			<a href="staff_home.php">Retour</a>	
			<form action="add_heberg.php" method="post" id="formID">
				<h1>Ajout d'un hébergement à la base de données</h1>
				<div><input type="text" name="login" style="width:180px" placeholder="Login" required = "true"></div>
				<div><input type="text" name="password" style="width:180px" placeholder="Password" required = "true"></div>					
				<div><input type="email" name="email" style="width:180px" placeholder="Email" required = "true"></div>	
				<p id="errorMessage" style="display:none; color:black;">Merci de remplir le formulaire en entier!</p>
				<div><input style="width:180px" type="submit" name="submit" value="Ajouter"></div>
          	</form>
		</section>
		<script type="text/javascript" src="js/js.js"></script>
	</body>
</html>