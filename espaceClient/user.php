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
		$map = new Map();

		$codeRoleErr = $emailErr = $loginErr = $passwordErr = $pageErr = $image_userErr ="";
		
		//__Ajout d'une information
		if(!empty($_POST)) {
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

			$user_id = strip_tags($_GET['user_id']);
			$deleteInfo = $map->getDeleteUsers($user_id);
			
		}	
		
			$users = $map->getUsers(); //__ On récupère tous les types structures
			$roles = $map->getRole();
			require_once("view/vueUser.php");
		
	
	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	}
}