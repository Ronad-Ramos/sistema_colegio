﻿<?php  session_start(); 

include "controles/code=conexion.php";

if (isset($_SESSION['usuario=cole'])) {
    
    $detallesU = $conexion->prepare("SELECT * FROM usuarios WHERE USUARIO=:user");
    $detallesU -> bindParam(':user', $_SESSION["usuario=cole"], PDO::PARAM_STR);
    $detallesU->execute();

    $info = $detallesU->fetch(PDO::FETCH_ASSOC);

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <title>EduLearn - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="assets/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/skin_color.css">
     
  </head>

<body class="theme-primary">
	
	<!-- The social media icon bar -->
	<div class="icon-bar-sticky">
	  <a href="#" class="waves-effect waves-light btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
	  <a href="#" class="waves-effect waves-light btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
	  <a href="#" class="waves-effect waves-light btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
	  <a href="#" class="waves-effect waves-light btn btn-social-icon btn-youtube"><i class="fa fa-youtube-play"></i></a>
	</div>
	<header class="top-bar">
		<div class="topbar">

		  <div class="container">
			<div class="row justify-content-end">
			  <div class="col-lg-6 col-12 d-lg-block d-none">
				<div class="topbar-social text-center text-md-start topbar-left">
				  <ul class="list-inline d-md-flex d-inline-block">
					<li class="ms-10 pe-10"><a href="#"><i class="text-white fa fa-question-circle"></i> Ask a Question</a></li>
					<li class="ms-10 pe-10"><a href="#"><i class="text-white fa fa-envelope"></i> info@EduLearn.com</a></li>
					<li class="ms-10 pe-10"><a href="#"><i class="text-white fa fa-phone"></i> +(1) 123-878-1649</a></li>
				  </ul>
				</div>
			  </div>
			  <div class="col-lg-6 col-12 xs-mb-10">
				<div class="topbar-call text-center text-lg-end topbar-right">
				  <ul class="list-inline d-lg-flex justify-content-end">				  
					 <li class="me-10 ps-10 lng-drop">
					  	<select class="header-lang-bx selectpicker">
							<option>USD</option>
							<option>EUR</option>
							<option>GBP</option>
							<option>INR</option>
						</select>
					 </li>
					 <li class="me-10 ps-10 lng-drop">
					  	<select class="header-lang-bx selectpicker">
							<option data-icon="flag-icon flag-icon-us">Eng USA</option>
							<option data-icon="flag-icon flag-icon-gb">Eng UK</option>
						</select>
					 </li>
					 <li class="me-10 ps-10"><a href="#"><i class="text-white fa fa-user d-md-inline-block d-none"></i> Register</a></li>
					 <li class="me-10 ps-10"><a href="#"><i class="text-white fa fa-sign-in d-md-inline-block d-none"></i> Login</a></li>
					 <li class="me-10 ps-10"><a href="#"><i class="text-white fa fa-dashboard d-md-inline-block d-none"></i> My Account</a></li>
				  </ul>
				</div>
			  </div>
			 </div>
		  </div>
		</div>

		<nav hidden class="nav-white nav-transparent">
			<div class="nav-header">
				<a href="index.html" class="brand">
					<img src="../../images/logo-light-text5.png" alt=""/>
				</a>
				<button class="toggle-bar">
					<span class="ti-menu"></span>
				</button>	
			</div>								
			<ul class="menu">	
				<li class="dropdown">
					<a href="#">Home</a>
					<ul class="dropdown-menu">
						<li><a href="index.html">Home 1</a></li>
						<li><a href="index2.html">Home 2</a></li>
						<li><a href="index3.html">Home 3</a></li>
						<li><a href="index4.html">Home 4</a></li>
						<li><a href="index5.html">Home 5</a></li>
						<li><a href="index6.html">Home 6</a></li>
					</ul>
				</li>				
				<li>
					<a href="about.html">About</a>
				</li>				
				<li class="dropdown">
					<a href="#">Courses</a>
					<ul class="dropdown-menu">
						<li><a href="courses_list.html">Courses List</a></li>
						<li><a href="courses_list_right_sidebar.html">Courses List Right Sidebar</a></li>
						<li><a href="courses_list-map.html">Courses with Map</a></li>
						<li><a href="courses_categories.html">Courses Categories</a></li>
						<li><a href="courses_details.html">Courses Details</a></li>
						<li><a href="courses_details_right_sidebar.html">Courses Details right sidebar</a></li>
					</ul>
				</li>
				<li class="megamenu">
					<a href="#">Pages</a>
					<div class="megamenu-content">
						<div class="row">
							<div class="col-lg-3 col-12">
								<ul class="list-group">
									<li><h4 class="menu-title">User Pages</h4></li>
									<li><a href="faqs.html"><i class="ti-arrow-circle-right me-10"></i>FAQs</a></li>
									<li><a href="inovice.html"><i class="ti-arrow-circle-right me-10"></i>Invoice</a></li>
									<li><a href="membership.html"><i class="ti-arrow-circle-right me-10"></i>Membership</a></li>
									<li><a href="mydashboard.html"><i class="ti-arrow-circle-right me-10"></i>My Dashboard</a></li>
									<li><a href="staff.html"><i class="ti-arrow-circle-right me-10"></i>Staff</a></li>
									<li><a href="testimonial.html"><i class="ti-arrow-circle-right me-10"></i>Testimonial</a></li>
									<li><a href="typography.html"><i class="ti-arrow-circle-right me-10"></i>Typography</a></li>
									<li><a href="user_list.html"><i class="ti-arrow-circle-right me-10"></i>User List</a></li>
									<li><a href="userprofile.html"><i class="ti-arrow-circle-right me-10"></i>User Profile</a></li>
									<li><a href="about.html"><i class="ti-arrow-circle-right me-10"></i>About</a></li>
									<li><a href="contact_us.html"><i class="ti-arrow-circle-right me-10"></i>Contact</a></li>
								</ul>
							</div>
							<div class="col-lg-3 col-12">
								<ul class="list-group">
									<li><h4 class="menu-title">Widgets</h4></li>
									<li><a href="widgets.html"><i class="ti-arrow-circle-right me-10"></i>Widgets</a></li>
									<li><a href="courses_list.html"><i class="ti-arrow-circle-right me-10"></i>Courses List</a></li>									
									<li><a href="courses_details.html"><i class="ti-arrow-circle-right me-10"></i>Courses Details</a></li>
									<li><a href="register.html"><i class="ti-arrow-circle-right me-10"></i>Register</a></li>
									<li><a href="login.html"><i class="ti-arrow-circle-right me-10"></i>Login</a></li>
									<li><a href="register_login.html"><i class="ti-arrow-circle-right me-10"></i>Register & Login</a></li>
									<li><a href="forgot_pass.html"><i class="ti-arrow-circle-right me-10"></i>Forgot Password</a></li>
									<li><a href="lockscreen.html"><i class="ti-arrow-circle-right me-10"></i>Lock Screen</a></li>
									<li><a href="maintenance.html"><i class="ti-arrow-circle-right me-10"></i>Under Constructions</a></li>
									<li><a href="404.html"><i class="ti-arrow-circle-right me-10"></i>404</a></li>
									<li><a href="500.html"><i class="ti-arrow-circle-right me-10"></i>500</a></li>
								</ul>
							</div>
							<div class="col-lg-3 col-12">
								<ul class="list-group">
									<li><h4 class="menu-title">Features</h4></li>
									<li><a href="header_default.html"><i class="ti-arrow-circle-right me-10"></i>Header One</a></li>
									<li><a href="header_style2.html"><i class="ti-arrow-circle-right me-10"></i>Header Two</a></li>
									<li><a href="header_style3.html"><i class="ti-arrow-circle-right me-10"></i>Header Three</a></li>
									<li><a href="header_style4.html"><i class="ti-arrow-circle-right me-10"></i>Header Four</a></li>
									<li><a href="header_style5.html"><i class="ti-arrow-circle-right me-10"></i>Header Five</a></li> 
									<li><a href="footer_style1.html"><i class="ti-arrow-circle-right me-10"></i>Footer One</a></li>
									<li><a href="footer_style2.html"><i class="ti-arrow-circle-right me-10"></i>Footer Two</a></li>
									<li><a href="footer_style3.html"><i class="ti-arrow-circle-right me-10"></i>Footer Three</a></li>
									<li><a href="footer_style4.html"><i class="ti-arrow-circle-right me-10"></i>Footer Four</a></li>
									<li><a href="footer_style5.html"><i class="ti-arrow-circle-right me-10"></i>Footer Five</a></li>
									<li><a href="footer_style6.html"><i class="ti-arrow-circle-right me-10"></i>Footer Six</a></li>
								</ul>
							</div>
							<div class="col-md-3 col-12 d-none d-lg-block">
								<img src="assets/images/front-end-img/adv.jpg" class="img-fluid" alt="" />
							</div>
						</div>
					</div>
				</li>				
				<li class="dropdown">
					<a href="#">Blog</a>
					<ul class="dropdown-menu">
						<li class="dropdown">
							<a href="#">Grid Blog</a>
							<ul class="dropdown-menu">
								<li><a href="blog_grid_2.html">Grid 2 colunm</a></li>
								<li><a href="blog_grid_3.html">Grid 3 colunm</a></li>
								<li><a href="blog_grid_left_sidebar.html">blog left sidebar</a></li>
								<li><a href="blog_grid_right_sidebar.html">blog right sidebar</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#">List Blog</a>
							<ul class="dropdown-menu">
								<li><a href="blog_list.html">Blog List</a></li>
								<li><a href="blog_list_left_sidebar.html">Blog List Left Sidebar</a></li>
								<li><a href="blog_list_right_sidebar.html">Blog List right Sidebar</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#">Single Blog Post</a>
							<ul class="dropdown-menu">
								<li><a href="blog_single_grid_post.html">Single Grid Post</a></li>
								<li><a href="blog_single_html5video_post.html">Single html5 Video-post</a></li>
								<li><a href="blog_single_image_post.html">Single Image Post</a></li>
								<li><a href="blog_single_slider_post.html">Single Slider Post</a></li>
								<li><a href="blog_single_soundcloud_post.html">Single SoundCloud Post</a></li>
								<li><a href="blog_single_vimeo_post.html">Single Vimeo Post</a></li>
								<li><a href="blog_single_post.html">Single without image post</a></li>
								<li><a href="blog_single_youtube_post.html">Single Youtube Post</a></li>
							</ul>
						</li>
					</ul>
				</li>		
				<li class="dropdown">
					<a href="#">Shop</a>
					<ul class="dropdown-menu">
						<li><a href="shop.html">Shop Grid</a></li>
						<li><a href="shop-cart.html">Shop Cart</a></li>
						<li><a href="shop-checkout.html">Shop Checkout</a></li>
						<li><a href="shop-details.html">Shop Details</a></li>
						<li><a href="shop-orders.html">Shop Orders</a></li>
					</ul>
				</li>
				<li>
					<a href="contact_us.html">Contact</a>
				</li>
			</ul>
			<ul class="attributes">
				<li class="d-md-block d-none"><a href="#" class="px-10 pt-15 pb-10"><div class="btn btn-primary py-5">Enroll Now</div></a></li>
				<li><a href="#" class="toggle-search-fullscreen"><span class="ti-search"></span></a></li>
				<li class="megamenu" data-width="270">
					<a href="#"><span class="ti-shopping-cart"></span></a>
					<div class="megamenu-content megamenu-cart">
						<!-- Start Shopping Cart -->
						<div class="cart-header">
							<div class="total-price">
								Total:  <span>$2,432.93</span>
							</div>
							<i class="ti-shopping-cart"></i> 
							<span class="badge">3</span>
						</div>
						<div class="cart-body">
							<ul>
								<li>
									<img src="assets/images/front-end-img/product/product-1.png" alt="">
									<h5 class="title">Lorem ipsum dolor</h5>
									<span class="qty">Quantity: 02</span>
									<span class="price-st">$843,12</span>
									<a href="#" class="link"></a>
								</li>
								<li>
									<img src="assets/images/front-end-img/product/product-2.png" alt="">
									<h5 class="title">Lorem ipsum dolor</h5>
									<span class="qty">Quantity: 02</span>
									<span class="price-st">$843,12</span>
									<a href="#" class="link"></a>
								</li>
								<li>
									<img src="assets/images/front-end-img/product/product-3.png" alt="">
									<h5 class="title">Lorem ipsum dolor</h5>
									<span class="qty">Quantity: 02</span>
									<span class="price-st">$843,12</span>
									<a href="#" class="link"></a>
								</li>
							</ul>
						</div>
						<div class="cart-footer">
							<a href="#">Checkout</a>
						</div>
						<!-- End Shopping Cart -->
					</div>
				</li>
			</ul>

			<div class="wrap-search-fullscreen">
				<div class="container">
					<button class="close-search"><span class="ti-close"></span></button>
					<input type="text" placeholder="Search..." />
				</div>
			</div>
		</nav>
	</header>
	
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(assets/images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">Courses Details</h2>
						<ol class="breadcrumb bg-transparent justify-content-center">
							<li class="breadcrumb-item"><a href="#" class="text-white-50"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">Courses Details</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->
	
	<section class="py-50">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-md-7 col-12">
					<div class="box">
					  <img class="box-img-top btrr-5 btlr-5" src="assets/images/front-end-img/courses/4f.jpg" alt="Card image cap">
					  <div class="box-body">
						<h3 class="box-title">Maecenas sodales lacus vitae tellus facilisis vehicula.</h3>
						<div class="cour-stac d-lg-flex align-items-center text-fade">
							  <div class="d-flex align-items-center">
								  <p>Start Date 4th Nov..</p>
								  <p class="lt-sp">|</p>
								  <p>Johen doe</p>
								  <p class="lt-sp">|</p>
							  </div>
							  <div class="d-flex align-items-center">
								  <p><i class="fa fa-calendar text-muted me-5"></i> 60 hours</p>
								  <p class="lt-sp">|</p>
								  <p><i class="fa fa-user text-muted me-5"></i> 154 Join</p>
								  <p class="lt-sp">|</p>
							  </div>
							  <div class="d-flex align-items-center">
								  <p>English, Spanish</p>
								  <p class="lt-sp">|</p>
								  <span class="badge badge-success">Online</span>
							  </div>
						</div>
						<div class="d-lg-flex align-items-center mt-15">
							<div class="d-flex align-items-center"> 
								<span>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star-half text-warning"></i>
									<span class="text-muted ms-2">458 reviews</span>
								</span> 
								<div class="d-flex align-items-center ms-35">  
									<i class="fa fa-heart text-danger me-5"></i> 781 
								</div>
							</div> 
						</div>						
					  </div>
					</div>
					<div class="box">
					  <div class="box-body">
						<h4 class="box-title mb-0 fw-500">Description</h4>	
						<hr>
						<p class="fs-16 mb-30">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>	
						  
						<div class="row">
							<div class="col-md-12 col-lg-6">
								<h4 class="box-title mb-0 fw-500">Course Curriculum</h4>
								<hr>
								<ul class="list list-mark">
									<li> Sed rutrum eros et metus imperdiet faucibus.</li>
									<li> Pellentesque id est sed lacus tempor consectetur sed iaculis ex.</li>
									<li> Phasellus venenatis ex id cursus blandit.</li>
									<li> Sed iaculis neque quis enim gravida, in mollis est maximus.</li>
									<li> Ut tempus nibh eu ligula fringilla, nec consequat sem fermentum.</li>
									<li> Aliquam malesuada lectus non ante pharetra mollis.</li>
									<li> Nullam eu nibh vel turpis mattis maximus at id massa.</li>
								</ul>
								<hr>
								<h4 class="box-title mb-0 fw-500">Certification</h4>
								<p class="fs-16 mb-30">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s.</p>
							</div>
							<div class="col-md-12 col-lg-6">
								<ul class="course-overview list-unstyled b-1 bg-gray-100">
									<li><i class="ti-calendar"></i> <span class="tag">Start Date </span> <span class="value">4-Nov-2020</span></li>
									<li><i class="fa fa-language"></i> <span class="tag">Language </span> <span class="value">English, Spanish</span></li>
									<li><i class="ti-book"></i> <span class="tag">Sessions </span> <span class="value">10</span></li>
									<li><i class="ti-help-alt"></i> <span class="tag">Exam</span> <span class="value">2</span></li>
									<li><i class="ti-time"></i> <span class="tag">Duration</span> <span class="value">60 hours</span></li>
									<li><i class="ti-stats-up"></i> <span class="tag">Level</span> <span class="value">Beginner</span></li>
									<li><i class="ti-smallcap"></i> <span class="tag">Language</span> <span class="value">English</span></li>
									<li><i class="ti-user"></i> <span class="tag">Students</span> <span class="value">15</span></li>
									<li><i class="ti-check-box"></i> <span class="tag">Assessments</span> <span class="value">Yes</span></li>
								</ul>
							</div>
						</div>  
					  </div>
					</div>
					<div class="box">
					  <div class="box-body">
						<h4 class="box-title mb-0 fw-500">Curriculum Details</h4>	
						<hr>
						<ul class="course-curriculum">
							<li>
								<h5 class="text-primary fw-500">Module 1: Think</h5>
								<ul class="list-unstyled">
									<li>
										<div class="list-bx">
											<span>Lesson 1.</span> Quisque sit amet nisi non lacus tempor lacinia.
										</div>
										<span>120 minutes</span>
									</li>
									<li>
										<div class="list-bx">
											<span>Lesson 2.</span> Sed eget arcu a nibh malesuada vulputate at non tortor.
										</div>
										<span>90 minutes</span>
									</li>
									<li>
										<div class="list-bx">
											<span>Lesson 3.</span> Phasellus in nulla non mi eleifend interdum.
										</div>
										<span>90 minutes</span>
									</li>
								</ul>
							</li>
							<li>
								<h5 class="text-primary fw-500">Module 2 : Feel</h5>
								<ul class="list-unstyled">
									<li>
										<div class="list-bx">
											<span>Lesson 1.</span> Nunc placerat nunc et justo ullamcorper molestie.
										</div>
										<span>120 minutes</span>
									</li>
									<li>
										<div class="list-bx">
											<span>Lesson 2.</span> Sed et dolor varius, scelerisque felis sed, faucibus ipsum.
										</div>
										<span>80 minutes</span>
									</li>
									<li>
										<div class="list-bx">
											<span>Lesson 3.</span> Maecenas id est vitae sapien pretium interdum quis nec ex.
										</div>
										<span>80 minutes</span>
									</li>
								</ul>
							</li>
							<li>
								<h5 class="text-primary fw-500">Module 3 : Do</h5>
								<ul class="list-unstyled">
									<li>
										<div class="clist-bx">
											<span>Part 1.</span> Final Test
										</div>
										<span>180 minutes</span>
									</li>
									<li>
										<div class="list-bx">
											<span>Part 2.</span> Online Test
										</div>
										<span>180 minutes</span>
									</li>
								</ul>
							</li>
						</ul>
					  </div>
					</div>
					<h4 class="page-title mb-25 fw-500">Faculty</h4>	
					<div class="box">
					  <div class="box-body">
						  <div class="staff-bx">
							  <div class="d-flex align-items-center">
								  <div class="staff-pic">
									  <img src="assets/images/front-end-img/avatar/1.jpg" class="bg-primary-light rounded w-50" alt="" >
								  </div>
								  <div class="staff-dis ms-15">
									  <h5 class="mb-5">Johen Doe</h5>
									  <p class="mb-0">Faculty</p>
								  </div>
							  </div>
							  <p class="mb-15 mt-20">
							  	It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.
							  </p>
							  <div class="d-flex gap-items-1">
								<button class="waves-effect waves-circle btn btn-social-icon btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></button>
								<button class="waves-effect waves-circle btn btn-social-icon btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></button>
								<button class="waves-effect waves-circle btn btn-social-icon btn-xs btn-circle btn-linkedin"><i class="fa fa-linkedin"></i></button>
							  </div>
						  </div>
					  </div>
					</div>
					<div class="box">
					  <div class="box-body">
						  <div class="staff-bx">
							  <div class="d-flex align-items-center">
								  <div class="staff-pic">
									  <img src="assets/images/front-end-img/avatar/2.jpg" class="bg-primary-light rounded w-50" alt="" >
								  </div>
								  <div class="staff-dis ms-15">
									  <h5 class="mb-5">Maical Doe</h5>
									  <p class="mb-0">Co-Faculty</p>
								  </div>
							  </div>
							  <p class="mb-15 mt-20">
							  	It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.
							  </p>
							  <div class="d-flex gap-items-1">
								<button class="waves-effect waves-circle btn btn-social-icon btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></button>
								<button class="waves-effect waves-circle btn btn-social-icon btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></button>
								<button class="waves-effect waves-circle btn btn-social-icon btn-xs btn-circle btn-linkedin"><i class="fa fa-linkedin"></i></button>
							  </div>
						  </div>						  
					  </div>
					</div>
					
					<h4 class="page-title mb-25 fw-500">Reviews</h4>	
					<div class="box">
						<div class="box-body">
							<div class="d-lg-flex justify-content-start align-items-center">
								<div class="ratingbar w-p100 px-0 pe-lg-30">
									<div class="d-flex align-items-center justify-content-between">
										<div class="w-100">											
											<ul class="cours-star">
												<li class="active"><i class="fa fa-star"></i></li>
												<li class="active"><i class="fa fa-star"></i></li>
												<li class="active"><i class="fa fa-star"></i></li>
												<li class="active"><i class="fa fa-star"></i></li>
												<li class="active"><i class="fa fa-star"></i></li>
											</ul>
										</div>
										<div class="w-p70">
											<div class="progress mb-0">
												<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
												</div>
										    </div>
										</div>
										<div>
											<div>350</div>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between">
										<div class="w-100">											
											<ul class="cours-star">
												<li class="active"><i class="fa fa-star"></i></li>
												<li class="active"><i class="fa fa-star"></i></li>
												<li class="active"><i class="fa fa-star"></i></li>
												<li class="active"><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
											</ul>
										</div>
										<div class="w-p70">
											<div class="progress mb-0">
												<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
												</div>
										    </div>
										</div>
										<div>
											<div>250</div>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between">
										<div class="w-100">											
											<ul class="cours-star">
												<li class="active"><i class="fa fa-star"></i></li>
												<li class="active"><i class="fa fa-star"></i></li>
												<li class="active"><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
											</ul>
										</div>
										<div class="w-p70">
											<div class="progress mb-0">
												<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
												</div>
										    </div>
										</div>
										<div>
											<div>100</div>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between">
										<div class="w-100">											
											<ul class="cours-star">
												<li class="active"><i class="fa fa-star"></i></li>
												<li class="active"><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
											</ul>
										</div>
										<div class="w-p70">
											<div class="progress mb-0">
												<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
												</div>
										    </div>
										</div>
										<div>
											<div>070</div>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between">
										<div class="w-100">											
											<ul class="cours-star">
												<li class="active"><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
											</ul>
										</div>
										<div class="w-p70">
											<div class="progress mb-0">
												<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
												</div>
										    </div>
										</div>
										<div>
											<div>050</div>
										</div>
									</div>
								</div>
								<div class="text-center bg-gray-100 p-30 min-w-190 mb-lg-0 mb-30">
									<h2 class="fw-500 mt-0">4.5</h2>
									<ul class="cours-star">
										<li class="active"><i class="fa fa-star"></i></li>
										<li class="active"><i class="fa fa-star"></i></li>
										<li class="active"><i class="fa fa-star"></i></li>
										<li class="active"><i class="fa fa-star"></i></li>
										<li class="active"><i class="fa fa-star-half-empty"></i></li>
									</ul>
									<span>748 Rating</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-5 col-sm-12">					
					<div class="course-detail-bx">
						<div class="box box-body">
							<div class="course-price">
								<div class="mb-5">
									<div class="text-dark mb-2 text-center">
										<span class="text-dark fw-600 h1">$199</span> 
										<span class="text-muted h3 fw-normal ms-2">
											<del>$250</del>
										</span> 
									</div> 
									<p class="text-primary text-center">
										<i class="fa fa-clock-o me-1"></i>
										Limited Time Offer
									</p>
								</div>
							</div>	
							<div class="text-center">
								<button type="button" class="waves-effect waves-light btn w-p100 btn-success mb-10">Enroll Now</button>
								<button type="button" class="waves-effect waves-light btn w-p100 btn-dark">Free Trail</button>
							</div>
						</div>
						<div class="box box-body">
							<div class="row">
								<div class="col-6">
									<span>4.5 Review</span>
									<ul class="cours-star">
										<li class="active"><i class="fa fa-star"></i></li>
										<li class="active"><i class="fa fa-star"></i></li>
										<li class="active"><i class="fa fa-star"></i></li>
										<li class="active"><i class="fa fa-star"></i></li>
										<li class="active"><i class="fa fa-star-half-empty"></i></li>
									</ul>
								</div>
								<div class="col-6">
									<span>Categories</span>
									<h5 class="text-primary">It & Software</h5>
								</div>
							</div>
						</div>
						<div class="box box-body">
							<div class="staff-bx">
								<div class="staff-info d-flex align-items-center">
									<div class="staff-thumb me-10">
										<img src="assets/images/avatar/avatar-1.png" alt="" class="bg-secondary-light rounded-circle max-w-60">
									</div>
									<div class="staff-name">
										<h5 class="mb-0">Johen Doe</h5>
										<span>Faculty Director</span>
									</div>
								</div>
							</div>
							<hr class="w-p100">
							<div>
								<div>								
									<div class="d-flex align-items-center mb-5">
										<div class="bg-primary rounded h-30 w-30 l-h-30 text-center me-10">
											<i class="fa fa-envelope"></i>
										</div>
										<a href="#"> info@dummy.com</a>
									</div>							
									<div class="d-flex align-items-center mb-5">
										<div class="bg-primary rounded h-30 w-30 l-h-30 text-center me-10">
											<i class="fa fa-phone"></i>
										</div>
										<a href="#"> +1 123 456 7890</a>
									</div>						
									<div class="d-flex align-items-center mb-5">
										<div class="bg-primary rounded h-30 w-30 l-h-30 text-center me-10">
											<i class="fa fa-link"></i>
										</div>
										<a href="#"> www.dummy.com</a>
									</div>
								</div>
								<ul class="list-inline mt-20 mb-0">
									<li><a href="javascript:void(0)" data-bs-toggle="tooltip" title="" data-original-title="Facebook"><i class="fa fa-facebook-square fs-20"></i></a></li>
									<li><a href="javascript:void(0)" data-bs-toggle="tooltip" title="" data-original-title="Twitter"><i class="fa fa-twitter-square fs-20"></i></a></li>
									<li><a href="javascript:void(0)" data-bs-toggle="tooltip" title="" data-original-title="Instagram"><i class="fa fa-instagram fs-20"></i></a></li>
									<li><a href="javascript:void(0)" data-bs-toggle="tooltip" title="" data-original-title="Linkedin"><i class="fa fa-linkedin-square fs-20"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="box box-body">
							<div class="widget mb-0">
								<h4 class="mb-20">Testimonials</h4>
								<div class="owl-carousel" data-nav-dots="false" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
									<div class="item">
										<div class="testimonial-widget">
											<div class="testimonial-content">
												<p>In odio metus, porta vitae neque vitae, faucibus viverra orci.</p>
											</div>
											<div class="testimonial-info mt-20">
												<div class="testimonial-avtar">
													<img class="img-fluid" src="assets/images/avatar/1.jpg" alt="">
												</div>
												<div class="testimonial-name">
													<strong>Johen Doe</strong>
													<span>Project Manager</span>
												</div>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="testimonial-widget">
											<div class="testimonial-content">
												<p>Morbi condimentum leo eu lacinia accumsan. Phasellus cursus rhoncus elit. </p>
											</div>
											<div class="testimonial-info mt-20">
												<div class="testimonial-avtar">
													<img class="img-fluid" src="assets/images/avatar/2.jpg" alt="">
												</div>
												<div class="testimonial-name">
													<strong>Johen Doe</strong>
													<span>Design</span>
												</div>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="testimonial-widget">
											<div class="testimonial-content">
												<p>In odio metus, porta vitae neque vitae, faucibus viverra orci.</p>
											</div>
											<div class="testimonial-info mt-20">
												<div class="testimonial-avtar">
													<img class="img-fluid" src="assets/images/avatar/3.jpg" alt="">
												</div>
												<div class="testimonial-name">
													<strong>Johen Doe</strong>
													<span>Project Manager</span>
												</div>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="testimonial-widget">
											<div class="testimonial-content">
												<p>Morbi condimentum leo eu lacinia accumsan. Phasellus cursus rhoncus elit. </p>
											</div>
											<div class="testimonial-info mt-20">
												<div class="testimonial-avtar">
													<img class="img-fluid" src="assets/images/avatar/4.jpg" alt="">
												</div>
												<div class="testimonial-name">
													<strong>Johen Doe</strong>
													<span>Design</span>
												</div>
											</div>
										</div>
									</div>
								</div>						
							</div>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</section>
	
	
	
	<footer class="footer_three">
		<div class="footer-top bg-dark3 pt-50">
            <div class="container">
                <div class="row">
					<div class="col-lg-3 col-12">
                        <div class="widget">
                            <h4 class="footer-title">About</h4>
							<hr class="bg-primary mb-10 mt-0 d-inline-block mx-auto w-60">
							<p class="text-capitalize mb-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis exercitation ullamco laboris<br><br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                        </div>
                    </div>											
					<div class="col-lg-3 col-12">
						<div class="widget">
							<h4 class="footer-title">Contact Info</h4>
							<hr class="bg-primary mb-10 mt-0 d-inline-block mx-auto w-60">
							<ul class="list list-unstyled mb-30">
								<li> <i class="fa fa-map-marker"></i> 123, Lorem Ipsum, Dummy City,<br>FL-12345 USA</li>
								<li> <i class="fa fa-phone"></i> <span>+(1) 123-878-1649 </span><br><span>+(1) 123-878-1649 </span></li>
								<li> <i class="fa fa-envelope"></i> <span>info@EduLearn.com </span><br><span>support@EduLearn.com </span></li>
							</ul>
						</div>
					</div>					
					<div class="col-12 col-lg-3">
                        <div class="widget widget_gallery clearfix">
                            <h4 class="footer-title">Our Gallery</h4>
							<hr class="bg-primary mb-10 mt-0 d-inline-block mx-auto w-60">
                            <ul class="list-unstyled">
								<li><img src="assets/images/gallery/thumb/1.jpg" alt=""></li>
								<li><img src="assets/images/gallery/thumb/2.jpg" alt=""></li>
								<li><img src="assets/images/gallery/thumb/3.jpg" alt=""></li>
								<li><img src="assets/images/gallery/thumb/4.jpg" alt=""></li>
								<li><img src="assets/images/gallery/thumb/5.jpg" alt=""></li>
								<li><img src="assets/images/gallery/thumb/6.jpg" alt=""></li>
								<li><img src="assets/images/gallery/thumb/7.jpg" alt=""></li>
								<li><img src="assets/images/gallery/thumb/8.jpg" alt=""></li>
								<li><img src="assets/images/gallery/thumb/9.jpg" alt=""></li>
								<li><img src="assets/images/gallery/thumb/10.jpg" alt=""></li>
								<li><img src="assets/images/gallery/thumb/11.jpg" alt=""></li>
								<li><img src="assets/images/gallery/thumb/12.jpg" alt=""></li>
							</ul>
                        </div>
                    </div>
					<div class="col-lg-3 col-12">
                        <div class="widget">
                            <h4 class="footer-title">Accept Card Payments</h4>
							<hr class="bg-primary mb-10 mt-0 d-inline-block mx-auto w-60">
							<ul class="payment-icon list-unstyled d-flex gap-items-1">
								<li class="ps-0">
									<a href="javascript:;"><i class="fa fa-cc-amex" aria-hidden="true"></i></a>
								</li>
								<li>
									<a href="javascript:;"><i class="fa fa-cc-visa" aria-hidden="true"></i></a>
								</li>
								<li>
									<a href="javascript:;"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></a>
								</li>
								<li>
									<a href="javascript:;"><i class="fa fa-cc-mastercard" aria-hidden="true"></i></a>
								</li>
								<li>
									<a href="javascript:;"><i class="fa fa-cc-paypal" aria-hidden="true"></i></a>
								</li>
							</ul>
                            <h4 class="footer-title mt-20">Newsletter</h4>
							<hr class="bg-primary mb-4 mt-0 d-inline-block mx-auto w-60">
                            <div class="mb-20">
								<form class="" action="" method="post">
									<div class="input-group">
										<input name="email" required="required" class="form-control" placeholder="Your Email Address" type="email">
										<button name="submit" value="Submit" type="submit" class="btn btn-primary"> <i class="fa fa-envelope"></i> </button>
									</div>
								</form>
							</div>
                        </div>
                    </div>
                </div>				
            </div>
        </div>
		<div class="by-1 bg-dark3 py-10 border-dark">
			<div class="container">
				<div class="text-center footer-links">
					<a href="#" class="btn btn-link">Home</a>
					<a href="#" class="btn btn-link">About Us</a>
					<a href="#" class="btn btn-link">Pricing</a>
					<a href="#" class="btn btn-link">Courses</a>
					<a href="#" class="btn btn-link">Blog</a>
					<a href="#" class="btn btn-link">Contact Us</a>
					<a href="#" class="btn btn-link">Privacy Policy</a>
					<a href="#" class="btn btn-link">Terms Of Conditions</a>
				</div>
			</div>
		</div>
		<div class="footer-bottom bg-dark3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-12 text-md-start text-center"> © <script>document.write(new Date().getFullYear())</script> <span class="text-white">EduLearn</span>  All Rights Reserved.</div>
					<div class="col-md-6 mt-md-0 mt-20">
						<div class="social-icons">
							<ul class="list-unstyled d-flex gap-items-1 justify-content-md-end justify-content-center">
								<li><a href="#" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-linkedin"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-youtube"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
                </div>
            </div>
        </div>
	</footer>
	
	
	<!-- Vendor JS -->
	<script src="assets/js/vendors.min.js"></script>	
	<!-- Corenav Master JavaScript -->
    <script src="assets/corenav-master/coreNavigation-1.1.3.js"></script>
    <script src="assets/js/nav.js"></script>
	<script src="assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
    <script src="assets/vendor_components/OwlCarousel2/dist/owl.carousel.js"></script>
	
	
	<!-- EduLearn front end -->
	<script src="assets/js/template.js"></script>
	<script src="assets/js/pages/widget.js"></script>
	
	
</body>
</html>
