	<!--<div class="col-md-2 sidebar">
	<ul class="nav nav-sidebar">
		<li <?php if ($page == "compte"): ?> class="active" <?php endif; ?> ><a href="compte.php">Votre compte</a></li>
		<li <?php if ($page == "category"): ?> class="active" <?php endif; ?> ><a href="category.php">Catégories</a></li>
		<li <?php if ($page == "markers"): ?> class="active" <?php endif; ?> ><a href="produits.php">Produits</a></li>
		<li <?php if ($page == "typeStructure"): ?> class="active" <?php endif; ?> ><a href="typeStructure.php">Type Structure</a></li>
		<li <?php if ($page == "role"): ?> class="active" <?php endif; ?> ><a href="role.php">Rôle Utilisateur</a></li>
		<li <?php if ($page == "users"): ?> class="active" <?php endif; ?> ><a href="user.php">Utilisateur</a></li>
		<li <?php if ($page == "formule"): ?> class="active" <?php endif; ?> ><a href="formule.php">Formule Client</a></li>
		<li <?php if ($page == "client"): ?> class="active" <?php endif; ?> ><a href="client.php">Client</a></li>
		<li <?php if ($page == "structure"): ?> class="active" <?php endif; ?> ><a href="structure.php">Structure</a></li>
		
	</ul>
	

	<ul class="nav nav-sidebar">
		<li><a href="#">Nav item again</a></li>
		<li><a href="#">One more nav</a></li>
		<li><a href="#">Another nav item</a></li>
	</ul>
	
</div>-->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">

      <img src="../common/images/client-map/<?php echo $_SESSION['PROFILE']['nom_client'].'-'.$_SESSION['PROFILE']['prenom_client']; ?>.jpg" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo strtoupper($_SESSION['PROFILE']['nom_client'].'-'.$_SESSION['PROFILE']['prenom_client']); ?></strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
	<h5>Dashboard-Client</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="dashboardClient.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    
    <a href="produit.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-database fa-fw"></i>  Gestions des Produits</a>
    <a href="profilClient.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Gestion du Profil</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
    <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>-->
  </div>
</nav>
