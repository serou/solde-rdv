<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
	<body>

		<?php include("view/template/vueMenu.php"); // inclusion du menu principal ?>

		<div class="container-fluid">
			<div class="row">
				
				<?php include "view/template/vueSidebar.php"; ?>

				<?php if(!empty($typeStructures)) {?>
				<div class="col-md-7 col-sm-7 col-sm-offset-2 markers">

					<?php foreach ($typeStructures as $typestructure) : ?>
					<div class="todo">
						<span class="delete" id="<?php echo $typestructure->code_type_structure;?>">
							<a onclick="return confirm('Etes vous Sure ..?');" href="typeStructure.php?code_type_structure=<?php echo $typestructure->code_type_structure;?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $typestructure->code_type_structure;?>">
							<a href="typeStructureUpdate.php?code_type_structure=<?php echo $typestructure->code_type_structure;?>">
								<img src="common/img/modifier.gif" alt="supprimer" />
							</a>
						</span>
						
						<h4 class="titre"><?php echo nl2br(stripslashes($typestructure->lib_type_structure));?></h4>
						<p class="description" id="<?php echo $typestructure->code_type_structure;?>">
							<strong>Nom Type Structure</strong> :<?php echo nl2br(stripslashes($typestructure->lib_type_structure));?>
						</p>  
					</div>
					<?php endforeach; ?>
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

				<?php }else{ ?>

				<div class="col-md-7 col-sm-7 col-sm-offset-2 markers">
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
			</div>
	    <?php require('template/vueFooter.php'); ?>
	    </div>
	    <div id="snackbar">Suppression...</div>
	</body>
</html>
