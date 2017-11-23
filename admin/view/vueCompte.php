<!DOCTYPE html>
<html>
<title>MY DASHBORD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
<body class="w3-light-grey">
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
						<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 main">
							<h1 class="page-header">Bienvenue : <?php if ($_SESSION['login']) echo strtoupper($_SESSION['login']); ?></h1>
						
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
		      <div class="w3-container w3-theme-deep-purple w3-padding-16">
		        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
		        <div class="w3-right">
		          <h3><?php echo $compte; ?></h3>
		        </div>
		        <div class="w3-clear"></div>
		        <h4>Nombre de Vue</h4>
		      </div>
		    </div>
		    <div class="w3-quarter">
		      <div class="w3-container w3-teal w3-padding-16">
		        <div class="w3-left"><i class="fa fa-database w3-xxxlarge"></i></div>
		        <div class="w3-right">
		          <h3><?php echo $countclients->nb;?></h3>
		        </div>
		        <div class="w3-clear"></div>
		        <a href="client.php"><h4>Total Client</h4></a>
		      </div>
		    </div>
			
		    <div class="w3-quarter">
		      <div class="w3-container w3-brown w3-padding-16">
		        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
		        <div class="w3-right">
		          <h3><?php echo $countusers->nb;?></h3>
		        </div>
		        <div class="w3-clear"></div>
		        <h4>Total Users</h4>
		      </div>
		    </div>
			
		  </div>
		  
		  <div class="w3-row-padding w3-margin-bottom">
		    <div class="w3-quarter">
		      <div class="w3-container w3-yellow w3-padding-16">
		        <div class="w3-left"><i class="fa fa-database w3-xxxlarge"></i></div>
		        <div class="w3-right">
		          <h3><?php echo $countstructures->nb;?></h3>
		        </div>
		        <div class="w3-clear"></div>
		        <a href="structure.php"><h4>Total Structure</h4></a>
		      </div>
		    </div>
		   
		    <div class="w3-quarter">
		      <div class="w3-container w3-gray w3-padding-16">
		        <div class="w3-left"><i class="fa fa-database w3-xxxlarge"></i></div>
		        <div class="w3-right">
		          <h3><?php echo $countcategorieProduits->nb;?></h3>
		        </div>
		        <div class="w3-clear"></div>
		        <a href="categorie.php"><h4>Total Categorie Produit</h4></a>
		      </div>
		    </div>
		     
		    <div class="w3-quarter">
		      <div class="w3-container w3-indigo w3-padding-16">
		        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
		        <div class="w3-left">
		        <?php //foreach ($countProdByCats as $countProdByCat) : ?>
		          <p><?php //echo $countProdByCat->lib_categorie_produit.' '.$countProdByCat->nb.' produits';?></p>
		        <?php //endforeach; ?>
		        </div>
		        <div class="w3-clear"></div>
		        <a href="#"><h4>rogea</h4></a>
		      </div>
		    </div>
		     
		    <div class="w3-quarter">
		      <div class="w3-container w3-orange w3-text-white w3-padding-16">
		        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
		        <div class="w3-right">
		          <h3>50</h3>
		        </div>
		        <div class="w3-clear"></div>
		        <a href="#"><h4>fraza</h4></a>
		      </div>
		    </div>
		  </div>
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

		<hr>
		  <div class="w3-container">
		    <h5>Recent Created Users</h5>
		    <?php foreach ($recentUsers as $recentUser) : ?>
		      <ul class="w3-ul w3-card-4 w3-white">
		        <li class="w3-padding-16">
		          <img src="../common/images/user-map/<?php echo $recentUser->image_user;?>.jpg" class="w3-left w3-border w3-margin-right" style="width:35px">
		          <span class="w3-xlarge"><?php echo $recentUser->login;?></span><br>
		        </li>
		      </ul>
		    <?php endforeach; ?>
		  </div>
		  <hr>

		  <div class="w3-container">
		    <h5>Recent Commentaire</h5>
		    <?php foreach ($recentComments as $recentComment) : ?>
		    <div class="w3-row">
		      <div class="w3-col m2 text-center">
		        <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
		      </div>
		      <div class="w3-col m10 w3-container">
		        <h4><?php echo $recentComment->user_comment.'  ';?><span class="w3-opacity w3-medium"><?php $date_comment=strtotime($recentComment->date_comment);
		                    echo date('d/m/Y, H:i',$date_comment);?></span></h4>
		        <p><?php echo $recentComment->commentaire;?></p><br>
		      </div>
		    </div>
		     <?php endforeach; ?>
		  </div>
		  <br>
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

		</body>
		</html>

			</div>
		</div>

<?php include ("view/template/vueFooter.php"); ?>
