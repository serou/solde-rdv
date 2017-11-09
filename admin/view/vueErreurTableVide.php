<?php
	//__Vue de la page d'erreur
	//__Affiche un message d'erreur spécifique
	$page = "erreurtablevide";
	$titre = "Page d'erreur table vide";
?>

<?php include_once("template/vueHeader.php"); ?>

  <body>

    <div class="container">

      <div class="starter-template">
        <h1>Page vide</h1>
        <p class="lead">Il n'existe aucun element dans Table</p>
      </div>

    </div><!-- /.container -->

	<?php include_once("template/vueFooter.php"); ?>