<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
	<body>

		<?php include("view/template/vueMenu.php"); // inclusion du menu principal ?>

		<div class="container-fluid">
			<div class="row">
				
				<?php include "view/template/vueSidebar.php";  ?>

				<?php if(!empty($formules)) {?>
				<div class="col-md-7 col-sm-7 col-sm-offset-2 markers">
					<?php foreach ($formules as $formule) : ?>
					<div class="todo">
						<span class="delete" id="<?php echo $formule->code_formule;?>">
							<a onclick="return confirm('Etes vous Sure ..?');" href="formule.php?code_formule=<?php echo $formule->code_formule;?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $formule->code_formule;?>">
							<a href="formuleUpdate.php?code_formule=<?php echo $formule->code_formule;?>">
								<img src="common/img/modifier.gif" alt="supprimer" />
							</a>
						</span>
						
						<h4 class="titre"><?php echo nl2br(stripslashes($formule->nom_formule));?></h4>
						<p class="description" id="<?php echo $formule->code_formule;?>">
							<!--<img src="../common/images/marker-map/<?php //echo $category->icone_icon;?>.png" />-->
							<strong>Delai</strong> : <?php echo nl2br(stripslashes($formule->delai));?><strong> Jour(s)</strong><br>
						</p>  
					</div>
					<?php endforeach; ?>
				</div>
				
				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter une Formule</span>
						</button>
					</h4>
					
					<form role="form" id="form" action="formule.php" method="post">
						<div class="form-group">
							<label for="inputNomFormule">Nom formule : </label>
							<input type="text" class="form-control col-md-2" id="inputNomFormule" name="nom_formule" placeholder="Nom Formule"/>
							<span class="error">* <?php echo $nom_formuleErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputDelai">Delai : </label>
							<input type="text" class="form-control col-md-2" id="inputDelai" name="delai" placeholder="Delai"/>
							<span class="error">* <?php echo $delaiErr;?></span><br><br>
						</div>
						
						<div class="form-group"><br></div>
						<div class="form-group">
							<input type="submit" value="Ajouter" />
						</div>
					</form>
				</div>
				<?php }else{ ?>

				<div class="col-md-7 col-sm-7 col-sm-offset-2 markers">
					<a href="formule.php" class="container center">Afficher la liste des Formules</a>
					<br><br><br>
					<p class="text-danger">Veillez saisir les champs du formulaire correctement</p>
				</div>
				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter une Formule</span>
						</button>
					</h4>
					
					<form role="form" id="form" action="formule.php" method="post">
						<div class="form-group">
							<label for="inputNomFormule">Nom formule : </label>
							<input type="text" class="form-control col-md-2" id="inputNomFormule" name="nom_formule" placeholder="Nom Formule"/>
							<span class="error">* <?php echo $nom_formuleErr;?></span><br><br>
						</div>
						<div class="form-group">
							<label for="inputDelai">Delai : </label>
							<input type="text" class="form-control col-md-2" id="inputDelai" name="delai" placeholder="Delai"/>
							<span class="error">* <?php echo $delaiErr;?></span><br><br>
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
