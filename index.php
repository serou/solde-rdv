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
		
		if (isset($_GET['category'])) {
			$category = $_GET['category'];
			
			$catProd = $map->getMarkersCategory($category);
			
			$allProdJson = json_encode($catProd);
		} else {
			$catProd = $map->getAllMarkersActif();
			$allProdJson = json_encode($catProd);
		}
		
		
		require_once("view/vueIndex.php");
		
       
    } catch (Exception $e) {
        $msgErreur = $e->getMessage();
        require_once("view/vueErreur.php");
 	}

?>
