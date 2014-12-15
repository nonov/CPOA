<?php
	session_start();

	extract($_POST);
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
			<a href="index.php">Retour</a>
			<form action="hotel_home.php" method="post">
				<div><input type="text" name="nom_heberg" placeholder="Nom de l'hébergement"/></div>
				<table> 
                    <tr> 
                        <th> Référence </th> 
                        <th> Quantité </th> 
                        <th> Taille </th> 
                        <th> Prix </th>
                        <th> Supprimer </th> 
                    </tr> 
                    <?php 
                        while ($row = $sql->fetch(PDO::FETCH_NUM)) {
                    ?> 
                    <tr>
                        <td><?php echo $row[1];?></td> 
                        <td><?php echo $row[2];?></td>
                        <td><?php echo $row[3];?></td>
                        <td><?php echo $row[4];?></td>
                        <td> 
                            <form method="post" action="panier.php"> 
                                <input type="hidden" name="id" value="<?php echo $row[0];?>" /> 
                                <input type="submit" name="suppr" value="X" /> 
                            </form> 
                        </td> 
                    </tr> 
                    <?php 
                        } 
                    ?> 
                    <tr>
                        <?php 
                            $total = $handler->query("SELECT sum(price) FROM panier"); 
                            $row = $total->fetch(PDO::FETCH_NUM);
                        ?> 
                        <th> Total: <?php echo $row[0]; ?></th>
                    </tr>
                </table>
				<div><input type="text" name="service" placeholder="Service" /></div>
				<span id="fooBar"></span>
				<div><input type="button" value="Add" placeholder="Ajouter un service" onclick="add()"/></div>
 				<div><input type="submit" value="Envoyer" name="submit"></div>
			</form>
		</section>
		<script type="text/javascript" src="js/js.js"></script>
	</body>
</html>