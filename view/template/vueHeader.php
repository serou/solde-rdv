<?php
	// On démarre la session AVANT d'écrire du code HTML
	session_start();

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
  	<!-- balise méta prise en compte par Google -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo (!empty($description)) ? $description : ''; ?>">
    <meta name="<?php echo (!empty($robotName)) ? $robotName : ''; ?>" content="<?php echo (!empty($robotContent)) ? $robotContent : ''; ?>" />

    <title><?php echo (!empty($title)) ? $title : ''; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="common/css/bootstrap.min.css" rel="stylesheet">
    <link href="common/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="common/css/style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"
   integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ=="
   crossorigin=""/>
   
   <!-- Menu moovant -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
