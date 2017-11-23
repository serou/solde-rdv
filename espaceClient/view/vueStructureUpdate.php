<!DOCTYPE html>
<html>
	<?php require('template/vueHeader.php'); ?>

	<body>
		<div class="container-fluid">
			
			<div class="row">
				
				<div class="col-md-6 col-md-offset-3">
					
				<form action="structureUpdate.php?code_structure=<?php echo $info->code_structure; ?>" method="post" enctype="multipart/form-data">
						<div class="panel-heading"><strong>Modification de la Structure</strong></div>
						<div><br></div>
						<div class="form-group">
							<label for="inputNom">Nom Structure : </label>
							<input type="text" class="form-control col-md-2" id="inputNom" name="nom_structure" placeholder="Nom Structure" value="<?php echo nl2br(stripslashes($info->nom_structure)); ?>"/>
							<span class="error">* <?php echo $nom_structureErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputDescription">Description :</label>
							<textarea type="text" rows="7" class="form-control" id="inputDescription" name="description" placeholder="Description"><?php echo nl2br(stripslashes($info->description));?></textarea>
						</div>
						<div class="form-group">
							<label for="inputContat">Contact Structure : </label>
							<input type="text" class="form-control col-md-2" id="inputContact" name="contact_structure" placeholder="passContactword" value="<?php echo nl2br(stripslashes($info->contact_structure)); ?>"/>
							<span class="error">* <?php echo $contact_structureErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputAdresse">Adresse Structure : </label>
							<input type="text" class="form-control col-md-2" id="inputAdress" name="adresse_structure" placeholder="Adresse Structure" value="<?php echo nl2br(stripslashes($info->adresse_structure)); ?>"/>
							<span class="error">* <?php echo $adresse_structureErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputLongitude">Longitude : </label>
							<input type="text" class="form-control col-md-2" id="inputLongitude" name="longitude" placeholder="Longitude" value="<?php echo nl2br(stripslashes($info->longitude)); ?>"/>
							<span class="error">* <?php echo $longitudeErr;?></span><br><br>
						</div>

						<div class="form-group">
							<label for="inputLatitude">Latitude : </label>
							<input type="text" class="form-control col-md-2" id="inputLatitude" name="latitude" placeholder="Latitude" value="<?php echo nl2br(stripslashes($info->latitude)); ?>"/>
							<span class="error">* <?php echo $latitudeErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputImage">Image Structure : </label>
							<span class="error">* <?php echo $image_structureErr;?></span><br>
							<img name ="img" src="../common/images/structure-map/<?php echo $info->image_structure;?>.jpg" width="90" heigth="90" />
							<input type="file" id="inputImage" name="image_structure"/>
						</div>
						<div class="form-group">
							<label for="inputClient">Propriétaire : </label>
							<span class="error">* <?php echo $code_clientErr;?></span><br>
							<select class="form-control" name="code_client">
								<?php foreach($clients as $client): ?>
							  		<option <?php if($client->code_client == $info->code_client) : ?>selected<?php endif; ?> value="<?php echo $client->code_client ?>"><?php echo $client->nom_client ?></option>
								<?php endforeach; ?>					 
							</select>
						</div>
						<div class="form-group">
							<label for="inputType">Type de Structure : </label>
							<span class="error">* <?php echo $code_type_structureErr;?></span><br>
							<select class="form-control" name="code_type_structure">
								<?php foreach($typeStructures as $type): ?>
							  		<option <?php if($type->code_type_structure == $info->code_type_structure) : ?>selected<?php endif; ?> value="<?php echo $type->code_type_structure ?>"><?php echo $type->lib_type_structure ?></option>
								<?php endforeach; ?>					 
							</select>
							
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
			</div>
		</div>
	</body>
</html>