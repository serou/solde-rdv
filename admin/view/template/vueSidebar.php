<!-- <div class="col-md-2 sidebar">
	<ul class="nav nav-sidebar">
		<li <?php //if ($page == "compte"): ?> class="active" <?php //endif; ?> ><a href="compte.php">Votre compte</a></li>
		<li <?php //if ($page == "typeStructure"): ?> class="active" <?php //endif; ?> ><a href="typeStructure.php">Type Structure</a></li>
		<li <?php //if ($page == "role"): ?> class="active" <?php //endif; ?> ><a href="role.php">Rôle Utilisateur</a></li>
		<li <?php //if ($page == "users"): ?> class="active" <?php //endif; ?> ><a href="user.php">Utilisateur</a></li>
		<li <?php //if ($page == "formule"): ?> class="active" <?php //endif; ?> ><a href="formule.php">Formule Client</a></li>
		<li <?php //if ($page == "client"): ?> class="active" <?php //endif; ?> ><a href="client.php">Client</a></li>
		<li <?php //if ($page == "structure"): ?> class="active" <?php //endif; ?> ><a href="structure.php">Structure</a></li>
		<li <?php //if ($page == "category"): ?> class="active" <?php //endif; ?> ><a href="category.php">Catégories</a></li>
		<li <?php //if ($page == "markers"): ?> class="active" <?php //endif; ?> ><a href="produits.php">Produits</a></li>
	</ul>
	
	
	<ul class="nav nav-sidebar">
		<li><a href="#">Nav item again</a></li>
		<li><a href="#">One more nav</a></li>
		<li><a href="#">Another nav item</a></li>
	</ul>
	
</div> -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">

      <img src="../common/images/user-map/<?php echo $_SESSION['login']; ?>.jpg" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo strtoupper($_SESSION['login']); ?></strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
	<h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
	<a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
	<a href="compte.php" class="w3-bar-item w3-button w3-padding <?php if ($page == "compte"): ?> w3-blue <?php endif; ?>"><i class="fa fa-users fa-fw"></i>  Votre compte</a>
	<a href="typeStructure.php" class="w3-bar-item w3-button w3-padding <?php if ($page == "typeStructure"): ?> w3-blue <?php endif; ?>"><i class="fa fa-eye fa-fw"></i>  Type Structure</a>
	<a href="role.php" class="w3-bar-item w3-button w3-padding <?php if ($page == "role"): ?> w3-blue <?php endif; ?>"><i class="fa fa-users fa-fw"></i>  Rôle Utilisateur</a>
	<a href="user.php" class="w3-bar-item w3-button w3-padding <?php if ($page == "users"): ?> w3-blue <?php endif; ?>"><i class="fa fa-bullseye fa-fw"></i>  Utilisateur</a>
	<a href="formule.php" class="w3-bar-item w3-button w3-padding <?php if ($page == "formule"): ?> w3-blue <?php endif; ?>"><i class="fa fa-diamond fa-fw"></i>  Formule Client</a>
	<a href="client.php" class="w3-bar-item w3-button w3-padding <?php if ($page == "client"): ?> w3-blue <?php endif; ?>"><i class="fa fa-bell fa-fw"></i>  Client</a>
	<a href="structure.php" class="w3-bar-item w3-button w3-padding <?php if ($page == "structure"): ?> w3-blue <?php endif; ?>"><i class="fa fa-bank fa-fw"></i>  Structure</a>
	<a href="produit.php" class="w3-bar-item w3-button w3-padding <?php if ($page == "produit"): ?> w3-blue <?php endif; ?>"><i class="fa fa-history fa-fw"></i>  Produit</a>
	<a href="category.php" class="w3-bar-item w3-button w3-padding <?php if ($page == "category"): ?> w3-blue <?php endif; ?>"><i class="fa fa-cog fa-fw"></i>  Categorie Produit</a><br><br>
  </div>
	</nav>
