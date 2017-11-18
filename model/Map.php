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
	
	function getCommentairesProduit( $id ) {
	    $bdd = parent::getBdd();
	
		$sql = "SELECT *";
		$sql .= " FROM commentaires";
		$sql .= " WHERE code_produit=".$id;
	
		$datas = $bdd->query($sql);
	
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
    
/*******************Essai info caroussel**********************/
	function getStructuresOfCatProd( $catProd ) {
		$bdd = parent::getBdd();
		
		$sql = "SELECT * FROM categorieproduits, structures, produits WHERE categorieproduits.code_categorie_produit = produits.code_categorie_produit AND produits.code_structure = structures.code_structure AND categorieproduits.lib_categorie_produit = '".$catProd."' GROUP BY structures.nom_structure";
		
		
/*
		$sql = "SELECT *";
		$sql .= " FROM structures AS st";
		$sql .= " INNER JOIN produits AS pd";
		$sql .= " ON st.code_structure = pd.code_structure";
		$sql .= " INNER JOIN categorieproduits AS cp";
		$sql .= " ON pd.code_categorie_produit = cp.code_categorie_produit";
		$sql .= " WHERE cp.lib_categorie_produit ='".$catProd."'";
*/
		$datas = $bdd->query($sql);

		$count = array();

		while ($resultat = $datas->fetch(PDO::FETCH_ASSOC)) {
		    $count[] = $resultat;
		}
	
		return $count; // Accès au résultat
	}
	
/*****************Fin Essai info caroussel********************/
    

}
