<?php  session_start(); 

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
   	<link rel="shortcut icon" href="assets/images/logo1.png">
    <title>Cursos</title>
    
		<!-- Vendors Style-->
		<link rel="stylesheet" href="assets/css/vendors_css.css">
		  
		<!-- Style-->  
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/css/skin_color.css">
	     
	</head>

	<body class="theme-primary">
		<?php  include "nav.php"; ?>
		<!---page Title --->
		<section class="bg-img pt-400 pb-100" data-overlay="1" style="background-image: url(assets/images/courses/cursos.jpg);">
		</section>
		<section>
			<div class="container pt250">
				<div class="row">
					<div class="col-12">
						<div class="text-center">						
							<h1 class="page-title text-black">Cursos</h1>
							<hr style="
										    width: 80%;
										    padding: 1px;
										    padding-bottom: 10px;
										    box-shadow: -5px 0 10px -15px black;
										    background-color:#46a2fd;
										    border-radius: 6px;
										    position: relative;
										    overflow: hidden;">
							</hr>
						</div>
					</div>
				</div>
			</div>
		</section>	<!--Page content -->
		
		<section class="py-50">
			<div class="container">
				<div class="row">
					<?php include 'controles/code=conexion.php'; 

								$detallesUs = $conexion->prepare("SELECT * FROM curso  ORDER BY ID DESC");
	        			$detallesUs->execute();
	        			$curs = $detallesUs->fetchAll(PDO::FETCH_ASSOC);

								foreach($curs as $cursos){ 
					?> 
					<div class="col-lg-4 col-md-6 col-12">
						<a class="box box-link-shadow text-center pull-up" href="">
							<div class="box-body py-15 bbrr-0 bblr-0" style="background-color:#a7ffeb;">
								<p class="fw-600"><?php echo $cursos['TITULO']; ?></p>
							</div>
							<div class="box-body">
								<p class="mt-5">
									<img src="assets/images/courses/<?php echo $cursos['IMAGEN']; ?>"style="width:250px;position: relative;height: 250px;" >
								</p>
							</div>
						</a>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php include"footer.php" ?>
		<!-- Vendor JS -->
		<script src="assets/js/vendors.min.js"></script>	
		<!-- Corenav Master JavaScript -->
		<script src="assets/corenav-master/coreNavigation-1.1.3.js"></script>
	  <script src="assets/js/nav.js"></script>
		<script src="assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
	  <script src="assets/vendor_components/OwlCarousel2/dist/owl.carousel.js"></script>
		<script src="assets/vendor_components/select2/dist/js/select2.full.js"></script>
		<script src="assets/vendor_components/vertical-slider/jquery.vticker-min.js"></script>
		<!-- front end -->
		<script src="assets/js/template.js"></script>
		<script src="assets/js/pages/widget.js"></script>

	</body>
</html>
