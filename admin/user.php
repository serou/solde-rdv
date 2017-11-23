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
		
	$titre = "Users";
	$page = "users"; //__variable pour la classe "active" du menu-header
	$pageClient = $_SESSION['PROFILE']['page'];
 
//__inclusion des différentes classes
	require('model/BDD.php');
	require('model/Map.php');
	require('model/Debug.php');

	try {

		$size=15;
		$nbrepage = 0;

		$map = new Map();

		$codeRoleErr = $emailErr = $loginErr = $passwordErr = $ancpasswordErr = $nvxpasswordErr = $confpasswordErr= $image_userErr = $pageErr="";

				
		//__Ajout d'une information
		if(!empty($_POST) AND empty($_GET)) {
			extract($_POST);

			$code_role = strip_tags($_POST['code_role']);
			$login = strip_tags($_POST['login']);
			$password = strip_tags($_POST['password']);
			$password = md5($password);
			$email = strip_tags($_POST['email']);
			$page = strip_tags($_POST['page']);
			$username = $_SESSION['login'];

			$nomPhoto = $_FILES["image_user"]['name'];
			$fichierTempo =  $_FILES["image_user"]['tmp_name'];
			
			if (empty($fichierTempo)) {
					$image_userErr = "Image is required";
			}
			else{
				$fichierTempo =  $_FILES["image_user"]['tmp_name'];
				move_uploaded_file($fichierTempo, '../common/images/user-map/'.$login.'.jpg');
				$image_user= $login;
					
			}

			if (empty($login)) {
    			$loginErr = "Login is required";
  			} else {
    			$login = $login;
    			/*if (!preg_match("/^[a-zA-Z ]*$/",$login)) {
      				$loginErr = "Only letters and white space allowed"; 
      			}*/
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
			
			if ($login && $password && $code_role && $page &&  $email) {
				$insertInfos = $map->getInsertUsers($code_role,$login,$password,$email,$page,$username,$image_user);
			}
			else{
				
				$roles = $map->getRole();
				require_once("view/vueUser.php");
			}
		}
		
		if(!empty($_GET)){

			//pour la pagintion
			if (isset($_GET['nbrepage'])) {
				$nbrepage = $_GET['nbrepage'];
			}
			if (isset($_GET['id'])) {
				$user_id = strip_tags($_GET['id']);
				$deleteInfo = $map->getDeleteUsers($user_id);
			}
			//pour modifier
			if (isset($_GET['user_id'])) {
				$user_id = strip_tags($_GET['user_id']);
			
				$info = $map->getIdUsers($user_id);
				$roles = $map->getRoleF();
				$donnes = $map->getVerifPassword($user_id);
				$modal ="modalok";

				if(!empty($_POST) ){

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
									/*print_r("test2");
								die();*/
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
						/*print_r("expression");
						die();
						$roles = $map->getRoleF();
						$users = $map->getUsers($size,$offset); //__ On récupère tous les types structures*/
						//$users = $map->getUsers($size,$offset);
						$roles = $map->getRoleF();
						require_once("view/vueUser.php");
						
					}	
				}
				
		 	}
		}
		
		$offset = $size * $nbrepage;
		$totalpages = $map->getCountUsers();
		if (($totalpages->nb % $size)==0) {
			$nbrePages = (floor(($totalpages->nb) / $size));
		}
		else{
			$nbrePages = (floor(($totalpages->nb) / $size)+1);
		}	
		
		$users = $map->getUsers($size,$offset); //__ On récupère tous les types structures
		$roles = $map->getRole($size,$offset);
		require_once("view/vueUser.php");
		
	
	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	}
}