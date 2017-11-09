<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
	<body>

		<?php include("view/template/vueMenu.php"); // inclusion du menu principal ?>

		<div class="container-fluid">
			<div class="row">
				
				<?php include "view/template/vueSidebar.php";  ?>

				<?php if(!empty($clients)) {?>
				<div class="col-md-7 col-sm-7 col-sm-offset-2 markers">
					<?php foreach ($clients as $client) : ?>
					<div class="todo">
						<span class="delete" id="<?php echo $client->code_client;?>">
							<a onclick="return confirm('Etes vous Sure ..?');" href="client.php?code_client=<?php echo $client->code_client;?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $client->code_client;?>">
							<a href="clientUpdate.php?code_client=<?php echo $client->code_client;?>">
								<img src="common/img/modifier.gif" alt="supprimer" />
							</a>
						</span>
						
						<h4 class="titre"><?php echo nl2br(stripslashes($client->nom_client));echo " "; echo nl2br(stripslashes($client->prenom_client));?></h4>
						<p class="description" id="<?php echo $client->code_client;?>">
							<!--<img src="../common/images/marker-map/<?php //echo $category->icone_icon;?>.png" />-->
							<strong>Contact 1</strong> : <?php echo nl2br(stripslashes($client->contact_1));?><br>
							<strong>Contact 2</strong> : <?php echo nl2br(stripslashes($client->contact_2));?><br>
							<strong>Adresse Postale</strong>  : <?php echo nl2br(stripslashes($client->adress_postal));?><br>
							<strong>Email</strong>  : <?php echo nl2br(stripslashes($client->email));?><br>
							<strong>Login</strong> : <?php echo nl2br(stripslashes($client->login));?><br>
							<strong>Password</strong> : <?php echo nl2br(stripslashes($client->password));?><br>
							<strong>Longitude</strong> : <?php echo nl2br(stripslashes($client->longitude));?><br>
							<strong>Latitude</strong> : <?php echo nl2br(stripslashes($client->latitude));?><br>
							<strong>Code Formule</strong> : <?php echo nl2br(stripslashes($client->code_formule));?><br>
							<strong>Page</strong> : <?php echo nl2br(stripslashes($client->page));?><br>
							<strong>Date creation</strong> : <?php $date_creation=strtotime($client->date_creation);
										echo date('d/m/Y',$date_creation);?><br>
						</p>  
					</div>
					<?php endforeach; ?>
				</div>
				
				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter un Client</span>
						</button>
					</h4>
					
					<form role="form" id="form" action="client.php" method="post">
						<div class="form-group">
							<label for="inputNomClient">Nom Client : </label>
							<input type="text" class="form-control col-md-2" id="inputNomClient" name="nom_client" placeholder="Nom client" maxlength="70"/>
							<span class="error">* <?php echo $nom_clientErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputPrenom">Prenom Client : </label>
							<input type="text" class="form-control col-md-2" id="inputPrenom" name="prenom_client" placeholder="Prenom client" maxlength="100"/>
							<span class="error">* <?php echo $prenom_clientErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputContact1">Contact 1 : </label>
							<input type="text" class="form-control col-md-2" id="inputContact1" name="contact_1" placeholder="Contact 1" maxlength="11"/>
							<span class="error">* <?php echo $contact_1Err;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputContact2">Contact 2 : </label>
							<input type="text" class="form-control col-md-2" id="inputContact2" name="contact_2" placeholder="Contact 2" maxlength="11"/>
						</div>
						<div class="form-group">
							<label for="inputEmail">Email : </label>
							<input type="email" class="form-control col-md-2" id="inputEmail" name="email" placeholder="Email@gmail" maxlength="70"/>
							<span class="error">* <?php echo $emailErr;?></span><br><br>
						</div>

						<div class="form-group">
							<label for="inputAdressPostal">Adresse Postale : </label>
							<input type="text" class="form-control col-md-2" id="inputAdressPostal" name="adress_postal" placeholder="Adresse postale"/>
							
						</div>
						<div class="form-group">
							<label for="inputFormule">Code Formule : </label>
							<span class="error">* <?php echo $code_formuleErr;?></span><br><br>
							<select class="form-control" name="code_formule">
								<?php foreach ($formules as $formule) : ?>
								  <option value="<?php echo $formule->code_formule ?>"><?php echo $formule->nom_formule ?></option>
								<?php endforeach; ?>					 
							</select>
						</div>
						

						<div class="form-group">
							<label for="inputLogin">Login : </label>
							<input type="text" class="form-control col-md-2" id="inputLogin" name="login" placeholder="login" maxlength="30" />
							<span class="error">* <?php echo $loginErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputPassword">Password : </label>
							<input type="password" class="form-control col-md-2" id="inputPassword" name="password" placeholder="Password" maxlength="50" />
							<span class="error">* <?php echo $passwordErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputLongitude">Longitude : </label>
							<input type="text" class="form-control col-md-2" id="inputLongitude" name="longitude" placeholder="Longitude"/>
							<span class="error">* <?php echo $longitudeErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputLatitude">Latitude : </label>
							<input type="text" class="form-control col-md-2" id="inputlatitude" name="latitude" placeholder="latitude"/>
							<span class="error">* <?php echo $latitudeErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputPage">Page : </label>
							<span class="error">* <?php echo $pageErr;?></span><br><br>
							<select class="form-control" name="page">
							  <option value="compteClient.php">Compte Client</option>
							  <option  value="compteUser.php">Compte User</option>
							  <option value="compte.php">Compte Administrateur</option>
							</select>
						</div>
						<div class="form-group"><br></div>
						<div class="form-group">
							<input type="submit" value="Ajouter" />
						</div>
					</form>
				</div>
				<?php }else{ ?>
				<div class="col-md-7 col-sm-7 col-sm-offset-2 markers">
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
					
					<form role="form" id="form" action="client.php" method="post">
						<div class="form-group">
							<label for="inputNomClient">Nom Client : </label>
							<input type="text" class="form-control col-md-2" id="inputNomClient" name="nom_client" placeholder="Nom client"/>
							<span class="error">* <?php echo $nom_clientErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputPrenom">Prenom Client : </label>
							<input type="text" class="form-control col-md-2" id="inputPrenom" name="prenom_client" placeholder="Prenom client"/>
							<span class="error">* <?php echo $prenom_clientErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputContact1">Contact 1 : </label>
							<input type="text" class="form-control col-md-2" id="inputContact1" name="contact_1" placeholder="Contact 1"/>
							<span class="error">* <?php echo $contact_1Err;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputContact2">Contact 2 : </label>
							<input type="text" class="form-control col-md-2" id="inputContact2" name="contact_2" placeholder="Contact 2"/>
						</div>
						
						<div class="form-group">
							<label for="inputFormule">Code Formule : </label>
							<span class="error">* <?php echo $code_formuleErr;?></span><br><br>
							<select class="form-control" name="code_formule">
								<?php foreach ($formules as $formule) : ?>
								  <option value="<?php echo $formule->code_formule ?>"><?php echo $formule->nom_formule ?></option>
								<?php endforeach; ?>					 
							</select>
						</div>
						<div class="form-group">
							<label for="inputEmail">Email : </label>
							<input type="email" class="form-control col-md-2" id="inputEmail" name="email" placeholder="Email@gmail"/>
							<span class="error">* <?php echo $emailErr;?></span><br><br>
						</div>

						<div class="form-group">
							<label for="inputAdressPostal">Adresse Postale : </label>
							<input type="text" class="form-control col-md-2" id="inputAdressPostal" name="adress_postal" placeholder="Adresse postale"/>
							
						</div>

						<div class="form-group">
							<label for="inputLogin">Login : </label>
							<input type="text" class="form-control col-md-2" id="inputLogin" name="login" placeholder="login"/>
							<span class="error">* <?php echo $loginErr; ?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputPassword">Password : </label>
							<input type="password" class="form-control col-md-2" id="inputPassword" name="password" placeholder="Password"/>
							<span class="error">* <?php echo $passwordErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputLongitude">Longitude : </label>
							<input type="text" class="form-control col-md-2" id="inputLongitude" name="longitude" placeholder="Longitude"/>
							<span class="error">* <?php echo $longitudeErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputLatitude">Latitude : </label>
							<input type="text" class="form-control col-md-2" id="inputlatitude" name="latitude" placeholder="latitude"/>
							<span class="error">* <?php echo $latitudeErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputPage">Page : </label>
							<span class="error">* <?php echo $pageErr;?></span><br><br>
							<select class="form-control" name="page">
							  <option value="compteClient.php">Compte Client</option>
							  <option value="compte.php">Compte Administrateur</option>
							</select>
						</div>
						<div class="form-group"><br></div>
						<div class="form-group">
							<input type="submit" value="Ajouter" />
						</div>
					</form>
				</div>
				<?php } ?>
			</div>
	    <?php require('template/vueFooter.php'); ?>
	    </div>
	</body>
</html>
