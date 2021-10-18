<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/images/logo1.png">

    <title>Docentes</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="assets/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/skin_color.css">
     
  </head>

<body class="theme-primary">
	
	<!-- The social media icon bar -->
		
<?php 
include "nav.php";
?>

	
	<!---page Title --->
	<section class="bg-img pt-500 pb-100" data-overlay="1" style="background-image: url(assets/images/docentes/maestros.jpg);">
	</section>
	<section>
		<div class="container pt250">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h1 class="page-title text-black">Docentes</h1>
						<hr style="
						    width: 80%;
						    padding: 1px;
						    padding-bottom: 10px;
						    box-shadow: -5px 0 10px -15px black;
						    background-color:#46a2fd;
						    border-radius: 6px;
						    position: relative;
						    overflow: hidden;"></hr>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br><br>
	<!--Page content -->
	
	<section class="py-50">
		<div class="container">
			<div class="row" style="margin-left:80px">
			<?php include 'controles/code=conexion.php'; 

					$detallesUs = $conexion->prepare("SELECT * FROM usuarios WHERE ROL = 4  ORDER BY ID DESC");
	        $detallesUs->execute();
	        $docs = $detallesUs->fetchAll(PDO::FETCH_ASSOC);

					foreach($docs as $doc){ 
			?> 
			  <div class="col-11 col-lg-4">
					  <div class="box ribbon-box">
					    <div class="box-header no-border p-0">				
						 <a href="userprofile.php?user=<?php echo $doc['USUARIO']; ?>">
						  <img class="img" src="perfil/src=img/<?php echo $doc['FOTO_PERFIL']; ?>" style="width:100%;position:relative;height:400px;" alt="">
						 </a>
					  </div>
						<div class="box-body">
							<div class="user-contact list-inline text-center"><!--
								<a href="#" class="btn btn-circle mb-5 btn-facebook"><i class="fa fa-facebook"></i></a>
								<a href="mailto:<?php echo $doc['CORREO']; ?>" class="btn btn-circle mb-5 btn-warning"><i class="fa fa-envelope"></i></a>	--->			
							</div>
						  <div class="text-center">
							<h3 class="my-10"><a href="userprofile.php?user=<?php echo $doc['USUARIO']; ?>"><?php echo $doc['NOMBRES']." ".$doc['APELLIDOS']; ?></a></h3>
							<h6 class="user-info mt-0 mb-10 text-fade"><?php echo $doc['NRO_TELEFONO']; ?></h6>
							<p class="text-fade w-p85 mx-auto"><?php echo $doc['CORREO']; ?></p>
						  </div>
					  </div>
					</div>
			  </div>
			  <?php } ?>
			</div>
		</div>
	</section>
	
	
<?php include "footer.php"?>
	
	<!-- Vendor JS -->
	<script src="assets/js/vendors.min.js"></script>	
	<!-- Corenav Master JavaScript -->
    <script src="assets/corenav-master/coreNavigation-1.1.3.js"></script>
    <script src="assets/js/nav.js"></script>
	<script src="assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
	
	
	<!-- EduLearn front end -->
	<script src="assets/js/template.js"></script>
	
	
</body>
</html>
