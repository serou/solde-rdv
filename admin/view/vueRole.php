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

				<?php if(!empty($roles)) {?>
				<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">

					<?php foreach ($roles as $role) : ?>
					<div class="todo">
						
						<span class="delete" id="<?php echo $role->code_role;?>">
							<a onclick="return confirm('Etes vous Sure ..?');" href="role.php?code=<?php echo $role->code_role;?>&nbrepage=<?php if (isset($nbrepage)) { echo($nbrepage);
								
							}else{ echo(0);} ?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $role->code_role;?>">
							<a class="myBtn" href="role.php?code_role=<?php echo $role->code_role;?>">
								<img src="common/img/modifier.gif" alt="supprimer" />
							</a>
						</span>
						
						<h4 class="titre"><?php echo strtoupper(nl2br(stripslashes($role->lib_role)));?></h4>
						<p class="description" id="<?php echo $role->code_role;?>">
							<!--<img src="../common/images/marker-map/<?php //echo $category->icone_icon;?>.png" />-->
							<strong>Date de Creation</strong> :<?php $date_creation=strtotime($role->date_creation_role);
										echo date('d/m/Y',$date_creation);?><br>
							<strong>User ayant creé</strong> :<?php echo nl2br(stripslashes($role->username));?>
						</p>  
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
							<span class="glyphicon glyphicon-plus">Ajouter un Role</span>
						</button>
					</h4>
					<br>
					<form role="form" id="form" action="role.php" method="post">
						<div class="form-group">
							<label for="inputRole">Nom Rôle : <span class="error">* <?php echo $lib_roleErr;?></span></label>
							<input type="text" class="form-control col-md-2" id="inputRole" name="lib_role" placeholder="Nom role" />
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
					     <form action="roleUpdate.php?code_role=<?php echo $info->code_role; ?>" method="post">
							<div class="panel-heading"><strong>Modification d'un Rôle</strong></div>
							<div><br></div>
							<div class="form-group">
								<label for="inputlibrole">Nom du role : <span class="error">* <?php echo $lib_roleErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputlibrole" name="lib_role" placeholder="Nom Role" value="<?php echo nl2br(stripslashes($info->lib_role)); ?>"/>
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
					<a href="role.php" class="container center">Afficher la liste des Roles</a>
					<br><br><br>
					<p class="text-danger">Veillez saisir les champs du formulaire correctement</p>
				</div>

				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter un Role</span>
						</button>
					</h4>
					
					<form role="form" id="form" action="role.php" method="post">
						<div class="form-group">
							<label for="inputRole">Nom Rôle : </label>
							<input type="text" class="form-control col-md-2" id="inputRole" name="lib_role" placeholder="Nom role" />
							<span class="error">* <?php echo $lib_roleErr;?></span><br><br>
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
