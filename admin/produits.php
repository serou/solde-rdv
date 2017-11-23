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
	
		$titre = "Produits";
		$page = "produits"; //__variable pour la classe "active" du menu-header
	 	$pageClient = $_SESSION['PROFILE']['page'];
	 	
	//__inclusion des différentes classes
		require('model/BDD.php');
		require('model/Map.php');
		require('model/Debug.php');

		try {

				$map = new Map();
				
				$libeleErr=$categorieErr=$structureErr=$descriptionErr=$prixErr=$reductionErr=$dateDebutErr=$heureDebutErr=$dateFinErr=$heureFinErr="";
			
				//__Ajout d'une information
			if(!empty($_POST)) {
					extract($_POST);
				
					$lib_produit = strip_tags($_POST['libele']);
					$description = strip_tags($_POST['description']);
					$reduction = strip_tags($_POST['reduction']);
					$prix_initial = strip_tags($_POST['prix']);
					$date_fin_promo = strip_tags($_POST['dateFin']);
					$date_debut_promo = strip_tags($_POST['dateDebut']);
					$heure_debut_promo = strip_tags($_POST['heureDebut']);
					$heure_fin_promo = strip_tags($_POST['heureFin']);
					$code_categorie_produit = strip_tags($_POST['categorie']);
					$code_structure = strip_tags($_POST['structure']);
					
					
					$username = $_SESSION['login'];


						if (empty($lib_produit)) {
			    			$libeleErr = "Name is required";
			  			} else {
			    			$lib_produit = $lib_produit;
			    			
			  			}

			  			if (empty($reduction)) {
			    			$reductionErr = "Reduction is required";
			  			} else {
			    			$reduction = $reduction;
			  			}

			  			if (empty($code_categorie_produit)) {
			    			$categorieErr = "Categorie is required";
			  			} else {
			    			$code_categorie_produit = $code_categorie_produit;
			  			}

			  			if (empty($prix_initial)) {
			    			$prixErr = "Prix is required";
			  			} else {
			    			$prix_initial = $prix_initial;
			  			}


			  			if (empty($code_structure)) {
			    			$structureErr = "Structure is required";
			  			} else {
			    			$code_structure = $code_structure;
			  			}

/*
			  			if (empty($date_debut_promo)) {
			    			$dateDebutErr = "Date is required";
			  			} else {
			    			$date_debut_promo = $date_debut_promo;
			    			if (!preg_match('`^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4})(((([[:space:]]?)(([0-1][0-9])|([2][0-3]))(:[0-5][0-9]))((:[0-5][0-9])?))?))$`',$date_debut_promo)){
			      				$dateDebutErr = "Vous avez saisi un mauvais "; 
			      			}

			  			}

			  			if (empty($date_fin_promo)) {
			    			$dateFinErr = "Date is required";
			  			} else {
			    			$date_fin_promo = $date_fin_promo;
			    			if (!preg_match('`^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4})(((([[:space:]]?)(([0-1][0-9])|([2][0-3]))(:[0-5][0-9]))((:[0-5][0-9])?))?))$`',$date_fin_promo)){
			      				$dateFinErr = "Vous avez saisi un mauvais "; 
			      			}
			      			
			  			}
			  			if (empty($heure_debut_promo)) {
			    			$heureDebutErr = "Heure is required";
			  			} else {
			    			$heure_debut_promo = $heure_debut_promo;
			    			if (!preg_match('#^[0-9]{2}\.[0-9]{2}\.[0-9]{2}$#', $heure_debut_promo)){
			      				$heureDebutErr = "Vous avez saisi une mauvaise heure "; 
			      			}
			      			
			  			}
			  			if (empty($heure_fin_promo)) {
			    			$heureFinErr = "Heure is required";
			  			} else {
			    			$heure_fin_promo = $heure_fin_promo;
			    			if (!preg_match('#^[0-9]{2}\.[0-9]{2}\.[0-9]{2}$#', $heure_fin_promo)){
			      				$heureFinErr = "Vous avez saisi une mauvaise heure "; 
			      			}
			      			
			  			}*/
	  			/*print_r($lib_produit);
	  			print_r("********");
	  			print_r($code_categorie_produit);
	  			print_r("********");
	  			print_r($code_structure);
	  			print_r("********");
	  			print_r($date_debut_promo);
	  			print_r("********");
	  			print_r($date_fin_promo);
	  			print_r("********");
	  			print_r($heure_debut_promo);
	  			print_r("********");
	  			print_r($heure_fin_promo);
	  			print_r("********");
	  			print_r($prix_initial);
				die();*/
				if ($lib_produit && $code_categorie_produit && $code_structure && $prix_initial) {
					print_r("fraza ");
					//die();
					$insertInfos = $map->getInsertProduit($lib_produit, $code_categorie_produit, $code_structure, $description, $prix_initial, $reduction, $date_debut_promo, $heure_debut_promo, $date_fin_promo, $heure_fin_promo ,$username);
					
				}
				else{
					
					$categories = $map->getCategory();
					$structures = $map->getStructure();
					require_once("view/vueProduits.php");
				}
				
				
			}
			
			if(!empty($_GET)){
				$id = strip_tags($_GET['id']);
				$deleteInfo = $map->getDeleteProduit($id);
			}

			//__ On récupère toutes les infos
			$produits = $map->getProduit();
			$categories = $map->getCategory();
			$structures = $map->getStructure();
		
			require_once("view/vueProduits.php");
		
		} catch (Exception $e) {
		    $msgErreur = $e->getMessage();
		    require_once("view/vueErreur.php");
		} 
}