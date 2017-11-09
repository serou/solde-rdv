<?php
/*
 * Modele de classe PHP : Map-2.php
 * Classe d'affichage des markers sur une Google Maps
 */

class Map extends BDD{
//__variable lié à la classe

//__Affiche tous les infos

	//Affichage des type Structure
    function getTypeStructure() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM typestructures ";
		$sql .= " ORDER BY code_type_structure";
		
        $datas = $bdd->query($sql);

		$typeStructure= array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $typeStructure[] = $resultat;
        }
		
		return $typeStructure; // Accès au résultat des types structures
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

    function getStructure() {
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
    function getClient() {
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
    function getFormule() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM formules ";
		$sql .= " ORDER BY code_formule";
		
        $datas = $bdd->query($sql);

		$formules= array();

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
			
            $formules[] = $resultat;
        }
		
		return $formules; // Accès au résultat des types structures
    }

    //Affichage des type Structure
    function getRole() {
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
		
		$sql = "INSERT INTO typestructures (lib_type_structure,username)";
		$sql .= " VALUES (:lib_type_structure, :username)";
	
		$stmt = $bdd->prepare($sql);
		$stmt->bindParam(':lib_type_structure', $lib_type_structure);
		$stmt->bindParam(':username', $username);
			
		$stmt->execute();
    }

    //__Insertion d'une info dans la to-do list
    function getInsertUsers($code_role,$login,$password,$email,$page,$username,$image_user) {
        $bdd = parent::getBdd();
		
		$sql = "INSERT INTO users (code_role,login,password,email,date_creation,page,username,image_user)";
		$sql .= " VALUES (:code_role,:login,:password,:email,NOW(),:page,:username,:image_user)";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':code_role', $code_role);
		$stmt->bindParam(':login', $login);	
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':email', $email);
		
		
	//	$stmt->bindParam(':derniere_connexion', $derniere_connexion);
		$stmt->bindParam(':page', $page);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':image_user', $image_user);
		$stmt->execute();
    }

     function getInsertStructure($code_client,$nom_structure,$longitude,$latitude,$image_structure,$adresse_structure,$description,$code_type_structure,$contact_structure,$username) {
        $bdd = parent::getBdd();
		
		$sql = "INSERT INTO structures (code_client,nom_structure,longitude,latitude,image_structure,adresse_structure,description,code_type_structure,contact_structure,username,date_creation)";
		$sql .= " VALUES (:code_client,:nom_structure,:longitude,:latitude,:image_structure,:adresse_structure, :description, :code_type_structure, :contact_structure, :username, NOW())";

		$stmt = $bdd->prepare($sql);

		$stmt->bindParam(':code_client', $code_client);
		$stmt->bindParam(':nom_structure', $nom_structure);
		$stmt->bindParam(':longitude', $longitude);	
		$stmt->bindParam(':latitude', $latitude);
		$stmt->bindParam(':image_structure', $image_structure);
		$stmt->bindParam(':adresse_structure', $adresse_structure);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':code_type_structure', $code_type_structure);
		$stmt->bindParam(':contact_structure', $contact_structure);
		$stmt->bindParam(':username', $username);
	

		$stmt->execute();
    }

    //__Insertion d'une info dans la to-do list
    function getInsertClient($nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$password,$longitude,$latitude,$code_formule,$page,$username) {
        $bdd = parent::getBdd();
		
		$sql = "INSERT INTO clients (nom_client,prenom_client,contact_1,contact_2,adress_postal,email,login,password,longitude,latitude,code_formule,page,username,date_creation)";
		$sql .= " VALUES (:nom_client, :prenom_client, :contact_1, :contact_2, :adress_postal, :email, :login, :password, :longitude, :latitude, :code_formule,:page,:username,NOW())";

		$stmt = $bdd->prepare($sql);

		$stmt->bindParam(':nom_client', $nom_client);
		$stmt->bindParam(':prenom_client', $prenom_client);
		$stmt->bindParam(':contact_1', $contact_1);	
		$stmt->bindParam(':contact_2', $contact_2);
		$stmt->bindParam(':adress_postal', $adress_postal);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':login', $login);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':longitude', $longitude);
		$stmt->bindParam(':latitude', $latitude);
		$stmt->bindParam(':code_formule', $code_formule);
		$stmt->bindParam(':page', $page);
		$stmt->bindParam(':username', $username);
		//$stmt->bindParam(':date_creation', $date_creation);
		
		$stmt->execute();
		

    }

     //__Insertion d'une info dans la to-do list
    function getInsertFormule($nom_formule,$delai,$username) {
        $bdd = parent::getBdd();
		
		$sql = "INSERT INTO formules (nom_formule,delai,username)";
		$sql .= " VALUES (:nom_formule,:delai,:username)";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':nom_formule', $nom_formule);
		$stmt->bindParam(':delai', $delai);	
		$stmt->bindParam(':username', $username);	
		$stmt->execute();
    }

    //__Insertion d'une info dans la to-do list
    function getInsertRole($lib_role,$username) {
        $bdd = parent::getBdd();
		
		
		$sql = "INSERT INTO roles (lib_role,username,date_creation)";
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
		$sql .= " SET lib_type_structure=:lib_type_structure ,username=:username ";
		$sql .= " WHERE code_type_structure=:code_type_structure";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':lib_type_structure', $lib_type_structure);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':code_type_structure', $code_type_structure);
		
		$stmt->execute();
    }

    //Mise à jour d'une info quelconque de la to-do list
    function getUpdateUsers($user_id,$code_role,$login,$password,$email,$page,$username,$image_user) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE users";
		$sql .= " SET code_role=:code_role, login=:login, password=:password, email=:email, date_creation=NOW(), page=:page, username=:username, image_user=:image_user";
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
		$sql .= " SET code_role=:code_role, login=:login, password=:password, email=:email, date_creation=NOW(), page=:page, username=:username";
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

    function getUpdateStructure($code_structure,$code_client,$nom_structure,$longitude,$latitude,$image_structure,$adresse_structure,$description, $code_type_structure,$contact_structure,$username) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE structures";
		$sql .= " SET code_client=:code_client, nom_structure=:nom_structure, longitude=:longitude, latitude=:latitude, image_structure=:image_structure, adresse_structure=:adresse_structure, description=:description, code_type_structure=:code_type_structure, contact_structure=:contact_structure, username=:username, date_creation=NOW()";
		$sql .= " WHERE code_structure=:code_structure";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':code_client', $code_client);
		$stmt->bindParam(':nom_structure', $nom_structure);
		$stmt->bindParam(':longitude', $longitude);	
		$stmt->bindParam(':latitude', $latitude);
		$stmt->bindParam(':image_structure', $image_structure);
		$stmt->bindParam(':adresse_structure', $adresse_structure);
		$stmt->bindParam(':description', $description);
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
		$sql .= " SET code_client=:code_client, nom_structure=:nom_structure, longitude=:longitude, latitude=:latitude, adresse_structure=:adresse_structure, description=:description, code_type_structure=:code_type_structure, contact_structure=:contact_structure, username=:username, date_creation=NOW()";
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
    function getUpdateClient($code_client,$nom_client,$prenom_client,$contact_1,$contact_2,$adress_postal,$email,$login,$password,$longitude,$latitude,$code_formule,$page,$username) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE clients";
		$sql .= " SET nom_client=:nom_client, prenom_client=:prenom_client, contact_1=:contact_1, contact_2=:contact_2, adress_postal=:adress_postal, email=:email, login=:login, password=:password, date_creation=NOW(), longitude=:longitude, latitude=:latitude, code_formule=:code_formule, page=:page,username=:username";
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
		$stmt->bindParam(':longitude', $longitude);
		$stmt->bindParam(':latitude', $latitude);
		$stmt->bindParam(':code_formule', $code_formule);
		$stmt->bindParam(':page', $page);
		$stmt->bindParam(':username', $username);
		//$stmt->bindParam(':date_creation', $date_creation);
	
		$stmt->bindParam(':code_client', $code_client);

		
		$stmt->execute();
		
    }

    //Mise à jour d'une info quelconque de la to-do list
    function getUpdateFormule($code_formule,$nom_formule,$delai,$username) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE formules";
		$sql .= " SET nom_formule=:nom_formule, delai=:delai, username=:username";
		$sql .= " WHERE code_formule=:code_formule";

		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':nom_formule', $nom_formule);
		$stmt->bindParam(':delai', $delai);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':code_formule', $code_formule);

		$stmt->execute();
		
    }
    function getUpdateRole($code_role, $lib_role,$username) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE roles";
		$sql .= " SET lib_role=:lib_role,username=:username, date_creation=NOW()";
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

    

