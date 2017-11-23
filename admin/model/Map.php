<?php
/*
 * Modele de classe PHP : Map-2.php
 * Classe d'affichage des markers sur une Google Maps
 */

class Map extends BDD{
//__variable lié à la classe


	 function getCountTypeStructure() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT count(code_type_structure) AS nb";
		$sql .= " FROM typestructures ";
		$sql .= " ORDER BY code_type_structure";
		
        $datas = $bdd->query($sql);

		$typestructure= "";

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $typestructure = $resultat;
        }
		
		return $typestructure; // Accès au résultat des types structures

    }
    function getCountRole() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT count(code_role) AS nb";
		$sql .= " FROM roles ";
		$sql .= " ORDER BY code_role";
		
        $datas = $bdd->query($sql);

		$role= "";

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $role = $resultat;
        }
		
		return $role; // Accès au résultat des types structures

    }
    function getCountFormule() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT count(code_formule) AS nb";
		$sql .= " FROM formules ";
		$sql .= " ORDER BY code_formule";
		
        $datas = $bdd->query($sql);

		$formule= "";

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $formule = $resultat;
        }
		
		return $formule; // Accès au résultat des types structures

    }
	//Affichage des type Structure
    function getTypeStructure($size,$offset) {
        $bdd = parent::getBdd();

		$sql = "SELECT *";
		$sql .= " FROM typestructures ";
		$sql .= " ORDER BY code_type_structure DESC";
		$sql .= " LIMIT $size OFFSET $offset";
		
        $datas = $bdd->query($sql);

		$typeStructure= array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $typeStructure[] = $resultat;
        }
		
		return $typeStructure; // Accès au résultat des types structures
    }

    function getTypeStructureF() {
        $bdd = parent::getBdd();

		$sql = "SELECT *";
		$sql .= " FROM typestructures ";
		$sql .= " ORDER BY code_type_structure DESC";
		
		
        $datas = $bdd->query($sql);

		$typeStructure= array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $typeStructure[] = $resultat;
        }
		
		return $typeStructure; // Accès au résultat des types structures
    }

    function getCountCategory() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT count(code_categorie_produit) AS nb";
		$sql .= " FROM categorieproduits ";
		$sql .= " ORDER BY code_categorie_produit";
		
        $datas = $bdd->query($sql);

		$categorieproduit= "";

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $categorieproduit = $resultat;
        }
		
		return $categorieproduit; // Accès au résultat des types structures

    }

    function getCategory($size,$offset) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM categorieproduits ";
		$sql .= " ORDER BY code_categorie_produit DESC";
		$sql .= " LIMIT $size OFFSET $offset";
		
        $datas = $bdd->query($sql);

		$categorieproduit= array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $categorieproduit[] = $resultat;
        }
		
		return $categorieproduit; // Accès au résultat des types structures
    }

    function getCategoryF() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM categorieproduits ";
		$sql .= " ORDER BY code_categorie_produit";
		
		
        $datas = $bdd->query($sql);

		$categorieproduit= array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $categorieproduit[] = $resultat;
        }
		
		return $categorieproduit; // Accès au résultat des types structures
    }

    
    //Affichage des users
    function getUsers() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM users ";
		$sql .= " ORDER BY user_id";
		
        $datas = $bdd->query($sql);
		
		$users=array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $users[] = $resultat;
        }
		
		return $users; // Accès au résultat des types structures
    }

    function getUsersNoAdmin() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM users ,roles";
		$sql .= " WHERE users.code_role=roles.code_role AND roles.lib_role<>'admin'";
		$sql .= " ORDER BY user_id";

        $datas = $bdd->query($sql);
		
		$usersno=array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $usersno[] = $resultat;
        }
		
		return $usersno; // Accès au résultat des types structures
    }

    function getClientFormule() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM clients ,formules";
		$sql .= " WHERE clients.code_formule = formules.code_formule";
		$sql .= " ORDER BY code_client";

        $datas = $bdd->query($sql);
		
		$clientFormule=array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $clientFormule[] = $resultat;
        }
		
		return $clientFormule; // Accès au résultat des types structures
    }

    function getStructure($size,$offset) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM structures ";
		$sql .= " ORDER BY code_structure";
		$sql .= " LIMIT $size OFFSET $offset";
		
        $datas = $bdd->query($sql);
		
		$structure =array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $structure[] = $resultat;
        }
		
		return $structure; // Accès au résultat des types structures
    }



    function getStructureF() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM structures ";
		$sql .= " ORDER BY code_structure";
		
		
        $datas = $bdd->query($sql);
		
		$structure =array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $structure[] = $resultat;
        }
		
		return $structure; // Accès au résultat des types structures
    }

    function getProduit() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM produits as pd,  categorieproduits as cp";
		$sql .= " WHERE pd.code_categorie_produit = cp.code_categorie_produit";
		$sql .= " ORDER BY pd.code_categorie_produit";

        $datas = $bdd->query($sql);
		
		$produit =array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $produit[] = $resultat;
        }
		
		return $produit; // Accès au résultat des types structures
    }

    function getProduits($size,$offset) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM produits ";
		$sql .= " ORDER BY code_categorie_produit";
		$sql .= " LIMIT $size OFFSET $offset";

        $datas = $bdd->query($sql);
		
		$produit =array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $produit[] = $resultat;
        }
		
		return $produit; // Accès au résultat des types structures
    }

    function getStructureMax() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT max(code_structure)";
		$sql .= " FROM structures ";
		$sql .= " ORDER BY code_structure";
		
        $datas = $bdd->query($sql);
		
		$structure =array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $structure[] = $resultat;
        }
		
		return $structure; // Accès au résultat des types structures
    }


    //Affichage des users
    function getClient($size,$offset) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM clients ";
		$sql .= " ORDER BY code_client DESC";
		$sql .= " LIMIT $size OFFSET $offset";

        $datas = $bdd->query($sql);
		
		$client = array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $client[] = $resultat;
        }
		
		return $client; // Accès au résultat des types structures
    }

     function getClientF() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM clients ";
		$sql .= " ORDER BY code_client";
		

        $datas = $bdd->query($sql);
		
		$client = array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $client[] = $resultat;
        }
		
		return $client; // Accès au résultat des types structures
    }

    //Affichage des users
    function getFormule($size,$offset) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM formules ";
		$sql .= " ORDER BY code_formule DESC";
		$sql .= " LIMIT $size OFFSET $offset";
		
        $datas = $bdd->query($sql);

		$formules= array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
			
            $formules[] = $resultat;
        }
		
		return $formules; // Accès au résultat des types structures
    }
    function getFormuleF() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM formules ";
		$sql .= " ORDER BY code_formule DESC";
		
        $datas = $bdd->query($sql);

		$formules= array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
			
            $formules[] = $resultat;
        }
		
		return $formules; // Accès au résultat des types structures
    }

    //Affichage des type Structure
    function getRole($size,$offset) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM roles ";
		$sql .= " ORDER BY code_role";
		$sql .= " LIMIT $size OFFSET $offset";
		
        $datas = $bdd->query($sql);
		
		$role = array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $role[] = $resultat;
        }
       		
		return $role;
    }

    function getRoleF() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM roles ";
		$sql .= " ORDER BY code_role";
		
		
        $datas = $bdd->query($sql);
		
		$role = array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $role[] = $resultat;
        }
       /* if(isset($role)){
        	return $role; // Accès au résultat des roles
        }else{
        	//echo "<div>Il n'existe aucun element dans Table</div>";
        }*/
		
		return $role;
    }

	
