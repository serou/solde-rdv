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
                    include("view/template/vueMenuUserSimple.php"); 
                    
                  }

                ?>  

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
    <h5>Dashboard-</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="dashboardUserSimple.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    
    <a href="compte.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-database fa-fw"></i>  Gestions des Tables</a>
    <a href="profilUserSimple.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Gestion du Profil</a>
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
  <!--affichage et permettre la modification-->
  <?php if(!empty($recupUsers)) {?>
        <div class="col-md-7 col-sm-7 col-sm-offset-2 markers">

          <?php //foreach ($recupUsers as $recupUser) : ?>
          <h2 style="text-align:center">Profil Utilisateur</h2>

          <div class="card">
            <img src="../common/images/user-map/<?php echo $recupUsers->image_user;?>.jpg"  style="width:100%">
            <h1><strong>Login </strong> :<?php echo $recupUsers->login; ?></h1>
            <strong>Password </strong> :<?php echo $recupUsers->password; ?>
            <p><strong>Rôle user</strong>: <?php echo $recupUsers->lib_role; ?></p>
            <p><strong>Mail</strong>:<?php echo $recupUsers->email; ?></p>
            <div style="margin: 24px 0;">
              <!-- <a href="#"><i class="fa fa-dribbble"></i></a> 
              <a href="#"><i class="fa fa-twitter"></i></a>  
              <a href="#"><i class="fa fa-linkedin"></i></a>  
              <a href="#"><i class="fa fa-facebook"></i></a>  -->
           </div>
           <p><button class="btn btn-primary" id="myBtn">Modifier Mes informations</button></p>
          </div>
          <?php //endforeach; ?>
        </div>
         
          <!-- Trigger/Open The Modal -->
            <!-- Modal -->
            <div id="myModal" class="modal1">
              
              
                <!-- Modal content-->
                
                  <div class="modal1-content">
                    <div class="modal1-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 >Modification des informations Personnelles</h4>
                  </div>
                  <div class="modal1-body">
                    <form action="profil.php?user_id=<?php echo $recupUsers->user_id; ?>" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="inputLogin">Login : </label>
                        <input type="text" class="form-control col-md-2" id="inputLogin" name="login" placeholder="Login" value="<?php echo nl2br(stripslashes($recupUsers->login)); ?>"/>
                        <span class="error">* <?php echo $loginErr;?></span><br><br>
                      </div>
                      <div class="form-group">
                        <label for="inputPasswordAnc">Ancien Password : </label>
                        <input type="password" class="form-control col-md-2" id="inputPasswordAnc" name="ancpassword" placeholder="password" value="<?php //echo nl2br(stripslashes($recupUsers->password)); ?>"/>
                        <span class="error">* <?php echo $ancpasswordErr;?></span><br><br>
                      </div>
                      <div class="form-group">
                        <label for="inputPasswordNvx">Nouveaux Password : </label>
                        <input type="password" class="form-control col-md-2" id="inputPasswordNvx" name="nvxpassword" placeholder="password" value=""/>
                        <span class="error">* <?php echo $nvxpasswordErr;?></span><br><br>
                      </div>
                      <div class="form-group">
                        <label for="inputPasswordConf">Confirmer Password : </label>
                        <input type="password" class="form-control col-md-2" id="inputPasswordConf" name="confpassword" placeholder="password" value=""/>
                        <span class="error">* <?php echo $confpasswordErr;?></span><br><br>
                      </div>       
                      <div class="form-group">
                        <label for="inputEmail">Email : </label>
                        <input type="email" class="form-control col-md-2" id="inputEmail" name="email" placeholder="Email@gmail" value="<?php echo nl2br(stripslashes($recupUsers->email)); ?>"/>
                        <span class="error"><?php echo $emailErr; ?></span>
                      </div>
                      <div class="form-group">
                        <label for="inputImage">Image User : </label>
                        <span class="error">* <?php echo $image_userErr;?></span><br>
                        <img src="../common/images/user-map/<?php echo $recupUsers->image_user;?>.jpg" width="90" heigth="90" />
                      </div>    <input type="file" id="inputImage" name="image_user"/>               
                      <div class="form-group">
                        <br>
                      </div>
                      <div class="form-group container">
                        <input type="submit" name="Mise à jour">
                      </div>
                    </form>
                  <div class="modal1-footer">
                    <div></div>
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
