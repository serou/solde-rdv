<!DOCTYPE html>
<html>
	<?php require('template/vueHeader.php'); ?>

	<body>
		<div class="container-fluid">
			
			<div class="row">
				
				<div class="col-md-6 col-md-offset-3">
				<form action="produitsUpdate.php?id=<?php echo $info->code_produit;?>"> <!--method="post" enctype="multipart/form-data" -->
					<div class="form-group">
						<label for="inputLibele">Libele : </label>
						<input type="text" class="form-control col-md-2" id="inputLibele" name="libele" value="<?php echo nl2br(stripslashes($info->lib_produit)); ?>"/>
					</div>


					<div class="form-group">
						<label for="inputCategorie">Catégorie : </label>
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
						<label for="inputDescription">Description : </label>
						<textarea type="text" rows="5" class="form-control" id="inputDescription" name="description"/><?php echo nl2br(stripslashes($info->description)); ?></textarea>
					</div>

					<div class="form-group">
						<label for="inputPrix">Prix normal : </label>
						<input type="text" class="form-control col-md-2" id="inputPrix" name="prix" value="<?php echo nl2br(stripslashes($info->prix_initial)); ?>"/>
					</div>

					<div class="form-group">
						<label for="inputReduction">Pourcentage de Reduction : </label>
						<input type="text" class="form-control col-md-2" id="inputReduction" name="reduction" value="<?php echo nl2br(stripslashes($info->reduction)); ?>"/>
					</div>

					<div class="form-group">
						<label for="inputDateDebut">Date de debut de la promo : </label>
						<input type="date" class="form-control col-md-2" id="inputDateDebut" name="dateDebut" value="<?php echo nl2br(stripslashes($info->date_debut_promo)); ?>"/>
					</div>

					<div class="form-group">
						<label for="inputHeureDebut">Heure de debut de la promo : </label>
						<input type="time" class="form-control col-md-2" id="inputHeureDebut" name="heureDebut" value="<?php echo nl2br(stripslashes($info->heure_debut_promo)); ?>"/>
					</div>

					<div class="form-group">
						<label for="inputDateFin">Date de fin de la promo : </label>
						<input type="date" class="form-control col-md-2" id="inputDateFin" name="dateFin" value="<?php echo nl2br(stripslashes($info->date_fin_promo)); ?>"/>
					</div>

					<div class="form-group">
						<label for="inputHeureFin">Heure de fin de la promo : </label>
						<input type="time" class="form-control col-md-2" id="inputHeureFin" name="heureFin" value="<?php echo nl2br(stripslashes($info->heure_fin_promo)); ?>"/>
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
			</div>
		</div>
	</body>
</html>
