<!DOCTYPE html>
<html>
	<?php require('template/vueHeader.php'); ?>

	<body>
		<div class="container-fluid">
			
			<div class="row">
				
				<div class="col-md-6 col-md-offset-3">
				
		<div id="myModal1" class="modal">

		  <!-- Modal content -->
		  <div class="modal-content">
			<div class="modal-header">
			  <a href="produit.php"><span class="close">&times;</span></a>
			  <h2>Modal Header</h2>
			</div>
			<div class="modal-body">
			  <form action="produitUpdate.php?id=<?php echo $info->code_produit;?>"> <!--method="post" enctype="multipart/form-data" -->
					<div class="form-group">
						<label for="inputLibele">Libele : </label>
						<input type="text" class="form-control col-md-2" id="inputLibele" name="libele" value="<?php echo nl2br(stripslashes($produit->lib_produit)); ?>"/>
					</div>


					<div class="form-group">
						<label for="inputCategorie">Catégorie : </label>
						<select class="form-control" name="categorie">
							<?php foreach($catProduit as $category): ?>
							  <option <?php if($category->code_categorie_produit == $produit->code_categorie_produit) : ?>selected<?php endif; ?> value="<?php echo $category->code_categorie_produit ?>"><?php echo $category->lib_categorie_produit ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					
					<div class="form-group">
						<label for="inputStructure">Structure : </label>
						<select class="form-control" name="structure">
							<?php foreach($structures as $structure): ?>
							  <option <?php if($structure->code_structure == $produit->code_structure) : ?>selected<?php endif; ?> value="<?php echo $structure->code_structure ?>"><?php echo $structure->nom_structure ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<label for="inputDescription">Description : </label>
						<textarea type="text" rows="5" class="form-control" id="inputDescription" name="description"/><?php echo nl2br(stripslashes($produit->description)); ?></textarea>
					</div>

					<div class="form-group">
						<label for="inputPrix">Prix normal : </label>
						<input type="text" class="form-control col-md-2" id="inputPrix" name="prix" value="<?php echo nl2br(stripslashes($produit->prix_initial)); ?>"/>
					</div>

					<div class="form-group">
						<label for="inputReduction">Pourcentage de Reduction : </label>
						<input type="text" class="form-control col-md-2" id="inputReduction" name="reduction" value="<?php echo nl2br(stripslashes($produit->reduction)); ?>"/>
					</div>

					<div class="form-group">
						<label for="inputDateDebut">Date de debut de la promo : </label>
						<input type="date" class="form-control col-md-2" id="inputDateDebut" name="dateDebut" value="<?php echo nl2br(stripslashes($produit->date_debut_promo)); ?>"/>
					</div>

					<div class="form-group">
						<label for="inputHeureDebut">Heure de debut de la promo : </label>
						<input type="time" class="form-control col-md-2" id="inputHeureDebut" name="heureDebut" value="<?php echo nl2br(stripslashes($produit->heure_debut_promo)); ?>"/>
					</div>

					<div class="form-group">
						<label for="inputDateFin">Date de fin de la promo : </label>
						<input type="date" class="form-control col-md-2" id="inputDateFin" name="dateFin" value="<?php echo nl2br(stripslashes($produit->date_fin_promo)); ?>"/>
					</div>

					<div class="form-group">
						<label for="inputHeureFin">Heure de fin de la promo : </label>
						<input type="time" class="form-control col-md-2" id="inputHeureFin" name="heureFin" value="<?php echo nl2br(stripslashes($produit->heure_fin_promo)); ?>"/>
					</div>
					
					<!--div class="form-group">
						<label for="inputImage">Image du produit : </label>
						<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
						<input type="file" class="form-control col-md-2" id="inputImage" name="image"/>
					</div-->
					
					<div class="form-group">
						<input type="submit" value="Mise à jour" />
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
		</div>
	</body>
</html>
