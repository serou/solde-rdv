<?php
  session_start(); // DEMARRE LA SESSION
  
  if(!isset($_SESSION['login'])) {
    echo 'Vous n\'êtes pas autorisé´ à acceder à cette zone';
    include('identification.php');
    exit;
  }
  else{
       require('model/BDD.php');
       require('model/Map.php');
       require('model/Debug.php');

      $map = new Map();
      $admin = "admin";
      
     /* print_r($_SESSION['PROFILE']['lib_role']);
      die();*/

      if ($_SESSION['PROFILE']['lib_role'] == "admin" ) {

          $username = $_SESSION['login'];
          $pageClient = $_SESSION['PROFILE']['page'];
          $usersNoAdmins = $map->getUsersNoAdmin();
          $roles = $map->getRoleF();
          $recupUsers = $map->getRecupUsers();
         

          ////////////////////////////////////////////////////
          if (isset($_GET['user_id'])) {

            $user_id = strip_tags($_GET['user_id']);
            //$roles = $map->getRoleUser($user_id);
            $info = $map->getIdUsers($user_id);
            $roles = $map->getRoleF();
            $donnes = $map->getVerifPassword($user_id);

            $modal ="modalok";
            
              if(!empty($_POST) ){

                $code_role = strip_tags($_POST['code_role']);
               /* $login = strip_tags($_POST['login']);
                $password = strip_tags($_POST['password']);
                $password = md5($password);
                $email = strip_tags($_POST['email']);
                $page = strip_tags($_POST['page']);
                $username = $_SESSION['login'];

                $nomPhoto = $_FILES["image_user"]['name'];
                $fichierTempo =  $_FILES["image_user"]['tmp_name'];*/
            
                  if (empty($code_role)) {
                    $codeRoleErr = "Role is required";
                  } else {
                    $code_role = $code_role;
                  }
            
                if (  $code_role ) {
                    
                      
                      
                      $update = $map->getUpdateRoleUsers($user_id,$code_role);
                      header('Location:attribuerRole.php');
                    
                }
                else{
                                   
                  $roles = $map->getRoleF();
                  require_once("view/vueAttribuerRole.php");
                  
                } 
              }
              
            }

//print_r($usersNoAdmins);
//die();

          /////////////////////////////////////////////////////
          require_once("view/vueAttribuerRole.php");
      }
      else{
          $username = $_SESSION['login'];
          $erreur = "Vous n'avez pas Ce Droit. Veillez contacter l'Administrateur";
          require_once("view/vueAttribuerRole.php");
      }

   
  }
?>