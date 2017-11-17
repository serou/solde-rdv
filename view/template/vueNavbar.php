<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<a class="nav-btn btn-dark btn-lg accordion-toggle pull-left" title="Follow Us" role="tab" id="social-collapse" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"></a>
					<a id="menu-toggle" href="#" class="nav-btn btn-dark btn-lg toggle">
						<i class="fa fa-bars" style="color:#fff;"></i>
					</a>

				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse js-navbar-collapse">
                		<ul class="nav navbar-nav navbar-left">
                			<a class="navbar-brand" href="index.php">
                						<img height="30" width="30" src="common/images/logo.png" class="img-responsive pull-left" alt="Logo solde au rendez-vous">Solde au rendez-vous</a>
                		
                		 <!------------------- Dynamisation ----------------------------->
                		 <?php foreach ($categories as $category) : ?>
                		 
                			<li class="dropdown mega-dropdown <?php echo (isset($_GET['category']) && ($_GET['category'] == $category->lib_categorie_produit)) ? 'active' : ''; ?>">
                    			<a href="index.php?category=<?php echo $category->lib_categorie_produit ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $category->lib_categorie_produit ?> <span class="caret"></span></a>				
                				<ul class="dropdown-menu mega-dropdown-menu">
                					<li class="col-sm-3">
                    					<ul>
                							<li class="dropdown-header">Women Collection</li>                            
                                            <div id="womenCollection" class="carousel slide" data-ride="carousel">
                                              <div class="carousel-inner">
                                                <div class="item active">
                                                    <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                                                    <h4><small>Summer dress floral prints</small></h4>                                        
                                                    <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>       
                                                </div><!-- End Item -->
                                                <div class="item">
                                                    <a href="#"><img src="http://placehold.it/254x150/ff3546/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                                                    <h4><small>Gold sandals with shiny touch</small></h4>                                        
                                                    <button class="btn btn-primary" type="button">9,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>        
                                                </div><!-- End Item -->
                                                <div class="item">
                                                    <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                                                    <h4><small>Denin jacket stamped</small></h4>                                        
                                                    <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>      
                                                </div><!-- End Item -->                                
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
                                            <li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                						</ul>
                					</li>
                					<li class="col-sm-3">
                    					<ul>
                							<li class="dropdown-header">Features</li>
                							<li><a href="#">Auto Carousel</a></li>
                                            <li><a href="#">Carousel Control</a></li>
                                            <li><a href="#">Left & Right Navigation</a></li>
                							<li><a href="#">Four Columns Grid</a></li>
                							<li class="divider"></li>
                							<li class="dropdown-header">Fonts</li>
                                            <li><a href="#">Glyphicon</a></li>
                							<li><a href="#">Google Fonts</a></li>
                						</ul>
                					</li>
                					<li class="col-sm-3">
                						<ul>
                							<li class="dropdown-header">Much more</li>
                                            <li><a href="#">Easy to Customize</a></li>
                							<li><a href="#">Calls to action</a></li>
                							<li><a href="#">Custom Fonts</a></li>
                							<li><a href="#">Slide down on Hover</a></li>                         
                						</ul>
                					</li>
                					<li class="col-sm-3">
                    					<ul>
                							<li class="dropdown-header">Women Collection</li>                            
                                            <div id="womenCollection" class="carousel slide" data-ride="carousel">
                                              <div class="carousel-inner">
                                                <div class="item active">
                                                    <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                                                    <h4><small>Summer dress floral prints</small></h4>                                        
                                                    <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>       
                                                </div><!-- End Item -->
                                                <div class="item">
                                                    <a href="#"><img src="http://placehold.it/254x150/ff3546/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                                                    <h4><small>Gold sandals with shiny touch</small></h4>                                        
                                                    <button class="btn btn-primary" type="button">9,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>        
                                                </div><!-- End Item -->
                                                <div class="item">
                                                    <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                                                    <h4><small>Denin jacket stamped</small></h4>                                        
                                                    <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>      
                                                </div><!-- End Item -->                                
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
                                            <li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                						</ul>
                					</li>
                                    
                				</ul>				
                			</li>
                		<?php endforeach; ?>
 <!------------------- Fin dynamisation ----------------------------->

                		</ul>
                        <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">se connecter</a></li>
                            <li><a href="#">S'inscrire</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Espace promoteur</a></li>
                          </ul>
                        </li>
                        <li><a href="#">Lien ou info</a></li>
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
					<a href="/" title="Go to Top">Home</a>
				</li>
				<li>
					<a href="/about" title="Go to About Us section">About</a>
				</li>
				<li>
					<a href="/resume" title="Navigate to Jonathan Adcox IT Resume">Resume</a>
				</li>
				<li>
					<a href="/portfolio" title="Navigate to 'Our Services' section">Portfolio</a>
				</li>
				<!-- Future Development
				<li>
					<a href="#portfolio">Portfolio</a>
				</li> -->
				<li>
					<a href="/blog" title="Our Blog">Blog</a>
				</li>
				<li>
					<a data-toggle="modal" data-href="#loginModal" data-target="#loginModal" style="cursor:pointer;"> Hosting</a>
				</li>
			</ul>
		</nav>
		<aside id="accordion" class="social text-vertical-center">
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
