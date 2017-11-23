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
	 	$pageClient = $_SESSION['PROFILE']['page'];
	 	
	//__inclusion des différentes classes
		require('model/BDD.php');
		require('model/Map.php');
		require('model/Debug.php');

		try {
			
			$map = new Map();

			$size=15;
			$nbrepage = 0;

			$nom_formuleErr = $delaiErr =$nbre_structureErr ="";
			//__Ajout d'une information
			if(!empty($_POST) AND empty($_GET)) {
				extract($_POST);
				
				$nom_formule = strip_tags($_POST['nom_formule']);
				$delai = strip_tags($_POST['delai']);
				$username = $_SESSION['login']; 
				$nbre_structure = strip_tags($_POST['nbre_structure']);

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
	  			if (empty($nbre_structure)) {
	    			$nbre_structureErr = "Number is required";
	  			} else {
	    			$nbre_structure = $nbre_structure;
	    			/*if (!preg_match("/^[0-9 ]*$/",$delai)) {
	      				$delaiErr = "Only letters and white space allowed"; 
	      			}*/
	  			}

	  			if ($nom_formule && $delai && $nbre_structure) {
					$insertInfos = $map-> getInsertFormule($nom_formule,$delai,$username,$nbre_structure);
				}
				else{
					
					require_once("view/vueFormule.php");
				}
		
			}
			
			if(!empty($_GET)){

				//pour la pagintion
				if (isset($_GET['nbrepage'])) {
					$nbrepage = $_GET['nbrepage'];
				}
				//pour la suppression
				if (isset($_GET['code'])) {
					$code_formule = strip_tags($_GET['code']);
					$deleteInfo = $map->getDeleteFormule($code_formule);
				}
				//pour modifier
				if (isset($_GET['code_formule'])) {

					$code_formule = strip_tags($_GET['code_formule']);
				
					$info = $map->getIdFormule($code_formule);

					$modal ="modalok";

					if(!empty($_POST)){

						$nom_formule = strip_tags($_POST['nom_formule']);
						$delai = strip_tags($_POST['delai']);
						$username = $_SESSION['login']; 
						$nbre_structure = strip_tags($_POST['nbre_structure']);
					
						//verification
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
			  			if (empty($nbre_structure)) {
			    			$nbre_structureErr = "Number is required";
			  			} else {
			    			$nbre_structure = $nbre_structure;
			    			/*if (!preg_match("/^[0-9 ]*$/",$delai)) {
			      				$delaiErr = "Only letters and white space allowed"; 
			      			}*/
			  			}
			  			//insertion
			  			if ($nom_formule && $delai && nbre_structure) {
							$update = $map-> getUpdateFormule($code_formule,$nom_formule,$delai,$username,$nbre_structure);
							header('Location:formule.php');
						}
						else{
							
							require_once("view/vueFormule.php");
						}	
					}
				}
			}	
			$offset = $size * $nbrepage;
			$totalpages = $map->getCountFormule();
			if (($totalpages->nb % $size)==0) {
				$nbrePages = (floor(($totalpages->nb) / $size));
			}
			else{
				$nbrePages = (floor(($totalpages->nb) / $size)+1);
			}

			$formules = $map->getFormule($size,$offset); //__ On récupère tous les types structures
			
			require_once("view/vueFormule.php");
		
		} catch (Exception $e) {
		    $msgErreur = $e->getMessage();
		    require_once("view/vueErreur.php");
		}
	}