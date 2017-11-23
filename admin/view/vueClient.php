<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
	<body>
				<?php 
					if ($pageClient == 'compte.php') {

						include("view/template/vueMenu.php");
				?>
				<?php }

					else{
						include("view/template/vueMenuUserSimple.php"); 
						
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
						
					}

				?>	
				<?php //include "view/template/vueSidebar.php";  ?>

				<?php if(!empty($clients)) {?>
					<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">
						<?php foreach ($clients as $client) : ?>
						<div class="todo">
							<span class="delete" id="<?php echo $client->code_client;?>">
								<a onclick="return confirm('Etes vous Sure ..?');" href="client.php?code=<?php echo $client->code_client;?>&nbrepage=<?php if (isset($nbrepage)) { echo($nbrepage);
								
							}else{ echo(0);} ?>">
									<img src="common/img/supprimer.gif" alt="supprimer" />
								</a>
							</span>
							
							<span class="update" id="<?php echo $client->code_client;?>">
								<a class="myBtn" href="client.php?code_client=<?php echo $client->code_client;?>">
									<img src="common/img/modifier.gif" alt="supprimer" />
								</a>
							</span>
							
							<h4 class="titre"><?php echo strtoupper(nl2br(stripslashes($client->nom_client)));echo " "; echo strtoupper(nl2br(stripslashes($client->prenom_client)));?></h4>
							<p class="description" id="<?php echo $client->code_client;?>">
								<!--<img src="../common/images/marker-map/<?php //echo $category->icone_icon;?>.png" />-->
								<img src="../common/images/client-map/<?php echo $client->image_client;?>.jpg" width="90" heigth="90" /><br><br>
								<strong>Contact 1</strong> : <?php echo nl2br(stripslashes($client->contact_1));?><br>
								<strong>Contact 2</strong> : <?php echo nl2br(stripslashes($client->contact_2));?><br>
								<strong>Adresse Postale</strong>  : <?php echo nl2br(stripslashes($client->adress_postal));?><br>
								<strong>Email</strong>  : <?php echo nl2br(stripslashes($client->email));?><br>
								<strong>Login</strong> : <?php echo nl2br(stripslashes($client->login));?><br>
								<strong>Password</strong> : <?php echo nl2br(stripslashes($client->password));?><br>
								<!-- <strong>Longitude</strong> : <?php echo nl2br(stripslashes($client->longitude));?><br>
								<strong>Latitude</strong> : <?php echo nl2br(stripslashes($client->latitude));?><br> -->
								<strong>Code Formule</strong> : <?php echo nl2br(stripslashes($client->code_formule));?><br>
								<strong>Date creation</strong> : <?php $date_creation=strtotime($client->date_creation_client);
											echo date('d/m/Y',$date_creation);?><br>
							</p>  
						</div>
						<?php endforeach; ?>
						<div>
						<ul class="pagination">
							<?php for ($i=0; $i<$nbrePages ; $i++) { ?>
								<li class="<?php echo (($i==$nbrepage)?'active':'');?>">
									<a href="typeStructure.php?nbrepage=<?php echo $i; ?>"><?php echo $i; ?></a>
								</li>
							<?php }?>
						</ul>
					</div>	
					</div>
					
					<div class="col-md-3 col-sm-3 ajoutMarkers">
						<h4 id="ajout">
							<button type="button" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-plus">Ajouter un Client</span>
							</button>
						</h4>
						
						<form role="form" id="form" action="client.php" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="inputNomClient">Nom Client : <span class="error">* <?php echo $nom_clientErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputNomClient" name="nom_client" placeholder="Nom client" maxlength="70"/>
								
							</div>
							<div class="form-group">
								<label for="inputPrenom">Prenom Client : <span class="error">* <?php echo $prenom_clientErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputPrenom" name="prenom_client" placeholder="Prenom client" maxlength="100"/>
								
							</div>
							<div class="form-group">
								<label for="inputContact1">Contact 1 : <span class="error">* <?php echo $contact_1Err;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputContact1" name="contact_1" placeholder="Contact 1" maxlength="11"/>
								
							</div>
							<div class="form-group">
								<label for="inputContact2">Contact 2 : </label>
								<input type="text" class="form-control col-md-2" id="inputContact2" name="contact_2" placeholder="Contact 2" maxlength="11"/>
							</div>
							<div class="form-group">
								<label for="inputEmail">Email : <span class="error">* <?php echo $emailErr;?></span></label>
								<input type="email" class="form-control col-md-2" id="inputEmail" name="email" placeholder="Email@gmail" maxlength="70"/>
								
							</div>

							<div class="form-group">
								<label for="inputAdressPostal">Adresse Postale : </label>
								<input type="text" class="form-control col-md-2" id="inputAdressPostal" name="adress_postal" placeholder="Adresse postale"/>
								
							</div>
							<div class="form-group">
								<label for="inputFormule">Code Formule :<span class="error">* <?php echo $code_formuleErr;?></span></label>
								
								<select class="form-control" name="code_formule">
									<?php foreach ($formules as $formule) : ?>
									  <option value="<?php echo $formule->code_formule ?>"><?php echo $formule->nom_formule ?></option>
									<?php endforeach; ?>					 
								</select>
							</div>
							

							<div class="form-group">
								<label for="inputLogin">Login : <span class="error">* <?php echo $loginErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputLogin" name="login" placeholder="login" maxlength="30" />
								
							</div>
							<div class="form-group">
								<label for="inputPassword">Password : <span class="error">* <?php echo $passwordErr;?></span></label>
								<input type="password" class="form-control col-md-2" id="inputPassword" name="password" placeholder="Password" maxlength="50" />
								
							</div>
							<!-- <div class="form-group">
								<label for="inputLongitude">Longitude : <span class="error">* <?php echo $longitudeErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputLongitude" name="longitude" placeholder="Longitude"/>
								
							</div>
							<div class="form-group">
								<label for="inputLatitude">Latitude : <span class="error">* <?php echo $latitudeErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputlatitude" name="latitude" placeholder="latitude"/>
								
							</div> -->
							<div class="form-group">
								<label for="inputImage">Image client  : </label>
								
								<input type="file"  id="inputImage" name="image_client" />
							</div>
							<!-- <div class="form-group">
								<label for="inputPage">Page : </label>
								<span class="error">* <?php //echo $pageErr;?></span><br><br>
								<select class="form-control" name="page">
								  <option value="compteClient.php">Compte Client</option>
								  <option  value="compteUser.php">Compte User</option>
								  <option value="compte.php">Compte Administrateur</option>
								</select>
							</div> -->
							<div class="form-group"><br></div>
							<div class="form-group">
								<input type="submit" value="Ajouter" />
							</div>
						</form>
					</div>

				<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">
				<!-- The Modal -->
				<div id="myModal" class="modal1">
					
				  <!-- Modal content -->
				  <div class="modal1-content">
				    <div class="modal1-header">
				      <span class="close">&times;</span>
				      <h2>Modifier le Client</h2>
				    </div>
				    <div class="modal1-body">
					    <form action="client.php?code_client=<?php echo $info->code_client; ?>" method="post" enctype="multipart/form-data">
							<div><br></div>
							
							<div class="form-group">
								<label for="inputNomClient">Nom client : <span class="error">* <?php echo $nom_clientErr;?></span></label>
								<input type="hidden" class="form-control col-md-2" id="inputNomClient" name="nom_client" placeholder="Nom Client" value="<?php echo nl2br(stripslashes($info->nom_client)); ?>" maxlength="30"/>
								
							</div>
							<div class="form-group">
								<label for="inputPrenomClient">Prenom client : <span class="error">* <?php echo $prenom_clientErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputPrenomClient" name="prenom_client" placeholder="Prenom Client" value="<?php echo nl2br(stripslashes($info->prenom_client)); ?>" maxlength="100"/>
								
							</div>
							<div class="form-group">
								<label for="inputAdressPostal">Adresse client : </label>
								<input type="text" class="form-control col-md-2" id="inputAdressPostal" name="adress_postal" placeholder="Adresse Client" value="<?php echo nl2br(stripslashes($info->adress_postal)); ?>"/>
								<span class="text-danger"><?php   ?></span>
							</div>
							<div class="form-group">
								<label for="inputEmail">Email : <span class="error">* <?php echo $emailErr;?></span></label>
								<input type="email" class="form-control col-md-2" id="inputEmail" name="email" placeholder="Email@gmail" value="<?php echo nl2br(stripslashes($info->email)); ?>" maxlength="70"/>
								
							</div>
							<div class="form-group">
								<label for="inputContact1">Contact 1 : <span class="error">* <?php echo $contact_1Err;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputContact1" name="contact_1" placeholder="Contact 1" value="<?php echo nl2br(stripslashes($info->contact_1)); ?>"maxlength="11" />
								
							</div>
							<div class="form-group">
								<label for="inputContact2">Contact 2 : </label>
								<input type="text" class="form-control col-md-2" id="inputContact2" name="contact_2" placeholder="Contact 2" value="<?php echo nl2br(stripslashes($info->contact_2)); ?>" maxlength="11"/>
								<span class="text-danger"><?php  ?></span>
							</div>
							<!-- <div class="form-group">
								<label for="inputLongitude">Longitude : <span class="error">* <?php echo $longitudeErr;?></span><br><br></label>
								<input type="text" class="form-control col-md-2" id="inputLongitude" name="longitude" placeholder="longitude" value="<?php echo nl2br(stripslashes($info->longitude)); ?>"/>
								
							</div>
							<div class="form-group">
								<label for="inputLatitude">Latitude : <span class="error">* <?php echo $latitudeErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputLatitude" name="latitude" placeholder="longitude" value="<?php echo nl2br(stripslashes($info->longitude)); ?>"/>
								
							</div> -->
							<div class="form-group">
								<label for="inputLogin">Login : <span class="error">* <?php echo $loginErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputLogin" name="login" placeholder="Login" value="<?php echo nl2br(stripslashes($info->login)); ?>" maxlength="30"/>
								
							</div>
							<div class="form-group">
								<label for="inputPasswordAnc">Ancien Password : <span class="error">* <?php echo $ancpasswordErr;?></span></label>
								<input type="password" class="form-control col-md-2" id="inputPasswordAnc" name="ancpassword" placeholder="password" value="<?php //echo nl2br(stripslashes($info->password)); ?>" maxlength="50"/>
								
							</div>
							
							<div class="form-group">
								<label for="inputPasswordNvx">Nouveaux Password : <span class="error">* <?php echo $nvxpasswordErr;?></span></label>
								<input type="password" class="form-control col-md-2" id="inputPasswordNvx" name="nvxpassword" placeholder="password" value="" maxlength="50"/>
								
							</div>

							<div class="form-group">
								<label for="inputPasswordConf">Confirmer Password : </label>
								<input type="password" class="form-control col-md-2" id="inputPasswordConf" name="confpassword" placeholder="password" value="" maxlength="50"/>
								<span class="error">* <?php echo $confpasswordErr;?></span><br><br>
							</div>
							
							<div class="form-group">
								<label for="inputFormule">Code formule : <span class="error">* <?php echo $code_formuleErr;?></span></label>
								<select class="form-control" name="code_formule">
									<?php foreach($formules as $formule): ?>
								  		<option <?php if($formule->code_formule == $info->code_formule) : ?>selected<?php endif; ?> value="<?php echo $formule->code_formule ?>"><?php echo $formule->nom_formule ?></option>
									<?php endforeach; ?>					 
								</select>
							</div>
							<div class="form-group">
								<label for="inputImage">Image Client :</label>
								
								<img src="../common/images/client-map/<?php echo $info->image_client;?>.jpg" width="90" heigth="90" />
								<input type="file" id="inputImage" name="image_client"/>
							</div> 
							<div class="form-group">
								<br>
							</div>
							<div class="form-group">
								<button type="submit">Mise à jour</button>
								<button type="rest">Annuler</button>
							</div>
						</form>
				    </div>
				    <div class="modal1-footer">
				      
				    </div>
				  </div>

				</div>
				</div>
				<?php }
					else{ 
				?>
					<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">
						<a href="client.php" class="container center">Afficher la liste des Clients</a>
						<br><br><br>
						<p class="text-danger">Veillez saisir les champs du formulaire correctement</p>
					</div>
					<div class="col-md-3 col-sm-3 ajoutMarkers">
						<h4 id="ajout">
							<button type="button" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-plus">Ajouter un Client</span>
							</button>
						</h4>
						
						<form role="form" id="form" action="client.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="inputNomClient">Nom Client : <span class="error">* <?php echo $nom_clientErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputNomClient" name="nom_client" placeholder="Nom client"/>
								
							</div>
							<div class="form-group">
								<label for="inputPrenom">Prenom Client : <span class="error">* <?php echo $prenom_clientErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputPrenom" name="prenom_client" placeholder="Prenom client"/>
								
							</div>
							<div class="form-group">
								<label for="inputContact1">Contact 1 : <span class="error">* <?php echo $contact_1Err;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputContact1" name="contact_1" placeholder="Contact 1"/>
								
							</div>
							<div class="form-group">
								<label for="inputContact2">Contact 2 : </label>
								<input type="text" class="form-control col-md-2" id="inputContact2" name="contact_2" placeholder="Contact 2"/>
							</div>
							
							<div class="form-group">
								<label for="inputFormule">Code Formule : <span class="error">* <?php echo $code_formuleErr;?></span></label>
								
								<select class="form-control" name="code_formule">
									<?php foreach ($formules as $formule) : ?>
									  <option value="<?php echo $formule->code_formule ?>"><?php echo $formule->nom_formule ?></option>
									<?php endforeach; ?>					 
								</select>
							</div>
							<div class="form-group">
								<label for="inputEmail">Email : <span class="error">* <?php echo $emailErr;?></span></label>
								<input type="email" class="form-control col-md-2" id="inputEmail" name="email" placeholder="Email@gmail"/>
								
							</div>

							<div class="form-group">
								<label for="inputAdressPostal">Adresse Postale : </label>
								<input type="text" class="form-control col-md-2" id="inputAdressPostal" name="adress_postal" placeholder="Adresse postale"/>
								
							</div>

							<div class="form-group">
								<label for="inputLogin">Login : <span class="error">* <?php echo $loginErr; ?></span></label>
								<input type="text" class="form-control col-md-2" id="inputLogin" name="login" placeholder="login"/>
								
							</div>
							<div class="form-group">
								<label for="inputPassword">Password : <span class="error">* <?php echo $passwordErr;?></span></label>
								<input type="password" class="form-control col-md-2" id="inputPassword" name="password" placeholder="Password"/>
								
							</div>
							<!-- <div class="form-group">
								<label for="inputLongitude">Longitude : <span class="error">* <?php echo $longitudeErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputLongitude" name="longitude" placeholder="Longitude"/>
								
							</div>
							<div class="form-group">
								<label for="inputLatitude">Latitude : <span class="error">* <?php echo $latitudeErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputlatitude" name="latitude" placeholder="latitude"/>
								
							</div> -->
							<div class="form-group">
								<label for="inputImage">Image client  :</label>
								
								<input type="file"  id="inputImage" name="image_client" />
							</div>
							<!-- <div class="form-group">
								<label for="inputPage">Page : </label>
								<span class="error">* <?php //echo $pageErr;?></span><br><br>
								<select class="form-control" name="page">
								  <option value="compteClient.php">Compte Client</option>
								  <option value="compte.php">Compte Administrateur</option>
								</select>
							</div> -->
							<div class="form-group"><br></div>
							<div class="form-group">
								<input type="submit" value="Ajouter" />
							</div>
						</form>
					</div>
				<?php } ?>
				<?php if (isset($modal)) { ?>
					<div id="<?php echo $modal; ?>"></div>
				<?php } ?>
			</div>
	    <?php require('template/vueFooter.php'); ?>
	    </div>
	    <script>
			// Get the modal
			var modal = document.getElementById('myModal');

			// Get the button that opens the modal
			var btn = document.querySelectorAll(".myBtn");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks the button, open the modal 
			/*for (var i = 0; i < btn.length; i++) {
				btn[i].onclick = function() {
			   		modal.style.display = "none";
				}
			}*/
			

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

			var test = document.getElementById('modalok');
			if (test) {
				modal.style.display = "block";
			}
		</script>
	</body>
</html>