//__Insertion d'une info dans la to-do list
    function getInsertTypeStructure($lib_type_structure,$username) {
        $bdd = parent::getBdd();
		
		$sql = "INSERT INTO typestructures (lib_type_structure,username,date_creation_type)";
		$sql .= " VALUES (:lib_type_structure, :username, NOW())";
	
		$stmt = $bdd->prepare($sql);
		$stmt->bindParam(':lib_type_structure', $lib_type_structure);
		$stmt->bindParam(':username', $username);

		$stmt->execute();
    }


    //__Insertion d'une info dans la to-do list
    function getInsertCategory($lib_categorie_produit,$actif,$username,$image_category) {
        $bdd = parent::getBdd();
		
		$sql = "INSERT INTO categorieproduits (lib_categorie_produit,actif,username,image_category,date_creation_cat)";
		$sql .= " VALUES (:lib_categorie_produit,:actif,:username,:image_category,NOW())";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':lib_categorie_produit', $lib_categorie_produit);
		$stmt->bindParam(':actif', $actif);	
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':image_category', $image_category);
		
		$stmt->execute();
    }


    //__Insertion d'une info dans la to-do list
    function getInsertUsers($code_role,$login,$password,$email,$page,$username,$image_user) {
        $bdd = parent::getBdd();
		
		$sql = "INSERT INTO users (code_role,login,password,email,date_creation_user,page,username,image_user)";
		$sql .= " VALUES (:code_role,:login,:password,:email,NOW(),:page,:username,:image_user)";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':code_role', $code_role);
		$stmt->bindParam(':login', $login);	
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':email', $email);
		
		$stmt->bindParam(':page', $page);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':image_user', $image_user);
		$stmt->execute();
    }

     function getInsertProduit($lib_produit,$description,$reduction,$prix_initial,$date_fin_promo,$date_debut_promo,$code_categorie_produit,$username,$code_structure,$image_produits) {
        $bdd = parent::getBdd();
		
		$sql = "INSERT INTO produits (lib_produit,description_produit,reduction,prix_initial,date_fin_promo,date_debut_promo,code_categorie_produit,username,code_structure,image_produits,date_creation_produit)";
		$sql .= " VALUES (:lib_produit,:description_produit,:reduction,:prix_initial,:date_fin_promo,:date_debut_promo,:code_categorie_produit,:username,:code_structure,:image_produits,NOW())";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':lib_produit', $lib_produit);
		$stmt->bindParam(':description_produit', $description);	
		$stmt->bindParam(':reduction', $reduction);
		$stmt->bindParam(':prix_initial', $prix_initial);
		
		$stmt->bindParam(':date_fin_promo', $date_fin_promo);
		$stmt->bindParam(':date_debut_promo', $date_debut_promo);
		$stmt->bindParam(':code_categorie_produit', $code_categorie_produit);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':code_structure', $code_structure);
		$stmt->bindParam(':image_produits', $image_produits);
		$stmt->execute();
    }

     function getInsertStructure($code_client,$nom_structure,$image_structure,$adresse_structure,$description,$code_type_structure,$contact_structure,$username,$longitude,$latitude) {
        $bdd = parent::getBdd();
		
		$sql = "INSERT INTO structures (code_client,nom_structure,image_structure,adresse_structure,description_structure,code_type_structure,contact_structure,username,date_creation_structure,longitude,latitude)";
		$sql .= " VALUES (:code_client,:nom_structure,:image_structure,:adresse_structure, :description, :code_type_structure, :contact_structure, :username, NOW(), :longitude, :latitude)";

		$stmt = $bdd->prepare($sql);

		$stmt->bindParam(':code_client', $code_client);
		$stmt->bindParam(':nom_structure', $nom_structure);
		
		$stmt->bindParam(':image_structure', $image_structure);
		$stmt->bindParam(':adresse_structure', $adresse_structure);
		$stmt->bindParam(':description_structure', $description);
		$stmt->bindParam(':code_type_structure', $code_type_structure);
		$stmt->bindParam(':contact_structure', $contact_structure);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':longitude', $longitude);
		$stmt->bindParam(':latitude', $latitude);
	

		$stmt->execute();
    }

    

    //__Insertion d'une info dans la to-do list
    function getInsertClient($nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$password,$code_formule,$page,$username,$image_client,$date_fin_formule,$nbre_structure,$delai_restant) {
        $bdd = parent::getBdd();
		
		$sql = "INSERT INTO clients (nom_client,prenom_client,contact_1,contact_2,adress_postal,email,login,password,code_formule,page,username,image_client,date_creation_client,date_debut_formule,date_fin_formule,nbre_structure,delai_restant)";
		$sql .= " VALUES (:nom_client, :prenom_client, :contact_1, :contact_2, :adress_postal, :email, :login, :password, :code_formule,:page,:username,:image_client,NOW(),NOW(),:date_fin_formule,:nbre_structure,:delai_restant)";

		$stmt = $bdd->prepare($sql);

		$stmt->bindParam(':nom_client', $nom_client);
		$stmt->bindParam(':prenom_client', $prenom_client);
		$stmt->bindParam(':contact_1', $contact_1);	
		$stmt->bindParam(':contact_2', $contact_2);
		$stmt->bindParam(':adress_postal', $adress_postal);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':login', $login);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':code_formule', $code_formule);
		$stmt->bindParam(':page', $page);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':image_client', $image_client);
		$stmt->bindParam(':date_fin_formule', $date_fin_formule);
		$stmt->bindParam(':nbre_structure', $nbre_structure);
		$stmt->bindParam(':delai_restant', $delai_restant);
		
		$stmt->execute();	

    }

     //__Insertion d'une info dans la to-do list
    function getInsertFormule($nom_formule,$delai,$username,$nbre_structure) {
        $bdd = parent::getBdd();
		
		$sql = "INSERT INTO formules (nom_formule,delai,username,date_creation_formule,nbre_structure)";
		$sql .= " VALUES (:nom_formule,:delai,:username,NOW(),:nbre_structure)";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':nom_formule', $nom_formule);
		$stmt->bindParam(':delai', $delai);	
		$stmt->bindParam(':username', $username);	
		$stmt->bindParam(':nbre_structure', $nbre_structure);	
		$stmt->execute();
    }

    //__Insertion d'une info dans la to-do list
    function getInsertRole($lib_role,$username) {
        $bdd = parent::getBdd();
		
		
		$sql = "INSERT INTO roles (lib_role,username,date_creation_role)";
		$sql .= " VALUES (:lib_role,:username,NOW())";

		$stmt = $bdd->prepare($sql);
		$stmt->bindParam(':lib_role', $lib_role);
		$stmt->bindParam(':username', $username);

		$stmt->execute();

		/*$insert = $bdd->prepare('INSERT INTO roles (lib_role, date_creation) VALUES(?,NOW())');
		$params=array($lib_role);
		
		$insert->execute($params);*/

		//$insert->closeCursor();

    }
	

