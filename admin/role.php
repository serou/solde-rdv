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

		$titre = "Role";
		$page = "role"; //__variable pour la classe "active" du menu-header
	 	$pageClient = $_SESSION['PROFILE']['page'];
	 	
	//__inclusion des différentes classes
		require('model/BDD.php');
		require('model/Map.php');
		require('model/Debug.php');

		try {
			$size=15;
			$nbrepage = 0;

			$map = new Map();
			$lib_roleErr="";

			//__Ajout d'une information
			if(!empty($_POST) AND empty($_GET)) {
				extract($_POST);
				
				$lib_role = strip_tags($_POST['lib_role']);
				$username = $_SESSION['login']; 

				if (empty($lib_role)) {
	    			$lib_roleErr = "Name is required";
	  			} else {
	    			$lib_role = $lib_role;
	    			if (!preg_match("/^[a-zA-Z ]*$/",$lib_role)) {
	      				$loginErr = "Only letters and white space allowed"; 
	      			}
	  			}
	  			if ($lib_role) {
					$insertInfos = $map->getInsertRole($lib_role,$username);
				}
				else{
					
					require_once("view/vueRole.php");
				}		
			}
			
			if(!empty($_GET)){
				//pour la pagintion
				if (isset($_GET['nbrepage'])) {
					$nbrepage = $_GET['nbrepage'];
				}
				if (isset($_GET['code'])) {
					$code_role = strip_tags($_GET['code']);
					$deleteInfo = $map->getDeleteRole($code_role);
				}
				//pour modifier
				if (isset($_GET['code_role'])) {

					$code_role = strip_tags($_GET['code_role']);
					$info = $map->getIdRole($code_role);
					$modal ="modalok";
					if(!empty($_POST)){

						$lib_role = strip_tags($_POST['lib_role']);
						$username = $_SESSION['login']; 

						if (empty($lib_role)) {
			    			$lib_roleErr = "Name is required";
			  			} else {
			    			$lib_role = $lib_role;
			    			if (!preg_match("/^[a-zA-Z ]*$/",$lib_role)) {
			      				$loginErr = "Only letters and white space allowed"; 
			      			}
			  			}
			  			if ($lib_role) {
							$update = $map->getUpdateRole($code_role,$lib_role,$username);
							header('Location:role.php');	
						}
						else{
							
							require_once("view/vueRole.php");
						}	
					
					}
				}
				
			}	
			$offset = $size * $nbrepage;
			$totalpages = $map->getCountRole();
			if (($totalpages->nb % $size)==0) {
				$nbrePages = (floor(($totalpages->nb) / $size));
			}
			else{
				$nbrePages = (floor(($totalpages->nb) / $size)+1);
			}

			$roles = $map->getRole($size,$offset); //__ On récupère tous les roles
			require_once("view/vueRole.php");

		} catch (Exception $e) {
		    $msgErreur = $e->getMessage();
		    require_once("view/vueErreur.php");
		}
	}