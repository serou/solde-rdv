<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
	<body>

		<?php include("view/template/vueMenu.php"); // inclusion du menu principal ?>

		<div class="container-fluid">
			<div class="row">
				
				<?php include "view/template/vueSidebar.php"; ?>
				<div class="col-md-6 col-sm-7 col-sm-offset-3 markers">
					<?php foreach ($catProduits as $category) : ?>
					<div class="todo">
						<span class="delete deleteCat" id="<?php echo $category->code_categorie_produit; ?>">
							<a href="category.php?id=<?php echo $category->code_categorie_produit; ?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $category->code_categorie_produit;?>">
							<a href="categoryUpdate.php?id=<?php echo $category->code_categorie_produit;?>">
								<img src="common/img/modifier.gif" alt="modifier" />
							</a>
						</span>
						
						<h4 class="titre"><?php echo nl2br(stripslashes($category->lib_categorie_produit));?></h4>
						<p class="description" id="<?php echo $category->code_categorie_produit;?>">
							<img src="../common/images/marker-map/<?php echo $category->lib_categorie_produit;?>.png" />
							<?php echo nl2br(stripslashes($category->lib_categorie_produit));?>
							<!-- (Actif : <?php echo nl2br(stripslashes($category->icone_actif));?>) -->
						</p>  
					</div>
					<?php endforeach; ?>
				</div>
				
				<div class="col-md-2 col-sm-2 ajoutMarkers">
					<h4>
					<button id="ajout">Ajouter une catégorie</button>
					</h4>

					<!-- The Modal -->
					<div id="myModal" class="modal">

					  <!-- Modal content -->
					  <div class="modal-content">
						<div class="modal-header">
						  <span class="close">&times;</span>
						  <h2>Ajout de categorie</h2>
						</div>
						<div class="modal-body">
						  <form role="form" id="form" action="category.php" method="post">
							<div class="form-group">
								<label for="inputCategory">Catégorie : </label>
								<input type="text" class="form-control col-md-2" id="inputCategory" name="category" placeholder="Category"/>
							</div>
					
							<div class="form-group">
								<label for="inputImage">Image : </label>
								<input type="text" class="form-control col-md-2" id="inputImage" name="image" placeholder="Image"/>
							</div>
					
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
