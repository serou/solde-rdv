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

		$codeRoleErr = $emailErr = $loginErr = $passwordErr = $ancpasswordErr = $nvxpasswordErr = $confpasswordErr= $image_userErr = $pageErr="";
		

		if(!empty($_GET)){


			$user_id = strip_tags($_GET['user_id']);
			
			$info = $map->getIdUsers($user_id);
			$roles = $map->getRole();
			$donnes = $map->getVerifPassword($user_id);


			if(!empty($_POST)){

				$code_role = strip_tags($_POST['code_role']);
				$login = strip_tags($_POST['login']);
				$ancpassword = strip_tags($_POST['ancpassword']);
				$nvxpassword = strip_tags($_POST['nvxpassword']);
				$confpassword = strip_tags($_POST['confpassword']);
				$ancpassword = md5($ancpassword);
				$nvxpassword = md5($nvxpassword);
				$confpassword = md5($confpassword);
				$email = strip_tags($_POST['email']);
			
				$page = strip_tags($_POST['page']);
				$username = $_SESSION['login'];

				$nomPhoto = $_FILES["image_user"]['name'];
				$fichierTempo =  $_FILES["image_user"]['tmp_name'];
				
				/*if (empty($fichierTempo)) {
						$image_userErr = "Image is required";
				}
				else{
					$fichierTempo =  $_FILES["image_user"]['tmp_name'];
					move_uploaded_file($fichierTempo, '../common/images/user-map/'.$login.'.jpg');
					$image_user= $login;
						
				}*/

				if (empty($login)) {
    				$loginErr = "Login is required";
	  			} else {
	    			$login = $login;
	    			/*if (!preg_match("/^[a-zA-Z ]*$/",$login)) {
	      				$loginErr = "Only letters and white space allowed"; 
	      			}*/
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
	  			if (empty($email)) {
	    			$emailErr = "Email is required";
	  			} else {
	    			$email = $email;
	    			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	      				$emailErr = "Invalid email format"; 
	    			}
	  			}
	  			if (empty($code_role)) {
	    			$codeRoleErr = "Role is required";
	  			} else {
	    			$code_role = $code_role;
	  			}
			
				
				
					/*print_r($ancpassword);
					print_r('------');
					print_r($ancpasswordErr);
					print_r('------');
					print_r($donnes->password);
					print_r('------');
					print_r($nvxpassword);
					print_r('------');
					print_r($nvxpasswordErr);
					print_r('------');
					print_r($confpassword);
					print_r('------');
					print_r($confpasswordErr);
					die();*/
				if ($login && $nvxpassword != 'd41d8cd98f00b204e9800998ecf8427e' && $confpassword != 'd41d8cd98f00b204e9800998ecf8427e' && $ancpassword == $donnes->password && $confpassword==$nvxpassword && $code_role && $page &&  $email ) {
					//print_r("entre");
					//die();
					$fichierTempo =  $_FILES["image_user"]['tmp_name'];			

						if ($fichierTempo =="") {
							
							$update = $map->getUpdateUsersFile($user_id,$code_role,$login,$confpassword,$email,$page,$username);
							header('Location:user.php');
						}else{

							if ($login==$info->image_user) {
								print_r("test2");
							die();
								//mise a jour sans le parametre image
								move_uploaded_file($fichierTempo, '../common/images/user-map/'.$login.'.jpg');	
								$image_user = $login; 
								$update = $map->getUpdateUsersFile($user_id,$code_role,$login,$confpassword,$email,$page,$username);
								header('Location:user.php');
							}else{
								
								move_uploaded_file($fichierTempo, '../common/images/user-map/'.$login.'.jpg');	
								$image_user = $login; 
								$update = $map->getUpdateUsers($user_id,$code_role,$login,$confpassword,$email,$page,$username,$image_user);
								header('Location:user.php');
							}	
						}
				}
				else{
					
					$roles = $map->getRole();
					require_once("view/vueUserUpdate.php");
				}	
			}
		}
		
		require_once("view/vueUserUpdate.php");
		
	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	}
}