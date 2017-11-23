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
      $pageClient = $_SESSION['PROFILE']['page'];
      $user_id = $_SESSION['PROFILE']['user_id'];
      

      $map = new Map();
      $username = $_SESSION['login'];
      
      $recupUsers = $map->getRecupUsersConnect($user_id);
     
      //require_once("view/vueProfil.php");
      try {
    
           $codeRoleErr = $emailErr = $loginErr = $passwordErr = $ancpasswordErr = $nvxpasswordErr = $confpasswordErr= $image_userErr = $pageErr="";
    

          if(!empty($_GET)){


              $user_id = strip_tags($_GET['user_id']);
              
              $recupUsers = $map->getRecupUsersConnect($user_id);
              $donnes = $map->getVerifPassword($user_id);


              if(!empty($_POST)){

                $login = strip_tags($_POST['login']);
                $ancpassword = strip_tags($_POST['ancpassword']);
                $nvxpassword = strip_tags($_POST['nvxpassword']);
                $confpassword = strip_tags($_POST['confpassword']);
                $ancpassword = md5($ancpassword);
                $nvxpassword = md5($nvxpassword);
                $confpassword = md5($confpassword);
                $email = strip_tags($_POST['email']);
              
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

                  if (empty($ancpassword)){
                      $ancpasswordErr = "password is required";
                  } else {
                    if ($ancpassword == 'd41d8cd98f00b204e9800998ecf8427e') {
                      $ancpasswordErr = "password is required";
                    } else {
                    $ancpassword = $ancpassword;
                    }
                  }

                  if (empty($nvxpassword)){
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
                  if (empty($email)){
                    $emailErr = "Email is required";
                  } else {
                    $email = $email;
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format"; 
                    }
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
                if ($login && $nvxpassword != 'd41d8cd98f00b204e9800998ecf8427e' && $confpassword != 'd41d8cd98f00b204e9800998ecf8427e' && $ancpassword == $donnes->password && $confpassword==$nvxpassword  &&  $email ) {
                    //print_r("entre");
                    //die();
                    $fichierTempo =  $_FILES["image_user"]['tmp_name'];     

                    if ($fichierTempo =="") {
                      
                      $update = $map->getUpdateProfilFile($user_id,$login,$confpassword,$email);
                      header('Location:profil.php');
                    }else{

                      if ($login==$recupUsers->image_user) {
                        print_r("test2");
                      die();
                        //mise a jour sans le parametre image
                        move_uploaded_file($fichierTempo, '../common/images/user-map/'.$login.'.jpg');  
                        $image_user = $login; 
                        $update = $map->getUpdateProfilFile($user_id,$login,$confpassword,$email);
                        header('Location:profil.php');
                      }else{
                        
                        move_uploaded_file($fichierTempo, '../common/images/user-map/'.$login.'.jpg');  
                        $image_user = $login; 
                        $update = $map->getUpdateProfil($user_id,$login,$confpassword,$email,$image_user);
                        header('Location:profil.php');
                      } 
                    }
                }
                else{
                  
                  require_once("view/vueProfil.php");
                } 
              }
          }

          require_once("view/vueProfil.php");
          
      } catch (Exception $e) {
          $msgErreur = $e->getMessage();
          require_once("view/vueErreur.php");
      }

  }
?>