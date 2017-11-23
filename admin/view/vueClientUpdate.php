<!DOCTYPE html>
<html>
	<?php require('template/vueHeader.php'); ?>

	<body>
		<div class="container-fluid">
			
			<div class="row">
				
				<div class="col-md-6 col-md-offset-3">
					
				<form action="clientUpdate.php?code_client=<?php echo $info->code_client; ?>" method="post" enctype="multipart/form-data">
						<div class="panel-heading"><strong>Modification du Client</strong></div>
						<div><br></div>
						
						<div class="form-group">
							<label for="inputNomClient">Nom client : </label>
							<input type="text" class="form-control col-md-2" id="inputNomClient" name="nom_client" placeholder="Nom Client" value="<?php echo nl2br(stripslashes($info->nom_client)); ?>" maxlength="30"/>
							<span class="error">* <?php echo $nom_clientErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputPrenomClient">Prenom client : </label>
							<input type="text" class="form-control col-md-2" id="inputPrenomClient" name="prenom_client" placeholder="Prenom Client" value="<?php echo nl2br(stripslashes($info->prenom_client)); ?>" maxlength="100"/>
							<span class="error">* <?php echo $prenom_clientErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputAdressPostal">Adresse client : </label>
							<input type="text" class="form-control col-md-2" id="inputAdressPostal" name="adress_postal" placeholder="Adresse Client" value="<?php echo nl2br(stripslashes($info->adress_postal)); ?>"/>
							<span class="text-danger"><?php   ?></span>
						</div>
						<div class="form-group">
							<label for="inputEmail">Email : </label>
							<input type="email" class="form-control col-md-2" id="inputEmail" name="email" placeholder="Email@gmail" value="<?php echo nl2br(stripslashes($info->email)); ?>" maxlength="70"/>
							<span class="error">* <?php echo $emailErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputContact1">Contact 1 : </label>
							<input type="text" class="form-control col-md-2" id="inputContact1" name="contact_1" placeholder="Contact 1" value="<?php echo nl2br(stripslashes($info->contact_1)); ?>"maxlength="11" />
							<span class="error">* <?php echo $contact_1Err;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputContact2">Contact 2 : </label>
							<input type="text" class="form-control col-md-2" id="inputContact2" name="contact_2" placeholder="Contact 2" value="<?php echo nl2br(stripslashes($info->contact_2)); ?>" maxlength="11"/>
							<span class="text-danger"><?php  ?></span>
						</div>
						<div class="form-group">
							<label for="inputLongitude">Longitude : </label>
							<input type="text" class="form-control col-md-2" id="inputLongitude" name="longitude" placeholder="longitude" value="<?php echo nl2br(stripslashes($info->longitude)); ?>"/>
							<span class="error">* <?php echo $longitudeErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputLatitude">Latitude : </label>
							<input type="text" class="form-control col-md-2" id="inputLatitude" name="latitude" placeholder="longitude" value="<?php echo nl2br(stripslashes($info->longitude)); ?>"/>
							<span class="error">* <?php echo $latitudeErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputLogin">Login : </label>
							<input type="text" class="form-control col-md-2" id="inputLogin" name="login" placeholder="Login" value="<?php echo nl2br(stripslashes($info->login)); ?>" maxlength="30"/>
							<span class="error">* <?php echo $loginErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputPasswordAnc">Ancien Password : </label>
							<input type="password" class="form-control col-md-2" id="inputPasswordAnc" name="ancpassword" placeholder="password" value="<?php //echo nl2br(stripslashes($info->password)); ?>" maxlength="50"/>
							<span class="error">* <?php echo $ancpasswordErr;?></span><br><br>
						</div>
						
						<div class="form-group">
							<label for="inputPasswordNvx">Nouveaux Password : </label>
							<input type="password" class="form-control col-md-2" id="inputPasswordNvx" name="nvxpassword" placeholder="password" value="" maxlength="50"/>
							<span class="error">* <?php echo $nvxpasswordErr;?></span><br><br>
						</div>

						<div class="form-group">
							<label for="inputPasswordConf">Confirmer Password : </label>
							<input type="password" class="form-control col-md-2" id="inputPasswordConf" name="confpassword" placeholder="password" value="" maxlength="50"/>
							<span class="error">* <?php echo $confpasswordErr;?></span><br><br>
						</div>
						
						<div class="form-group">
							<label for="inputFormule">Code formule : </label>
							<span class="error">* <?php echo $code_formuleErr;?></span><br><br>
							<select class="form-control" name="code_formule">
								<?php foreach($formules as $formule): ?>
							  		<option <?php if($formule->code_formule == $info->code_formule) : ?>selected<?php endif; ?> value="<?php echo $formule->code_formule ?>"><?php echo $formule->nom_formule ?></option>
								<?php endforeach; ?>					 
							</select>
						</div>
						<div class="form-group">
							<label for="inputImage">Image Client : </label>
							<span class="error">* <?php echo $image_clientErr;?></span><br>
							<img src="../common/images/client-map/<?php echo $info->image_client;?>.jpg" width="90" heigth="90" />
							<input type="file" id="inputImage" name="image_client"/>
						</div>
						<!-- <div class="form-group">
							<label for="inputPage">Page : </label>
							<select class="form-control" name="page">
							  <option <?php //if("compteClient.php" == $info->page) : ?>selected<?php //endif; ?> value="compteClient.php">Compte Client</option>
							  <option <?php //if("compteUser.php" == $info->page) : ?>selected<?php //endif; ?> value="compteUser.php">Compte User</option>
							  <option <?php //if("compte.php" == $info->page) : ?>selected<?php //endif; ?> value="compte.php">Compte Administrateur</option>
							</select>
							<span class="error"><?php echo $pageErr; ?></span>
						</div> -->
						
					<div class="form-group">
						<br>
					</div>
					<div class="form-group">
						<button type="submit">Mise à jour</button>
						<button type="rest">Annuler</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</body>
</html>