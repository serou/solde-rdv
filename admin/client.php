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
	 	$pageClient = $_SESSION['PROFILE']['page'];
	 	
	//__inclusion des différentes classes
		require('model/BDD.php');
		require('model/Map.php');
		require('model/Debug.php');

		try {

			$size=15;
			$nbrepage = 0;

			$map = new Map();
			$nom_clientErr = $prenom_clientErr = $contact_1Err = $emailErr =$image_clientErr= $passwordErr=$ancpasswordErr= $nvxpasswordErr=$confpasswordErr=$loginErr=$code_formuleErr = $latitudeErr = $longitudeErr= $pageErr="";
		
			//__Ajout d'une information
			if(!empty($_POST) AND empty($_GET)) {
				extract($_POST);
				//pour l'ajout
				/*$nom_clientErr = $prenom_clientErr = $contact_1Err = $emailErr = $image_clientErr = $passwordErr= $code_formuleErr = $latitudeErr = $loginErr = $longitudeErr= $pageErr="";*/
				
				$nom_client = strip_tags($_POST['nom_client']);
				$prenom_client = strip_tags($_POST['prenom_client']);
				$contact_1 = strip_tags($_POST['contact_1']);
				$contact_2 = strip_tags($_POST['contact_2']);
				$adress_postal = strip_tags($_POST['adress_postal']);
				$email = strip_tags($_POST['email']);
				$login = strip_tags($_POST['login']);
				$password = strip_tags($_POST['password']);
				$code_formule = strip_tags($_POST['code_formule']);
				
				$username = $_SESSION['login'];  
				$page = "compteClient.php";
				$password=md5($password);



				//gestion des formules
				$formules = $map->getFormuleF();
				foreach ($formules as $formule) {
					if ($formule->code_formule == $code_formule) {
						$delai= $formule->delai;
						$nbre_structure=$formule->nbre_structure;
						$delai_restant=$delai;
						$date_jour = date('Y-m-d H:i:s');
						//print_r($date_jour);
						$date_fin_formule = date('Y-m-d H:i:s', strtotime('+'.$delai.' day', strtotime($date_jour)));
						/*print_r("expression---");
						print_r($delai);
						print_r("expression---");
						print_r($date_fin_formule);
						die();*/
					}
				}
				


				$nomPhoto = $_FILES["image_client"]['name'];
				$fichierTempo =  $_FILES["image_client"]['tmp_name'];
				$fichierTempo =  $_FILES["image_client"]['tmp_name'];
				move_uploaded_file($fichierTempo, '../common/images/client-map/'.$nom_client.'-'.$prenom_client.'.jpg');
				$image_client= $nom_client.'-'.$prenom_client;
				
				/*if (empty($fichierTempo)) {
						$image_clientErr = "Image is required";
				}
				else{
					$fichierTempo =  $_FILES["image_client"]['tmp_name'];
					move_uploaded_file($fichierTempo, '../common/images/client-map/'.$nom_client.'-'.$prenom_client.'.jpg');
					$image_client= $nom_client.'-'.$prenom_client;
						
				}*/
				
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
	  			
	  			if ($nom_client && $prenom_client && $contact_1 && $login &&  $password && $page && $code_formule && $email) {
					$insertInfos = $map->getInsertClient($nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$password,$code_formule,$page,$username,$image_client,$date_fin_formule,$nbre_structure,$delai_restant);
				}
				else{

					$formules = $map->getFormuleF();
					require_once("view/vueClient.php");
				}				
			}

			
			if(!empty($_GET)){
				//pour la pagintion
				if (isset($_GET['nbrepage'])) {
					$nbrepage = $_GET['nbrepage'];
				}
				//pour la suppression
				if (isset($_GET['code'])) {
					$code_client = strip_tags($_GET['code']);
					$deleteInfo = $map->getDeleteClient($code_client);
				}

				if (isset($_GET['code_client'])) {
					$code_client = strip_tags($_GET['code_client']);
				
					$info = $map->getIdClient($code_client);
					//cas ou lon souhaite changer de formule or on as encore des jours pour ntre formule precedente
					if ($info->delai_restant >=0) {
						
						$delai_restant=$info->delai_restant;
					}
					$formules = $map->getFormuleF();
					$donnes = $map->getVerifPasswordClient($code_client);

					$modal ="modalok";

					//pour modification
					
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
						$contact_1 = strip_tags($_POST['contact_1']);
						$contact_2 = strip_tags($_POST['contact_2']);
						$code_formule = strip_tags($_POST['code_formule']);

						//gestion des formules
						$formules = $map->getFormuleF();
						foreach ($formules as $formule) {
							if ($formule->code_formule == $code_formule) {
								$delai= $formule->delai;
								//cas il existe encore des jours pou les delais
								$delai_restant=$delai_restant;
								$nbre_structure=$formule->nbre_structure;
								$date_jour = date('Y-m-d H:i:s');
								//print_r($date_jour);
								$date_fin_formule = date('Y-m-d H:i:s', strtotime('+'.$delai+$delai_restant.' day', strtotime($date_jour)));
								
								//apres mise a jour on recalcul le delai restant
			                    function dateDiff($date1, $date2){
			                          $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
			                          $retour = array();
			                       
			                          $tmp = $diff;
			                          $retour['second'] = $tmp % 60;
			                       
			                          $tmp = floor( ($tmp - $retour['second']) /60 );
			                          $retour['minute'] = $tmp % 60;
			                       
			                          $tmp = floor( ($tmp - $retour['minute'])/60 );
			                          $retour['hour'] = $tmp % 24;
			                       
			                          $tmp = floor( ($tmp - $retour['hour'])  /24 );
			                          $retour['day'] = $tmp;
			                       
			                          return $retour;
			                    }
			                    
			                    $delai_restant= dateDiff(strtotime($date_fin_formule),strtotime($date_jour));
			                    $delai_restant = $delai_restant['day'];


								/*print_r("expression---");
								print_r($delai);
								print_r("expression---");
								print_r($date_fin_formule);
								print_r("expression---");
								print_r($delai_restant);

								die();*/
							}
						}
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

			  			if ($login && $nvxpassword != 'd41d8cd98f00b204e9800998ecf8427e' && $confpassword != 'd41d8cd98f00b204e9800998ecf8427e' && $ancpassword == $donnes->password && $confpassword==$nvxpassword && $code_formule && $page &&  $email && $nom_client && $prenom_client && $contact_1) {
			  				$fichierTempo =  $_FILES["image_client"]['tmp_name'];	
			  				if ($fichierTempo =="") {
								
								$update = $map->getUpdateClientFile($code_client,$nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$password,$code_formule,$page,$username,$nbre_structure,$delai_restant);
								header('Location:client.php');
							}else{

								if ($nom_client.'-'.$prenom_client==$info->image_client) {
									/*print_r("test2");
								die();*/
									//mise a jour sans le parametre image
									move_uploaded_file($fichierTempo, '../common/images/client-map/'.$nom_client.'-'.$prenom_client.'.jpg');	
									$image_client = $nom_client.'-'.$prenom_client; 
									$update = $map->getUpdateClientFile($code_client,$nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$password,$code_formule,$page,$username,$nbre_structure,$delai_restant);
									header('Location:client.php');
								}else{
									
									move_uploaded_file($fichierTempo, '../common/images/client-map/'.$nom_client.'-'.$prenom_client.'.jpg');	
									$image_client = $nom_client.'-'.$prenom_client; 
									$update = $map->getUpdateClient($code_client,$nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$password,$code_formule,$page,$username,$image_client,$nbre_structure,$delai_restant);
									header('Location:client.php');
								}	
							}
						}
						else{
						
							$formules = $map->getFormuleF();
							require_once("view/vueClient.php");
						}	
					}
				}
			}	

			$offset = $size * $nbrepage;
			$totalpages = $map->getCountClients();
			if (($totalpages->nb % $size)==0) {
				$nbrePages = (floor(($totalpages->nb) / $size));
			}
			else{
				$nbrePages = (floor(($totalpages->nb) / $size)+1);
			}

			$clients = $map->getClient($size,$offset); //__ On récupère tous les types structures
			$formules = $map->getFormuleF();
			
			require_once("view/vueClient.php");
		
		} catch (Exception $e) {
		    $msgErreur = $e->getMessage();
		    require_once("view/vueErreur.php");
		}
	}