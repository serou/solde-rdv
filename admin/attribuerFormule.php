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
      $erreur="";
     /* print_r($_SESSION['PROFILE']['lib_role']);
      die();*/

      if ($_SESSION['PROFILE']['lib_role'] == "admin" ) {

          $username = $_SESSION['login'];
          $pageClient = $_SESSION['PROFILE']['page'];
         // $usersNoAdmins = $map->getUsersNoAdmin();
          $clientformules = $map->getclientFormule();
          $formules = $map->getFormuleF();
          $recupUsers = $map->getRecupUsers();
          ////////////////////////////////////////////////////


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

                $code_formule = strip_tags($_POST['code_formule']);

                //gestion des formules
                $formules = $map->getFormuleF();
                foreach ($formules as $formule) {

                  if ($formule->code_formule == $code_formule) {

                    $delai= $formule->delai;
                    //cas il existe encore des jours pou les delais
                    $delai_restant=$delai_restant;
                    //print_r($delai_restant);
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
                   /* print_r("expression---");
                    print_r($delai);
                    print_r("expression---");
                    print_r($date_fin_formule);
                    print_r("expression---");
                    print_r($delai_restant);

                    die();*/
                  }
                }
                $username = $_SESSION['login']; 

                  
                  if (empty($code_formule)) {
                    $code_formuleErr = "Formule is required";
                  } else {
                    $code_formule = $code_formule;
                  }

                  if ($code_formule ) {
                    
                    $update = $map->getUpdateClientFormule($code_client,$code_formule,$nbre_structure,$delai_restant,$date_fin_formule);
                    header('Location:AttribuerFormule.php');
                
                  }
                  else{
                
                    $formules = $map->getFormuleF();
                    require_once("view/vueAttribuerFormule.php");
                } 
              }
            }
          
          require_once("view/vueAttribuerFormule.php");
      }
      else{
          $username = $_SESSION['login'];
          $erreur = "Vous n'avez pas Ce Droit. Veillez contacter l'Administrateur";
          require_once("view/vueAttribuerFormule.php");
      }

   
  }
?>