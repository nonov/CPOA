<?php
	class Vip () {
		
		private $_id = 1;
		private $_nom;
		private $_prenom;
		private $_email;
		private $_job;
		private $_pays;
		private $_jury;
		private $_type_jury;

		public function __construct($nom,$prenom,$email,$job,$pays,$jury,$type_jury) {
		    $this->_id++;
		    $this->_nom = $nom;
		    $this->_prenom = $prenom;
		    $this->_email = $email;
		    $this->_job = $job;
		    $this->_pays = $pays;
		    $this->_jury = $jury;
		    $this->_type_jury = $type_jury;
		  }
		
		public function AddVip() {
			private $errorMessage = "";
			// Connexion DB
			require_once("db_connexion.php");
			// Recherche dans DB si le VIP existe
			$select = $handler->prepare("SELECT * FROM vip WHERE nom = :nom AND prenom = :prenom AND email = :email");
			$select->execute(['nom'=>$this->_nom, 'prenom'=>$this->_prenom, 'email'=>$this->_email]);
			$result = $select->fetch(PDO::FETCH_NUM);
			// Si il existe on ne le créer pas, sinon on le créer et on l'ajoutera dans la BD
			if ($result > 0) {
				$errorMessage = "Ce VIP existe déjà !";
				echo "<script type='text/javascript'>document.location.replace('add_vip.php');</script>";
			} else {
				$insert = $handler->prepare("INSERT INTO vip(`nom`,`prenom`,`email`,`job`,`pays`,`jury`,`type_jury`) VALUES (:nom,:prenom,:email,:job,:pays,:jury,:type_jury");
				$insert->execute(['nom'=>$this->_nom,'prenom'=>$this->_prenom,'email'=>$this->_email,'job'=>$this->_job,'pays'=>$this->_pays,'jury'=>$this->_jury,'type_jury'=>$this->_type_jury]);
				$errorMessage = "Vip Ajouté à la base de données !";
			}
			return $errorMessage;
		}
	}
?>