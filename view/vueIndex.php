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
		  
		</nav>
		
		 <div id="masquerAfficherMenu" class="w3-animate-left" style="position:absolute;left:360px;top:300px;visibility:visible;cursor:pointer;z-index:5;"><img src="common/images/masquer_menu.png"/></div>
		
		<!-- Info bulle au click sur un marker -->
		<div id="bigInfoBulle" class="w3-content w3-margin-top" style="max-width:1000px;display:none;">

		  <!-- The Grid -->
		  <div class="w3-row-padding-3">
		  
			<!-- Left Column -->
			<div class="w3-third" style="position:relative;left:170px;z-index:3;">
			  <a href="#"><div id="closeInfoBulle" style="position:absolute;padding:0;margin:0;top:0;right:0;z-index:4;color:red;">x</div></a>
	
			  <div class="w3-white w3-text-grey w3-card-4">
				<div class="w3-display-container">
				  <img src="serou.jpg" style="width:100%" alt="Avatar">
				  <div class="w3-display-bottomleft w3-container w3-text-black">
					<h2>Jane Doe</h2>
				  </div>
				</div>
				<div class="w3-container">
				  <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Designer</p>
				  <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>London, UK</p>
				  <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>ex@mail.com</p>
				  <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>1224435534</p>

				</div>
			  </div>

			<!-- End Left Column -->
			</div>
	
		  <!-- End Grid -->
		  </div>
		  
		  <!-- End Info bulle -->
		</div>
			
		<script>	
			var marker = <?php echo $allProdJson; ?> // stockage du resultat de la requête
		</script>
	
		<?php include_once("template/vueFooter.php"); ?>
	</body>
</html>
