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
				<?php //include "view/template/vueSidebar.php";  ?>

				<?php if(!empty($formules)) {?>
				<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">
					<?php foreach ($formules as $formule) : ?>
					<div class="todo">
						<span class="delete" id="<?php echo $formule->code_formule;?>">
							<a onclick="return confirm('Etes vous Sure ..?');" href="formule.php?code=<?php echo $formule->code_formule;?>&nbrepage=<?php if (isset($nbrepage)) { echo($nbrepage);
								
							}else{ echo(0);} ?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $formule->code_formule;?>">
							<a class="myBtn" href="formule.php?code_formule=<?php echo $formule->code_formule;?>">
								<img src="common/img/modifier.gif" alt="supprimer" />
							</a>
						</span>
						
						<h4 class="titre"><?php echo strtoupper(nl2br(stripslashes($formule->nom_formule)));?></h4>
						<p class="description" id="<?php echo $formule->code_formule;?>">
							<strong>Delai</strong> : <?php echo nl2br(stripslashes($formule->delai));?><strong> Jour(s)</strong><br>
							<strong>Nombre Structure </strong> : <?php echo nl2br(stripslashes($formule->nbre_structure));?><strong></strong><br>
						</p>  
					</div>
					<?php endforeach; ?>
					<div>
						<ul class="pagination">
							<?php for ($i=0; $i<$nbrePages ; $i++) { ?>
								<li class="<?php echo (($i==$nbrepage)?'active':'');?>">
									<a href="formule.php?nbrepage=<?php echo $i; ?>"><?php echo $i; ?></a>
								</li>
							<?php }?>
						</ul>
					</div>	
				</div>
				
				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter une Formule</span>
						</button>
					</h4>
					
					<form role="form" id="form" action="formule.php" method="post">
						<div class="form-group">
							<label for="inputNomFormule">Nom formule : </label>
							<input type="text" class="form-control col-md-2" id="inputNomFormule" name="nom_formule" placeholder="Nom Formule"/>
							<span class="error">* <?php echo $nom_formuleErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputDelai">Delai : </label>
							<input type="text" class="form-control col-md-2" id="inputDelai" name="delai" placeholder="Delai"/>
							<span class="error">* <?php echo $delaiErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputNbrestructure">Nombre de Strucutre : </label>
							<input type="text" class="form-control col-md-2" id="inputNbrestructure" name="nbre_structure" placeholder="Nombre strucutre"/>
							<span class="error">* <?php echo $nbre_structureErr;?></span><br><br>
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
				      <span class="close">&times;</span>
				      <h2>Modifier la Formule</h2>
				    </div>
				    <div class="modal1-body">
					      <form action="formule.php?code_formule=<?php echo $info->code_formule;?>" method="post">
							
							<div class="form-group">
								<label for="inputNomFormule">Nom Formule : </label>
								<input type="text" class="form-control col-md-2" id="inputNomFormule" name="nom_formule" placeholder="Nom Formule" value="<?php echo nl2br(stripslashes($info->nom_formule)); ?>"/>
								<span class="error">* <?php echo $nom_formuleErr;?></span><br><br>
							</div>

							<div class="form-group">
								<label for="inputDelai">Delai de la Formule : </label>
								<input type="text" class="form-control col-md-2" id="inputDelai" name="delai" placeholder="Delai" value="<?php echo nl2br(stripslashes($info->delai)); ?>"/>
								<span class="error">* <?php echo $delaiErr;?></span><br><br>
							</div>
							<div class="form-group">
								<label for="inputNbrestructure">Nombre de Strucutre : </label>
								<input type="text" class="form-control col-md-2" id="inputNbrestructure" name="nbre_structure" placeholder="Nombre strucutre"/>
								<span class="error">* <?php echo $nbre_structureErr;?></span><br><br>
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
				      <h3>Modal Footer</h3>
				    </div>
				  </div>

				</div>
				</div>
				<?php }else{ ?>

				<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">
					<a href="formule.php" class="container center">Afficher la liste des Formules</a>
					<br><br><br>
					<p class="text-danger">Veillez saisir les champs du formulaire correctement</p>
				</div>
				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter une Formule</span>
						</button>
					</h4>
					
					<form role="form" id="form" action="formule.php" method="post">
						<div class="form-group">
							<label for="inputNomFormule">Nom formule : </label>
							<input type="text" class="form-control col-md-2" id="inputNomFormule" name="nom_formule" placeholder="Nom Formule"/>
							<span class="error">* <?php echo $nom_formuleErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputDelai">Delai : </label>
							<input type="text" class="form-control col-md-2" id="inputDelai" name="delai" placeholder="Delai"/>
							<span class="error">* <?php echo $delaiErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputNbrestructure">Nombre de Strucutre : </label>
							<input type="text" class="form-control col-md-2" id="inputNbrestructure" name="nbre_structure" placeholder="Nombre strucutre"/>
							<span class="error">* <?php echo $nbre_structureErr;?></span><br><br>
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
