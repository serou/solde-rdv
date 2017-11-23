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
      $map = new Map();
      $username = $_SESSION['login'];
      require_once("view/vueProfilClient.php");
      
     
  }
?>