//Mise à jour d'une info quelconque de la to-do list
    function getUpdateTypeStructure($code_type_structure,$lib_type_structure,$username) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE typestructures";
		$sql .= " SET lib_type_structure=:lib_type_structure ,username=:username, date_creation_type=NOW()";
		$sql .= " WHERE code_type_structure=:code_type_structure";


		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':lib_type_structure', $lib_type_structure);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':code_type_structure', $code_type_structure);
		
		
		$stmt->execute();
    }
    function getUpdateRoleUsers($user_id,$code_role) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE users";
		$sql .= " SET code_role=:code_role";
		$sql .= " WHERE user_id=:user_id";


		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':code_role', $code_role);
		$stmt->bindParam(':user_id', $user_id);
		
		$stmt->execute();
    }

     //Mise à jour d'une info quelconque de la to-do list
    function getUpdateCategory($code_categorie_produit,$lib_categorie_produit,$actif,$username,$image_category) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE categorieproduits";
		$sql .= " SET lib_categorie_produit=:lib_categorie_produit, actif=:actif, username=:username,image_category=:image_category, date_creation_cat=NOW()";
		$sql .= " WHERE code_categorie_produit=:code_categorie_produit";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':lib_categorie_produit', $lib_categorie_produit);
		$stmt->bindParam(':actif', $actif);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':image_category', $image_category);
		$stmt->bindParam(':code_categorie_produit', $code_categorie_produit);
	
		$stmt->execute();
		
    }


    function getUpdateCategoryFile($code_categorie_produit,$lib_categorie_produit,$actif,$username) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE categorieproduits";
		$sql .= " SET lib_categorie_produit=:lib_categorie_produit, actif=:actif, username=:username, date_creation_cat=NOW()";
		$sql .= " WHERE code_categorie_produit=:code_categorie_produit";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':lib_categorie_produit', $lib_categorie_produit);
		$stmt->bindParam(':actif', $actif);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':code_categorie_produit', $code_categorie_produit);

		
		$stmt->execute();
		
    }
    function getUpdateProduit($code_produit,$lib_produit,$description,$reduction,$prix_initial,$date_fin_promo,$date_debut_promo,$code_categorie_produit,$username,$code_structure,$image_produits) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE produits";
		$sql .= " SET lib_produit=:lib_produit, description_produit=:description_produit, prix_initial=:prix_initial, date_fin_promo=:date_fin_promo, date_debut_promo=:date_debut_promo, code_categorie_produit=:code_categorie_produit, username=:username,code_structure=:code_structure,image_produits=:image_produits,date_creation_produit=NOW()";
		$sql .= " WHERE code_produit=:code_produit";

		$stmt = $bdd->prepare($sql);
		
		//$stmt->bindParam(':idclef', $idclef);
		$stmt->bindParam(':lib_produit', $lib_produit);
		$stmt->bindParam(':description_produit', $description);
		$stmt->bindParam(':prix_initial', $prix_initial);
		$stmt->bindParam(':date_debut_promo', $date_debut_promo);
		$stmt->bindParam(':date_fin_promo', $date_fin_promo);
		
		$stmt->bindParam(':code_categorie_produit', $code_categorie_produit);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':code_structure', $code_structure);
		$stmt->bindParam(':image_produits', $image_produits);
		$stmt->bindParam(':code_produit', $code_produit);
		/*print_r($stmt->execute());
		die();*/
		$stmt->execute();
		
    }
    function getUpdateProduitFile($code_produit,$lib_produit,$description,$reduction,$prix_initial,$date_fin_promo,$date_debut_promo,$code_categorie_produit,$username,$code_structure) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE produits";
		$sql .= " SET lib_produit=:lib_produit, description_produit=:description_produit, prix_initial=:prix_initial, date_fin_promo=:date_fin_promo, date_debut_promo=:date_debut_promo, code_categorie_produit=:code_categorie_produit, username=:username,code_structure=:code_structure,date_creation_produit=NOW()";
		$sql .= " WHERE code_produit=:code_produit";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':lib_produit', $lib_produit);
		$stmt->bindParam(':description_produit', $description);
		$stmt->bindParam(':prix_initial', $prix_initial);
		$stmt->bindParam(':date_debut_promo', $date_debut_promo);
		$stmt->bindParam(':date_fin_promo', $date_fin_promo);
		
		$stmt->bindParam(':code_categorie_produit', $code_categorie_produit);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':code_structure', $code_structure);
		$stmt->bindParam(':code_produit', $code_produit);

		$stmt->execute();
		
    }
    //Mise à jour d'une info quelconque de la to-do list
    function getUpdateUsers($user_id,$code_role,$login,$password,$email,$page,$username,$image_user) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE users";
		$sql .= " SET code_role=:code_role, login=:login, password=:password, email=:email, date_creation_user=NOW(), page=:page, username=:username, image_user=:image_user";
		$sql .= " WHERE user_id=:user_id";

		$stmt = $bdd->prepare($sql);
		
		//$stmt->bindParam(':idclef', $idclef);
		$stmt->bindParam(':code_role', $code_role);
		$stmt->bindParam(':login', $login);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':email', $email);
		
		//$stmt->bindParam(':derniere_connexion', $derniere_connexion);
		$stmt->bindParam(':page', $page);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':image_user', $image_user);
		$stmt->execute();
		
    }

    function getUpdateUsersFile($user_id,$code_role,$login,$password,$email,$page,$username) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE users";
		$sql .= " SET code_role=:code_role, login=:login, password=:password, email=:email, date_creation_user=NOW(), page=:page, username=:username";
		$sql .= " WHERE user_id=:user_id";

		$stmt = $bdd->prepare($sql);
		
		//$stmt->bindParam(':idclef', $idclef);
		$stmt->bindParam(':code_role', $code_role);
		$stmt->bindParam(':login', $login);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':email', $email);
		
		//$stmt->bindParam(':derniere_connexion', $derniere_connexion);
		$stmt->bindParam(':page', $page);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':username', $username);
		
		$stmt->execute();
		
    }
    function getUpdateProfilFile($user_id,$login,$password,$email) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE users";
		$sql .= " SET login=:login, password=:password, email=:email, date_modif=NOW()";
		$sql .= " WHERE user_id=:user_id";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':login', $login);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':user_id', $user_id);
		
		$stmt->execute();
		
    }

    function getUpdateProfil($user_id,$login,$password,$email,$image_user) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE users";
		$sql .= " SET login=:login, password=:password, email=:email, date_modif=NOW(),image_user=:image_user";
		$sql .= " WHERE user_id=:user_id";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':login', $login);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':email', $email);

		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':image_user', $image_user);
		$stmt->execute();
		
    }

    function getUpdateStructure($code_structure,$code_client,$nom_structure,$longitude,$latitude,$image_structure,$adresse_structure,$description, $code_type_structure,$contact_structure,$username) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE structures";
		$sql .= " SET code_client=:code_client, nom_structure=:nom_structure, longitude=:longitude, latitude=:latitude, image_structure=:image_structure, adresse_structure=:adresse_structure, description_structure=:description_structure, code_type_structure=:code_type_structure, contact_structure=:contact_structure, username=:username, date_creation_structure=NOW()";
		$sql .= " WHERE code_structure=:code_structure";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':code_client', $code_client);
		$stmt->bindParam(':nom_structure', $nom_structure);
		$stmt->bindParam(':longitude', $longitude);	
		$stmt->bindParam(':latitude', $latitude);
		$stmt->bindParam(':image_structure', $image_structure);
		$stmt->bindParam(':adresse_structure', $adresse_structure);
		$stmt->bindParam(':description_structure', $description);
		$stmt->bindParam(':code_type_structure', $code_type_structure);
		$stmt->bindParam(':contact_structure', $contact_structure);
		$stmt->bindParam(':username', $username);
		//$stmt->bindParam(':date_creation', $date_creation);
		$stmt->bindParam(':code_structure', $code_structure);
		
		$stmt->execute();
		
    }

    

    function getUpdateStructureFile($code_structure,$code_client,$nom_structure,$longitude,$latitude,$adresse_structure,$description, $code_type_structure,$contact_structure,$username) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE structures";
		$sql .= " SET code_client=:code_client, nom_structure=:nom_structure, longitude=:longitude, latitude=:latitude, adresse_structure=:adresse_structure, description_structure=:description_structure, code_type_structure=:code_type_structure, contact_structure=:contact_structure, username=:username, date_creation_structure=NOW()";
		$sql .= " WHERE code_structure=:code_structure";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':code_client', $code_client);
		$stmt->bindParam(':nom_structure', $nom_structure);
		$stmt->bindParam(':longitude', $longitude);	
		$stmt->bindParam(':latitude', $latitude);
		
		$stmt->bindParam(':adresse_structure', $adresse_structure);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':code_type_structure', $code_type_structure);
		$stmt->bindParam(':contact_structure', $contact_structure);
		$stmt->bindParam(':username', $username);
		//$stmt->bindParam(':date_creation', $date_creation);
		$stmt->bindParam(':code_structure', $code_structure);
		
		$stmt->execute();
		
    }

     //Mise à jour d'une info quelconque de la to-do list
    function getUpdateClient($code_client,$nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$password,$code_formule,$page,$username,$image_client,$nbre_structure,$delai_restant) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE clients";
		$sql .= " SET nom_client=:nom_client, prenom_client=:prenom_client, contact_1=:contact_1, contact_2=:contact_2, adress_postal=:adress_postal, email=:email, login=:login, password=:password, date_creation_client=NOW(), code_formule=:code_formule, page=:page,username=:username , image_client =:image_client, nbre_structure=:nbre_structure, delai_restant=:delai_restant";
		$sql .= " WHERE code_client=:code_client";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':nom_client', $nom_client);
		$stmt->bindParam(':prenom_client', $prenom_client);
		$stmt->bindParam(':contact_1', $contact_1);	
		$stmt->bindParam(':contact_2', $contact_2);
		$stmt->bindParam(':adress_postal', $adress_postal);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':login', $login);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':code_formule', $code_formule);
		$stmt->bindParam(':page', $page);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':image_client', $image_client);
		$stmt->bindParam(':nbre_structure', $nbre_structure);
		$stmt->bindParam(':delai_restant', $delai_restant);
	
		$stmt->bindParam(':code_client', $code_client);

		
		$stmt->execute();
		
    }
    function getUpdateClientFile($code_client,$nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$password,$code_formule,$page,$username,$nbre_structure,$delai_restant) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE clients";
		$sql .= " SET nom_client=:nom_client, prenom_client=:prenom_client, contact_1=:contact_1, contact_2=:contact_2, adress_postal=:adress_postal, email=:email, login=:login, password=:password, date_creation_client=NOW(), code_formule=:code_formule, page=:page,username=:username,nbre_structure=:nbre_structure,delai_restant=:delai_restant";
		$sql .= " WHERE code_client=:code_client";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':nom_client', $nom_client);
		$stmt->bindParam(':prenom_client', $prenom_client);
		$stmt->bindParam(':contact_1', $contact_1);	
		$stmt->bindParam(':contact_2', $contact_2);
		$stmt->bindParam(':adress_postal', $adress_postal);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':login', $login);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':code_formule', $code_formule);
		$stmt->bindParam(':page', $page);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':delai_restant', $delai_restant);
		$stmt->bindParam(':nbre_structure', $nbre_structure);
	
		$stmt->bindParam(':code_client', $code_client);

		
		$stmt->execute();
		
    }
