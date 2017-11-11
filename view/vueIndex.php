<?php include_once("template/vueHeader.php"); ?>

	<body>

		<?php include_once("template/vueNavbar.php"); ?>
		
		<div id="map-canvas" style="z-index:2;"></div>
<!-- se positionner -->
		<div>
			<button id="myLocation" class="mylocation" title="Me positionner"></button>
		</div>
<!-- fin se positionner -->
		
		<nav id="menu" class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:360px;" id="mySidebar"><br>
		  
<?php if (!empty($prod))
	{
?>  
		  <div class="w3-container">
	
			  <div class="w3-white w3-text-grey w3-card-4">
				<div class="w3-display-container">
				  <img src="serou.jpg" style="width:100%" alt="Avatar">
				  <div class="w3-display-bottomleft w3-container w3-text-black">
					<h2><?php echo $prod->lib_produit .' -'. $prod->reduction .'%' ?></h2>
				  </div>
				</div>
				<div class="w3-container">
				  <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $prod->prix_initial - ($prod->prix_initial * $prod->reduction / 100).' fcfa' ?>
				  <i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $prod->adresse_structure ?></p>
				  <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $prod->nom_structure ?>
				  <i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $prod->contact_structure ?></p>
				  
				</div>
			<?php foreach($commentaires as $commentaire) : ?>
				<p><strong> <?php echo $commentaire->nom_propr_cmt ?> :</strong> <?php echo $commentaire->text_cmt ?></p>
			<?php endforeach; ?>
					<form class="form-inline" action="/action_page.php">
						<div class="form-group">
						  <label class="sr-only" for="pseudo">Pseudo:</label>
						  <input type="pseudo" class="form-control" id="pseudo" placeholder="Enter votre pseudo"  name="pseudo">
						</div>
						<div class="form-group">
						  <label class="sr-only" for="commentaire">Commentaire:</label>
						  <input type="commentaire" class="form-control" id="commentaire" placeholder="Enter un commentaire" name="commentaire">
						</div>
						<button type="submit" class="btn btn-default">Envoyer</button>
					 </form>
				 </div>
			
		  </div>
<?php
 	 }else{
?>
		  <div class="w3-container w3-row">
			<div class="w3-col s4">
			  <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
			</div>
			<div class="w3-col s8 w3-bar">
			  <span>Welcome, <strong>Mike</strong></span><br>
			  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
			  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
			  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
			</div>
		  </div>
		  <hr>
		  
		  <div class="w3-container" id="list_produit">
			<h2>soldes recents</h2>
			
		  </div>
<?php
 	 }
?>
		</nav>
		
		 <div id="masquerAfficherMenu" class="w3-animate-left" style="position:absolute;left:360px;top:300px;visibility:visible;cursor:pointer;z-index:5;"><img src="common/images/masquer_menu.png"/></div>
			
		<script>	
			var marker = <?php echo $allProdJson; ?> // stockage du resultat de la requête
		</script>
	
		<?php include_once("template/vueFooter.php"); ?>
	</body>
</html>
