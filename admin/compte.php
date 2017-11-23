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

//	try {

		require('model/BDD.php');
        require('model/Map.php');
        require('model/Debug.php');

        $map = new Map();
		

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
	      fclose($compteur_f);
		
		$pageClient = $_SESSION['PROFILE']['page'];

		$countstructures = $map->getCountStructure();

	    $countusers = $map->getCountUsers();

	    $countclients = $map->getCountClients();

	    $countcategorieProduits = $map->getCountCategorieProd();

	    $countProdByCats = $map->getCountProdByCat();
	    
	    $recentUsers = $map->getRecentUsers();
	    //$recentComments = $map->getRecentComment();
	    $recentProduits = $map->getRecentProduits();
	    $countProduits = $map->getCountProduits();
	    $countCategories = $map->getCountCategories();
		$username = $_SESSION['PROFILE']['login'];

		require_once("view/vueCompte.php");

		
/*	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	}*/
}
