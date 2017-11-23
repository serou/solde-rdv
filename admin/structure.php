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
		$pageClient = $_SESSION['PROFILE']['page'];
		
		
		//__inclusion des différentes classes
		require('model/BDD.php');
		require('model/Map.php');
		require('model/Debug.php');

		try {

			$size=15;
			$nbrepage = 0;

			$map = new Map();

			
			$quotaErr = $code_clientErr = $nom_structureErr = $longitudeErr = $latitudeErr = $contact_structureErr=$adresse_structureErr = $code_type_structureErr = $image_structureErr ="";
			if(!empty($_POST) AND empty($_GET)) {
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
				
				$nomPhoto = $_FILES["image_structure"]['name'];
				$fichierTempo =  $_FILES["image_structure"]['tmp_name'];
				

				//pour verifier si le clients napa deja atteint son quota de structure
				$formuleClients =$map->getFormuleClient($code_client);
				$structureClients = $map->getCountStructureClient($code_client);
				
				
				foreach ($formuleClients as  $formuleClient) {
					$nbre_structureClient =$formuleClient->nbre_structure;
					
				}
				foreach ($structureClients as  $structureClient) {
					$totalStructureClient =$structureClient->nb;
					
				}
				/*print_r($structureClients);
				print_r("------------");
				print_r($nbre_structureClient);
				print_r("----------");
				print_r($totalStructureClient);
				print_r("----------");
				die();*/

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
					//$image_structureErr = "Image is required";
				}
				else{
					$fichierTempo =  $_FILES["image_structure"]['tmp_name'];
					move_uploaded_file($fichierTempo, '../common/images/structure-map/'.$nom_structure.'.jpg');
					$image_structure = $nom_structure;
					
				}

				if ($nom_structure && $longitude && $latitude && $fichierTempo &&  $contact_structure && $code_type_structure && $adresse_structure && $code_client) {
					if ($totalStructureClient < $nbre_structureClient) {
					
						$insertInfos = $map->getInsertStructure($code_client,$nom_structure,$image_structure,$adresse_structure,$description,$code_type_structure,$contact_structure,$username,$longitude,$latitude);
					}
					else{
						$quotaErr= "Ce Client a atteint son quota de Structure qu'il doit creer";
					}
				}else{
						$clients = $map->getClientF();
						$typeStructures = $map->getTypeStructureF();
						require_once("view/vueStructure.php");
				}

			}

			if(!empty($_GET)){

				//pour la pagintion
				if (isset($_GET['nbrepage'])) {
					$nbrepage = $_GET['nbrepage'];
				}

				if (isset($_GET['code'])) {
					$code_structure = strip_tags($_GET['code']);
					$deleteInfo = $map->getDeleteStructure($code_structure);
				}	
				if (isset($_GET['code_structure'])) {

					$code_structure = strip_tags($_GET['code_structure']);
			
					$info = $map->getIdStructure($code_structure);
					$clients = $map->getClientF();
					$typeStructures = $map->getTypeStructureF();

					$modal ="modalok";

					if(!empty($_POST)){

						$code_client = strip_tags($_POST['code_client']);
						$nom_structure = strip_tags($_POST['nom_structure']);
						$longitude = strip_tags($_POST['longitude']);
						$latitude = strip_tags($_POST['latitude']);
						$adresse_structure = strip_tags($_POST['adresse_structure']);
						$description = strip_tags($_POST['description']);
						$contact_structure = strip_tags($_POST['contact_structure']);
						$code_type_structure = strip_tags($_POST['code_type_structure']);
						
						$username = $_SESSION['login']; 
						$nomPhoto = $_FILES["image_structure"]['name'];
						$fichierTempo =  $_FILES["image_structure"]['tmp_name'];
						//$image_structure = $nom_structure;

						

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

			  			/*if (empty($fichierTempo)) {
							$image_structureErr = "Image is required";
						}
						else{
							$fichierTempo =  $_FILES["image_structure"]['tmp_name'];
							move_uploaded_file($fichierTempo, '../common/images/structure-map/'.$nom_structure.'.jpg');
						}*/

						if ($nom_structure && $longitude && $latitude  &&  $contact_structure && $code_type_structure && $adresse_structure && $code_client) {
													
								$fichierTempo =  $_FILES["image_structure"]['tmp_name'];			

								if ($fichierTempo =="") {
									
									$update = $map->getUpdateStructureFile($code_structure,$code_client,$nom_structure,$longitude,$latitude,$adresse_structure,$description, $code_type_structure,$contact_structure,$username); 
									header('Location:structure.php');
								}else{

									if ($nom_structure==$info->image_structure) {
										//mise a jour sans le parametre image
										move_uploaded_file($fichierTempo, '../common/images/structure-map/'.$nom_structure.'.jpg');	
										$image_structure = $nom_structure; 
										$update = $map->getUpdateStructureFile($code_structure,$code_client,$nom_structure,$longitude,$latitude,$adresse_structure,$description, $code_type_structure,$contact_structure,$username);
										header('Location:structure.php');
									}else{
										
										move_uploaded_file($fichierTempo, '../common/images/structure-map/'.$nom_structure.'.jpg');	
										$image_structure = $nom_structure; 
										$update = $map->getUpdateStructure($code_structure,$code_client,$nom_structure,$longitude,$latitude,$image_structure,$adresse_structure,$description, $code_type_structure,$contact_structure,$username);
										header('Location:structure.php');
									}	
								}
						}else{
								$clients = $map->getClientF();

								$typeStructures = $map->getTypeStructureF();
								require_once("view/vueStructure.php");
						}	
						
					}
				}
			}	

			$offset = $size * $nbrepage;
			$totalpages = $map->getCountStructure();
			if (($totalpages->nb % $size)==0) {
				$nbrePages = (floor(($totalpages->nb) / $size));
			}
			else{
				$nbrePages = (floor(($totalpages->nb) / $size)+1);
			}

			 //__ On récupère tous les structures
			$clients = $map->getClientF();
			$typeStructures = $map->getTypeStructureF();
			$structures = $map-> getStructure($size,$offset);
			require_once("view/vueStructure.php");			
			
		}catch (Exception $e) {
			    $msgErreur = $e->getMessage();
			    require_once("view/vueErreur.php");
		}

	}

		

				

	  				



				
						

