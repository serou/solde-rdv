<!DOCTYPE html>
<html>
	<?php require('template/vueHeader.php'); ?>

	<body>
		<div class="container-fluid">
			
			<div class="row">
				
				<div class="col-md-6 col-md-offset-3">
					
				<form action="roleUpdate.php?code_role=<?php echo $info->code_role; ?>" method="post">
						<div class="panel-heading"><strong>Modification d'un Rôle</strong></div>
						<div><br></div>
						<div class="form-group">
							<label for="inputlibrole">Nom du role : </label>
							<input type="text" class="form-control col-md-2" id="inputlibrole" name="lib_role" placeholder="Nom Role" value="<?php echo nl2br(stripslashes($info->lib_role)); ?>"/>
							<span class="text-danger"><?php  ?></span>
							<span class="error">* <?php echo $lib_roleErr;?></span><br><br>
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