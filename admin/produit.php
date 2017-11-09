<?php
/*
 * Contrôleur des différentes pages de veille
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
	session_start();
	
	$titre = "Produit";
	$page = "produit"; //__variable pour la classe "active" du menu-header
 
//__inclusion des différentes classes
	require('model/BDD.php');
	require('model/Map.php');
	require('model/Debug.php');

	//	try {
		$map = new Map();
		
		//__Ajout d'une information
	if(!empty($_POST)) {
			extract($_POST);
		
			$libele = strip_tags($_POST['libele']);
			$categorie = strip_tags($_POST['categorie']);
			$structure = strip_tags($_POST['structure']);
			$description = strip_tags($_POST['description']);
			$prix = strip_tags($_POST['prix']);
			$reduction = strip_tags($_POST['reduction']);
			$dateDeb = strip_tags($_POST['dateDebut']);
			$heureDeb = strip_tags($_POST['heureDebut']);
			$dateFin = strip_tags($_POST['dateFin']);
			$heureFin = strip_tags($_POST['heureFin']);
	
			$insertProduit = $map->getInsertProduit($libele, $categorie, $structure, $description, $prix, $reduction, $dateDeb, $heureDeb, $dateFin, $heureFin);
		
	}
	
	if(!empty($_GET)){
		$id = strip_tags($_GET['id']);
		$deleteProduit = $map->getDeleteProduit($id);
	}
	
	//__ On récupère toutes les infos
	$produits = $map->getProduit();
	$catProduits = $map->getCatProduit();
	$structures = $map->getStructure();
	
	require_once("view/vueProduit.php");
	
/*	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	} */
