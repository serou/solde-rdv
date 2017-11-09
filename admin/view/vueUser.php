<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
	<body>

		<?php include("view/template/vueMenu.php"); // inclusion du menu principal ?>
		
		<div class="container-fluid">
			<div class="row">
				
				<?php include "view/template/vueSidebar.php";  ?>

				<?php if(!empty($users)) {?>
				<div class="col-md-7 col-sm-7 col-sm-offset-2 markers">
					
					<?php foreach ($users as $user) : ?>
					<div class="todo">
						<span class="delete" id="<?php echo $user->user_id;?>">
							<a onclick="return confirm('Etes vous Sure ..?');" href="user.php?user_id=<?php echo $user->user_id;?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $user->user_id;?>">
							<a href="userUpdate.php?user_id=<?php echo $user->user_id;?>">
								<img src="common/img/modifier.gif" alt="supprimer" />
							</a>
						</span>
						
						<h4 class="titre"><?php echo nl2br(stripslashes($user->login));?></h4>
						<p class="description" id="<?php echo $user->user_id;?>">
							<img src="../common/images/user-map/<?php echo $user->image_user;?>.jpg" width="90" heigth="90" /><br>
							<!--<strong>Id clef</strong> : <?php //echo nl2br(stripslashes($user->idclef));?><br>-->
							<strong>Rôle Utilisateur</strong> : <?php echo nl2br(stripslashes($user->code_role));?><br>
							<!--<strong>Password</strong>  : <?php echo nl2br(stripslashes($user->password));?><br>-->
							<strong>Email</strong>  : <?php echo nl2br(stripslashes($user->email));?><br>
							<strong>Date de Creation </strong> : <?php $date_creation=strtotime($user->date_creation);
										echo date('d/m/Y',$date_creation);?><br>
							<strong>Page d'acces</strong> : <?php echo nl2br(stripslashes($user->page));?><br>
							<strong>Derniere connexion</strong> : <?php $derniere_connexion=strtotime($user->derniere_connexion);
										echo date('d/m/Y',$derniere_connexion);?><br>
						</p>  
					</div>
					<?php endforeach; ?>
					
				</div>
				
				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter un User</span>
						</button>
					</h4>
					

					<form role="form" id="form" action="user.php" method="post" enctype="multipart/form-data" >
						<div class="form-group">
							<label for="inputLogin">Login : </label>
							<input type="text" class="form-control col-md-2" id="inputLogin" name="login" placeholder="Login" />
							<span class="error">* <?php echo $loginErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputPassword">Password : </label>
							<input type="password" class="form-control col-md-2" id="inputPassword" name="password" placeholder="password" />
							<span class="error">* <?php echo $passwordErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputEmail">Email : </label>
							<input type="email" class="form-control col-md-2" id="inputEmail" name="email" placeholder="Email@gmail"  />
							<span class="error">* <?php echo $emailErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputImage">Image User  : </label>
							<span class="error">* <?php echo $image_userErr;?></span><br><br>
							<input type="file"  id="inputImage" name="image_user" />
						</div>
						<div class="form-group">
							<label for="inputRole">Attribuer un Rôle : </label>
							<span class="error">* <?php echo $codeRoleErr; ?></span><br><br>
							<select class="form-control" name="code_role">
								<?php foreach ($roles as $role) : ?>
								  <option value="<?php echo $role->code_role ?>"><?php echo $role->lib_role ?></option>
								<?php endforeach; ?>					 
							</select>
							
						</div>
						<div class="form-group">
							<label for="inputPage">Page : </label>
							<span class="error">* <?php echo $pageErr;?></span><br><br>
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
			
				<?php }else{ ?>
		
				<div class="col-md-7 col-sm-7 col-sm-offset-2 markers">
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
							<label for="inputLogin">Login : </label>
							<input type="text" class="form-control col-md-2" id="inputLogin" name="login" placeholder="Login" maxlength="35" />
							<span class="error">* <?php echo $loginErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputPassword">Password : </label>
							<input type="password" class="form-control col-md-2" id="inputPassword" name="password" placeholder="password" maxlength="45"/>
							<span class="error">* <?php echo $passwordErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputEmail">Email : </label>
							<input type="email" class="form-control col-md-2" id="inputEmail" name="email" placeholder="Email@gmail" maxlength="70" />
							<span class="error">* <?php echo $emailErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputImage">Image User  : </label>
							<span class="error">* <?php echo $image_userErr;?></span><br><br>
							<input type="file"  id="inputImage" name="image_user" />
						</div>
						<div class="form-group">
							<label for="inputRole">Attribuer un Rôle : </label>
							<span class="error">* <?php echo $codeRoleErr;?></span><br><br>
							<select class="form-control" name="code_role">
								<?php foreach ($roles as $role) : ?>
								  <option value="<?php echo $role->code_role ?>"><?php echo $role->lib_role ?></option>
								<?php endforeach; ?>					 
							</select>
							
						</div>
						<div class="form-group">
							<label for="inputPage">Page : </label>
							<span class="error">* <?php echo $pageErr;?></span><br><br>
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
			</div>
	   			<?php require('template/vueFooter.php'); ?>
	    </div>
	   

	</body>
</html>
