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
	 
	//__inclusion des différentes classes
		require('model/BDD.php');
		require('model/Map.php');
		require('model/Debug.php');

		try {
			$map = new Map();
			$lib_roleErr="";
			//__Ajout d'une information
			if(!empty($_POST)) {
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

				$code_role = strip_tags($_GET['code_role']);
				$deleteInfo = $map->getDeleteRole($code_role);
			}	
			
			$roles = $map->getRole(); //__ On récupère tous les roles
			require_once("view/vueRole.php");

		} catch (Exception $e) {
		    $msgErreur = $e->getMessage();
		    require_once("view/vueErreur.php");
		}
	}