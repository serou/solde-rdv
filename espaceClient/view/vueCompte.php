<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
	<body>
				<?php 
					if ($pageClient == 'compte.php') {

						include("view/template/vueMenu.php");
				?>
				<?php }

					else{
						include("view/template/vueMenuClient.php"); 
						
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
						include "view/template/vueSidebarClient.php"; 
						
					}

				?>	
						<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
							<h1 class="page-header">Bienvenue : <?php  echo strtoupper($username); ?></h1>
						
							<h2 class="sub-header">Sur L'Administration de Solde au RDV </h2>
						</div>	
						<!-- Overlay effect when opening sidebar on small screens -->
						<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

						<!-- !PAGE CONTENT! -->
						<div class="w3-main" style="margin-left:300px;margin-top:43px;">

						  <!-- Header -->
						  <header class="w3-container" style="padding-top:22px">
						    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
						  </header>
						  <div class="w3-row-padding w3-margin-bottom">
						    <div class="w3-quarter">
						      <div class="w3-container w3-red w3-padding-16">
						        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
						        <div class="w3-right">
						          <h3>52</h3>
						        </div>
						        <div class="w3-clear"></div>
						        <h4>Messages</h4>
						      </div>
						    </div>
						   
						    <div class="w3-quarter">
						      <div class="w3-container w3-teal w3-padding-16">
						        <div class="w3-left"><i class="fa fa-database w3-xxxlarge"></i></div>
						        <div class="w3-right">
						          <h3><?php echo $countProduits->nb; ?></h3>
						        </div>
						        <div class="w3-clear"></div>
						        <a href="produits.php"><h4>Total Produits</h4></a>
						      </div>
						    </div>
						    <!-- <div class="w3-quarter">
						      <div class="w3-container  w3-theme-deep-purple w3-padding-16">
						        <div class="w3-left"><i class="fa fa-database w3-xxxlarge"></i></div>
						        <div class="w3-right">
						          <h3><?php //echo $countCategories->nb;?></h3>
						        </div>
						        <div class="w3-clear"></div>
						        <a href="category.php"><h4>Total Categorie produit</h4></a>
						      </div>
						    </div> 
						  </div>-->
						    <!--
						    <a href="user.php"><div class="w3-quarter">
						      <div class="w3-container w3-brown w3-padding-16">
						        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
						        <div class="w3-right">
						          <h3><?php //echo $countusers->nb;?></h3>
						        </div>
						        <div class="w3-clear"></div>
						        <h4>Total Users</h4>
						      </div>
						    </div></a>
						  </div>
						  
						  
						   
						    <a href="categorie.php"><div class="w3-quarter">
						      <div class="w3-container w3-gray w3-padding-16">
						        <div class="w3-left"><i class="fa fa-database w3-xxxlarge"></i></div>
						        <div class="w3-right">
						          <h3><?php //echo $countcategorieProduits->nb;?></h3>
						        </div>
						        <div class="w3-clear"></div>
						        <h4>Total Categorie Produit</h4>
						      </div>
						    </div></a>
						     
						    <a href="#"><div class="w3-quarter">
						      <div class="w3-container w3-indigo w3-padding-16">
						        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
						        <div class="w3-left">
						        <?php //foreach ($countProdByCats as $countProdByCat) : ?>
						          <p><?php //echo $countProdByCat->lib_categorie_produit.' '.$countProdByCat->nb.' produits';?></p>
						        <?php //endforeach; ?>
						        </div>
						        <div class="w3-clear"></div>
						        <h4>rogea</h4>
						      </div>
						    </div></a>
						     
						    <a href="#"><div class="w3-quarter">
						      <div class="w3-container w3-orange w3-text-white w3-padding-16">
						        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
						        <div class="w3-right">
						          <h3>50</h3>
						        </div>
						        <div class="w3-clear"></div>
						        <h4>fraza</h4>
						      </div>
						    </div></a>
						  </div>-->

						 
						  <hr>
						  <div class="w3-container">
						    <h5>General Stats</h5>
						    <p>New Visitors</p>
						    <div class="w3-grey">
						      <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
						    </div>

						    <p>New Users</p>
						    <div class="w3-grey">
						      <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
						    </div>

						    <p>Bounce Rate</p>
						    <div class="w3-grey">
						      <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
						    </div>
						  </div>
						  <hr>

						  <div class="w3-container">
						    <h5>Recent Produit Ajouté</h5>
						    <?php foreach ($recentProduits as $recentProduit) : ?>
						    <div class="w3-row">
						      <div class="w3-col m2 text-center">
						        <img class="w3-circle" src="../common/images/produit-map/<?php //echo $recentProduit->image_produit;?>.jpg" style="width:96px;height:96px">
						      </div>
						      <div class="w3-col m10 w3-container">
						        <h4><?php echo $recentProduit->lib_produit.' ajouté le  ';?><span class="w3-opacity w3-medium"><?php $date_creation=strtotime($recentProduit->date_creation_produit);
						                    echo date('d/m/Y, H:i',$date_creation);?></span></h4>
						        <p><?php //echo $recentComment->commentaire;?></p><br>
						      </div>
						    </div>
						     <?php endforeach; ?>
						  </div>
						  <br>

						  <!-- Footer -->
						  <footer class="w3-container w3-padding-16 w3-light-grey">
						    <h4>FOOTER</h4>
						    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
						  </footer>

						  <!-- End page content -->
						</div>

						<script>
						// Get the Sidebar
						var mySidebar = document.getElementById("mySidebar");

						// Get the DIV with overlay effect
						var overlayBg = document.getElementById("myOverlay");

						// Toggle between showing and hiding the sidebar, and add overlay effect
						function w3_open() {
						    if (mySidebar.style.display === 'block') {
						        mySidebar.style.display = 'none';
						        overlayBg.style.display = "none";
						    } else {
						        mySidebar.style.display = 'block';
						        overlayBg.style.display = "block";
						    }
						}

						// Close the sidebar with the close button
						function w3_close() {
						    mySidebar.style.display = "none";
						    overlayBg.style.display = "none";
						}
						</script>
							</div>
						</div>

<?php include ("view/template/vueFooter.php"); ?>