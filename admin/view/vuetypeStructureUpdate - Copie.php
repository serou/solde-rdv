<!DOCTYPE html>

</head>
<html>
	<?php require('template/vueHeader.php'); ?>

	<body>
		
		<div class="container-fluid">
			
			<div class="row">
				
				<div class="col-md-6 col-md-offset-3">

				  <!-- Modal content -->
				  <div class="modal-content">
				    <div class="modal-header">
				      <span class="close">&times;</span>
				      <h2>Modifier le Type de la Structure</h2>
				    </div>
				    <div class="modal-body">
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
				    <div class="modal-footer">
				      <h3></h3>
				    </div>
				  </div>
				
				</div>

		
			</div>
	
		</div> 

                        
	</body>
</html>

<!-- <!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
  <h2>W3.CSS Modal</h2>
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Open Modal</button>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <p>Some text. Some text. Some text.</p>
        <p>Some text. Some text. Some text.</p>
      </div>
    </div>
  </div>
</div>
            
</body>
</html> -->
