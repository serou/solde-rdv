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
                ?>
                <?php }

                  else{
                    include("view/template/vueMenuClient.php"); 
                    
                  }

                ?>  
<!-- Top container -->
<!-- <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo </span>
  <span class="w3-bar-item w3-right"><a href="deconnection.php">Déconnexion</a></span>
</div> -->

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">

      <img src="../common/images/client-map/<?php echo $username; ?>.jpg" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo strtoupper($username); ?></strong></span><br>
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
    <a href="dashboardClient.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    
    <a href="produit.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-database fa-fw"></i>  Gestions des Produits</a>
    <a href="profilClient.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Gestion du Profil</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
   <!-- <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>-->
  </div>
</nav>


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
      <div class="w3-container w3-brown w3-padding-16">
        <div class="w3-left"><i class="fa fa-database w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $countProduits->nb; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <a href="produit.php"><h4>Total Produits</h4></a>
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
  </div> -->
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

</body>
</html>
