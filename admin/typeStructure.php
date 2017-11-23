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
	
		$titre = "Type Structure";
		$page = "typeStructure"; //__variable pour la classe "active" du menu-header
	 	$pageClient = $_SESSION['PROFILE']['page'];
	 	
	//__inclusion des différentes classes
		require('model/BDD.php');
		require('model/Map.php');
		require('model/Debug.php');

		try {

			$size=15;
			$nbrepage = 0;

			$map = new Map();

			$lib_type_structureErr="";

			//pour l'ajout
			if(!empty($_POST) AND empty($_GET)) {
				extract($_POST);
				
				$lib_type_structure = strip_tags($_POST['lib_type_structure']);
				$username = $_SESSION['login']; 

				if (empty($lib_type_structure)) {
	    			$lib_type_structureErr = "Name is required";
	  			} else {
	    			$lib_type_structure = $lib_type_structure;
	    			if (!preg_match("/^[a-zA-Z ]*$/",$lib_type_structure)) {
	      				$lib_type_structureErr = "Only letters and white space allowed"; 
	      			}
	  			}

	  			if ($lib_type_structure ) {
					$insertInfos = $map->getInsertTypeStructure($lib_type_structure,$username);
				}
				else{
					
					//$typeStructures = $map->getTypeStructure(); //__ On récupère tous les types structures
					require_once("view/vueTypeStructure.php");
				}
		
			}
			//pour modification
			if(!empty($_GET)){

				//pour la pagintion
				if (isset($_GET['nbrepage'])) {
					$nbrepage = $_GET['nbrepage'];
				}
				
				//pour la suppression
				if (isset($_GET['code_type'])) {

					$code_type_structure = strip_tags($_GET['code_type']);
					$deleteInfo = $map->getDeleteTypeStructure($code_type_structure);
				}
				//pour modifier
				if (isset($_GET['code_type_structure'])) {

					
					$code_type_structure = strip_tags($_GET['code_type_structure']);
					
					$info = $map->getIdTypeStructure($code_type_structure);
					
					$modal ="modalok";
					
					if(!empty($_POST)){

						
						$lib_type_structure = strip_tags($_POST['lib_type_structure']);
						$username = $_SESSION['login']; 
						
						if (empty($lib_type_structure)) {
			    			$lib_type_structureErr = "Name is required";
			  			} else {
			    			$lib_type_structure = $lib_type_structure;
			    			if (!preg_match("/^[a-zA-Z ]*$/",$lib_type_structure)) {
			      				$lib_type_structureErr = "Only letters and white space allowed"; 
			      			}
			  			}
						
						if ($lib_type_structure ) {
							$update = $map->getUpdateTypeStructure($code_type_structure, $lib_type_structure,$username);
							header('Location:typeStructure.php');
						}
						else{
							//au cas ou le champ est videtrouver ou rediriger
							
							require_once("view/vuetypeStructure.php");
						}
					}
				}
				
			}	
		
	
			
			$offset = $size * $nbrepage;
			$totalpages = $map->getCountTypeStructure();
			if (($totalpages->nb % $size)==0) {
				$nbrePages = (floor(($totalpages->nb) / $size));
			}
			else{
				$nbrePages = (floor(($totalpages->nb) / $size)+1);
			}
			
			$typeStructures = $map->getTypeStructure($size,$offset); //__ On récupère tous les types structures
			
			//if (isset($info)) {
				//$modal=$code_type_structure;

		//	}else{
				require_once("view/vueTypeStructure.php");
		//	}
				
			
			
		} catch (Exception $e) {
		    $msgErreur = $e->getMessage();
		    require_once("view/vueErreur.php");
		}
	}