<?php

/*
 * Contrôleur des différentes pages de veille
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
 
//__inclusion des différentes classes
	session_start();

	if(!isset($_SESSION['login'])) {
	  echo 'Vous n\'êtes pas autorisé´ à acceder à cette zone';
	  include('identification.php');
	  exit;
	}
	else{

		require('model/BDD.php');
		require('model/Map.php');
		require('model/Debug.php');
		$pageClient = $_SESSION['PROFILE']['page'];
		

		try {

			$map = new Map();
			$lib_roleErr="";

			if(!empty($_GET)){

				$code_role = strip_tags($_GET['code_role']);
				$info = $map->getIdRole($code_role);

				
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
						
						require_once("view/vueRoleUpdate.php");
					}	
					
				}
			}
			
			require_once("view/vueRoleUpdate.php");
			
		} catch (Exception $e) {
		    $msgErreur = $e->getMessage();
		    require_once("view/vueErreur.php");
		}
	}