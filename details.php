	<?php

	include("includes/db.php");
	include("functions/functions.php");
	?>



	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Product Details | K-shop</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/prettyPhoto.css" rel="stylesheet">
		<link href="css/price-range.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
	    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
	    <![endif]-->       
	    
	</head><!--/head-->

	<body>
		<header id="header"><!--header-->
			<div class="header_top"><!--header_top-->
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="contactinfo">
								<ul class="nav nav-pills">
									<li><a href="#"><i class="fa fa-phone"></i> +2349039933771 </a></li>
									<li><a href="#"><i class="fa fa-envelope"></i> kingstonfortune@gmail.com</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="social-icons pull-right">
								<ul class="nav navbar-nav">
<li><a href="http://www.fb.com/kingston.fortune2"><i class="fa fa-facebook"></i></a></li>
								<li><a href="http://www.twitter.com/@chun__king"><i class="fa fa-twitter"></i></a></li>
								<li><a href="http://www.linkedin.com/kingstonfortune"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="http://www.dribbble.com/kingstonfortune"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="http://plus.google.com/kingstonfortune"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div><!--/header_top-->
			
			<div class="header-middle"><!--header-middle-->
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<div class="logo pull-left">
								<a href="index.php"><img src="images/home/logo1.png" alt="" /></a>
							</div>
							
						</div>
						<div class="col-sm-8">
							<div class="shop-menu pull-right">
								<ul class="nav navbar-nav">
									
									<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
									<li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div><!--/header-middle-->
			
			<div class="header-bottom"><!--header-bottom-->
				<div class="container">
					<div class="row">
						<div class="col-sm-9">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="mainmenu pull-left">
								<ul class="nav navbar-nav collapse navbar-collapse">
									<li><a href="index.php" class="active">Home</a></li>
									<li><a href="all_products.php">All Products</a></li>
									<li><a href="Products.html">My Account</a></li>
									<li><a href="Products.html">Shopping Cart</a></li>
									<li><a href="contact.php">Contact Us</a></li>
								</ul>
							</div>
						</div>
						<!--Search Box starts-->
						<div>
							
							<form method="get" action="results.php" enctype="multipart/form-data">
								<input type="text" name="user_query" placeholder="Search a Product"/>
								<input type="submit" name="search" value="Search"/>
							</form>
							
						</div>
						<!--Search Box ends-->
					</div>
				</div>
			</div><!--/header-bottom-->
		</header><!--/header-->
	
		
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="left-sidebar">
							<h2>Categories</h2>
							<div class="panel-group category-products" id="accordian"><!--category-products start-->
								<div class="category-tab ul li ">
									<ul class="nav nav-pills nav-stacked" id="categories">
										<?php getCategories(); ?>
									</ul>
								</div>
								
							</div><!--/category-products ends-->
							
							<div class="brands_products"><!--brands_products start-->
								<h2>Brands</h2>
								<div class="category-tab ul li ">
									<ul class="nav nav-pills nav-stacked" id="brands">
										<?php getBrands(); 
										
										?>
									</ul>
								</div>
							</div><!--/brands_products Ends-->
							
							
							
							<div class="shipping text-center"><!--shipping stars-->
								<img src="images/home/shipping.jpg" alt="" />
							</div><!--/shipping  Ends-->
							
						</div>
					</div>
					
					<div class="col-sm-9 padding-right">
						<div class="features_items"  id="products_box"><!--features_items start-->
							<h2 class="title text-center">Item Info</h2>
							
							<?php 
							if(isset($_GET['pro_id']))
							{
								$product_id =$_GET['pro_id'];
											$get_products = "select * from products where product_id='$product_id'"; //this product id
											$run_products = mysqli_query($db, $get_products);
											
											while($row_products= mysqli_fetch_array($run_products))
											{
												$pro_id = $row_products['product_id'];
												$pro_title = $row_products['product_title'];
												$pro_cat = $row_products['cat_id'];
												$pro_brand = $row_products['brand_id'];
												$pro_desc = $row_products['product_desc'];
												$pro_price = $row_products['product_price'];
												$pro_image1 = $row_products['product_img1'];
												$pro_image2 = $row_products['product_img2'];
												$pro_image3 = $row_products['product_img3'];
												
												echo "
												<div id='single_product'>
												<h3>$pro_title</h3>
												
												<img src='admin_area/product_images/$pro_image1' width='180' height='180'/>
												<img src='admin_area/product_images/$pro_image2' width='220' height='220'/>
												<img src='admin_area/product_images/$pro_image3' width='260' height='260'/><br>
												<p><b>Price: #$pro_price</b></p>
												<p>$pro_desc</p>
												<a href='index.php?pro_id=$pro_id' style='float:left;'>Back</a>
												<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
												
												</div>	
												
												";
											}//while
										}//if	
										
										
										
										
										?>
										
										
									</div><!--features_items Ends-->
									

								</div><!--/category-tab-->
								
								
								
							</div>
						</div>
					</div>
				</section>
				
				<footer id="footer"><!--Footer-->
					<div class="footer-top">
						<div class="container">
							<div class="row">
								<div class="col-sm-2">
									<div class="companyinfo">
										<h3><span>K</span>-shop</h3>
										<p>We provide the very best of consumer products all around the globe.</p>
									</div>
								</div>
								<div class="col-sm-7">
									<div class="col-sm-3">
										<div class="video-gallery text-center">
											<a href="#">
												<div class="iframe-img">
													<img src="images/home/iframe1.png" alt="" />
												</div>
												<div class="overlay-icon">
													<i class="fa fa-play-circle-o"></i>
												</div>
											</a>
											<p>Cliffs Of Moher</p>
											<h2>24 April 2015</h2>
										</div>
									</div>
									
									<div class="col-sm-3">
										<div class="video-gallery text-center">
											<a href="#">
												<div class="iframe-img">
													<img src="images/home/iframe2.png" alt="" />
												</div>
												<div class="overlay-icon">
													<i class="fa fa-play-circle-o"></i>
												</div>
											</a>
											<p>St Patrick's Day</p>
											<h2>17 March 2015</h2>
										</div>
									</div>
									
									<div class="col-sm-3">
										<div class="video-gallery text-center">
											<a href="#">
												<div class="iframe-img">
													<img src="images/home/iframe3.png" alt="" />
												</div>
												<div class="overlay-icon">
													<i class="fa fa-play-circle-o"></i>
												</div>
											</a>
											<p>Map Of Nigeria</p>
											<h2>24 DEC 2015</h2>
										</div>
									</div>
									
									<div class="col-sm-3">
										<div class="video-gallery text-center">
											<a href="#">
												<div class="iframe-img">
													<img src="images/home/iframe4.png" alt="" />
												</div>
												<div class="overlay-icon">
													<i class="fa fa-play-circle-o"></i>
												</div>
											</a>
											<p>Fupre Campus</p>
											<h2>24 May 2015</h2>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="address">
										<img src="images/home/map.png" alt="" />
										<p>K-Shop, A Product of Fortune King - Fupre, Nigeria</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
					
					<div class="footer-bottom">
						<div class="container">
							<div class="row">
								<p class="pull-left">Copyright © 2015 K-Shop Inc. All rights reserved.</p>
								<p class="pull-right">Designed by <span><a target="_blank">King Fortune</a></span></p>
							</div>
						</div>
					</div>
					
				</footer><!--/Footer-->
				

				
				<script src="js/jquery.js"></script>
				<script src="js/bootstrap.min.js"></script>
				<script src="js/jquery.scrollUp.min.js"></script>
				<script src="js/price-range.js"></script>
				<script src="js/jquery.prettyPhoto.js"></script>
				<script src="js/main.js"></script>
			</body>
			</html>