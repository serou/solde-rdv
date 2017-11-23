<?php
/*
 * Permet la connexion à la partie back-office
 */
	if ("localhost" == $_SERVER['HTTP_HOST']){
		//__variable locale lié à la classe
		$localhost = 'mysql:host=127.0.0.1;port=3306;dbname=solde_rdv;charset=utf8';
		$user = 'root';
		$password = '';
	} elseif ("domaine-distant" == $_SERVER['HTTP_HOST']){
		//__variable OVH lié à la classe
	    $localhost = 'mysql:host=HOST;dbname=BDNAME;charset=utf8';
		$user = 'USER';
		$password = 'PASSWORD';
	}
	

	try{
		$db = new PDO($localhost, $user, $password);
   		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Obligatoire pour la suite
	}catch (PDOException $error){	
		echo 'N : '.$error->getCode().'<br />';
		die ('Erreur : '.$error->getMessage().'<br />');
	}


?>