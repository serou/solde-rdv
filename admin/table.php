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
		
		
		$pageClient = $_SESSION['PROFILE']['page'];

		
		require_once("view/vuetable.php");
		//require_once("dashboard.php");
		
	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	}
}