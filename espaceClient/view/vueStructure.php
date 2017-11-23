<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
	<body>
				<?php 
					if ($pageClient == 'compte.php') {

						include("view/template/vueMenu.php");
				?>
				<?php }

					else{
						include("view/template/vueMenuClient.php"); 
						
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
						include "view/template/vueSidebarClient.php"; 
						
					}

				?>	
				<?php //include "view/template/vueSidebar.php";  ?>

				<?php if(!empty($structures)) {?>

				<div class="col-md-7 col-sm-7 col-sm-offset-2 markers">
					<?php foreach ($structures as $structure) : ?>
					<div class="todo">
						<span class="delete" id="<?php echo $structure->code_structure;?>">
							<a onclick="return confirm('Etes vous Sure ..?');" href="structure.php?code_structure=<?php echo $structure->code_structure;?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $structure->code_structure;?>">
							<a href="structureUpdate.php?code_structure=<?php echo $structure->code_structure;?>">
								<img src="common/img/modifier.gif" alt="supprimer" />
							</a>
						</span>
						
						<h4 class="titre"><?php echo nl2br(stripslashes($structure->nom_structure));?></h4>
						<p class="description" id="<?php echo $structure->code_structure;?>">
							<img src="../common/images/structure-map/<?php echo $structure->image_structure;?>.jpg" width="90" heigth="90" /><br>
							<strong>Description</strong>  : <?php echo nl2br(stripslashes($structure->description));?><br>
							<strong>Longitude</strong> : <?php echo nl2br(stripslashes($structure->longitude));?><br>
							<strong>Latitude</strong> : <?php echo nl2br(stripslashes($structure->latitude));?><br>
							<strong>Adresse structure</strong>  : <?php echo nl2br(stripslashes($structure->adresse_structure));?><br>
							<strong>Contact Structure</strong> : <?php echo nl2br(stripslashes($structure->contact_structure));?><br>
							<strong>Code Type Structure</strong> : <?php echo nl2br(stripslashes($structure->code_type_structure));?><br>
							<strong>Date de Creation Structure</strong> : <?php $date_creation=strtotime($structure->date_creation);
										echo date('d/m/Y',$date_creation);?><br>
							
						</p>  
					</div>
					<?php endforeach; ?>
				</div>
				
				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter une Structure</span>
						</button>
					</h4>
					
					<form role="form" id="form" action="structure.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputNomStructure">Nom structure : </label>
							<input type="text" class="form-control col-md-2" id="inputNomStructure" name="nom_structure" placeholder="Nom Structure"/>
							<span class="error">* <?php echo $nom_structureErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputDescription">Description</label>
							<textarea type="text" rows="7" class="form-control" id="inputDescription" name="description" placeholder="Description"></textarea>
						</div>

						<div class="form-group">
							<label for="inputContact">Contact Structure : </label>
							<input type="text" class="form-control col-md-2" id="inputContact" name="contact_structure" placeholder="Contact"/>
							<span class="error">* <?php echo $contact_structureErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputAdresse">Adresse Structure : </label>
							<input type="text" class="form-control col-md-2" id="inputAdresse" name="adresse_structure" placeholder="Adresse Structure"/>
							<span class="error">* <?php echo $adresse_structureErr;?></span><br><br>
						</div>
												
						<div class="form-group">
							<label for="inputImage">Image Structure  : </label>
							<input type="file" class="form-control" id="inputImage" name="image_structure" />
							<span class="error">* <?php echo $image_structureErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputLongitude">Longitude : </label>
							<input type="text" class="form-control col-md-2" id="inputLongitude" name="longitude" placeholder="Longitude"/>
							<span class="error">* <?php echo $longitudeErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputLatitude">Latitude : </label>
							<input type="text" class="form-control col-md-2" id="inputLatitude" name="latitude" placeholder="Latitude"/>
							<span class="error">* <?php echo $latitudeErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputType">Propietaires : </label>
							<span class="error">* <?php echo $code_clientErr;?></span><br>
							<select class="form-control" name="code_client">
								<?php foreach ($clients as $client) : ?>
								  <option value="<?php echo $client->code_client ?>"><?php echo $client->nom_client ?></option>
								<?php endforeach; ?>					 
							</select>
						</div>
					
						<div class="form-group">
							<label for="inputType">Type de la Structure : </label>
							<span class="error">* <?php echo $code_type_structureErr;?></span><br>
							<select class="form-control" name="code_type_structure">
								<?php foreach ($typeStructures as $type) : ?>
								  <option value="<?php echo $type->code_type_structure ?>"><?php echo $type->lib_type_structure ?></option>
								<?php endforeach; ?>					 
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
					<a href="structure.php" class="container center">Afficher la liste des Structures</a>
					<br><br><br>
					<p class="text-danger">Veillez saisir les champs du formulaire correctement</p>
				</div>
				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter une Structure</span>
						</button>
					</h4>
					
					<form role="form" id="form" action="structure.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputNomStructure">Nom structure : </label>
							<input type="text" class="form-control col-md-2" id="inputNomStructure" name="nom_structure" placeholder="Nom Structure"/>
							<span class="error">* <?php echo $nom_structureErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputDescription">Description</label>
							<textarea type="text" rows="7" class="form-control" id="inputDescription" name="description" placeholder="Description"></textarea>
						</div>

						<div class="form-group">
							<label for="inputContact">Contact Structure : </label>
							<input type="text" class="form-control col-md-2" id="inputContact" name="contact_structure" placeholder="Contact"/>
							<span class="error">* <?php echo $contact_structureErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputAdresse">Adresse Structure : </label>
							<input type="text" class="form-control col-md-2" id="inputAdresse" name="adresse_structure" placeholder="Adresse Structure"/>
							<span class="error">* <?php echo $adresse_structureErr;?></span><br><br>
						</div>
												
						<div class="form-group">
							<label for="inputImage">Image Structure  : </label>
							<input type="file" class="form-control" id="inputImage" name="image_structure" />
							<span class="error">* <?php echo $image_structureErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputLongitude">Longitude : </label>
							<input type="text" class="form-control col-md-2" id="inputLongitude" name="longitude" placeholder="Longitude"/>
							<span class="error">* <?php echo $longitudeErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputLatitude">Latitude : </label>
							<input type="text" class="form-control col-md-2" id="inputLatitude" name="latitude" placeholder="Latitude"/>
							<span class="error">* <?php echo $latitudeErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputType">Propietaires : </label>
							<span class="error">* <?php echo $code_clientErr;?></span><br>
							<select class="form-control" name="code_client">
								<?php foreach ($clients as $client) : ?>
								  <option value="<?php echo $client->code_client ?>"><?php echo $client->nom_client ?></option>
								<?php endforeach; ?>					 
							</select>
						</div>
					
						<div class="form-group">
							<label for="inputType">Type de la Structure : </label>
							<span class="error">* <?php echo $code_type_structureErr;?></span><br>
							<select class="form-control" name="code_type_structure">
								<?php foreach ($typeStructures as $type) : ?>
								  <option value="<?php echo $type->code_type_structure ?>"><?php echo $type->lib_type_structure ?></option>
								<?php endforeach; ?>					 
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
