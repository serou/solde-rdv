<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
	<body>
				<?php 
					if ($pageClient == 'compte.php') {

						include("view/template/vueMenu.php");
				?>
				<?php }

					else{
						include("view/template/vueMenuClient.php"); 
						
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
						include "view/template/vueSidebarClient.php"; 
						
					}

				?>	
				<?php //include "view/template/vueSidebar.php";  ?>

				<?php if(!empty($users)) {?>
				<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">
					
					<?php foreach ($users as $user) : ?>
					<div class="todo">
						<span class="delete" id="<?php echo $user->user_id;?>">
							<a onclick="return confirm('Etes vous Sure ..?');" href="user.php?id=<?php echo $user->user_id;?>&nbrepage=<?php if (isset($nbrepage)) { echo($nbrepage);
								
							}else{ echo(0);} ?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $user->user_id;?>">
							<a href="user.php?user_id=<?php echo $user->user_id;?>">
								<img src="common/img/modifier.gif" alt="supprimer" />
							</a>
						</span>
						
						<h4 class="titre"><?php echo strtoupper(nl2br(stripslashes($user->login)));?></h4>
						<p class="description" id="<?php echo $user->user_id;?>">
							<img src="../common/images/user-map/<?php echo $user->image_user;?>.jpg" width="90" heigth="90" /><br><br>
							<!--<strong>Id clef</strong> : <?php //echo nl2br(stripslashes($user->idclef));?><br>-->
							<strong>Rôle Utilisateur</strong> : <?php echo nl2br(stripslashes($user->code_role));?><br>
							<!--<strong>Password</strong>  : <?php echo nl2br(stripslashes($user->password));?><br>-->
							<strong>Email</strong>  : <?php echo nl2br(stripslashes($user->email));?><br>
							<strong>Date de Creation </strong> : <?php $date_creation=strtotime($user->date_creation_user);
										echo date('d/m/Y',$date_creation);?><br>
							<strong>Page d'acces</strong> : <?php echo nl2br(stripslashes($user->page));?><br>
							<strong>Derniere connexion</strong> : <?php $derniere_connexion=strtotime($user->derniere_connexion);
										echo date('d/m/Y',$derniere_connexion);?><br>
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
							<span class="glyphicon glyphicon-plus">Ajouter un User</span>
						</button>
					</h4>
					

					<form role="form" id="form" action="user.php" method="post" enctype="multipart/form-data" >
						<div class="form-group">
							<label for="inputLogin">Login : <span class="error">* <?php echo $loginErr;?></span></label>
							<input type="text" class="form-control col-md-2" id="inputLogin" name="login" placeholder="Login" />
						</div>
						<div class="form-group">
							<label for="inputPassword">Password :<span class="error">* <?php echo $passwordErr;?></span> </label>
							<input type="password" class="form-control col-md-2" id="inputPassword" name="password" placeholder="password" />
						</div>
						<div class="form-group">
							<label for="inputEmail">Email : <span class="error">* <?php echo $emailErr;?></span></label>
							<input type="email" class="form-control col-md-2" id="inputEmail" name="email" placeholder="Email@gmail"  />
						</div>
						<div class="form-group">
							<label for="inputImage">Image User  : <span class="error"width="90" heigth="90">* <?php echo $image_userErr;?></span></label>						
						</div>
						<input type="file"  id="inputImage" name="image_user" />
						<div class="form-group">
							<label for="inputRole">Attribuer un Rôle : <span class="error">* <?php echo $codeRoleErr; ?></span></label>
							<select class="form-control" name="code_role">
								<?php foreach ($roles as $role) : ?>
								  <option value="<?php echo $role->code_role ?>"><?php echo $role->lib_role ?></option>
								<?php endforeach; ?>					 
							</select>
							
						</div>
						<div class="form-group">
							<label for="inputPage">Page :<span class="error">* <?php echo $pageErr;?></span> </label>
							<select class="form-control" name="page">
							  <option value="compteClient.php">Compte Client</option>
							  <option value="compteUser.php">Compte User</option>
							  <option value="compte.php">Compte Administrateur</option>
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
				      <span class="close">&times;</span>
				      <h2>Modifier le Type de la Structure</h2>
				    </div>
				    <div class="modal1-body">
					      <form action="user.php?user_id=<?php echo $info->user_id; ?>" method="post" enctype="multipart/form-data">
							<div class="panel-heading"><strong>Modification de l'utilisateur</strong></div>
							<div><br></div>
							<div class="form-group">
								<label for="inputLogin">Login : <span class="error">* <?php echo $loginErr;?></span></label>
								<input type="text" class="form-control col-md-2" id="inputLogin" name="login" placeholder="Login" value="<?php echo nl2br(stripslashes($info->login)); ?>"/>
							</div>

							<div class="form-group">
								<label for="inputPasswordAnc">Ancien Password : <span class="error">* <?php echo $ancpasswordErr;?></span></label>
								<input type="password" class="form-control col-md-2" id="inputPasswordAnc" name="ancpassword" placeholder="password" value="<?php //echo nl2br(stripslashes($info->password)); ?>"/>
								
							</div>

							<div class="form-group">
								<label for="inputPasswordNvx">Nouveaux Password : <span class="error">* <?php echo $nvxpasswordErr;?></span></label>
								<input type="password" class="form-control col-md-2" id="inputPasswordNvx" name="nvxpassword" placeholder="password" value=""/>
								
							</div>

							<div class="form-group">
								<label for="inputPasswordConf">Confirmer Password : <span class="error">* <?php echo $confpasswordErr;?></span></label>
								<input type="password" class="form-control col-md-2" id="inputPasswordConf" name="confpassword" placeholder="password" value=""/>
								
							</div>
							
							
							<div class="form-group">
								<label for="inputEmail">Email : <span class="error"><?php echo $emailErr; ?></span></label>
								<input type="email" class="form-control col-md-2" id="inputEmail" name="email" placeholder="Email@gmail" value="<?php echo nl2br(stripslashes($info->email)); ?>"/>
								
							</div>
							<div class="form-group">
								<label for="inputImage">Image User : <span class="error">* <?php echo $image_userErr;?></span></label>
								<img src="../common/images/user-map/<?php echo $info->image_user;?>.jpg" width="90" heigth="90" /><br>
								<input type="file" id="inputImage" name="image_user"/>
							</div>
							<div class="form-group">
								<label for="inputRole">Attribuer un Rôle : <span class="error"><?php echo $codeRoleErr; ?></span></label>
								<select class="form-control" name="code_role">
									<?php foreach($roles as $role): ?>
								  		<option <?php if($role->code_role == $info->code_role) : ?>selected<?php endif; ?> value="<?php echo $role->code_role ?>"><?php echo $role->lib_role ?></option>
									<?php endforeach; ?>					 
								</select>
								
							</div>
							<div class="form-group">
								<label for="inputPage">Page : <span class="error"><?php echo $pageErr; ?></span></label>
								<select class="form-control" name="page">
								  <option <?php if("compteClient.php" == $info->page) : ?>selected<?php endif; ?> value="compteClient.php">Compte Client</option>
								  <option <?php if("compteUser.php" == $info->page) : ?>selected<?php endif; ?> value="compteUser.php">Compte User</option>
								  <option <?php if("compte.php" == $info->page) : ?>selected<?php endif; ?> value="compte.php">Compte Administrateur</option>
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
				      <h3>Modal Footer</h3>
				    </div>
				  </div>

				</div>
				</div>

			
				<?php }else{ ?>
		
				<div class="col-md-6 col-sm-6 col-sm-offset-3 markers">
					<a href="user.php" class="container center">Afficher la liste des utilisateurs</a>
					<br><br><br>
					<p class="text-danger">Veillez saisir les champs du formulaire correctement</p>
				</div>
				<div class="col-md-3 col-sm-3  ">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter un User</span>
						</button>
					</h4>
					

					<form role="form" id="form" action="user.php" method="post">
						<div class="form-group">
							<label for="inputLogin">Login : <span class="error">* <?php echo $loginErr;?></span></label>
							<input type="text" class="form-control col-md-2" id="inputLogin" name="login" placeholder="Login" maxlength="35" />
							
						</div>
						<div class="form-group">
							<label for="inputPassword">Password : <span class="error">* <?php echo $passwordErr;?></span></label>
							<input type="password" class="form-control col-md-2" id="inputPassword" name="password" placeholder="password" maxlength="45"/>
							
						</div>
						<div class="form-group">
							<label for="inputEmail">Email : <span class="error">* <?php echo $emailErr;?></span></label>
							<input type="email" class="form-control col-md-2" id="inputEmail" name="email" placeholder="Email@gmail" maxlength="70" />
						
						</div>
						<div class="form-group">
							<label for="inputImage">Image User  : <span class="error">* <?php echo $image_userErr;?></span></label>
							<input type="file"  id="inputImage" name="image_user" />
						</div>
						<div class="form-group">
							<label for="inputRole">Attribuer un Rôle : <span class="error">* <?php echo $codeRoleErr;?></span></label>
							<select class="form-control" name="code_role">
								<?php foreach ($roles as $role) : ?>
								  <option value="<?php echo $role->code_role ?>"><?php echo $role->lib_role ?></option>
								<?php endforeach; ?>					 
							</select>
							
						</div>
						<div class="form-group">
							<label for="inputPage">Page : <span class="error">* <?php echo $pageErr;?></span></label>
							<select class="form-control" name="page">
							  <option value="compteClient.php">Compte Client</option>
							  <option value="compteUser.php">Compte User</option>
							  <option value="compte.php">Compte Administrateur</option>
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
