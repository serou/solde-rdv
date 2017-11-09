<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
	<body>

		<?php include("view/template/vueMenu.php"); // inclusion du menu principal ?>

		<div class="container-fluid">
			<div class="row">
				
				<?php include "view/template/vueSidebar.php"; ?>
				<div class="col-md-7 col-sm-7 col-sm-offset-3 markers">
					<?php foreach ($produits as $produit) : ?>
					<div class="todo">
						<span class="delete deleteMarkers" id="<?php echo $produit->code_produit; ?>">
							<a href="produit.php?id=<?php echo $produit->code_produit; ?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $produit->code_produit;?>">
							<a href="produitUpdate.php?id=<?php echo $produit->code_produit;?>">
								<img src="common/img/modifier.gif" alt="modifier" />
							</a>
						</span>
						
						<h4 class="titre"><?php echo nl2br(stripslashes($produit->lib_categorie_produit));?> - <?php echo nl2br(stripslashes($produit->lib_produit)); ?></h4>
						<p class="description" id="<?php echo $produit->code_produit;?>">
							Prix initial : <?php echo nl2br(stripslashes($produit->prix_initial)); ?><br />
							Reduction : <?php echo nl2br(stripslashes($produit->reduction)); ?> % <br />
							Description : <?php echo nl2br(stripslashes($produit->description)); ?>
						</p>  
					</div>
					<?php endforeach; ?>
				</div>
				
				<div class="col-md-2 col-sm-2 ajoutMarkers">
				
					<h4>
					<button id="ajout">Ajouter un produit</button>
					</h4>

					<!-- The Modal -->
					<div id="myModal" class="modal">

					  <!-- Modal content -->
					  <div class="modal-content">
						<div class="modal-header">
						  <span class="close">&times;</span>
						  <h2>Ajout de produit</h2>
						</div>
						<div class="modal-body">
						  <form role="form" id="form" action="produit.php" method="post"> <!--enctype="multipart/form-data"-->
								<div class="form-group">
									<label for="inputLibele">Libele : </label>
									<input type="text" class="form-control col-md-2" id="inputLibele" name="libele" placeholder="Nom du produit"/>
								</div>

	
								<div class="form-group">
									<label for="inputCategorie">Catégorie : </label>
									<select class="form-control" name="categorie">
										<?php foreach($catProduits as $category): ?>
										  <option value="<?php echo $category->code_categorie_produit ?>"><?php echo $category->lib_categorie_produit ?></option>
										<?php endforeach; ?>
									</select>
								</div>
						
								<div class="form-group">
									<label for="inputStructure">Structure : </label>
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
									<label for="inputPrix">Prix normal : </label>
									<input type="text" class="form-control col-md-2" id="inputPrix" name="prix" placeholder="Prix sans la reduction"/>
								</div>
	
								<div class="form-group">
									<label for="inputReduction">Pourcentage de Reduction : </label>
									<input type="text" class="form-control col-md-2" id="inputReduction" name="reduction" placeholder="ex: 50"/>
								</div>
	
								<div class="form-group">
									<label for="inputDateDebut">Date de debut de la promo : </label>
									<input type="date" class="form-control col-md-2" id="inputDateDebut" name="dateDebut"/>
								</div>
	
								<div class="form-group">
									<label for="inputHeureDebut">Heure de debut de la promo : </label>
									<input type="time" class="form-control col-md-2" id="inputHeureDebut" name="heureDebut"/>
								</div>
	
								<div class="form-group">
									<label for="inputDateFin">Date de fin de la promo : </label>
									<input type="date" class="form-control col-md-2" id="inputDateFin" name="dateFin"/>
								</div>
	
								<div class="form-group">
									<label for="inputHeureFin">Heure de fin de la promo : </label>
									<input type="time" class="form-control col-md-2" id="inputHeureFin" name="heureFin"/>
								</div>
						
								<!--div class="form-group">
									<label for="inputImage">Image : </label>
									<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
									<input type="file" class="form-control col-md-2" id="inputImage" name="image"/>
								</div-->
					
								<div class="form-group">
									<input type="submit" value="Ajouter" />
								</div>
							</form>
						</div>
						<div class="modal-footer">
						  <h3>Modal Footer</h3>
						</div>
					  </div>

					</div>
					
				</div>
			</div>
	    <?php require('template/vueFooter.php'); ?>
	    </div>
		<div id="snackbar">Suppression...</div>

	</body>
</html>
