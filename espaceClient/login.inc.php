<?php
	require_once('espaceClient/connex.inc.php');
	include "include/fct.inc.php";
	
		$login=$_POST['login'];
		$password=md5($_POST['password']);

	if (isset($_POST['login']) && !empty($_POST['login']) )	{ 

		$login=htmlentities($_POST['login'], ENT_QUOTES,'UTF-8');
		$password=htmlentities($_POST['password'], ENT_QUOTES,'UTF-8');
		$password=md5($password);
		
		if ($login&&$password) {
			try {
					$select=$db->prepare("SELECT * FROM clients  WHERE login=? AND password =?");
					$params=array($login,$password);
					$select->execute($params);
					$nbre = assert ('$db->prepare("SELECT * FROM clients  WHERE login=? AND password =?")');
					if ($nbre==0){
						header("Location:identification.php?erreur=login");
					}

				} catch (Exception $e) {
					$msg = 'Une erreur est survenue' .$e->getMessage();
        			die($msg);
				}

				
			 if ($data=$select->fetch()){
			
			 	$idclef=recup_clef();
				$date=DATE("Y-m-d");
	
				
				$select=$db->prepare("UPDATE clients SET derniere_connexion = ? WHERE login = ? AND password = ?");	
				$params=array($date,$login,$password);
				$select->execute($params);


				session_start();
				$_SESSION['PROFILE']=$data;
				
				$_SESSION['login'] = $data['login']; 
				
         		
		 		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
         		
		 		$destination=$data['page'];

				header("Location:compte.php"); 
			}
			else{
				header("Location:identification.php?erreur=intru"); 
			}
		}
		else{
			echo "Veillez remplir tous les champs";
		}

	}
	else
	{
  		header("Location: identification.php?erreur=login") ;
	}

$select->closeCursor();
$db = null;
		
			
?>
