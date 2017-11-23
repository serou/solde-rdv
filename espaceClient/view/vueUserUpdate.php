<!DOCTYPE html>
<html>
	<?php require('template/vueHeader.php'); ?>

	<body>
		<div class="container-fluid">
			
			<div class="row">
				
				<div class="col-md-6 col-md-offset-3">
					
				<form action="userUpdate.php?user_id=<?php echo $info->user_id; ?>" method="post" enctype="multipart/form-data">
						<div class="panel-heading"><strong>Modification de l'utilisateur</strong></div>
						<div><br></div>
						<div class="form-group">
							<label for="inputLogin">Login : </label>
							<input type="text" class="form-control col-md-2" id="inputLogin" name="login" placeholder="Login" value="<?php echo nl2br(stripslashes($info->login)); ?>"/>
							<span class="error">* <?php echo $loginErr;?></span><br><br>
						</div>

						<div class="form-group">
							<label for="inputPasswordAnc">Ancien Password : </label>
							<input type="password" class="form-control col-md-2" id="inputPasswordAnc" name="ancpassword" placeholder="password" value="<?php //echo nl2br(stripslashes($info->password)); ?>"/>
							<span class="error">* <?php echo $ancpasswordErr;?></span><br><br>
						</div>

						<div class="form-group">
							<label for="inputPasswordNvx">Nouveaux Password : </label>
							<input type="password" class="form-control col-md-2" id="inputPasswordNvx" name="nvxpassword" placeholder="password" value=""/>
							<span class="error">* <?php echo $nvxpasswordErr;?></span><br><br>
						</div>

						<div class="form-group">
							<label for="inputPasswordConf">Confirmer Password : </label>
							<input type="password" class="form-control col-md-2" id="inputPasswordConf" name="confpassword" placeholder="password" value=""/>
							<span class="error">* <?php echo $confpasswordErr;?></span><br><br>
						</div>
						
						
						<div class="form-group">
							<label for="inputEmail">Email : </label>
							<input type="email" class="form-control col-md-2" id="inputEmail" name="email" placeholder="Email@gmail" value="<?php echo nl2br(stripslashes($info->email)); ?>"/>
							<span class="error"><?php echo $emailErr; ?></span>
						</div>
						<div class="form-group">
							<label for="inputImage">Image User : </label>
							<span class="error">* <?php echo $image_userErr;?></span><br>
							<img src="../common/images/user-map/<?php echo $info->image_user;?>.jpg" width="90" heigth="90" />
							<input type="file" id="inputImage" name="image_user"/>
						</div>
						<div class="form-group">
							<label for="inputRole">Attribuer un Rôle : </label>
							<select class="form-control" name="code_role">
								<?php foreach($roles as $role): ?>
							  		<option <?php if($role->code_role == $info->code_role) : ?>selected<?php endif; ?> value="<?php echo $role->code_role ?>"><?php echo $role->lib_role ?></option>
								<?php endforeach; ?>					 
							</select>
							<span class="error"><?php echo $codeRoleErr; ?></span>
						</div>
						<div class="form-group">
							<label for="inputPage">Page : </label>
							<span class="error"><?php echo $pageErr; ?></span>
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
			</div>
		</div>
	</body>
</html>