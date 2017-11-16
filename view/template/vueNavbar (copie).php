<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header" id="bloc_logo">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img id="logo" src="common/images/logo.png" alt="logo du site" style="width:46px"/><span>solde au rdv</span></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          
          	<?php foreach ($categories as $category) : ?>
          		<li <?php echo (isset($_GET['category']) && ($_GET['category'] == $category->lib_categorie_produit)) ? 'class="active"' : ''; ?>><a href="index.php?category=<?php echo $category->lib_categorie_produit ?>"><?php echo $category->lib_categorie_produit ?></a></li>
			<?php endforeach; ?>
			
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
