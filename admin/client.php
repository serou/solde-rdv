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
		$titre = "Client";
		$page = "client"; //__variable pour la classe "active" du menu-header
	 
	//__inclusion des différentes classes
		require('model/BDD.php');
		require('model/Map.php');
		require('model/Debug.php');

		try {
			$map = new Map();
			$nom_clientErr = $prenom_clientErr = $contact_1Err = $emailErr = $passwordErr= $code_formuleErr = $latitudeErr = $loginErr = $longitudeErr= $pageErr="";
			//__Ajout d'une information
			if(!empty($_POST)) {
				extract($_POST);
				
				
				$nom_client = strip_tags($_POST['nom_client']);
				$prenom_client = strip_tags($_POST['prenom_client']);
				$contact_1 = strip_tags($_POST['contact_1']);
				$contact_2 = strip_tags($_POST['contact_2']);
				$adress_postal = strip_tags($_POST['adress_postal']);
				$email = strip_tags($_POST['email']);
				$login = strip_tags($_POST['login']);
				$password = strip_tags($_POST['password']);
				$longitude = strip_tags($_POST['longitude']);
				$latitude = strip_tags($_POST['latitude']);
				$code_formule = strip_tags($_POST['code_formule']);
				
				$username = $_SESSION['login'];  
				$page = strip_tags($_POST['page']);
				$password=md5($password);

				if (empty($nom_client)) {
	    			$nom_clientErr = "Name is required";
	  			} else {
	    			$nom_client = $nom_client;
	    			if (!preg_match("/^[a-zA-Z ]*$/",$nom_client)) {
	      				$nom_clientErr = "Only letters and white space allowed"; 
	      			}
	  			}

	  			if (empty($prenom_client)) {
	    			$prenom_clientErr = "Name is required";
	  			} else {
	    			$prenom_client = $prenom_client;
	    			if (!preg_match("/^[a-zA-Z ]*$/",$prenom_client)) {
	      				$prenom_clientErr = "Only letters and white space allowed"; 
	      			}
	  			}

	  			if (empty($contact_1)) {
	    			$contact_1Err = "Number is required";
	  			} else {
	    			$contact_1 = $contact_1;
	    			/*if (!preg_match("/^[a-zA-Z ]*$/",$contact_1)) {
	      				$contact_1Err = "Only letters and white space allowed"; 
	      			}*/
	  			}

	  			if (empty($email)) {
	    			$emailErr = "Email is required";
	  			} else {
	    			$email = $email;
	    			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	      				$emailErr = "Invalid email format"; 
	    			}
	  			}

	  			if (empty($login)) {
	    			$loginErr = "Login is required";
	  			} else {
	    			$login = $login;
	    			if (!preg_match("/^[a-zA-Z ]*$/",$login)) {
	      				$loginErr = "Only letters and white space allowed"; 
	      			}
	  			}


	  			if (empty($password)) {
	    			$passwordErr = "password is required";
	  			} else {
	    			$password = $password;
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

	  			if (empty($page)) {
	    			$pageErr = "Pages d'acces is required";
	  			} else {
	    			$page = $page;
	  			}
	  			
	  			if (empty($code_formule)) {
	    			$code_formuleErr = "Formule is required";
	  			} else {
	    			$code_formule = $code_formule;
	  			}

	  			if ($nom_client && $prenom_client && $contact_1 && $login &&  $password && $latitude && $longitude && $page && $code_formule && $email) {
					$insertInfos = $map->getInsertClient($nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$password,$longitude,$latitude,$code_formule,$page,$username);
				}
				else{

					$formules = $map->getFormule();
					require_once("view/vueClient.php");
				}				
			}
			
			if(!empty($_GET)){

				$code_client = strip_tags($_GET['code_client']);
				$deleteInfo = $map->getDeleteClient($code_client);
				
			}	
			
			$clients = $map->getClient(); //__ On récupère tous les types structures
			$formules = $map->getFormule();

			require_once("view/vueClient.php");
		
		} catch (Exception $e) {
		    $msgErreur = $e->getMessage();
		    require_once("view/vueErreur.php");
		}
	}