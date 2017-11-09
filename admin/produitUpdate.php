<?php

/*
 * Contrôleur des différentes pages de veille
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
 
//__inclusion des différentes classes
	require('model/BDD.php');
	require('model/Map.php');
	require('model/Debug.php');
	
	$map = new Map();

//	try {
		if(!empty($_GET)){
			$id = strip_tags($_GET['id']);
			
			$produit = $map->getIdProduit($id);
			$catProduit = $map->getCatProduit();
			$structures = $map->getStructure();
		
			if(!empty($_POST)){
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
		
				$update = $map->getUpdateProduit($id, $libele, $categorie, $structure, $description, $prix, $reduction, $dateDeb, $heureDeb, $dateFin, $heureFin);
			
				header('Location: produit.php');
			}
		}
		
		require_once("view/vueProduitUpdate.php");
		
/*	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	} */
