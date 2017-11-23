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
				<?php //include "view/template/vueSidebar.php"; ?>

				<?php if(!empty($produits)){ ?>
				<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">
					<h1>Liste Des Produits</h1>
					<?php foreach ($produits as $produit) : ?>
					<div class="todo">
						<span class="delete" code="<?php echo $produit->code_produit; ?>">
							<a onclick="return confirm('Etes vous Sure ..?');" href="produit.php?code=<?php echo $produit->code_produit; ?>&nbrepage=<?php if (isset($nbrepage)) { echo($nbrepage);
								
							}else{ echo(0);} ?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $produit->code_produit;?>">
							<a class="myBtn" href="produit.php?code_produit=<?php echo $produit->code_produit;?>">
								<img src="common/img/modifier.gif" alt="modifier" />
							</a>
						</span>
						
						<h4 class="titre"><?php echo nl2br(stripslashes($produit->lib_produit));?> - <?php echo nl2br(stripslashes($produit->lib_produit)); ?></h4>
						<p class="description" id="<?php echo $produit->code_produit;?>">
							<img src="../common/images/produit-map/<?php echo $produit->image_produits;?>.jpg" width="90" heigth="90" /><br><br>
							<strong>Description</strong>  : <?php echo nl2br(stripslashes($produit->description_produit)); ?><br>
							<strong>Prix initial</strong> : <?php echo nl2br(stripslashes($produit->prix_initial)); ?><br />
							<strong>Reduction</strong>  : <?php echo nl2br(stripslashes($produit->reduction)); ?> % <br />
							<strong>Date debut Promotion</strong>  : <?php $date_debut_promo=strtotime($produit->date_debut_promo);
										echo date('d/m/Y',$date_debut_promo); ?><br>
							<strong>Date fin Promotion</strong>  : <?php $date_fin_promo=strtotime($produit->date_fin_promo);
										echo date('d/m/Y',$date_fin_promo); ?><br>
														
						</p>  
					</div>
					<?php endforeach; ?>
					<div>
						<ul class="pagination">
							<?php for ($i=0; $i<$nbrePages ; $i++) { ?>
								<li class="<?php echo (($i==$nbrepage)?'active':'');?>">
									<a href="produit.php?nbrepage=<?php echo $i; ?>"><?php echo $i; ?></a>
								</li>
							<?php }?>
						</ul>
					</div>	
				</div>
				
				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter un produit</span>
						</button>
					</h4>
					
					<form role="form" id="form" action="produit.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputLibele">Libele :<span class="error">* <?php echo $libeleErr;?></span> </label>
							<input size="20px" type="text" class="form-control col-md-2" id="inputLibele" name="libele" placeholder="Nom du produit"/>
						</div>
						<div class="form-group">
							<label for="inputCategorie">Catégorie : <span class="error">* <?php echo $categorieErr;?></span><br></label>
							<select class="form-control" name="categorie">
								<?php foreach($categories as $category): ?>
								  <option value="<?php echo $category->code_categorie_produit ?>"><?php echo $category->lib_categorie_produit ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						
						<div class="form-group">
							<label for="inputStructure">Structure : <span class="error">* <?php echo $structureErr;?></span></label>
							<select class="form-control" name="structure">
								<?php foreach($structures as $structure): ?>
								  <option value="<?php echo $structure->code_structure ?>"><?php echo $structure->nom_structure ?></option>
								<?php endforeach; ?>
							</select>
						</div>
	
						<div class="form-group">
							<label for="inputDescription">Description : </label>
							<textarea type="text" rows="5" class="form-control" id="inputDescription" name="description" placeholder="Description du produit"/></textarea>
						</div>
	
						<div class="form-group">
							<label for="inputPrix">Prix normal :<span class="error">* <?php echo $prixErr;?></span> </label>
							<input type="text" class="form-control col-md-2" id="inputPrix" name="prix" placeholder="Prix sans la reduction"/>
						</div>
						<div class="form-group">
							<label for="inputDateDebut">Date de debut de la promo :<span class="error">* <?php echo $dateDebutErr;?> </span></label>
							<input readonly type="text" class="form-control col-md-2 form_datetime" id="inputDateDebut" name="date_debut_promo"/>
						</div>
						<div class="form-group">
							<label for="inputDateFin">Date de fin de la promo : <span class="error">* <?php echo $dateFinErr;?></span></label>
							<input readonly type="text" class="form-control col-md-2 form_datetime" id="inputDateFin" name="date_fin_promo"/>
						</div>
						<div class="form-group">
							<label for="inputReduction">Pourcentage de Reduction :<span class="error">* <?php echo $reductionErr;?> </span></label>
							<input type="text" class="form-control col-md-2" id="inputReduction" name="reduction" placeholder="ex: 50"/>
						</div>
						<div class="form-group">
							<label for="inputImage">Image Produit  :<span class="error">* <?php echo $image_produitErr;?></span> </label>
						</div>
						<input type="file"  id="inputImage" name="image_produit" /><br>
						<!-- <div class="form-group">
							<label for="inputHeureDebut">Heure de debut de la promo : </label>
							<input type="time" class="form-control col-md-2" id="inputHeureDebut" name="heure_debut_promo"/>
							<span class="error">* <?php //echo $heureDebutErr;?></span>
						</div> -->

						<!-- <div class="form-group">
							<label for="inputHeureFin">Heure de fin de la promo : <span class="error">* <?php //echo $heureFinErr;?></span></label>
							<input type="time" class="form-control col-md-2" id="inputHeureFin" name="heure_fin_promo"/>
							
						</div> -->
												
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
				      <a href="produit.php"><span class="close">&times;</span></a>
				      <h2>Modifier le Produit</h2>
				    </div>
				    <div class="modal1-body">
					     <form action="produit.php?code_produit=<?php echo $info->code_produit;?>" method="post" enctype="multipart/form-data" >
								<div class="form-group">
									<label for="inputLibele">Nom Produit : <span class="error">* <?php echo $libeleErr;?></span></label>
									<input type="text" class="form-control col-md-2" id="inputLibele" name="libele" value="<?php echo nl2br(stripslashes($info->lib_produit)); ?>"/>
								</div>

								<div class="form-group">
									<label for="inputCategorie">Catégorie Produit: </label>
									<select class="form-control" name="categorie">
										<?php foreach($categories as $category): ?>
										  <option <?php if($category->code_categorie_produit == $info->code_categorie_produit) : ?>selected<?php endif; ?> value="<?php echo $category->code_categorie_produit ?>"><?php echo $category->lib_categorie_produit ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								
								<div class="form-group">
									<label for="inputStructure">Structure : </label>
									<select class="form-control" name="structure">
										<?php foreach($structures as $structure): ?>
										  <option <?php if($structure->code_structure == $info->code_structure) : ?>selected<?php endif; ?> value="<?php echo $structure->code_structure ?>"><?php echo $structure->nom_structure ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="form-group">
									<label for="inputDescription">Description du Produit: </label>
									<textarea type="text" rows="5" class="form-control" id="inputDescription" name="description"/><?php echo nl2br(stripslashes($info->description_produit)); ?></textarea>
								</div>

								<div class="form-group">
									<label for="inputPrix">Prix normal : <span class="error">* <?php echo $prixErr;?></span></label>
									<input type="text" class="form-control col-md-2" id="inputPrix" name="prix" value="<?php echo nl2br(stripslashes($info->prix_initial)); ?>"/>
								</div>
								<div class="form-group">
									<label for="inputDateDebut">Date de debut de la promo : <span class="error">* <?php echo $dateDebutErr;?></span></label>
									<input readonly type="text" class="form-control col-md-2 form_datetime" id="inputDateDebut" name="date_debut_promo" value="<?php echo nl2br(stripslashes($info->date_debut_promo)); ?>"/>
								</div>

								<div class="form-group">
									<label for="inputDateFin">Date de fin de la promo : <span class="error">* <?php echo $dateFinErr;?></span></label>
									<input readonly type="text" class="form-control col-md-2 form_datetime" id="inputDateFin" name="date_fin_promo" value="<?php echo nl2br(stripslashes($info->date_fin_promo)); ?>"/>
								</div>
								<div class="form-group">
									<label for="inputReduction">Pourcentage de Réduction : </label>
									<input type="text" class="form-control col-md-2" id="inputReduction" name="reduction" value="<?php echo nl2br(stripslashes($info->reduction)); ?>"/>
								</div>
								<div class="form-group">
									<label for="inputImage">Image Produit : </label>
									<span class="error">* <?php echo $image_produitErr;?></span>
									<img src="../common/images/produit-map/<?php echo $info->image_produits;?>.jpg" width="90" heigth="90" /><br>
								</div>
								<input type="file" id="inputImage" name="image_produit"/><br>
							
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
				      <h3>Modal Footer</h3>
				    </div>
				  </div>

				<?php }else{ ?>
				<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">
					<a href="produit.php" class="container center">Afficher la liste des Produits</a>
					<br><br><br>
					<p class="text-danger">Veillez saisir les champs du formulaire correctement</p>
				</div>

				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter un produit</span>
						</button>
					</h4>
					
					<form role="form" id="form" action="produit.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputLibele">Libele : <span class="error">* <?php echo $libeleErr;?></span></label>
							<input type="text" class="form-control col-md-2" id="inputLibele" name="libele" placeholder="Nom du produit"/>
						</div>
						<div class="form-group">
							<label for="inputCategorie">Catégorie : <span class="error">* <?php echo $categorieErr;?></span></label>
							<select class="form-control" name="categorie">
								<?php foreach($categories as $category): ?>
								  <option value="<?php echo $category->code_categorie_produit ?>"><?php echo $category->lib_categorie_produit ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						
						<div class="form-group">
							<label for="inputStructure">Structure : <span class="error">* <?php echo $structureErr;?></span></label>
							<select class="form-control" name="structure">
								<?php foreach($structures as $structure): ?>
								  <option value="<?php echo $structure->code_structure ?>"><?php echo $structure->nom_structure ?></option>
								<?php endforeach; ?>
							</select>
						</div>
	
						<div class="form-group">
							<label for="inputDescription">Description : </label>
							<textarea type="text" rows="5" class="form-control" id="inputDescription" name="description" placeholder="Description du produit"/></textarea>
							
						</div>
	
						<div class="form-group">
							<label for="inputPrix">Prix normal : <span class="error">* <?php echo $prixErr;?></span></label>
							<input type="text" class="form-control col-md-2" id="inputPrix" name="prix" placeholder="Prix sans la reduction"/>
						</div>
		
						<div class="form-group">
							<label for="inputDateDebut">Date de debut de la promo : <span class="error">* <?php echo $dateDebutErr;?></span></label>
							<input readonly type="text" class="form-control col-md-2 form_datetime" id="inputDateDebut" name="date_debut_promo"/>	
						</div>
						<div class="form-group">
							<label for="inputDateFin">Date de fin de la promo : <span class="error">* <?php echo $dateFinErr;?></span></label>
							<input readonly type="text" class="form-control col-md-2 form_datetime" id="inputDateFin" name="date_fin_promo"/>
							
						</div>
						<div class="form-group">
							<label for="inputReduction">Pourcentage de Reduction : <span class="error">* <?php echo $reductionErr;?></span></label>
							<input type="text" class="form-control col-md-2" id="inputReduction" name="reduction" placeholder="ex: 50"/>
						</div>
						<div class="form-group">
							<label for="inputImage">Image Produit  : </label>
							<span class="error"width="90" heigth="90">* <?php echo $image_produitErr;?></span>
						</div>
						<input type="file"  id="inputImage" name="image_produit" /><br>
						
					
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
		<script type="text/javascript">
		    $(".form_datetime").datetimepicker({format: 'dd-mm-yyyy hh:ii:ss'});
		</script>  
	</body>
</html>
