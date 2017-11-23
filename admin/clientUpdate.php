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
			$nom_clientErr = $prenom_clientErr = $contact_1Err = $emailErr =$image_clientErr= $passwordErr=$ancpasswordErr= $nvxpasswordErr=$confpasswordErr=$loginErr=$code_formuleErr = $latitudeErr = $longitudeErr= $pageErr="";
			
			if(!empty($_GET)){
				$code_client = strip_tags($_GET['code_client']);
				
				$info = $map->getIdClient($code_client);
				$formules = $map->getFormule();
				$donnes = $map->getVerifPasswordClient($code_client);
				

				if(!empty($_POST)){

					$nom_client = strip_tags($_POST['nom_client']);
					$login = strip_tags($_POST['login']);
					$ancpassword = strip_tags($_POST['ancpassword']);
					$nvxpassword = strip_tags($_POST['nvxpassword']);
					$confpassword = strip_tags($_POST['confpassword']);
					$ancpassword = md5($ancpassword);
					$nvxpassword = md5($nvxpassword);
					$confpassword = md5($confpassword);
					$email = strip_tags($_POST['email']);
					$page = "compteClient.php";
					$prenom_client = strip_tags($_POST['prenom_client']);
					$adress_postal = strip_tags($_POST['adress_postal']);
					$longitude = strip_tags($_POST['longitude']);
					$latitude = strip_tags($_POST['latitude']);
					$contact_1 = strip_tags($_POST['contact_1']);
					$contact_2 = strip_tags($_POST['contact_2']);
					$code_formule = strip_tags($_POST['code_formule']);

					$username = $_SESSION['login']; 

					$nomPhoto = $_FILES["image_client"]['name'];
					$fichierTempo =  $_FILES["image_client"]['tmp_name'];


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


		  			if (empty($ancpassword)) {
		    			$ancpasswordErr = "password is required";
		  			} else {
		  				if ($ancpassword == 'd41d8cd98f00b204e9800998ecf8427e') {
			    					$ancpasswordErr = "password is required";
			    				
					  		} else {
					    			$ancpassword = $ancpassword;
					  		}
		  			}

		  			if (empty($nvxpassword)) {
		    			$nvxpasswordErr = "password is required";
		  			} else {
		  				if ($nvxpassword == 'd41d8cd98f00b204e9800998ecf8427e') {
			    					$nvxpasswordErr = "password is required";
			    				
					  		} else {
					    			$nvxpassword = $nvxpassword;	
					  		}
		  			}
		  			
		  			if (empty($confpassword)) {
		    			$confpasswordErr = "password is required";
		  			} else {
		  				if ($confpassword == 'd41d8cd98f00b204e9800998ecf8427e') {
			    					$confpasswordErr = "password is required";
			    				
					  		} else {
					    			$confpassword = $confpassword;
					    			
					  		}
		  			}

		  			//verification de la conformiter des password
		  			if ($ancpassword == $donnes->password) {
		  				if ($confpassword!= $nvxpassword) {

		  					$confpasswordErr = "Password pas conforme";
		  					$nvxpasswordErr = "Password pas conforme";
			    			
			  			} else {
			    			$confpassword = $confpassword;
			    			$nvxpassword = $nvxpassword;
			    			
			  			}
			  		}
			  		else{
			  			$ancpasswordErr = "Password incorrect";
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

		  			if ($login && $nvxpassword != 'd41d8cd98f00b204e9800998ecf8427e' && $confpassword != 'd41d8cd98f00b204e9800998ecf8427e' && $ancpassword == $donnes->password && $confpassword==$nvxpassword && $code_formule && $page &&  $email && $nom_client && $prenom_client && $contact_1 && $longitude && $latitude ) {
		  				$fichierTempo =  $_FILES["image_client"]['tmp_name'];	
		  				if ($fichierTempo =="") {
							
							$update = $map->getUpdateClientFile($code_client,$nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$confpassword,$longitude,$latitude,$code_formule,$page,$username);
							header('Location:client.php');
						}else{

							if ($nom_client.'-'.$prenom_client==$info->image_client) {
								print_r("test2");
							die();
								//mise a jour sans le parametre image
								move_uploaded_file($fichierTempo, '../common/images/client-map/'.$nom_client.'-'.$prenom_client.'.jpg');	
								$image_client = $nom_client.'-'.$prenom_client; 
								$update = $map->getUpdateClient($code_client,$nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$confpassword,$longitude,$latitude,$code_formule,$page,$username,$image_client);
								header('Location:client.php');
							}else{
								
								move_uploaded_file($fichierTempo, '../common/images/client-map/'.$nom_client.'-'.$prenom_client.'.jpg');	
								$image_client = $nom_client.'-'.$prenom_client; 
								$update = $map->getUpdateClient($code_client,$nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$confpassword,$longitude,$latitude,$code_formule,$page,$username,$image_client);
								header('Location:client.php');
							}	
						}
					}
					else{
					
						$formules = $map->getFormule();
						require_once("view/vueClientUpdate.php");
					}	
				}
			}
			require_once("view/vueClientUpdate.php");
			
		} catch (Exception $e) {
		    $msgErreur = $e->getMessage();
		    require_once("view/vueErreur.php");
		}
	}