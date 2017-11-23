<?php
/*
 * Modele de classe PHP : Map-2.php
 * Classe d'affichage des markers sur une Google Maps
 */

class Map extends BDD{
//__variable lié à la classe

//__Affiche toutes les structure actives qui ont des produits en solde sur une Google Maps
    function getAllMarkersActif(){
        $bdd = parent::getBdd();	

		$sql = "SELECT *, DATE_FORMAT(date_fin_promo, '%d/%m/%Y') AS date_fin_promo FROM produits AS pd INNER JOIN structures AS st ON pd.code_structure = st.code_structure INNER JOIN clients AS clt ON st.code_client = clt.code_client INNER JOIN categorieproduits AS cp ON pd.code_categorie_produit = cp.code_categorie_produit WHERE pd.date_debut_promo <= NOW() AND pd.date_fin_promo >= NOW() AND clt.date_fin_formule >= NOW() ORDER BY pd.date_debut_promo DESC";

        $datas = $bdd->query($sql);
		$count = array();
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count[] = $resultat;
        }
		
		return $count; // Accès au résultat
    }
	
//__Affiche les structure actives qui ont des produits en solde selon la catégorie
    function getMarkersCategory($category= ""){
        $bdd = parent::getBdd();

		$sql = "SELECT *, DATE_FORMAT(date_fin_promo, '%d/%m/%Y') AS date_fin_promo FROM produits AS pd INNER JOIN structures AS st ON pd.code_structure = st.code_structure INNER JOIN clients AS clt ON st.code_client = clt.code_client INNER JOIN categorieproduits AS cp ON pd.code_categorie_produit = cp.code_categorie_produit WHERE pd.date_debut_promo <= NOW() AND pd.date_fin_promo >= NOW() AND clt.date_fin_formule >= NOW() AND cp.lib_categorie_produit = '".$category."' ORDER BY pd.date_debut_promo DESC";
	
        $datas = $bdd->query($sql);
		$count = array();
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count[] = $resultat;
        }
		
		return $count; // Accès au résultat
    }
	
//__Affiche les informations pour les catégories
    function getAllCategory( ) {
        $bdd = parent::getBdd( );

		$sql = "SELECT DISTINCT categorieproduits.lib_categorie_produit FROM categorieproduits, produits, structures, clients WHERE categorieproduits.code_categorie_produit = produits.code_categorie_produit AND produits.code_structure = structures.code_structure AND clients.code_client = structures.code_client AND produits.date_debut_promo <= NOW() AND produits.date_fin_promo >= NOW() AND clients.date_fin_formule >= NOW()";

        $datas = $bdd->query($sql);
		$count = array();
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count[] = $resultat;
        }
		
		return $count; // Accès au résultat
    }
//__Recuperation pour affichage du produit ayant cet id.
	function getIdProduit( $id ) {
	    $bdd = parent::getBdd();

		$sql = "SELECT * FROM produits AS pd INNER JOIN structures AS st ON pd.code_structure = st.code_structure WHERE pd.code_produit=".$id;
		$datas = $bdd->query($sql);
	
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
	        $count = $resultat;
	    }
	
		return $count; // Accès au résultat
	}
	
	function getCommentairesProduit( $id ) {
	    $bdd = parent::getBdd();
	
		$sql = "SELECT *";
		$sql .= " FROM commentaires";
		$sql .= " WHERE code_produit=".$id;
		$sql .= " ORDER BY date_cmt DESC";
	
		$datas = $bdd->query($sql);
		
		$count = array();
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
	        $count[] = $resultat;
	    }
	
		return $count; // Accès au résultat
	}
	
	
	//__Insertion d'un commentaire
    function getInsertCommentaire($text_cmt, $nom_propr_cmt, $code_produit) {
        $bdd = parent::getBdd();
		
		$sql = "INSERT INTO commentaires (text_cmt, nom_propr_cmt, code_produit, date_cmt, heure_cmt)";
		$sql .= " VALUES (:text_cmt, :nom_propr_cmt, :code_produit, NOW(), NOW())";
	
		$stmt = $bdd->prepare($sql);
		$stmt->bindParam(':text_cmt', $text_cmt);
		$stmt->bindParam(':nom_propr_cmt', $nom_propr_cmt);
		$stmt->bindParam(':code_produit', $code_produit);
			
		$stmt->execute();
    }
    
/*******************Info caroussel**********************/
	function getInfoProdByCat( $catProd ) {
		$bdd = parent::getBdd();

		$sql = "SELECT *, DATE_FORMAT(date_fin_promo, '%d/%m/%Y') AS date_fin_promo FROM categorieproduits, clients, structures, produits WHERE categorieproduits.code_categorie_produit = produits.code_categorie_produit AND produits.code_structure = structures.code_structure AND clients.code_client = structures.code_client AND produits.date_debut_promo <= NOW() AND produits.date_fin_promo >= NOW() AND clients.date_fin_formule >= NOW() AND categorieproduits.lib_categorie_produit = '".$catProd."' ORDER BY produits.reduction DESC";

		$datas = $bdd->query($sql);

		$count = array();

		while ($resultat = $datas->fetch(PDO::FETCH_ASSOC)) {
		    $count[] = $resultat;
		}
	
		return $count; // Accès au résultat
	}
	
/*****************Fin info caroussel********************/
    

}
