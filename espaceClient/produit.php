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

		require('model/BDD.php');
      	require('model/Map.php');
      	require('model/Debug.php');

		$titre = "Produits";
		$page = "produits"; //__variable pour la classe "active" du menu-header
	 	$pageClient = $_SESSION['PROFILE']['page'];

	 	$code_client = $_SESSION['PROFILE']['code_client'];
      
	    $map = new Map();
	    $username = $_SESSION['PROFILE']['nom_client'].'-'.$_SESSION['PROFILE']['prenom_client'];
	    
	    $recupclients = $map->getRecupClientConnect($code_client);
	 	

		try {

				$size=15;
				$nbrepage = 0;
				
				

				$libeleErr=$categorieErr=$structureErr=$descriptionErr=$prixErr=$reductionErr=$dateDebutErr=$heureDebutErr=$dateFinErr=$heureFinErr=$image_produitErr="";
			
				//__Ajout d'une information
			if(!empty($_POST) AND empty($_GET)) {
					extract($_POST);
				
					$lib_produit = strip_tags($_POST['libele']);
					$description = strip_tags($_POST['description']);
					$reduction = (strip_tags($_POST['reduction']));
					$prix_initial = (strip_tags($_POST['prix']));
					$date_fin = strtotime(($_POST['date_fin_promo']));
					$date_debut = strtotime(($_POST['date_debut_promo']));
					$code_categorie_produit = strip_tags($_POST['categorie']);
					$code_structure = strip_tags($_POST['structure']);
					
					$date_debut_promo = date('Y-m-d H:i:s',$date_debut);
					$date_fin_promo = date('Y-m-d H:i:s',$date_fin);
					/*print_r($date_debut_promo);
					print_r('------');
					print_r($date_fin_promo);
					die();*/
					$username = $_SESSION['PROFILE']['nom_client'].'-'.$_SESSION['PROFILE']['prenom_client'];

					$nomPhoto = $_FILES["image_produit"]['name'];
					$fichierTempo =  $_FILES["image_produit"]['tmp_name'];
					
					if (empty($fichierTempo)) {
							$image_ProduitErr = "Image is required";
					}
					else{
						$fichierTempo =  $_FILES["image_produit"]['tmp_name'];
						move_uploaded_file($fichierTempo, '../common/images/produit-map/'.$lib_produit.'.jpg');
						$image_produits= $lib_produit;
							
					}
						if ($date_fin < $date_debut) {
							$dateDebutErr = "Date de debut doit etre anterieur a celle de la fin";
						}
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


			  			if (empty($date_debut_promo)) {
			    			$dateDebutErr = "Date is required";
			  			} else {
			    			$date_debut_promo = $date_debut_promo;
			    			/*if (!preg_match('`^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4})(((([[:space:]]?)(([0-1][0-9])|([2][0-3]))(:[0-5][0-9]))((:[0-5][0-9])?))?))$`',$date_debut_promo)){
			      				$dateDebutErr = "Vous avez saisi un mauvais "; 
			      			}*/

			  			}

			  			if (empty($date_fin_promo)) {
			    			$dateFinErr = "Date is required";
			  			} else {
			    			$date_fin_promo = $date_fin_promo;
			    			/*if (!preg_match('`^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4})(((([[:space:]]?)(([0-1][0-9])|([2][0-3]))(:[0-5][0-9]))((:[0-5][0-9])?))?))$`',$date_fin_promo)){
			      				$dateFinErr = "Vous avez saisi un mauvais "; 
			      			}*/
			      			
			  			}
			  			
	  			/*print_r($lib_produit);
	  			print_r("********-");
	  			print_r($code_categorie_produit);
	  			print_r("********+");
	  			print_r($code_structure);
	  			print_r("********");
	  			print_r($date_debut_promo);
	  			print_r("********");
	  			print_r($date_fin_promo);
	  			print_r("********");
	  			
	  			print_r($prix_initial);
				die();*/

				if ($lib_produit && $code_categorie_produit && $code_structure && $prix_initial && $reduction) {
					$insertInfos = $map->getInsertProduit($lib_produit,$description,$reduction,$prix_initial,$date_fin_promo,$date_debut_promo,$code_categorie_produit,$username,$code_structure,$image_produits);
					
				}
				else{
					
					$categories = $map->getCategoryF();
					$structures = $map->getStructureF();
					require_once("view/vueProduits.php");
				}
				
				
			}
			
			if(!empty($_GET)){

				//pour la pagintion
				if (isset($_GET['nbrepage'])) {
					$nbrepage = $_GET['nbrepage'];
				}
				//pour la suppression
				if (isset($_GET['code'])) {
					$code_produit = strip_tags($_GET['code']);
					$deleteInfo = $map->getDeleteProduit($code_produit);
				}
				if (isset($_GET['code_produit'])) {


					$code_produit = strip_tags($_GET['code_produit']);
					
					
					$info = $map->getIdProduit($code_produit);
					
					$categories = $map->getCategoryF();

					$structures = $map->getStructureClient($code_client);

					//$produitsBycats= $map->getProduitByCatStructure($code_structure);
					
					$modalProd ="modalProdok";

					if(!empty($_POST)){

						$lib_produit = strip_tags($_POST['libele']);
						$code_categorie_produit = strip_tags($_POST['categorie']);
						$code_structure = strip_tags($_POST['structure']);
						$description = strip_tags($_POST['description']);
						$prix_initial = strip_tags($_POST['prix']);
						$reduction = strip_tags($_POST['reduction']);
						$date_fin = strtotime(($_POST['date_fin_promo']));
						$date_debut = strtotime(($_POST['date_debut_promo']));

						$date_debut_promo = date('Y-m-d H:i:s',$date_debut);
						$date_fin_promo = date('Y-m-d H:i:s',$date_fin);
						
						$username = $_SESSION['login'];

						if ($date_fin < $date_debut) {
							$dateDebutErr = "Date de debut doit etre anterieur a celle de la fin";
						}
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


			  			if (empty($date_debut_promo)) {
			    			$dateDebutErr = "Date is required";
			  			} else {
			    			$date_debut_promo = $date_debut_promo;
			    			/*if (!preg_match('`^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4})(((([[:space:]]?)(([0-1][0-9])|([2][0-3]))(:[0-5][0-9]))((:[0-5][0-9])?))?))$`',$date_debut_promo)){
			      				$dateDebutErr = "Vous avez saisi un mauvais "; 
			      			}*/

			  			}

			  			if (empty($date_fin_promo)) {
			    			$dateFinErr = "Date is required";
			  			} else {
			    			$date_fin_promo = $date_fin_promo;
			    			/*if (!preg_match('`^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4})(((([[:space:]]?)(([0-1][0-9])|([2][0-3]))(:[0-5][0-9]))((:[0-5][0-9])?))?))$`',$date_fin_promo)){
			      				$dateFinErr = "Vous avez saisi un mauvais "; 
			      			}*/
			      			
			  			}
			  			
			  			if ($lib_produit && $code_categorie_produit && $code_structure && $prix_initial && $reduction) {
							$fichierTempo =  $_FILES["image_produit"]['tmp_name'];			

							if ($fichierTempo =="") {
								
									/*print_r("expression1");
									die();*/
									$update = $map->getUpdateProduitFile($code_produit,$lib_produit,$description,$reduction,$prix_initial,$date_fin_promo,$date_debut_promo,$code_categorie_produit,$username,$code_structure);
									header('Location:produit.php');
								
								
							}else{

								if ($lib_produit==$info->image_produits) {
									/*print_r("expression3");
									die();*/
									//mise a jour sans le parametre image
									move_uploaded_file($fichierTempo, '../common/images/produit-map/'.$lib_produit.'.jpg');	
									$image_produits = $lib_produit; 
									$update = $map->getUpdateProduitFile($code_produit,$lib_produit,$description,$reduction,$prix_initial,$date_fin_promo,$date_debut_promo,$code_categorie_produit,$username,$code_structure);
									header('Location:produit.php');
								}else{
									/*print_r("expression4");
									die();*/
									move_uploaded_file($fichierTempo, '../common/images/produit-map/'.$lib_produit.'.jpg');	

									$image_produits = $lib_produit; 
									$update = $map->getUpdateProduit($code_produit,$lib_produit,$description,$reduction,$prix_initial,$date_fin_promo,$date_debut_promo,$code_categorie_produit,$username,$code_structure,$image_produits);
									header('Location:produit.php');
								}	
							}
						}
						else{
							
							$categories = $map->getCategoryF();
							$structures = $map->getStructureF();
							require_once("view/vueProduits.php");
						}
					}

				}
				if (isset($_GET['code_structure'])) {


					//$code_produit = strip_tags($_GET['code_produit']);
					$code_structure = strip_tags($_GET['code_structure']);
					
					//$info = $map->getIdProduit($code_produit);
					$categories = $map->getCategoryF();

					$structures = $map->getStructureClient($code_client);

					$produitsBycats= $map->getProduitByCatStructure($code_structure);

					$modal ="modalok";

					if(!empty($_POST)){

						$lib_produit = strip_tags($_POST['libele']);
						$code_categorie_produit = strip_tags($_POST['categorie']);
						$code_structure = strip_tags($_POST['structure']);
						$description = strip_tags($_POST['description']);
						$prix_initial = strip_tags($_POST['prix']);
						$reduction = strip_tags($_POST['reduction']);
						$date_fin = strtotime(($_POST['date_fin_promo']));
						$date_debut = strtotime(($_POST['date_debut_promo']));

						$date_debut_promo = date('Y-m-d H:i:s',$date_debut);
						$date_fin_promo = date('Y-m-d H:i:s',$date_fin);
						
						$username = $_SESSION['login'];

						if ($date_fin < $date_debut) {
							$dateDebutErr = "Date de debut doit etre anterieur a celle de la fin";
						}
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


			  			if (empty($date_debut_promo)) {
			    			$dateDebutErr = "Date is required";
			  			} else {
			    			$date_debut_promo = $date_debut_promo;
			    			/*if (!preg_match('`^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4})(((([[:space:]]?)(([0-1][0-9])|([2][0-3]))(:[0-5][0-9]))((:[0-5][0-9])?))?))$`',$date_debut_promo)){
			      				$dateDebutErr = "Vous avez saisi un mauvais "; 
			      			}*/

			  			}

			  			if (empty($date_fin_promo)) {
			    			$dateFinErr = "Date is required";
			  			} else {
			    			$date_fin_promo = $date_fin_promo;
			    			/*if (!preg_match('`^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4})(((([[:space:]]?)(([0-1][0-9])|([2][0-3]))(:[0-5][0-9]))((:[0-5][0-9])?))?))$`',$date_fin_promo)){
			      				$dateFinErr = "Vous avez saisi un mauvais "; 
			      			}*/
			      			
			  			}
			  			
			  			if ($lib_produit && $code_categorie_produit && $code_structure && $prix_initial && $reduction) {
							$fichierTempo =  $_FILES["image_produit"]['tmp_name'];			

							if ($fichierTempo =="") {
								
									print_r("expression1");
									die();
									$update = $map->getUpdateProduitFile($code_produit,$lib_produit,$description,$reduction,$prix_initial,$date_fin_promo,$date_debut_promo,$code_categorie_produit,$username,$code_structure);
									header('Location:produit.php');
								
								
							}else{

								if ($lib_produit==$info->image_produits) {
									/*print_r("expression3");
									die();*/
									//mise a jour sans le parametre image
									move_uploaded_file($fichierTempo, '../common/images/produit-map/'.$lib_produit.'.jpg');	
									$image_produits = $lib_produit; 
									$update = $map->getUpdateProduitFile($code_produit,$lib_produit,$description,$reduction,$prix_initial,$date_fin_promo,$date_debut_promo,$code_categorie_produit,$username,$code_structure);
									header('Location:produit.php');
								}else{
									/*print_r("expression4");
									die();*/
									move_uploaded_file($fichierTempo, '../common/images/produit-map/'.$lib_produit.'.jpg');	

									$image_produits = $lib_produit; 
									$update = $map->getUpdateProduit($code_produit,$lib_produit,$description,$reduction,$prix_initial,$date_fin_promo,$date_debut_promo,$code_categorie_produit,$username,$code_structure,$image_produits);
									header('Location:produit.php');
								}	
							}
						}
						else{
							
							$categories = $map->getCategoryF();
							$structures = $map->getStructureF();
							require_once("view/vueProduits.php");
						}
					}

				}

			}

			$offset = $size * $nbrepage;
			$totalpages = $map->getCountProduitsStructureClient($code_client);
			
			if (($totalpages->nb % $size)==0) {
				$nbrePages = (floor(($totalpages->nb) / $size));
			}
			else{
				$nbrePages = (floor(($totalpages->nb) / $size)+1);
			}
			
			$categories = $map->getCategoryF();

			$structures = $map->getStructureClient($code_client);

			//__ On récupère toutes les infos

			$structureclients = $map->getRecupStructureClientConnect($code_client,$size,$offset);
			/*print_r($structureclients);
			die();*/
			//$produits = $map->getProduits($size,$offset);
			
			require_once("view/vueProduits.php");
		
		} catch (Exception $e) {
		    $msgErreur = $e->getMessage();
		    require_once("view/vueErreur.php");
		} 
}