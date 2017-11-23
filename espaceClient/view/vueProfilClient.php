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
      <span>Welcome, <strong><?php echo $username; ?></strong></span><br>
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
  <?php if(!empty($recupclients)) {?>
        <div class="col-md-7 col-sm-7 col-sm-offset-2 markers">

          <?php foreach ($recupclients as $recupclient) : ?>
          <h2 style="text-align:center">Profil Du Client</h2>

          <div class="card">
            <img src="../common/images/client-map/<?php echo $recupclient->image_client;?>.jpg" style="width:100%">
            <h1><strong>Login </strong> :<?php echo $recupclient->login; ?></h1>
            <strong>Password </strong> :<?php echo $recupclient->password; ?>
            <p><strong>Mail</strong>:<?php echo $recupclient->email; ?></p>
            <p><strong>Nom</strong>:<?php echo $recupclient->nom_client; ?></p>
            <p><strong>Prenom</strong>:<?php echo $recupclient->prenom_client; ?></p>
            <p><strong>Contact 1</strong>:<?php echo $recupclient->contact_1; ?></p>
            <p><strong>Contact 2</strong>:<?php echo $recupclient->contact_2; ?></p>
            <p><strong>Adresse postale 2</strong>:<?php echo $recupclient->adress_postal; ?></p>
            <p><button id="myBtn" class=" btn btn-primary">Modifier Mes informations</button></p><br>
          </div>
          <?php endforeach; ?>
        </div>
          <!-- Trigger/Open The Modal -->
            <!-- The Modal -->
        <div id="myModal" class="modal1">
          <!-- Modal content -->
            <div class="modal1-content">
              <div class="modal1-header">
                <span class="close">&times;</span>
                <h2>Modifier Mes informations Personnelles</h2>
              </div>
              <div class="modal1-body">
                <form action="profilClient.php?code_client=<?php echo $recupclient->code_client; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="inputNom">Nom : <span class="error">* <?php echo $NomErr;?></span></label>
                      <input type="text" class="form-control col-md-2" id="inputNom" name="nom" placeholder="Nom" value="<?php echo nl2br(stripslashes($recupclient->nom_client)); ?>"/>
                      
                    </div>
                    <div class="form-group">
                      <label for="inputPrenom">Prenom :<span class="error">* <?php echo $PrenomErr;?></span> </label>
                      <input type="text" class="form-control col-md-2" id="inputPrenom" name="prenom" placeholder="Prenom" value="<?php echo nl2br(stripslashes($recupclient->prenom_client)); ?>"/>
                      
                    </div>
                    <div class="form-group">
                      <label for="inputContact1">Contact 1 :<span class="error">* <?php echo $Contact1Err;?></span> </label>
                      <input type="text" class="form-control col-md-2" id="inputContact1" name="contact1" placeholder="Contact 1" value="<?php echo nl2br(stripslashes($recupclient->contact_1)); ?>"/>
                      
                    </div>
                    <div class="form-group">
                      <label for="inputContact2">Contact 2 :</span></label>
                      <input type="text" class="form-control col-md-2" id="inputContact2" name="contact2" placeholder="Contact 2" value="<?php echo nl2br(stripslashes($recupclient->contact_2)); ?>"/>
                      
                    </div>
                    <div class="form-group">
                      <label for="inputAdressPostal">Adresse Postale : </label>
                      <input type="text" class="form-control col-md-2" id="inputAdressPostal" name="adresse_postal" placeholder="Adresse" value="<?php echo nl2br(stripslashes($recupclient->adress_postal)); ?>"/>
                    
                    </div>
                    <div class="form-group">
                      <label for="inputLogin">Login : <span class="error">* <?php echo $loginErr;?></span></label>
                      <input type="text" class="form-control col-md-2" id="inputLogin" name="login" placeholder="Login" value="<?php echo nl2br(stripslashes($recupclient->login)); ?>"/>
                      
                    </div>
                    <div class="form-group">
                      <label for="inputPasswordAnc">Ancien Password : <span class="error">* <?php echo $ancpasswordErr;?></span></label>
                      <input type="password" class="form-control col-md-2" id="inputPasswordAnc" name="ancpassword" placeholder="password" value="<?php //echo nl2br(stripslashes($recupclient->password)); ?>"/>
                     
                    </div>
                    <div class="form-group">
                      <label for="inputPasswordNvx">Nouveaux Password : <span class="error">* <?php echo $nvxpasswordErr;?></span></label>
                      <input type="password" class="form-control col-md-2" id="inputPasswordNvx" name="nvxpassword" placeholder="password" value=""/>
                     
                    </div>
                    <div class="form-group">
                      <label for="inputPasswordConf">Confirmer Password : <span class="error">* <?php echo $confpasswordErr;?></span></label>
                      <input type="password" class="form-control col-md-2" id="inputPasswordConf" name="confpassword" placeholder="password" value=""/>
                      
                    </div>       
                    <div class="form-group">
                      <label for="inputEmail">Email : <span class="error"><?php echo $emailErr; ?></span></label>
                      <input type="email" class="form-control col-md-2" id="inputEmail" name="email" placeholder="Email@gmail" value="<?php echo nl2br(stripslashes($recupclient->email)); ?>"/>
                      
                    </div>
                    <div class="form-group">
                      <label for="inputImage">Image User : </label>
                      <img src="../common/images/client-map/<?php echo $recupclient->image_client;?>.jpg" width="90" heigth="90" />
                    </div> 
                    <input type="file" id="inputImage" name="image_client"/>               
                    <div class="form-group">
                      <br>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="Mise à jour">
                    </div>
                </form>
                

              </div>
              <div class="modal1-footer">
                <h3></h3>
              </div>
            </div>
        </div>  
   <?php } ?>
    <?php if (isset($modal)) { ?>
          <div id="<?php echo $modal; ?>"></div>
        <?php } ?>

  <!-- End page content -->
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>
