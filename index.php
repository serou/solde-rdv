<?php
/*
 * Contrôleur de notre page de maps
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
	
	include_once("model/BDD.php");
	include_once("model/Map.php");
	include_once("model/Debug.php");
	
	$titre = "Index";
	$page = "index"; //__variable pour la classe "active" du menu-header
	
//__variables pour les balises méta
	$description = "MarkerClusterer Maps";
	$keyword = "";
    $author = "--------";
    $title = "Solde au rdv";

    try {
    	$map=new Map();
		$categories = $map->getAllCategory();
		
		//pour la getion des categories selectionner
		if (isset($_GET['category'])) {
			$category = $_GET['category'];
		
			$catProd = $map->getMarkersCategory($category);
		
			$allProdJson = json_encode($catProd);
		} else {
			$catProd = $map->getAllMarkersActif();
			$allProdJson = json_encode($catProd);
		}
		
		if(!empty($_GET)){
			
			// gestion de produit avec commentaires
			if (isset($_GET['produit'])) {
			
					$produit = $_GET['produit'];
			
					$prod = $map->getIdProduit($produit);
					$commentaires = $map->getCommentairesProduit($produit);
			
					$prodJson = json_encode($prod);
					$commentairesJson = json_encode($commentaires);
					
				if(!empty($_POST)){
				
					$pseudo = $_POST['pseudo'];
					$commentaire = $_POST['commentaire'];
					$produit = $_GET['produit'];
					
					if($pseudo && $commentaire ){
						$insertCommentaire = $map->getInsertCommentaire($commentaire, $pseudo, $produit);
						$prod = $map->getIdProduit($produit);
						$commentaires = $map->getCommentairesProduit($produit);
					}else{
						$erreur = 'veuillez vous connecter ou entrez un pseudo pour pouvoir commenter';
					}
				}
				
			}
			
		}
		
/*******************Essai info caroussel**********************/
		
		
		foreach($categories as $categorie):

			$infosCat[] = $map->getStructuresOfCatProd($categorie->lib_categorie_produit);
		
		endforeach;
 	$catLen = count($infosCat);

 //	for ($i = 0; $i < $catLen; $i++){
		foreach($infosCat as $key => $value ){
				print_r($key);
				print_r("----------------------------------");
				print_r($value[$key]['code_structure']);
				print_r("------+++++++++++");
				print_r($value[$key]['lib_categorie_produit']);
				print_r("---*************************");
				print_r($value[$key]['lib_produit']);
				print_r("---*************************");
				print_r($value[$key]['prix_initial']);
			}
//	}
		die();
		
/*****************Fin Essai info caroussel********************/
	
		
		
		require_once("view/vueIndex.php");
			
       
    } catch (Exception $e) {
        $msgErreur = $e->getMessage();
        require_once("view/vueErreur.php");
 	}

?>
