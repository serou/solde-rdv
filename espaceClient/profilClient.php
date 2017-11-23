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

     
      $code_client = $_SESSION['PROFILE']['code_client'];
      
      $map = new Map();
      $username = $_SESSION['PROFILE']['nom_client'].'-'.$_SESSION['PROFILE']['prenom_client'];
    
      $recupclients = $map->getRecupClientConnect($code_client);
     /*print_r($recupclients);
              die();*/
      //require_once("view/vueProfil.php");
      try {
    
           $NomErr= $PrenomErr = $Contact1Err = $Contact2Err = $emailErr = $loginErr = $passwordErr = $ancpasswordErr = $nvxpasswordErr = $confpasswordErr= $image_clientErr ="";
    

          if(!empty($_GET)){


              $code_client = strip_tags($_GET['code_client']);
              
              $recupclients = $map->getRecupClientConnect($code_client);
              $donnes = $map->getVerifPasswordClient($code_client);

              $modal ="modalok";
             
              if(!empty($_POST)){

                $nom_client = strip_tags($_POST['nom_client']);
                $prenom_client = strip_tags($_POST['prenom_client']);
                $contact_1 = strip_tags($_POST['contact_1']);
                $contact_2 = strip_tags($_POST['contact_2']);
                $adress_postal = strip_tags($_POST['adress_postal']);
                $email = strip_tags($_POST['email']);
                
                
                //$username = $_SESSION['login'];  
                $page = "compteClient.php";
                $password=md5($password);

                $login = strip_tags($_POST['login']);
                $ancpassword = strip_tags($_POST['ancpassword']);
                $nvxpassword = strip_tags($_POST['nvxpassword']);
                $confpassword = strip_tags($_POST['confpassword']);
                $ancpassword = md5($ancpassword);
                $nvxpassword = md5($nvxpassword);
                $confpassword = md5($confpassword);
                
              
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

                  
                  
                  if (empty($code_formule)) {
                    $code_formuleErr = "Formule is required";
                  } else {
                    $code_formule = $code_formule;
                  }

                
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
                if ($login && $nvxpassword != 'd41d8cd98f00b204e9800998ecf8427e' && $confpassword != 'd41d8cd98f00b204e9800998ecf8427e' && $ancpassword == $donnes->password && $confpassword==$nvxpassword  &&  $email && $nom_client && $prenom_client && $contact_1) {
                    //print_r("entre");
                    //die();
                    $fichierTempo =  $_FILES["image_client"]['tmp_name'];     

                    if ($fichierTempo =="") {
                      
                      $update = $map->getUpdateProfilClientFile($code_client,$nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$password);
                      header('Location:profilClient.php');
                    }else{

                      if ($nom_client.'-'.$prenom_client==$recupclients->image_client) {
                        /*print_r("test2");
                      die();*/
                        //mise a jour sans le parametre image
                        move_uploaded_file($fichierTempo, '../common/images/client-map/'.$nom_client.'-'.$prenom_client.'.jpg');  
                        $image_client = $nom_client.'-'.$prenom_client; 
                        $update = $map->getUpdateProfilClientFile($code_client,$nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$password);
                        header('Location:profilClient.php');
                      }else{
                        
                        move_uploaded_file($fichierTempo, '../common/images/client-map/'.$nom_client.'-'.$prenom_client.'.jpg');  
                        $image_client = $nom_client.'-'.$prenom_client; 
                        $update = $map->getUpdateProfilClient($code_client,$nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$password,$image_client);
                        header('Location:profilClient.php');
                      } 
                    }
                }
                else{
                  
                  require_once("view/vueProfilClient.php");
                } 
              }
          }

          require_once("view/vueProfilClient.php");
          
      } catch (Exception $e) {
          $msgErreur = $e->getMessage();
          require_once("view/vueErreur.php");
      }

     
  }
?>