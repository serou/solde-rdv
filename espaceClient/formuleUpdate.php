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

	//__inclusion des différentes classes
		require('model/BDD.php');
		require('model/Map.php');
		require('model/Debug.php');
		$pageClient = $_SESSION['PROFILE']['page'];
		

		try {
			
			$map = new Map();
			$nom_formuleErr = $delaiErr ="";
			if(!empty($_GET)){
				$code_formule = strip_tags($_GET['code_formule']);
				
				$info = $map->getIdFormule($code_formule);
				

				if(!empty($_POST)){

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
						$update = $map->getUpdateFormule($code_formule,$nom_formule,$delai,$username);
						header('Location:formule.php');
					}
					else{
						
						require_once("view/vueFormuleUpdate.php");
					}	
				}
			}
			
			require_once("view/vueFormuleUpdate.php");
			
		} catch (Exception $e) {
		    $msgErreur = $e->getMessage();
		    require_once("view/vueErreur.php");
		}
	}