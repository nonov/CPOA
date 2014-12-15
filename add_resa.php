<?php
	session_start();

	extract($_POST);
	if (isset($submit)) {
		require_once("db_connexion.php");
		$sql = $handler->prepare("SELECT * FROM reservation VALUES (:id_vip,:id_herberg,:date_d,:date_f)");
		$sql->execute(['id_vip' => $])*/
	}
?><!doctype html> 
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title> Bienvenue au Festival de Cannes </title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="js/jquery-ui-1.11.2.custom/jquery-ui.css" />
		<link rel="stylesheet" href="js/jquery-ui-1.11.2.custom/jquery-ui.min.css" />
		<link rel="stylesheet" href="js/jquery-ui-1.11.2.custom/jquery-ui.structure.css" />
		<link rel="stylesheet" href="js/jquery-ui-1.11.2.custom/jquery-ui.structure.min.css" />
		<link rel="stylesheet" href="js/jquery-ui-1.11.2.custom/jquery-ui.theme.css" />
		<link rel="stylesheet" href="js/jquery-ui-1.11.2.custom/jquery-ui.theme.min.css" />
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	</head>
	<body>
		<p><?php echo $_SESSION['login']; ?></p>
		<section>
			<a href="staff_home.php">Retour</a>	
			<form action="add_resa.php" method="post">
				<h1>Ajout d'une réservation</h1>
				<div><input type="number" name="nb_person" style="width:180px" placeholder="Nombre de personnes" min="1" max="100" required = "true"></div>				
				<div>
					<input type="text" id="from" name="from" placeholder="Début" style="width:90px" >
					<input type="text" id="to" name="to" placeholder="Fin" style="width:90px" >
				</div>
				<div><select name="job" style="width:180px">
					<option value="lm" selected>Jury/acteur longs métrages</option>
					<option value="cm">Jury/acteur courts métrages</option>
					<option value="ucr">Jury/acteur Un Certain Regard</option>
					<option value="cdo">Jury/acteur Caméra D'Or</option>
					<option value="autre">Autres ...</option>
				</select></div>
				<div><input style="width:180px" type="submit" name="submit" value="Réserver"></div>
          	</form>
		</section>
	</body>
</html><script>
$(function() {
	    $( "#from" ).datepicker({
	    	defaultDate: "+1w",
	      	changeMonth: true,
	      	numberOfMonths: 1,
	      	onClose: function( selectedDate ) {
	        	$( "#to" ).datepicker( "option", "minDate", selectedDate );
	      	}
	    });
	    $( "#to" ).datepicker({
	      	defaultDate: "+1w",
	      	changeMonth: true,
	      	numberOfMonths: 1,
	      	onClose: function( selectedDate ) {
	        	$( "#from" ).datepicker( "option", "maxDate", selectedDate );
	      	}
	    });
});
</script>