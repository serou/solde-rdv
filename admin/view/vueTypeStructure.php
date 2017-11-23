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

				<?php if(!empty($typeStructures)) {?>
				<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">
					<h1>Liste Des Types de Structures</h1>
					<?php foreach ($typeStructures as $typestructure) : ?>
					<div class="w3-container">
					<div class="todo">
						<span class="delete" id="<?php echo $typestructure->code_type_structure;?>">
							<a onclick="return confirm('Etes vous Sure ..?');" href="typeStructure.php?code_type=<?php echo $typestructure->code_type_structure;?>&nbrepage=<?php if (isset($nbrepage)) { echo($nbrepage);
								
							}else{ echo(0);} ?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $typestructure->code_type_structure;?>">
							<a class="myBtn" href="typeStructure.php?code_type_structure=<?php echo $typestructure->code_type_structure;?>">
								<img src="common/img/modifier.gif" alt="supprimer" />
							</a>
						</span> 
												
						<h4 class="titre"><?php echo strtoupper(nl2br(stripslashes($typestructure->lib_type_structure)));?></h4>
						<p class="description" id="<?php echo $typestructure->code_type_structure;?>">
							<strong>Nom Type Structure</strong> :<?php echo nl2br(stripslashes($typestructure->lib_type_structure));?>
						</p>  
					</div>

					</div>
					<?php endforeach; ?>
					<div>
						<ul class="pagination">
							<?php for ($i=0; $i<$nbrePages ; $i++) { ?>
								<li class="<?php echo (($i==$nbrepage)?'active':'');?>">
									<a href="typeStructure.php?nbrepage=<?php echo $i; ?>"><?php echo $i; ?></a>
								</li>
							<?php }?>
						</ul>
					</div>	
				</div>
				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter un Type Structure</span>
						</button>
					</h4>
					<br>
					<form role="form" id="form" action="typeStructure.php" method="post">
						<div class="form-group">
							<label for="inputTypeStructure">Libellé Type Structure : <span class="error">* <?php echo $lib_type_structureErr;?></span></label>
							<input type="text" class="form-control col-md-2" id="inputTypeStructure" name="lib_type_structure" placeholder="Type Structure"/>
						</div>

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
				      <h2>Modifier le Type de la Structure</h2>
				    </div>
				    <div class="modal1-body">
					      <form action="typeStructure.php?code_type_structure=<?php echo $info->code_type_structure;?>" method="post">
							
							<div class="form-group">
								<label for="inputlibTypeStructure">Libellé Type Structure :<span class="error">* <?php echo $lib_type_structureErr;?></span> </label>
								<input type="text" class="form-control col-md-2" id="inputlibTypeStructure" name="lib_type_structure" placeholder="Lib Type Structure" value="<?php echo nl2br(stripslashes($info->lib_type_structure)); ?>" />
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
					<a href="typeStructure.php" class="container center">Afficher la liste des Types Structures</a>
					<br><br><br>
					<p class="text-danger">Veillez saisir les champs du formulaire correctement</p>
				</div>
				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter un Type Structure</span>
						</button>
					</h4>
					

					<form role="form" id="form" action="typeStructure.php" method="post">
						<div class="form-group">
							<label for="inputTypeStructure">Libellé Type Structure : </label>
							<input type="text" class="form-control col-md-2" id="inputTypeStructure" name="lib_type_structure" placeholder="Type Structure"/>
							<span class="error">* <?php echo $lib_type_structureErr;?></span><br><br>
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
