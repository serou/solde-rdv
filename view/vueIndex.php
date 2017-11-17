<?php include_once("template/vueHeader.php"); ?>

	<body>
		<?php include_once("template/vueNavbar.php"); ?>
		
		<div id="map-canvas" style="z-index:2;"></div>
<!-- se positionner -->
		<div id="myLocation" class="mylocation" title="Me positionner" style="cursor:pointer">
			<i class="fa fa-location-arrow" style="font-size:30px;color:rgba(0, 0, 0, 0.7);"></i>
		</div>
<!-- fin se positionner -->
		
		<nav id="menu" class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:360px;" id="mySidebar"><br>
		  
<?php if (!empty($prod))
	{
?>  
		  <div class="w3-container">
	
			  <div class="w3-white w3-text-grey w3-card-4">
				<div class="w3-display-container" id="image_produit">
				
					<img src="<?php echo 'common/images/'. $prod->image_produit ?>" alt="Avatar" class="image" style="width:100%">
				    <div class="middle">
					  <div class="text"><?php echo nl2br(stripslashes($prod->lib_produit)) .' -'. nl2br(stripslashes($prod->reduction)) .'%' ?></div>
				    </div>
  
				  
				</div> <br/>
				<div class="w3-container">
				  <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $prod->prix_initial - ($prod->prix_initial * $prod->reduction / 100).' fcfa' ?>
				  <i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo nl2br(stripslashes($prod->adresse_structure)) ?></p>
				  <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo nl2br(stripslashes($prod->nom_structure)) ?>
				  <i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo nl2br(stripslashes($prod->contact_structure)) ?></p>
				  
				</div>
				<div style="padding-left:20px;overflow:scroll;">
					<h3>Commentaires</h3>
				<?php foreach ( $commentaires as $commentaire ) : ?>
					<p style="padding:0px;"><strong> <?php echo nl2br(stripslashes($commentaire->nom_propr_cmt)); ?> :</strong> <?php echo nl2br(stripslashes($commentaire->text_cmt)); ?> <span style="font-size:0.6em"><?php $date =strtotime($commentaire->date_cmt); echo date('d/m/Y',$date); ?></span></p>
				
				<?php endforeach;  ?>
					<form  id="form_commentaire" class="form-inline" action="index.php?produit=<?php echo $produit ?>" method="POST">
						  <label class="sr-only" for="pseudo">Pseudo:</label>
						  <input class="form-control w3-input w3-animate-input" type="text" id="pseudo" placeholder="Votre pseudo"  name="pseudo" style="width:135px; height:35px; max-width:70%"><br>
						
						  <label class="sr-only" for="commentaire">Commentaire:</label>
 				    	  <input class="form-control w3-input w3-border w3-animate-input" type="text" id="commentaire" placeholder="Votre commentaire" name="commentaire" style="width:155px; height:35px; max-width:90%">

 					      <a href="#" id="envoi_commentaire" title="Envoyer"><i class="fa fa-send-o" style="font-size:18px; color:#337AB7"></i></a>
						<!--button type="submit" class="btn btn-default">Envoyer</button-->
					 </form>
				 </div>
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
		  
		  <div class="w3-container-fluid">
			<h2>soldes recents</h2>
				<div class='container-fluid'>
					<div class='row'>
						<div class='col-xs-12' style="padding-left:5px;padding-right:5px;">
							<ul class='event-list' id="list_produit">
							
							</ul>
						</div>
					</div>
				</div>

		  </div>
<?php
 	 }
?>
		</nav>
		
		 <div id="masquerAfficherMenu" class="w3-animate-left" style="position:absolute;left:360px;top:300px;visibility:visible;cursor:pointer;z-index:5;"><img src="common/images/masquer_menu.png"/></div>
		 
		<?php if (isset($_GET['lat']) && isset($_GET['lat']) )
			{
		?>
			<div id="latitude" style="visibility:hidden;"><?php echo $_GET['lat'] ?></div>
			<div id="longitude" style="visibility:hidden;"><?php echo $_GET['lng'] ?></div>
		<?php 
			}
			

		?>	
		
		<script>	
			var marker = <?php echo $allProdJson; ?> // stockage du resultat de la requête
			
			$(document).ready(function(){
				$("[rel='tooltip']").tooltip();
			});
		</script>
	
		<?php include_once("template/vueFooter.php"); ?>
	</body>
</html>
