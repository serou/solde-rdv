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
	$titre = "Compte";
	$page = "compte"; //__variable pour la classe "active" du menu-header
 
//__inclusion des différentes classes

	try {

			require('model/BDD.php');
      	require('model/Map.php');
       	require('model/Debug.php');

       	$pageClient = $_SESSION['PROFILE']['page'];		
		$map = new Map();
		$pageClient = $_SESSION['PROFILE']['page'];
		$code_client = $_SESSION['PROFILE']['code_client'];
		//recuperer toute les donnée des tables
	    $countstructures = $map->getCountStructure();
	    $countusers = $map->getCountUsers();
	    $countclients = $map->getCountClients();
	    $countcategorieProduits = $map->getCountCategorieProd();
	    $countProdByCats = $map->getCountProdByCat();
	    $recentUsers = $map->getRecentUsers();
	    // $recentComments = $map->getRecentComment();
	    $recentProduits = $map->getRecentProduitsByCodeClient($code_client);
      	$countProduits = $map->getCountProduitsByCodeClient($code_client);
	      
	    //  $countCategories = $map->getCountCategories();
     

      $username = $_SESSION['PROFILE']['nom_client'].'-'.$_SESSION['PROFILE']['prenom_client'];
		
		require_once("view/vueCompte.php");
		
	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	}
}