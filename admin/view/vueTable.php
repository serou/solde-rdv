<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
	<body>
				<?php 
					if ($pageClient == 'compte.php') {

						include("view/template/vueMenu.php");
						//require_once("dashboard.php");
				?>
				<?php }

					else{
						include("view/template/vueMenuUserSimple.php"); 
						//require_once("dashboard.php");
						
					}

				?>	
		<?php //include("view/template/vueMenu.php"); // inclusion du menu principal ?>

		<div class="container-fluid">
			<div class="row">
				<?php 
					if ($pageClient == 'compte.php') {

						include "view/template/vueSidebar.php"; 
						
				?>
				<?php }

					else{
						include "view/template/vueSidebarUserSimple.php"; 
						//require_once("dashboard.php");
					}

				?>	
						<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
							<h1 class="page-header">Bienvenue : <?php if ($_SESSION['login']) echo $_SESSION['login']; ?></h1>
						
							<h2 class="sub-header">Sur L'Administration de Solde au RDV </h2>
						</div>	
			</div>
		</div>

<?php include ("view/template/vueFooter.php"); ?>