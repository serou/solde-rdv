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


/*
      if(file_exists('compteur_visites.txt'))
      {
              $compteur_f = fopen('compteur_visites.txt', 'r+');
              $compte = fgets($compteur_f);
      }
      else
      {
              $compteur_f = fopen('compteur_visites.txt', 'a+');
              $compte = 0;
      }
      if(!isset($_SESSION['compteur_de_visite']))
      {
              $_SESSION['compteur_de_visite'] = 'visite';
              $compte++;
              fseek($compteur_f, 0);
              fputs($compteur_f, $compte);
      }
      fclose($compteur_f);*/
     // echo '<strong>'.$compte.'</strong> visites.';


    /*// SAUVGARDE LA VARIABLE hits DANS LE FICHIER DE SESSION
    $hits =0;
    // TRAITEMENT SUR LE FICHIER TEXTE
    if(empty($hits)){

      $fp=fopen("compteur.txt","a+"); //OUVRE LE FICHIER compteur.txt
      $num=fgets($fp,4096); // RECUPERE LE CONTENUE DU COMPTEUR
      fclose($fp); // FERME LE FICHIER
      $hits=$num - -1; // TRAITEMENT
      $fp=fopen("compteur.txt","w"); // OUVRE DE NOUVEAU LE FICHIER
      fputs($fp,$hits); // MET LA NOUVELLE VALEUR
      fclose($fp); // FERME LE FICHIER
    }
    else{
      echo "no";
     } */
      /*// AFICHAGE DU COMPTEUR
      echo"<TABLE align=center>";
      echo"<TR>";
      echo"<TD STYLE='border:1pt Solid navy;' >";
      echo"<FONT FACE='Verdana, Arial, Helvetica, sans-serif' SIZE=1>";
      echo"Nombre de visiteurs :$hits";
      echo"</FONT>";
      echo"</TD>";
      echo"</TR>";
      echo"</TABLE>";*/

      if ($_SESSION['code_role'] == 31 ) {
         $username = $_SESSION['login'];
         $pageClient = $_SESSION['PROFILE']['page'];
         require_once("view/vueAttribuerRole.php");
      }
      else{
           $username = $_SESSION['login'];
          $erreur = "Vous n'avez pas Ce Droit. Veillez contacter l'Administrateur";
          require_once("view/vueAttribuerRole.php");
      }

   
  }
?>