function getUpdateClientFormule($code_client,$code_formule,$nbre_structure,$delai_restant,$date_fin_formule) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE clients";
		$sql .= " SET code_formule=:code_formule,nbre_structure=:nbre_structure,delai_restant=:delai_restant ,date_fin_formule=:date_fin_formule, date_debut_formule=NOW(),date_modif=NOW()";
		$sql .= " WHERE code_client=:code_client";

		$stmt = $bdd->prepare($sql);

		$stmt->bindParam(':code_formule', $code_formule);
		$stmt->bindParam(':delai_restant', $delai_restant);
		$stmt->bindParam(':nbre_structure', $nbre_structure);
		$stmt->bindParam(':date_fin_formule', $date_fin_formule);
		$stmt->bindParam(':code_client', $code_client);
		$stmt->execute();
		
    }
    function getUpdateDelaiClient($code_client,$delai_restant) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE clients";
		$sql .= " SET delai_restant=:delai_restant";
		$sql .= " WHERE code_client=:code_client";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':delai_restant', $delai_restant);
		$stmt->bindParam(':code_client', $code_client);
		$stmt->execute();
		
    }
    //Mise à jour d'une info quelconque de la to-do list
    function getUpdateFormule($code_formule,$nom_formule,$delai,$username,$nbre_structure) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE formules";
		$sql .= " SET nom_formule=:nom_formule, delai=:delai, username=:username, date_creation_formule=NOW(), nbre_structure=:nbre_structure";
		$sql .= " WHERE code_formule=:code_formule";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':nom_formule', $nom_formule);
		$stmt->bindParam(':delai', $delai);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':nbre_structure', $nbre_structure);
		$stmt->bindParam(':code_formule', $code_formule);

		$stmt->execute();
		
    }
    function getUpdateRole($code_role, $lib_role,$username) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE roles";
		$sql .= " SET lib_role=:lib_role,username=:username,date_creation_role=NOW()";
		$sql .= " WHERE code_role=:code_role";
	
		$stmt = $bdd->prepare($sql);
		
		
		$stmt->bindParam(':lib_role', $lib_role);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':code_role', $code_role);
		
		$stmt->execute();
    }
	
 	
