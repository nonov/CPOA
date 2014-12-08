<?php
	session_start();
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
			<a href="index.php">Retour</a>	
			<div id="form">
				<h1>Gestion des réservations</h1>
				<div><a href="add_heberg.php"><button>Ajouter un hébergement</button></a></div>
				<div><a href="add_resa.php"><button>Ajouter une réservation</button></a></div>
				<div><a href="#"><button>Supprimer une réservation</button></a></div>
		   	</div>
		</section>
	</body>
</html>