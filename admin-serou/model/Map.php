<?php
/*
 * Modele de classe PHP : Map-2.php
 * Classe d'affichage des produits sur une Google Maps
 */

class Map extends BDD{
//__variable lié à la classe

//__Affiche tous les infos
    function getInfos() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM produits as pd,  categorieproduits as cp";
		$sql .= " WHERE pd.code_categorie_produit = cp.code_categorie_produit";
		$sql .= " ORDER BY pd.code_categorie_produit";
		
        $datas = $bdd->query($sql);
		
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count[] = $resultat;
        }
		
		return $count; // Accès au résultat
    }

//__Affiche tous les catégories
    function getCategory() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM  categorieproduits as cp";
		$sql .= " ORDER BY lib_categorie_produit ASC";
		
        $datas = $bdd->query($sql);
		
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count[] = $resultat;
        }
		
		return $count; // Accès au résultat
    }
	
//__Insertion d'une info dans la to-do list
    function getInsertInfo($libele, $categorie, $structure, $description, $prix, $reduction, $dateDeb, $heureDeb, $dateFin, $heureFin ) {
        $bdd = parent::getBdd();
		
		$sql = "INSERT INTO produits (lib_produit, code_categorie_produit, code_structure, description, prix_initial, reduction, date_debut_promo, heure_debut_promo, date_fin_promo, heure_fin_promo)";
		$sql .= " VALUES (:libele, :categorie :structure, :description, :prix, :reduction, :dateDeb, :heureDeb, :dateFin, :heureFin)";
	
		$stmt = $bdd->prepare($sql);
		$stmt->bindParam(':libele', $libele);
		$stmt->bindParam(':categorie', $categorie);
		$stmt->bindParam(':structure', $structure);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':prix', $prix);
		$stmt->bindParam(':reduction', $reduction);
		$stmt->bindParam(':dateDeb', $dateDeb);
		$stmt->bindParam(':heureDeb', $heureDeb);
		$stmt->bindParam(':dateFin', $dateFin);
		$stmt->bindParam(':heureFin', $heureFin);
		
		$stmt->execute();
    }
	
//__Insertion d'une info dans la to-do list
    function getInsertCategory($libele) {
        $bdd = parent::getBdd();
		
		$sql = "INSERT INTO categorieproduits (lib_categorie_produit)";
		$sql .= " VALUES (:libele)";
	
		$stmt = $bdd->prepare($sql);
		$stmt->bindParam(':libele', $libele);
		
		$stmt->execute();
    }
	
//Mise à jour d'une info quelconque de la to-do list
    function getUpdateInfo($id, $libele, $categorie, $structure, $description, $prix, $reduction, $dateDeb, $heureDeb, $dateFin, $heureFin) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE produits";
		$sql .= " SET lib_produit=:libele, code_categorie_produit=:categorie, code_structure=:structure, description=:description, prix_initial=:prix, reduction=:reduction, date_debut_promo=:dateDeb, heure_debut_promo=:heureDeb, date_fin_promo=:dateFin, heure_fin_promo=:heureFin";
		$sql .= " WHERE code_produit=:id";
	
		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':libele', $libele);
		$stmt->bindParam(':categorie', $categorie);
		$stmt->bindParam(':structure', $structure);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':prix', $prix);
		$stmt->bindParam(':reduction', $reduction);
		$stmt->bindParam(':dateDeb', $dateDeb);
		$stmt->bindParam(':heureDeb', $heureDeb);
		$stmt->bindParam(':dateFin', $dateFin);
		$stmt->bindParam(':heureFin', $heureFin);
		
		$stmt->execute();
    }
	
//Mise à jour d'une info quelconque de la to-do list
    function getUpdateCat($id, $libele) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE categorieproduits";
		$sql .= " SET lib_categorie_produit=:libele";
		$sql .= " WHERE code_categorie_produit=:id";
	
		$stmt = $bdd->prepare($sql);
		
		
		$stmt->bindParam(':libele', $libele);
		
		
		$stmt->execute();
    }
	
//__Suppression d'une info.
    function getIdInfo( $id ) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM produits";
		$sql .= " WHERE code_produit=".$id;
		
		$datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count = $resultat;
        }
		
		return $count; // Accès au résultat
    }

//__Affiche tous les infos
    function getIdInfosCat( $id ) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM categorieproduits";
		$sql .= " WHERE code_categorie_produit=".$id;
		
        $datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count = $resultat;
        }
		
		return $count; // Accès au résultat
    }
	
//__Suppression d'une info dans la to-do list
    function getDeleteInfo( $id ) {
        $bdd = parent::getBdd();
		
		$sql = "DELETE FROM produits";
		$sql .= " WHERE code_produit=".$id;
		
		$datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count = $resultat;
        }
		
		return $count; // Accès au résultat
    }
	
//__Suppression d'une catégorie
    function getDeleteCategory( $id ) {
        $bdd = parent::getBdd();
		
		$sql = "DELETE FROM categorieproduits";
		$sql .= " WHERE code_categorie_produit=".$id;
		
		$datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count = $resultat;
        }
		
		return $count; // Accès au résultat
    }
    
    //__Affiche toutes les structures
    function getStructure() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM  structures as st";
		$sql .= " ORDER BY st.nom_structure ASC";
		
        $datas = $bdd->query($sql);
		
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count[] = $resultat;
        }
		
		return $count; // Accès au résultat
    }
}