//__Suppression d'une info.
    function getIdTypeStructure($code_type_structure ) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM typestructures";
		$sql .= " WHERE code_type_structure=".$code_type_structure;
		
		$datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $typeStructure = $resultat;
        }
		
		return $typeStructure; // Accès au résultat
    }

     function getIdCategorieProduit($code_categorie_produit ) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM categorieproduits";
		$sql .= " WHERE code_categorie_produit=".$code_categorie_produit;
		
		$datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $categorieproduit = $resultat;
        }
		
		return $categorieproduit; // Accès au résultat
    }

//Suppression d'une info.
    function getIdUsers($user_id ) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM users";
		$sql .= " WHERE user_id=".$user_id;
		
		$datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $user = $resultat;
        }
		
		return $user; // Accès au résultat
    }

    function getIdStructure($code_structure ) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM structures";
		$sql .= " WHERE code_structure=".$code_structure;
		
		$datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $structure = $resultat;
        }
		
		return $structure; // Accès au résultat
    }

    function getIdProduit($code_produit ) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM produits";
		$sql .= " WHERE code_produit=".$code_produit;
		
		$datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $produit = $resultat;
        }
		
		return $produit; // Accès au résultat
    }

    //Suppression d'une info.
    function getIdClient($code_client ) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM clients";
		$sql .= " WHERE code_client=".$code_client;
		
		$datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $client = $resultat;
        }
		
		return $client; // Accès au résultat
    }

    function getIdFormule($code_formule ) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM formules";
		$sql .= " WHERE code_formule=".$code_formule;
		
		$datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $formule = $resultat;
        }
		
		return $formule; // Accès au résultat
    }

    function getIdRole( $code_role ) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM roles";
		$sql .= " WHERE code_role=".$code_role;
		
        $datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count = $resultat;
        }
		
		return $count; // Accès au résultat
    }

	
