<?php
/*
 * Contrôleur des différentes pages de veille
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
	session_start();
	
	//die($_SESSION['login']); 
	if(!isset($_SESSION['login'])) {
	  echo 'Vous n\'êtes pas autoris´ à acceder à cette zone';
	  include('identification.php');
	  exit;
	}
	else{
		$titre = "Structure";
		$page = "structure"; //__variable pour la classe "active" du menu-header

		//__inclusion des différentes classes
		require('model/BDD.php');
		require('model/Map.php');
		require('model/Debug.php');

		try {

			$map = new Map();

			
			$code_clientErr = $nom_structureErr = $longitudeErr = $latitudeErr = $contact_structureErr=$adresse_structureErr = $code_type_structureErr = $image_structureErr ="";
			if(!empty($_POST)) {
				extract($_POST);
				
				
				$code_client = strip_tags($_POST['code_client']);
				$nom_structure = strip_tags($_POST['nom_structure']);
				$longitude = strip_tags($_POST['longitude']);
				$latitude = strip_tags($_POST['latitude']);
				$date = new DateTime();

				$adresse_structure = strip_tags($_POST['adresse_structure']);
				$description = strip_tags($_POST['description']);
				$code_type_structure = strip_tags($_POST['code_type_structure']);
				$contact_structure = strip_tags($_POST['contact_structure']);
				$username = $_SESSION['login']; 
				//$image_structure = $nom_structure;
				$nomPhoto = $_FILES["image_structure"]['name'];
				$fichierTempo =  $_FILES["image_structure"]['tmp_name'];
				//move_uploaded_file($fichierTempo, '../common/images/structure-map/'.$nomPhoto.'.jpg');
				//move_uploaded_file($fichierTempo, '../common/images/structure-map/'.$nomPhoto);

				

				if (empty($nom_structure)) {
	    			$nom_structureErr = "Name is required";
	  			} else {
	    			$nom_structure = $nom_structure;
	    			if (!preg_match("/^[a-zA-Z ]*$/",$nom_structure)) {
	      				$nom_structureErr = "Only letters and white space allowed"; 
	      			}
	  			}

	  			if (empty($code_client)) {
	    			$code_clientErr = "Client is required";
	  			} else {
	    			$code_client = $code_client;
	  			}

	  			if (empty($adresse_structure)) {
	    			$adresse_structureErr = "Adress is required";
	  			} else {
	    			$adresse_structure = $adresse_structure;
	  			}

	  			if (empty($code_type_structure)) {
	    			$code_type_structureErr = "Type is required";
	  			} else {
	    			$code_type_structure = $code_type_structure;
	  			}

	  			if (empty($contact_structure)) {
	    			$contact_structureErr = "Contact is required";
	  			} else {
	    			$contact_structure = $contact_structure;
	  			}

	  			if (empty($longitude)) {
	    			$longitudeErr = "Number is required";
	  			} else {
	    			$longitude = $longitude;
	    			/*if (!preg_match("/^[a-zA-Z ]*$/",$longitude)) {
	      				$longitudeErr = "Only letters and white space allowed"; 
	      			}*/
	  			}

	  			if (empty($latitude)) {
	    			$latitudeErr = "Number is required";
	  			} else {
	    			$latitude = $latitude;
	    			/*if (!preg_match("/^[a-zA-Z ]*$/",$latitude)) {
	      				$latitudeErr = "Only letters and white space allowed"; 
	      			}*/
	  			}

	  			if (empty($fichierTempo)) {
					$image_structureErr = "Image is required";
				}
				else{
					$fichierTempo =  $_FILES["image_structure"]['tmp_name'];
					move_uploaded_file($fichierTempo, '../common/images/structure-map/'.$nom_structure.'.jpg');
					
				}

				if ($nom_structure && $longitude && $latitude && $fichierTempo &&  $contact_structure && $code_type_structure && $adresse_structure && $code_client) {
					$insertInfos = $map->getInsertStructure($code_client,$nom_structure,$longitude,$latitude,$nom_structure,$adresse_structure,$description, $code_type_structure, $contact_structure,$username);
				}else{
						$clients = $map->getClient();

						$typeStructures = $map->getTypeStructure();
						require_once("view/vueStructure.php");
				}

			}

			if(!empty($_GET)){

					$code_structure = strip_tags($_GET['code_structure']);
					
					$deleteInfo = $map->getDeleteStructure($code_structure);
					
			}	
			
			$structures = $map->getStructure(); //__ On récupère tous les structures
			$clients = $map->getClient();

			$typeStructures = $map->getTypeStructure();
			require_once("view/vueStructure.php");			
			
		}catch (Exception $e) {
			    $msgErreur = $e->getMessage();
			    require_once("view/vueErreur.php");
		}

	}

		

				

	  				



				
						

