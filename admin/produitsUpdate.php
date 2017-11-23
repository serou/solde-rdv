<?php

/*
 * Contrôleur des différentes pages de veille
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
 
//__inclusion des différentes classes
	session_start();
	
	require('model/BDD.php');
	require('model/Map.php');
	require('model/Debug.php');
	$pageClient = $_SESSION['PROFILE']['page'];
	$map = new Map();

//	try {
		if(!empty($_GET)){
			$id = strip_tags($_GET['id']);
			
			$produits = $map->getIdProduit($id);
			$categories = $map->getCategory();
			$structures = $map->getStructure();
		
			if(!empty($_POST)){
			$lib_produit = strip_tags($_POST['libele']);
			$code_categorie_produit = strip_tags($_POST['categorie']);
			$code_structure = strip_tags($_POST['structure']);
			$description = strip_tags($_POST['description']);
			$prix_initial = strip_tags($_POST['prix']);
			$reduction = strip_tags($_POST['reduction']);
			$dateDeb = strip_tags($_POST['dateDebut']);
			$heureDeb = strip_tags($_POST['heureDebut']);
			$dateFin = strip_tags($_POST['dateFin']);
			$heureFin = strip_tags($_POST['heureFin']);
			
			$username = $_SESSION['login'];
				$update = $map->getUpdateInfo($id, $libele, $categorie, $structure, $description, $prix, $reduction, $dateDeb, $heureDeb, $dateFin, $heureFin);
			
				header('Location: produits.php');
			}
		}
		
		require_once("view/vueProduitsUpdate.php");
		
/*	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	} */
