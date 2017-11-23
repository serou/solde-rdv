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
			<?php if(!empty($categories)) {?>
				<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">
					<h1>Liste Des Catégories Produits</h1>
					<?php foreach ($categories as $category) : ?>
					<div class="todo">
						<span class="delete" id="<?php echo $category->code_categorie_produit; ?>">
							<a onclick="return confirm('Etes vous Sure ..?');" href="category.php?code_categorie=<?php echo $category->code_categorie_produit;?>&nbrepage=<?php if (isset($nbrepage)) { echo($nbrepage);
								
							}else{ echo(0);} ?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $category->code_categorie_produit;?>">
							<a  class="myBtn" href="category.php?code_categorie_produit=<?php echo $category->code_categorie_produit;?>">
								<img src="common/img/modifier.gif" alt="modifier" />
							</a>
						</span>
						
						<h4 class="titre"><?php echo strtoupper(nl2br(stripslashes($category->lib_categorie_produit)));?></h4>
						<p class="description" id="<?php echo $category->code_categorie_produit;?>">
							<img src="../common/images/categoryProd-map/<?php echo $category->lib_categorie_produit;?>.png" width="40" heigth="40"/><br><br>
							<strong>Nom Catégorie</strong>  : <?php echo nl2br(stripslashes($category->lib_categorie_produit));?><br>
							<strong>Categorie active</strong> : <?php echo nl2br(stripslashes($category->actif));?>
						</p>  
					</div>
					<?php endforeach; ?>
					<div>
						<ul class="pagination">
							<?php for ($i=0; $i<$nbrePages ; $i++) { ?>
								<li class="<?php echo (($i==$nbrepage)?'active':'');?>">
									<a href="category.php?nbrepage=<?php echo $i; ?>"><?php echo $i; ?></a>
								</li>
							<?php }?>
						</ul>
					</div>	
				</div>
				
				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter une catégorie</span>
						</button>
					</h4>
					
					<form role="form" id="form" action="category.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputCategory">Catégorie : <span class="error">* <?php echo $lib_categorie_produitErr;?></span></label>
							<input type="text" class="form-control col-md-2" id="inputCategory" name="lib_categorie_produit" placeholder="Category"/>
							
						</div>
						
						<div class="form-group">
							<label for="inputActif">Actif :<span class="error">* <?php echo $actifErr;?></span></label>
							
							<select class="form-control" name="actif">
							  <option value="Oui">Oui</option>
							  <option value="Non">Non</option>
							</select>
						</div>
						
						<div class="form-group">
							<label for="inputImage">Image Categorie  : <span class="error">* <?php echo $image_categoryErr;?></span></label>
							
							<input type="file"  id="inputImage" name="image_category" />
						</div>
						
						<div class="form-group">
							<input type="submit" value="Ajouter" />
						</div>
					</form>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">
				<!-- The Modal -->
				<div id="myModal" class="modal1">
					
				  <!-- Modal content -->
				  <div class="modal1-content">
				    <div class="modal1-header">
				      <a href="category.php"><span class="close">&times;</span></a>
				      <h2>Modifier la Catégorie </h2>
				    </div>
				    <div class="modal1-body">
					     <form action="category.php?code_categorie_produit=<?php echo $info->code_categorie_produit;?>" method="post" enctype="multipart/form-data">
						
							<div class="form-group">
								<label for="inputCategory">Catégorie :<span class="error">* <?php echo $lib_categorie_produitErr;?></span> </label>
								<input type="text" class="form-control col-md-2" id="inputCategory" name="lib_categorie_produit" placeholder="Category" value="<?php echo nl2br(stripslashes($info->lib_categorie_produit)); ?>"/>
								
							</div>
							<div class="form-group">
									<label for="inputActif">Actif : </label>
									<select class="form-control" name="actif">
									  <option <?php if("Oui" == $info->actif) : ?>selected<?php endif; ?> value="Oui">Oui</option>
									  <option <?php if("Non" == $info->actif) : ?>selected<?php endif; ?> value="Non">Non</option>
									</select>
							</div>
							<div class="form-group">
								<label for="inputImage">Image Categorie :<span class="error">* <?php echo $image_categoryErr;?></span> </label>
								
								<img src="../common/images/categoryProd-map/<?php echo $info->image_category;?>.png" width="90" heigth="90" /><br>
								
							</div><br>
							<input type="file" id="inputImage" name="image_category"/>
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
					<a href="category.php" class="container center">Afficher la liste des Catégories</a>
					<br><br><br>
					<p class="text-danger">Veillez saisir les champs du formulaire correctement</p>
				</div>
				
				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter une catégorie</span>
						</button>
					</h4>
					
					<form role="form" id="form" action="category.php" method="post">
						<div class="form-group">
							<label for="inputCategory">Catégorie : </label>
							<input type="text" class="form-control col-md-2" id="inputCategory" name="lib_categorie_produit" placeholder="Category"/>
							<span class="error">* <?php echo $lib_categorie_produitErr;?></span><br><br>
						</div>
						
						<div class="form-group">
							<label for="inputActif">Actif : </label>
							<span class="error">* <?php echo $actifErr;?></span><br><br>
							<select class="form-control" name="actif">
							  <option value="Oui">Oui</option>
							  <option value="Non">Non</option>
							</select>
						</div>
						
						<div class="form-group">
							<label for="inputImage">Image Categorie  : </label>
							<span class="error">* <?php echo $image_categoryErr;?></span><br><br>
							<input type="file"  id="inputImage" name="image_category" />
						</div>
						
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
