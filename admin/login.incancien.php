<?php require_once('admin/connex.inc.php'); ?>
<?php 
include "include/fct.inc.php";


if (isset($_POST['login']) && !empty($_POST['login']) )	{ 

	$login=htmlentities($_POST['login'], ENT_QUOTES,'UTF-8');
	$login=$db->quote($login);
	
	$password=htmlentities($_POST['password'], ENT_QUOTES,'UTF-8');
	$password=md5($password);
	$password=$db->quote($password);
	
	$req="
		SELECT COUNT(*)
		FROM users
		WHERE login=".$login."
		AND password=".$password;
		
	assert ('$db->prepare($req)');
	$select = $db->prepare($req);
	$select->execute();
	$nbre = $select->execute();
	//$nbre = $select->fetchColumn();
	
	if ($nbre==0) header("Location:identification.php?erreur=login");

	//$idclef=recup_clef();
	$date=DATE("Y-m-d");
	
	$req="
		UPDATE users
		SET derniere_connexion=".$date."
		WHERE login=".$login."
		AND password=".$password;
	
	assert ('$db->prepare($req)');
	$select=$db->prepare($req);	
	$select->execute();
	
	try {

		$req="
		SELECT *
		FROM users
		WHERE login=".$login."
		AND password=".$password."
		";
		
		assert ('$db->prepare($req)');
	print_r(assert ('$db->prepare($req)'));
				die();
		$select=$db->prepare($req);
		$select->execute();
		//$nbre = $select->execute();
		//$row=$select->fetch();

		
	} catch (Exception $e) {
		$msg = 'Une erreur est survenue' .$e->getMessage();
        die($msg);
	}
	
	if ($data=$select->fetch()) {
				session_start();
				$_SESSION['PROFILE']=$data;
				
				header("location:ListSite.php");
			}
			else{
				header("location:Login.php");
			}

	//if ($select->rowCount()!=0){
	if ($nbre!=0){
         session_start();
        
         /*$_SESSION['login'] = $row->login; 

         $_SESSION['idclef'] = $row->idclef;
         $_SESSION['code_role'] = $row->code_role;
		 $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
         $_SESSION['user_id'] = $row->user_id;
		 $destination=$row->page; */
		 $_SESSION['PROFILE']=$row;
		 //print_r ($_SESSION['PROFILE']);
		//die();
		print_r($_SESSION['PROFILE']['login']);
		die();
		/* $_SESSION['login'] = $row['login']; 
		 print_r ($_SESSION['login']);
		die();
         $_SESSION['idclef'] = $row['idclef'];
         $_SESSION['code_role'] = $row['code_role'];
		 $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
         $_SESSION['user_id'] = $row['user_id'];
		 $destination=$row['page'];*/
         header("Location:$destination"); 
        }
        else
        {
             header("Location:identification.php?erreur=intru"); 
        }
}
else
{
  header("Location: identification.php?erreur=login") ;
}

$select->closeCursor();
$db = null;

?>
