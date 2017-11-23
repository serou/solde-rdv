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
				<?php //include "view/template/vueSidebar.php"; ?>

				<?php if(!empty($roles)) {?>
				<div class="col-md-7 col-sm-7 col-sm-offset-2 markers">

					<?php foreach ($roles as $role) : ?>
					<div class="todo">
						
						<span class="delete" id="<?php echo $role->code_role;?>">
							<a onclick="return confirm('Etes vous Sure ..?');" href="role.php?code_role=<?php echo $role->code_role;?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $role->code_role;?>">
							<a href="roleUpdate.php?code_role=<?php echo $role->code_role;?>">
								<img src="common/img/modifier.gif" alt="supprimer" />
							</a>
						</span>
						
						<h4 class="titre"><?php echo nl2br(stripslashes($role->lib_role));?></h4>
						<p class="description" id="<?php echo $role->code_role;?>">
							<!--<img src="../common/images/marker-map/<?php //echo $category->icone_icon;?>.png" />-->
							<strong>Date de Creation</strong> :<?php $date_creation=strtotime($role->date_creation);
										echo date('d/m/Y',$date_creation);?><br>
							<strong>User ayant creé</strong> :<?php echo nl2br(stripslashes($role->username));?>
						</p>  
					</div>
					<?php endforeach; ?>
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

				<?php }else{ ?>

				<div class="col-md-7 col-sm-7 col-sm-offset-2 markers">
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
			</div>
	    <?php require('template/vueFooter.php'); ?>
	    </div>
	</body>
</html>
