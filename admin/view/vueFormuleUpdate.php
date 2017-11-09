<!DOCTYPE html>
<html>
	<?php require('template/vueHeader.php'); ?>

	<body>
		<div class="container-fluid">
			
			<div class="row">
				
				<div class="col-md-6 col-md-offset-3">
					
				<form action="formuleUpdate.php?code_formule=<?php echo $info->code_formule; ?>" method="post">
						<div class="panel-heading"><strong>Modification de la Formule</strong></div>
						<div><br></div>
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