//__Affiche tous les infos
    function getIdInfosCat( $id ) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM markers_icone";
		$sql .= " WHERE icone_id=".$id;
		
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
		header('location:typeStructure.php');



		/*$sql = "DELETE FROM typestructures";
		$sql .= " WHERE code_type_structure=".$code_type_structure;
		
		$datas = $bdd->query($sql);*/

		/*while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $typeStructure = $resultat;
        }*/
        
		//return $delete; // Accès au résultat
		//return $typeStructure;
		
    }

//__Suppression d'une info dans la to-do list
    function getDeleteUsers($user_id) {
        $bdd = parent::getBdd();
		

		$delete=$bdd->prepare(" DELETE FROM users WHERE user_id=?");
		$params=array($user_id);
		$delete->execute($params);
		header('location:user.php');



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
		header('location:structure.php');
		
    }

    //__Suppression d'une info dans la to-do list
    function getDeleteClient($code_client) {
        $bdd = parent::getBdd();
		

		$delete=$bdd->prepare(" DELETE FROM clients WHERE code_client=?");
		$params=array($code_client);
		$delete->execute($params);
		header('location:client.php');

		
    }

    function getDeleteFormule($code_formule) {
        $bdd = parent::getBdd();

		$delete=$bdd->prepare(" DELETE FROM formules WHERE code_formule=?");
		$params=array($code_formule);
		$delete->execute($params);
		header('location:formule.php');
		
    }


    //__Suppression d'une info dans la to-do list
    function getDeleteRole($code_role) {
        $bdd = parent::getBdd();
		

		$delete=$bdd->prepare(" DELETE FROM roles WHERE code_role=?");
		$params=array($code_role);
		$delete->execute($params);
		header('location:role.php');
		/*$sql = "DELETE FROM typestructures";
		$sql .= " WHERE code_type_structure=".$code_type_structure;
		
		$datas = $bdd->query($sql);
		
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $typeStructure = $resultat;
        }*/
        
		//return $delete; // Accès au résultat
		//return null;
    }
	
