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
			<?php if(!empty($structures)) {?>
			<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">
				<?php foreach ($structures as $structure) : ?>
					<div class="todo">
						<span class="delete" id="<?php echo $structure->code_structure;?>">
							<a onclick="return confirm('Etes vous Sure ..?');" href="structure.php?code=<?php echo $structure->code_structure;?>&nbrepage=<?php if (isset($nbrepage)) { echo($nbrepage);
								
							}else{ echo(0);} ?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $structure->code_structure;?>">
							<a class="myBtn" href="structure.php?code_structure=<?php echo $structure->code_structure;?>">
								<img src="common/img/modifier.gif" alt="supprimer" />
							</a>
						</span>
						<h4 class="titre"><?php echo strtoupper(nl2br(stripslashes($structure->nom_structure)));?></h4>
						<p class="description" id="<?php echo $structure->code_structure;?>">
							<img src="../common/images/structure-map/<?php echo $structure->image_structure;?>.jpg" width="90" heigth="90" /><br>
							<br><strong>Description</strong>  : <?php echo nl2br(stripslashes($structure->description_structure));?><br>
							<strong>Longitude</strong> : <?php echo nl2br(stripslashes($structure->longitude));?><br>
							<strong>Latitude</strong> : <?php echo nl2br(stripslashes($structure->latitude));?><br>
							<strong>Adresse structure</strong>  : <?php echo nl2br(stripslashes($structure->adresse_structure));?><br>
							<strong>Contact Structure</strong> : <?php echo nl2br(stripslashes($structure->contact_structure));?><br>
							<strong>Code Type Structure</strong> : <?php echo nl2br(stripslashes($structure->code_type_structure));?><br>
							<strong>Date de Creation Structure</strong> : <?php $date_creation=strtotime($structure->date_creation_structure);
										echo date('d/m/Y',$date_creation);?><br>
							
						</p>  
					</div>
				<?php endforeach; ?>
				<div>
					<ul class="pagination">
						<?php for ($i=0; $i<$nbrePages ; $i++) { ?>
							<li class="<?php echo (($i==$nbrepage)?'active':'');?>">
								<a href="structure.php?nbrepage=<?php echo $i; ?>"><?php echo $i; ?></a>
							</li>
						<?php }?>
					</ul>
				</div>	
			</div>
			<div class="col-md-3 col-sm-3 ajoutMarkers">
				<h4 id="ajout">
					<button type="button" class="btn btn-default btn-xs">
						<span class="glyphicon glyphicon-plus">Ajouter une Structure</span>
					</button>
				</h4>
				<form role="form" id="form" action="structure.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
							<span class="error"><?php echo $quotaErr;?></span><br><br>
					</div>
					<div class="form-group">
						<label for="inputNomStructure">Nom structure : <span class="error">* <?php echo $nom_structureErr;?></span></label>
						<input type="text" class="form-control col-md-2" id="inputNomStructure" name="nom_structure" placeholder="Nom Structure"/>
					</div>
					<div class="form-group">
						<label for="inputDescription">Description</label>
						<textarea type="text" rows="7" class="form-control" id="inputDescription" name="description" placeholder="Description"></textarea>
					</div>

					<div class="form-group">
						<label for="inputContact">Contact Structure : <span class="error">* <?php echo $contact_structureErr;?></span></label>
						<input type="text" class="form-control col-md-2" id="inputContact" name="contact_structure" placeholder="Contact"/>
					</div>
					<div class="form-group">
						<label for="inputAdresse">Adresse Structure : <span class="error">* <?php echo $adresse_structureErr;?></span></label>
						<input type="text" class="form-control col-md-2" id="inputAdresse" name="adresse_structure" placeholder="Adresse Structure"/>
					</div>
												
					<div class="form-group">
						<label for="inputImage">Image Structure  : </label>	
						<input type="file" id="inputImage" name="image_structure" />					
					</div>
					
					<div class="form-group">
						<label for="inputLatitude">Latitude : <span class="error">* <?php echo $latitudeErr;?></span></label>
						<input type="text" class="form-control col-md-2" id="inputLatitude" name="latitude" placeholder="Latitude"/>
					</div>
					<div class="form-group">
						<label for="inputLongitude">Longitude : <span class="error">* <?php echo $longitudeErr;?></span></label>
						<input type="text" class="form-control col-md-2" id="inputLongitude" name="longitude" placeholder="Longitude"/>
					</div>
					<div class="form-group">
						<label for="inputType">Propietaires : <span class="error">* <?php echo $code_clientErr;?></span></label>
						<select class="form-control" name="code_client">
							<?php foreach ($clients as $client) : ?>
							  <option value="<?php echo $client->code_client ?>"><?php echo $client->nom_client ?></option>
							<?php endforeach; ?>					 
						</select>
					</div>
					<div class="form-group">
						<label for="inputType">Type de la Structure :<span class="error">* <?php echo $code_type_structureErr;?></span> </label>
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
				<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">
				<!-- The Modal -->
				<div id="myModal" class="modal1">
					
				  <!-- Modal content -->
				  <div class="modal1-content">
				  	<div class="modal1-header">
				      	<a href="structure.php"><span class="close">&times;</span></a>
				      	<h2>Modifier la Structure</h2>
				    </div>
				    <div class="modal1-body">
					    <form action="structure.php?code_structure=<?php echo $info->code_structure; ?>" method="post" enctype="multipart/form-data">
							<div class="panel-heading"><strong>Modification de la Structure</strong></div>
							<div><br></div>
							<div class="form-group">
								<label for="inputNom">Nom Structure : <span class="error">* <?php echo $nom_structureErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputNom" name="nom_structure" placeholder="Nom Structure" value="<?php echo nl2br(stripslashes($info->nom_structure)); ?>"/>
							</div>
							<div class="form-group">
								<label for="inputDescription">Description :</label>
								<textarea type="text" rows="7" class="form-control" id="inputDescription" name="description" placeholder="Description"><?php echo nl2br(stripslashes($info->description_structure));?></textarea>
							</div>
							<div class="form-group">
								<label for="inputContat">Contact Structure : <span class="error">* <?php echo $contact_structureErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputContact" name="contact_structure" placeholder="passContactword" value="<?php echo nl2br(stripslashes($info->contact_structure)); ?>"/>
							</div>
							<div class="form-group">
								<label for="inputAdresse">Adresse Structure : <span class="error">* <?php echo $adresse_structureErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputAdress" name="adresse_structure" placeholder="Adresse Structure" value="<?php echo nl2br(stripslashes($info->adresse_structure)); ?>"/>
							</div>
							<div class="form-group">
								<label for="inputLongitude">Longitude : <span class="error">* <?php echo $longitudeErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputLongitude" name="longitude" placeholder="Longitude" value="<?php echo nl2br(stripslashes($info->longitude)); ?>"/>
							</div>
							<div >
								<label for="inputLatitude">Latitude : <span class="error">* <?php echo $latitudeErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputLatitude" name="latitude" placeholder="Latitude" value="<?php echo nl2br(stripslashes($info->latitude)); ?>"/>
							</div>
							<div class="form-group">
								<label for="inputImage">Image Structure : </label>
								<img name ="img" src="../common/images/structure-map/<?php echo $info->image_structure;?>.jpg" width="90" heigth="90" /><br><br>
								<input type="file" id="inputImage" name="image_structure"/>
							</div>	
							
							<div class="form-group">
								<label for="inputClient">Propriétaire : <span class="error">* <?php echo $code_clientErr;?></span></label>
									<select class="form-control" name="code_client">
										<?php foreach($clients as $client): ?>
									  		<option <?php if($client->code_client == $info->code_client) : ?>selected<?php endif; ?> value="<?php echo $client->code_client ?>"><?php echo $client->nom_client ?></option>
										<?php endforeach; ?>					 
									</select>
							</div>
							<div class="form-group">
								<label for="inputType">Type de Structure : <span class="error">* <?php echo $code_type_structureErr;?></span></label>
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
				    <div class="modal1-footer">
				      <h3></h3>
				    </div>
				  </div>

				</div>
			</div>
			<?php }else{ ?>
				<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">
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
							<label for="inputNomStructure">Nom structure : <span class="error">* <?php echo $nom_structureErr;?></span></label>
							<input type="text" class="form-control col-md-2" id="inputNomStructure" name="nom_structure" placeholder="Nom Structure"/>
							
						</div>
						<div class="form-group">
							<label for="inputDescription">Description</label>
							<textarea type="text" rows="7" class="form-control" id="inputDescription" name="description" placeholder="Description"></textarea>
						</div>

						<div class="form-group">
							<label for="inputContact">Contact Structure : <span class="error">* <?php echo $contact_structureErr;?></span></label>
							<input type="text" class="form-control col-md-2" id="inputContact" name="contact_structure" placeholder="Contact"/>
						</div>
						<div class="form-group">
							<label for="inputAdresse">Adresse Structure : <span class="error">* <?php echo $adresse_structureErr;?></span></label>
							<input type="text" class="form-control col-md-2" id="inputAdresse" name="adresse_structure" placeholder="Adresse Structure"/>
							
						</div>					
						<div class="form-group">
							<label for="inputImage">Image Structure  :</label>
							<input type="file" class="form-control" id="inputImage" name="image_structure" />		
						</div>
						<div class="form-group">
							<label for="inputLongitude">Longitude : <span class="error">* <?php echo $longitudeErr;?></span></label>
							<input type="text" class="form-control col-md-2" id="inputLongitude" name="longitude" placeholder="Longitude"/>
						</div>
						<div class="form-group">
							<label for="inputLatitude">Latitude : <span class="error">* <?php echo $latitudeErr;?></span></label>
							<input type="text" class="form-control col-md-2" id="inputLatitude" name="latitude" placeholder="Latitude"/>
						</div>
						<div class="form-group">
							<label for="inputType">Propietaires : <span class="error">* <?php echo $code_clientErr;?></span></label>
							<select class="form-control" name="code_client">
								<?php foreach ($clients as $client) : ?>
								  <option value="<?php echo $client->code_client ?>"><?php echo $client->nom_client ?></option>
								<?php endforeach; ?>					 
							</select>
						</div>
					
						<div class="form-group">
							<label for="inputType">Type de la Structure :<span class="error">* <?php echo $code_type_structureErr;?></span> </label>
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
