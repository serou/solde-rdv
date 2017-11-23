<?php
/*
 * Contrôleur des différentes pages de veille
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
	session_start();
	
	$titre = "Category";
	$page = "category"; //__variable pour la classe "active" du menu-header
	$pageClient = $_SESSION['PROFILE']['page'];
 
//__inclusion des différentes classes
	require('model/BDD.php');
	require('model/Map.php');
	require('model/Debug.php');

	try {
		$map = new Map();

		$size=15;
		$nbrepage = 0;

		$lib_categorie_produitErr = $actifErr =$image_categoryErr="";
		//__Ajout d'une information
		if(!empty($_POST) AND empty($_GET) ) {
			extract($_POST);
			
			$lib_categorie_produit = strip_tags($_POST['lib_categorie_produit']);
			$actif = strip_tags($_POST['actif']);
			//$image_category = strip_tags($_POST['image_category']);
			$username = $_SESSION['login'];

			$nomPhoto = $_FILES["image_category"]['name'];
			$fichierTempo =  $_FILES["image_category"]['tmp_name'];

			if (empty($fichierTempo)) {
					$image_categoryErr = "Image is required";
			}
			else{
				$fichierTempo =  $_FILES["image_category"]['tmp_name'];
				move_uploaded_file($fichierTempo, '../common/images/categoryProd-map/'.$lib_categorie_produit.'.png');
				$image_category= $lib_categorie_produit;
					
			}

			if (empty($lib_categorie_produit)) {
	    			$lib_categorie_produitErr = "Name is required";
	  			} else {
	    			$lib_categorie_produit = $lib_categorie_produit;
	    			if (!preg_match("/^[a-zA-Z ]*$/",$lib_categorie_produit)) {
	      				$lib_categorie_produitErr = "Only letters and white space allowed"; 
	      			}
	  			}

	  		if ($lib_categorie_produit && $actif && $fichierTempo) {
				$insertInfos = $map->getInsertCategory($lib_categorie_produit,$actif,$username,$image_category);
			}
			else{
				
				require_once("view/vueCategory.php");
			}
		}
		
		if(!empty($_GET)){

			//pour la pagintion
			if (isset($_GET['nbrepage'])) {
				$nbrepage = $_GET['nbrepage'];
			}

			//pour delete
			if (isset($_GET['code_categorie'])) {
				$code_categorie_produit = strip_tags($_GET['code_categorie']);
				$deleteInfo = $map->getDeleteCategorieProduit($code_categorie_produit);
			}

			//pour modifier
			if (isset($_GET['code_categorie_produit'])) {
				$code_categorie_produit = strip_tags($_GET['code_categorie_produit']);
				
				$info = $map->getIdCategorieProduit($code_categorie_produit );
				//$categories = $map->getCategory($size,$offset);
				
				$modal ="modalok";

				if(!empty($_POST)){

					$lib_categorie_produit = strip_tags($_POST['lib_categorie_produit']);
					$actif = strip_tags($_POST['actif']);
					//$image_category = strip_tags($_POST['image_category']);

					$fichierTempo =  $_FILES["image_category"]['tmp_name'];
					$username = $_SESSION['login'];
					

					if (empty($lib_categorie_produit)) {
			    			$lib_categorie_produitErr = "Name is required";
			  		} else {
			    		$lib_categorie_produit = $lib_categorie_produit;
			    		if (!preg_match("/^[a-zA-Z ]*$/",$lib_categorie_produit)) {
			      			$lib_categorie_produitErr = "Only letters and white space allowed"; 
			      		}
			  		}

			  		
					if ($lib_categorie_produit && $actif) {

						$fichierTempo =  $_FILES["image_category"]['tmp_name'];			

						/*print_r($fichierTempo);
						print_r($lib_categorie_produit);
						print_r($info->image_category);
						die();*/
						if ($fichierTempo =="") {

							
							$update = $map->getUpdateCategoryFile($code_categorie_produit,$lib_categorie_produit,$actif,$username);
							header('Location:category.php');
						}else{

							if ($lib_categorie_produit==$info->image_category) {
								/*print_r("test2");
							die();*/
								//mise a jour sans le parametre image
								move_uploaded_file($fichierTempo, '../common/images/categoryProd-map/'.$lib_categorie_produit.'.png');	
								$image_category = $lib_categorie_produit; 
								$update = $map->getUpdateCategoryFile($code_categorie_produit,$lib_categorie_produit,$actif,$username);
								header('Location:category.php');
							}else{
								/*print_r("test2");
							die();*/
								move_uploaded_file($fichierTempo, '../common/images/categoryProd-map/'.$lib_categorie_produit.'.png');	
								$image_category = $lib_categorie_produit; 
								$update = $map->getUpdateCategory($code_categorie_produit,$lib_categorie_produit,$actif,$username,$image_category);
								header('Location:category.php');
							}	
						}
					}
					else{
					
						require_once("view/vueCategory.php");
					}	
				}
					
			}
	
		}

		$offset = $size * $nbrepage;
		$totalpages = $map->getCountCategory();
		if (($totalpages->nb % $size)==0) {
			$nbrePages = (floor(($totalpages->nb) / $size));
		}
		else{
			$nbrePages = (floor(($totalpages->nb) / $size)+1);
		}
		$categories = $map->getCategory($size,$offset); //__ On récupère toutes les catégories
		
		require_once("view/vueCategory.php");
		
	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	}