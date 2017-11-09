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
	


	try {

		$map = new Map();
		$lib_type_structureErr="";

		if(!empty($_GET)){
			$code_type_structure = strip_tags($_GET['code_type_structure']);
			
			$info = $map->getIdTypeStructure($code_type_structure);
			$typeStructures = $map->getTypeStructure();
			
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
					
					//$typeStructures = $map->getTypeStructure(); //__ On récupère tous les types structures
					require_once("view/vuetypeStructureUpdate.php");
				}
			}
		}
		
		require_once("view/vuetypeStructureUpdate.php");
		
	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	}
}