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
		
		$sql = "SELECT * FROM produits AS pd INNER JOIN structures AS st ON pd.code_structure = st.code_structure INNER JOIN categorieproduits AS cp ON pd.code_categorie_produit = cp.code_categorie_produit WHERE pd.date_debut_promo <= NOW() AND pd.date_fin_promo >= NOW() AND st.date_limite_activite >= NOW() ORDER BY pd.lib_produit DESC";
//puis aller dynamiser vueIndex.php ligne 58

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
	
		$sql = "SELECT * FROM produits AS pd INNER JOIN structures AS st ON pd.code_structure = st.code_structure INNER JOIN categorieproduits AS cp ON pd.code_categorie_produit = cp.code_categorie_produit WHERE pd.date_debut_promo <= NOW() AND pd.date_fin_promo >= NOW() AND st.date_limite_activite >= NOW() AND cp.lib_categorie_produit = '".$category."'";
	
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

		$sql = "SELECT * FROM categorieproduits";
		
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
	
		$sql = "SELECT *";
		$sql .= " FROM produits AS pd";
		$sql .= " INNER JOIN structures AS st";
		$sql .= " ON pd.code_structure = st.code_structure";
		$sql .= " WHERE pd.code_produit=".$id;
	
		$datas = $bdd->query($sql);
	
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
	        $count = $resultat;
	    }
	
		return $count; // Accès au résultat
	}
	
	function getCommentairesProduit( $idProd ) {
	    $bdd = parent::getBdd();
	
		$sql = "SELECT *";
		$sql .= " FROM commentaires";
		$sql .= " WHERE code_produit=".$idProd;
	
		$datas = $bdd->query($sql);
	
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
	        $count = $resultat;
	    }
	
		return $count; // Accès au résultat
	}
}