//__Suppression d'une catégorie
    function getDeleteCategory( $id ) {
        $bdd = parent::getBdd();
		
		$sql = "DELETE FROM markers_icone";
		$sql .= " WHERE icone_id=".$id;
		
		$datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count = $resultat;
        }
		
		return $count; // Accès au résultat
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

    function getErreurUser() {
        $bdd = parent::getBdd();
		
		$ancpassword= "Votre mot de passe saisi est incorrect";
		//$nvxpassword= "Votre mot de passe saisi est incorrect"
		$conpassword= "Votre mot de passe saisi ne correspond pas";
		
		//return $verif; // Accès au résultat
    }
    
    //**********************************************************
	//__Affiche tous les infos de produits
		function getProduit() {
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

	//__Affiche tous les catégories de produits
		function getCatProduit() {
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
	
	//__Insertion d'une info dans list de produits
		function getInsertProduit($libele, $categorie, $structure, $description, $prix, $reduction, $dateDeb, $heureDeb, $dateFin, $heureFin ) {
		    $bdd = parent::getBdd();
		
			$sql = "INSERT INTO produits (lib_produit, code_categorie_produit, code_structure, description, prix_initial, reduction, date_debut_promo, heure_debut_promo, date_fin_promo, heure_fin_promo)";
			$sql .= " VALUES (:libele, :categorie, :structure, :description, :prix, :reduction, :dateDeb, :heureDeb, :dateFin, :heureFin)";
	
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
	
	//__Insertion d'une info dans la list de categorie de produits
		function getInsertCatProduit($libele) {
		    $bdd = parent::getBdd();
		
			$sql = "INSERT INTO categorieproduits (lib_categorie_produit)";
			$sql .= " VALUES (:libele)";
	
			$stmt = $bdd->prepare($sql);
			$stmt->bindParam(':libele', $libele);
		
			$stmt->execute();
		}
	
	//Mise à jour d'une info quelconque de la list de produits
		function getUpdateProduit($id, $libele, $categorie, $structure, $description, $prix, $reduction, $dateDeb, $heureDeb, $dateFin, $heureFin) {
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
	
	//Mise à jour d'une info quelconque de la list des categories produits
		function getUpdateCatProduit($id, $libele) {
		    $bdd = parent::getBdd();
		
			$sql = "UPDATE categorieproduits";
			$sql .= " SET lib_categorie_produit=:libele";
			$sql .= " WHERE code_categorie_produit=:id";
	
			$stmt = $bdd->prepare($sql);
		
		
			$stmt->bindParam(':libele', $libele);
		
		
			$stmt->execute();
		}
	
	//__Suppression d'une info du produit ayant cet id.
		function getIdProduit( $id ) {
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

	//__Affiche tous les infos de la categorie produit ayant cet id...
		function getIdCatProduit( $id ) {
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
	
	//__Suppression du produit ayant cet id...
		function getDeleteProduit( $id ) {
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
		function getDeleteCatProduit( $id ) {
		    $bdd = parent::getBdd();
		
			$sql = "DELETE FROM categorieproduits";
			$sql .= " WHERE code_categorie_produit=".$id;
		
			$datas = $bdd->query($sql);
		
			if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
		        $count = $resultat;
		    }
		
			return $count; // Accès au résultat
		}

	//************************************************************    
 }
