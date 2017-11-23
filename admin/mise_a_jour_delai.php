<?php

	session_start();
	

	require('model/BDD.php');
    require('model/Map.php');
    require('model/Debug.php');

    $map = new Map();

    $clientformules = $map->getclientFormule();
    $date_jour = date('Y-m-d H:i:s');
    foreach ($clientformules as $clientformule) {

    	$date_fin_formule=$clientformule->date_fin_formule;
    	$code_client = $clientformule->code_client;

    	function dateDiff($date1, $date2){
    		$diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
            $retour = array();
                     
            $tmp = $diff;
            $retour['second'] = $tmp % 60;
                    
            $tmp = floor( ($tmp - $retour['second']) /60 );
            $retour['minute'] = $tmp % 60;
                    
            $tmp = floor( ($tmp - $retour['minute'])/60 );
            $retour['hour'] = $tmp % 24;
                      
            $tmp = floor( ($tmp - $retour['hour'])  /24 );
            $retour['day'] = $tmp;


                          return $retour;
    	}
    	
    	$delai_restant= dateDiff(strtotime($date_fin_formule),strtotime($date_jour));
        $delai_restant = $delai_restant['day'];

        $update = $map->getUpdateDelaiClient($code_client,$delai_restant);


    }
                    
?>