<!DOCTYPE html>
<html>
	<?php require('template/vueHeader.php'); ?>

	<body>
		<div class="container-fluid">
			
			<div class="row">
				
				<div class="col-md-6 col-md-offset-3">
				<form action="typeStructureUpdate.php?code_type_structure=<?php echo $info->code_type_structure;?>" method="post">
					
					<div class="form-group">
						<label for="inputlibTypeStructure">Libellé Type Structure : </label>
						<input type="text" class="form-control col-md-2" id="inputlibTypeStructure" name="lib_type_structure" placeholder="Lib Type Structure" value="<?php echo nl2br(stripslashes($info->lib_type_structure)); ?>" />
						<span class="error">* <?php echo $lib_type_structureErr;?></span><br><br>
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