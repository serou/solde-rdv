<?php
/*
 * Contrôleur des différentes pages de veille
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
	session_start();
	
	if(!isset($_SESSION['login'])) {
	  echo 'Vous n\'êtes pas autorisé´ à acceder à cette zone';
	  include('identification.php');
	  exit;
	}
	else{
		$titre = "Formule";
		$page = "formule"; //__variable pour la classe "active" du menu-header
	 
	//__inclusion des différentes classes
		require('model/BDD.php');
		require('model/Map.php');
		require('model/Debug.php');

		try {
			
			$map = new Map();
			$nom_formuleErr = $delaiErr ="";
			//__Ajout d'une information
			if(!empty($_POST)) {
				extract($_POST);
				
				$nom_formule = strip_tags($_POST['nom_formule']);
				$delai = strip_tags($_POST['delai']);
				$username = $_SESSION['login']; 

				if (empty($nom_formule)) {
	    			$nom_formuleErr = "Name is required";
	  			} else {
	    			$nom_formule = $nom_formule;
	    			if (!preg_match("/^[a-zA-Z ]*$/",$nom_formule)) {
	      				$nom_formuleErr = "Only letters and white space allowed"; 
	      			}
	  			}
	  			if (empty($delai)) {
	    			$delaiErr = "Number is required";
	  			} else {
	    			$delai = $delai;
	    			/*if (!preg_match("/^[0-9 ]*$/",$delai)) {
	      				$delaiErr = "Only letters and white space allowed"; 
	      			}*/
	  			}

	  			if ($nom_formule && $delai) {
					$insertInfos = $map->getInsertFormule($nom_formule,$delai,$username);
				}
				else{
					
					require_once("view/vueFormule.php");
				}
		
			}
			
			if(!empty($_GET)){

				$code_formule = strip_tags($_GET['code_formule']);
				
				$deleteInfo = $map->getDeleteFormule($code_formule);
				
			}	
			
			$formules = $map->getFormule(); //__ On récupère tous les types structures
			
			require_once("view/vueFormule.php");
		
		} catch (Exception $e) {
		    $msgErreur = $e->getMessage();
		    require_once("view/vueErreur.php");
		}
	}