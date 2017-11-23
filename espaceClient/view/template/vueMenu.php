<style>
/* Dropdown Button */
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="login.php">Solde au RDV</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li ><a href="dashboard.php">Dashboard</a></li>
						<li><a  href="#">Settings</a></li>
						<li><a href="#">Profile</a></li>
						<li><a href="#">Help</a></li>
						<li><a href="deconnection.php">Déconnexion</a></li>
					</ul>
					<div class="dropdown navbar-right">
						<a href="dashboard.php"><button class="dropbtn">Dashboard</button></a>
					</div>
					<div class="dropdown navbar-right">
					  <button class="dropbtn">Settings</button>
					  <div class="dropdown-content">
					    <a href="attributionRole.php">Attribuer un rôle</a>
					    <a href="#">test 2</a>
					    <a href="#">test 3</a>
					  </div>
					</div>
					<form class="navbar-form navbar-right">
						<input type="text" class="form-control" placeholder="Search...">
					</form>
					<div>
					
				</div>	
				</div>
				
			</div>
		</div>