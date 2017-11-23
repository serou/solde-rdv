<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid" style="padding:0px;">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<!--a class="nav-btn btn-dark btn-lg accordion-toggle pull-left" title="Follow Us" role="tab" id="social-collapse" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"></a-->
					<a id="menu-toggle" href="#" class="nav-btn btn-lg toggle">
						<i class="fa fa-bars" style="color:#fff;"></i>
					</a>

				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse js-navbar-collapse">
                		<ul class="nav navbar-nav navbar-left">
                			<a class="navbar-brand" href="index.php" style="padding-right:45px;color:orange">
                						<img height="30" width="30" src="common/images/logo.png" class="img-responsive pull-left" alt="logo">SOLDE AU RENDEZ-VOUS</a>
                		
                		 <!------------------- Dynamisation ----------------------------->
                		 <?php for($i = 0; $i < $catLen; $i++){ ?>
                		 
                			<li class="dropdown mega-dropdown" <?php echo (isset($_GET['category']) && ($_GET['category'] == $infosCat[$i][0]['lib_categorie_produit'])) ? 'style="background-color:rgba(0, 0, 0, 0.1)"' : ''; ?>>
                    			<a href="index.php?category=<?php echo $infosCat[$i][0]['lib_categorie_produit'] ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo strtoupper($infosCat[$i][0]['lib_categorie_produit']) ?> <span class="caret"></span></a>				
                				<ul class="dropdown-menu mega-dropdown-menu">
                					<li class="col-sm-3">
                    					<ul>
                							<li class="dropdown-header">Meilleure Réduction</li>                            
                                            <div id="womenCollection" class="carousel slide" data-ride="carousel">
                                              <div class="carousel-inner">
                                           <?php for($ii = 0; $ii < $elemCatLen[$i]; $ii++){ ?>
                                                <div class="item <?php if($ii === 0){ echo 'active';} ?>">
                                                    <a href="index.php?produit=<?php echo $infosCat[$i][$ii]['code_produit'] ?>&lat=<?php echo $infosCat[$i][$ii]['latitude'] ?>&lng=<?php echo $infosCat[$i][$ii]['longitude'] ?>"><img src="<?php echo 'common/images/'.$infosCat[$i][$ii]['image_produit'] ?>" class="img-responsive" alt="<?php echo 'product ' . ($ii + 1); ?>"></a>	
                                                    <h4><small><?php echo $infosCat[$i][$ii]['description'] ?></small></h4>                                        
                                                    <button class="btn btn-primary" type="button"><?php echo ($infosCat[$i][$ii]['prix_initial'] - ($infosCat[$i][$ii]['prix_initial'] * $infosCat[$i][$ii]['reduction'] / 100)) .' F'?></button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span>jusqu'au <?php echo $infosCat[$i][$ii]['date_fin_promo'] ?></button>       
                                                </div><!-- End Item -->
                                           <?php } ?>
                                              </div><!-- End Carousel Inner -->
                                              <!-- Controls -->
                                              <a class="left carousel-control" href="#womenCollection" role="button" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                              </a>
                                              <a class="right carousel-control" href="#womenCollection" role="button" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                              </a>
                                            </div><!-- /.carousel -->
                                            <li class="divider"></li>
                                            <li><a href="index.php?category=<?php echo $infosCat[$i][0]['lib_categorie_produit'] ?>">Voir tous les produits de la categorie<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                						</ul>
                					</li>
                					<li class="col-sm-3">
                    					<ul>
                							<li class="dropdown-header">Produits</li>
                						<?php for($ii = 0; $ii < $elemCatLen[$i]; $ii++){ ?>
                							<li><a href="index.php?produit=<?php echo $infosCat[$i][$ii]['code_produit'] ?>&lat=<?php echo $infosCat[$i][$ii]['latitude'] ?>&lng=<?php echo $infosCat[$i][$ii]['longitude'] ?>"><?php echo $infosCat[$i][$ii]['lib_produit']. ' -' .$infosCat[$i][$ii]['reduction']. '%' ?></a></li>
                						<?php } ?>	
                						</ul>
                					</li>
                					<li class="col-sm-3">
                						<ul>
                							<li class="dropdown-header">Structures</li>
                                        <?php for($ii = 0; $ii < $elemCatLen[$i]; $ii++){ ?>
                							<li><a href="#"><?php echo $infosCat[$i][$ii]['nom_structure'] ?></a></li>
                						<?php } ?>	
                						</ul>
                					</li>
                					<li class="col-sm-3">
                    					<ul>
                							<li class="dropdown-header">Women Collection</li>                            
                                            <div id="womenCollection" class="carousel slide" data-ride="carousel">
                                              <div class="carousel-inner">
                                                <div class="item active">
                                                    <a href="#"><img src="common/images/produit3.jpg" class="img-responsive" alt="product 1"></a>
                                                        
                                                </div><!-- End Item -->
                                                                       
                                              </div><!-- End Carousel Inner -->
                                              
                                            </div><!-- /.carousel -->
                                            <li class="divider"></li>
                                            
                						</ul>
                					</li>
                                    
                				</ul>				
                			</li>
                		<?php } ?>
 <!------------------- Fin dynamisation ----------------------------->

                		</ul>
                        <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <!--li><a href="#">se connecter</a></li>
                            <li><a href="#">S'inscrire</a></li>
                            <li class="divider"></li-->
                            <li><a href="admin/index.php" target = "_blank">Espace promoteur</a></li>
                          </ul>
                        </li>
                        <li><a href="#" style="visibility:hidden;padding-right:60px"></a></li>
                      </ul>
                	</div><!-- /.nav-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		<nav id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<a id="menu-close" href="#" class="btn btn-danger pull-right hidden-md hidden-lg toggle"><i class="fa fa-times"></i></a>
				<li class="sidebar-brand">
					<a href="#top">Soldier-up <strong>Designs</strong></a>
				</li>
				<li>
					<a href="index.php" title="Page d'accueil">Accueil</a>
				</li>
				<li>
					<a href="admin/index.php" target = "_blank" title="Allez à la section administration">Espace promoteur</a>
				</li>
				<li>
					<a href="/resume" title="Devenir partenaire">Devenir promoteur</a>
				</li>
				<li>
					<a href="/portfolio" title="Navigate to 'Our Services' section">Portfolio</a>
				</li>
				<!-- Future Development
				<li>
					<a href="#portfolio">Portfolio</a>
				</li> -->
				<li>
					<a href="/blog" title="Our Blog">Devenir promoteur</a>
				</li>
				<li>
					<a data-toggle="modal" data-href="#loginModal" data-target="#loginModal" style="cursor:pointer;"> A propos</a>
				</li>
			</ul>
		</nav>
		<aside id="accordion" class="social text-vertical-center">  <!-- style="visibility:hidden;" -->
			<div class="accordion-social">
				<ul class="panel-collapse collapse in nav nav-stacked" role="tabpanel" aria-labelledby="social-collapse" id="collapseOne">
					<li><a href="https://www.facebook.com/soldeauredevous" target="_blank"><i class="fa fa-lg fa-facebook"></i></a></li>
					<li><a href="https://twitter.com/soldeauredevous" target="_blank"><i class="fa fa-lg fa-twitter"></i></a></li>
					<!--li><a href="https://www.plus.google.com/+soldieauredevous" target="_blank"><i class="fa fa-lg fa-google-plus"></i></a></li>
					<li><a href="https://github.com/soldeauredevous" target="_blank"><i class="fa fa-lg fa-github"></i></a></li>
					<li><a href="https://linkedin.com/in/soldeauredevous" target="_blank"><i class="fa fa-lg fa-linkedin"></i></a></li>
					<li><a href="skype:live:soldierupdesigns?call"><i class="fa fa-lg fa-skype" target="_blank"></i></a></li>
					<li><a href="http://stackexchange.com/users/4992378/blayderunner123" target="_blank"><i class="fa fa-lg fa-stack-exchange"></i></a></li-->
				</ul>
			</div>
		</aside>
