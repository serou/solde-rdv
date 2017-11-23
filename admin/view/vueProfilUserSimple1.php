<!DOCTYPE html>
<html>
<head>
  <title>MY DASHBORD</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Pour Modal-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!---->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
  }

  .title {
    color: grey;
    font-size: 18px;
  }

  button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    
    font-size: 18px;
  }

  button:hover, a:hover {
    opacity: 0.7;
  }
  </style>
</head>
<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
<body class="w3-light-grey">
                <?php 
                  if ($pageClient == 'compte.php') {

                    include("view/template/vueMenu.php");
                ?>
                <?php }

                  else{
                    include("view/template/vueMenuUserSimple.php"); 
                    
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

      <img src="../common/images/user-map/<?php echo $username; ?>.jpg" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo $username; ?></strong></span><br>
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
    <a href="dashboardUserSimple.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Views</a>
    <a href="compte.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-database fa-fw"></i>  Gestions des Tables</a>
    <a href="profilUserSimple.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Gestion du Profil</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard- Gestion du Profil </b></h5>
  </header>
 <!--affichage et permettre la modification-->
  <?php if(!empty($recupUsers)) {?>
    <div class="col-md-7 col-sm-7 col-sm-offset-2 markers">
          <?php //foreach ($recupUsers as $recupUser) : ?>
          <h2 style="text-align:center">Profil Utilisateur</h2>
          <div class="card">
            <img src="../common/images/user-map/<?php echo $recupUsers->image_user;?>.jpg" style="width:100%">
            <h1><strong>Login </strong> :<?php echo $recupUsers->login; ?></h1>
            <strong>Password </strong> :<?php echo $recupUsers->password; ?>
            <p><strong>Mail</strong>:<?php echo $recupUsers->email; ?></p>
            <div style="margin: 24px 0;">
              <!-- <a href="#"><i class="fa fa-dribbble"></i></a> 
              <a href="#"><i class="fa fa-twitter"></i></a>  
              <a href="#"><i class="fa fa-linkedin"></i></a>  
              <a href="#"><i class="fa fa-facebook"></i></a>  -->
            </div>   
          </div>
          <?php //endforeach; ?>
    </div>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Large Modal</button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <p>This is a large modal.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php } ?>
    

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