//__Suppression d'une info dans la to-do list
    function getDeleteTypeStructure($code_type_structure) {
        $bdd = parent::getBdd();
		

		$delete=$bdd->prepare(" DELETE FROM typestructures WHERE code_type_structure=?");
		$params=array($code_type_structure);
		$delete->execute($params);
		//header('location:typeStructure.php');

    }

     function getDeleteCategorieProduit($code_categorie_produit) {
        $bdd = parent::getBdd();
		

		$delete=$bdd->prepare(" DELETE FROM categorieproduits WHERE code_categorie_produit=?");
		$params=array($code_categorie_produit);
		$delete->execute($params);
		//header('location:categorieproduit.php');

    }

//__Suppression d'une info dans la to-do list
    function getDeleteUsers($user_id) {
        $bdd = parent::getBdd();
		

		$delete=$bdd->prepare(" DELETE FROM users WHERE user_id=?");
		$params=array($user_id);
		$delete->execute($params);
		//header('location:user.php');



		/*$sql = "DELETE FROM typestructures";
		$sql .= " WHERE code_type_structure=".$code_type_structure;
		
		$datas = $bdd->query($sql);*/

		/*while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $typeStructure = $resultat;
        }*/
        
		//return $delete; // Accès au résultat
		//return $typeStructure;
		
    }

    function getDeleteStructure($code_structure) {
        $bdd = parent::getBdd();
		

		$delete=$bdd->prepare(" DELETE FROM structures WHERE code_structure=?");
		$params=array($code_structure);
		$delete->execute($params);
		//header('location:structure.php');
		
    }

    function getDeleteProduit($code_produit) {
        $bdd = parent::getBdd();
		

		$delete=$bdd->prepare(" DELETE FROM produits WHERE code_produit=?");
		$params=array($code_produit);
		$delete->execute($params);
		//header('location:produits.php');
		
    }

    //__Suppression d'une info dans la to-do list
    function getDeleteClient($code_client) {
        $bdd = parent::getBdd();
		

		$delete=$bdd->prepare(" DELETE FROM clients WHERE code_client=?");
		$params=array($code_client);
		$delete->execute($params);
		//header('location:client.php');

		
    }

    function getDeleteFormule($code_formule) {
        $bdd = parent::getBdd();

		$delete=$bdd->prepare(" DELETE FROM formules WHERE code_formule=?");
		$params=array($code_formule);
		$delete->execute($params);
		//header('location:formule.php');
		
    }


    //__Suppression d'une info dans la to-do list
    function getDeleteRole($code_role) {
        $bdd = parent::getBdd();
		

		$delete=$bdd->prepare(" DELETE FROM roles WHERE code_role=?");
		$params=array($code_role);
		$delete->execute($params);
		//header('location:role.php');
		/*$sql = "DELETE FROM typestructures";
		$sql .= " WHERE code_type_structure=".$code_type_structure;
		
		$datas = $bdd->query($sql);
		
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $typeStructure = $resultat;
        }*/
        
		//return $delete; // Accès au résultat
		//return null;
    }
	
    function getVerifPassword( $user_id) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT * FROM users";
		$sql .= " WHERE user_id=".$user_id;
		
		
		
		$datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $verif = $resultat;
        }
		
		return $verif; // Accès au résultat
    }
    

    function getVerifPasswordClient( $code_client) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT * FROM clients";
		$sql .= " WHERE code_client=".$code_client;
		
		
		$datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $verif = $resultat;
        }
		
		return $verif; // Accès au résultat
    }
    //pour le tableau de bord

    function getCountStructure() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT count(code_structure) AS nb";
		$sql .= " FROM structures ";
		$sql .= " ORDER BY code_structure";
		
        $datas = $bdd->query($sql);

		$structure= "";

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $structure = $resultat;
        }
		
		return $structure; // Accès au résultat des types structures

    }

    function getCountUsers() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT count(user_id) AS nb";
		$sql .= " FROM users ";
		$sql .= " ORDER BY user_id";
		
        $datas = $bdd->query($sql);

		$user= "";

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $user = $resultat;
        }
		
		return $user; // Accès au résultat des types structures

    }


    function getCountClients() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT count(code_client) AS nb";
		$sql .= " FROM clients ";
		$sql .= " ORDER BY code_client";
		
        $datas = $bdd->query($sql);

		$client= "";

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $client = $resultat;
        }
		
		return $client; // Accès au résultat des types structures

    }
    function getCountProduits() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT count(code_produit) AS nb";
		$sql .= " FROM produits ";
		$sql .= " ORDER BY code_produit";
		
        $datas = $bdd->query($sql);

		$produit= "";

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $produit = $resultat;
        }
		
		return $produit; // Accès au résultat des types structures

    }

    function getCountCategories() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT count(code_categorie_produit) AS nb";
		$sql .= " FROM categorieproduits ";
		$sql .= " ORDER BY code_categorie_produit";
		
        $datas = $bdd->query($sql);

		$categorieproduit= "";

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $categorieproduit = $resultat;
        }
		
		return $categorieproduit; // Accès au résultat des types structures

    }
    function getCountCategorieProd() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT count(code_categorie_produit) AS nb";
		$sql .= " FROM categorieproduits ";
		$sql .= " ORDER BY code_categorie_produit";
		
        $datas = $bdd->query($sql);

		$categorieproduit= "";

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $categorieproduit = $resultat;
        }
		
		return $categorieproduit; // Accès au résultat des types structures

    }

    function getCountProdByCat() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT lib_categorie_produit ,COUNT(*) AS nb";
		$sql .= " FROM produits as pd,  categorieproduits as cp";
		$sql .= " WHERE pd.code_categorie_produit = cp.code_categorie_produit";
		$sql .= " GROUP BY lib_categorie_produit";
		
        $datas = $bdd->query($sql);
        
		$categorieproduit= array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $categorieproduit[] = $resultat;
        }
		
		return $categorieproduit; // Accès au résultat des types structures
		
    }

    function getRecentUsers() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM users";
		$sql .= " ORDER BY date_creation_user DESC LIMIT 0,4";
		
        $datas = $bdd->query($sql);
        
		$recentuser= array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $recentuser[] = $resultat;
        }
		
		return $recentuser; // Accès au résultat des types structures

    }

    function getRecentComment() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM produits";
		$sql .= " ORDER BY date_comment DESC LIMIT 0,4";
		
        $datas = $bdd->query($sql);
        
		$recentcomment= array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $recentcomment[] = $resultat;
        }
		
		return $recentcomment; // Accès au résultat des types structures

    }

    function getRecentProduits() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM produits";
		$sql .= " ORDER BY date_creation_produit DESC LIMIT 0,4";
		
        $datas = $bdd->query($sql);
        
		$recentproduit= array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $recentproduit[] = $resultat;
        }
		
		return $recentproduit; // Accès au résultat des types structures

    }

    function getRecupUsersConnect($user_id) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM users, roles";
		$sql .= " WHERE users.code_role =roles.code_role AND users.user_id=".$user_id;
		$sql .= " ORDER BY user_id";
		
        $datas = $bdd->query($sql);
        
		$recupUser= array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $recupUser = $resultat;
        }
		
		return $recupUser; // Accès au résultat des types structures

    }

    function getRecupUsers() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM users, roles";
		$sql .= " WHERE users.code_role =roles.code_role ";
		$sql .= " ORDER BY user_id";
		
        $datas = $bdd->query($sql);
        
		$recupUser= array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $recupUser = $resultat;
        }
		
		return $recupUser; // Accès au résultat des types structures

    }

    //liste des structures du clients connect
    function getCountStructureClient($code_client) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT nom_structure ,COUNT(*) AS nb";
		$sql .= " FROM clients,structures";
		$sql .= " WHERE clients.code_client=structures.code_client AND clients.code_client=".$code_client;
		$sql .= " ORDER BY nom_structure";
		
		
        $datas = $bdd->query($sql);
		
		$structure =array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $structure[] = $resultat;
        }
		
		return $structure; // Accès au résultat des types structures
    }
    //liste des Formules du clients connect
    function getFormuleClient($code_client) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM clients,formules";
		$sql .= " WHERE clients.code_formule=formules.code_formule AND clients.code_client=".$code_client;
		$sql .= " ORDER BY nom_client";
		
		
        $datas = $bdd->query($sql);
		
		$formuleClient =array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $formuleClient[] = $resultat;
        }
		
		return $formuleClient; // Accès au résultat des types structures
    }

}