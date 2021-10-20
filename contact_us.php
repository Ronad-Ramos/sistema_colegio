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

    <title>Contacto - Virgen de Guadalupe</title>
    
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
	<section class="bg-img pt-150 pb-20" data-overlay="2" style="background-image: url(assets/images/contacto.jpeg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">Contacto</h2>
						<ol class="breadcrumb bg-transparent justify-content-center">
							<li class="breadcrumb-item"><a href="#" class="text-white-50"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">Contacto</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->
	
	<section class="py-50">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-7 col-12">

						<div class="text-start mb-30">
							<h2>Escribenos</h2>
							<p id="msg">Si desea consultar mayor información sobre nuestros servicios o tienes una duda al respecto, no dudes en solicitar una consultoria gratuita y uno de nuestros asesores te contactará a la brevedad</p>
						</div>
						<div class="row">
						  <div class="col-md-6">
							<div class="form-group">
							  <input type="text" class="form-control" placeholder="Nombre" id="nombre">
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
							  <input type="text" class="form-control" placeholder="Apellido" id="apellido">
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
							  <input type="email" class="form-control" placeholder="Email" id="email">
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
							  <input type="tel" class="form-control" placeholder="Telefono" id="telefono">
							</div>
						  </div>
					
						  <div class="col-lg-12">
						      <div class="form-group">
								<textarea id="message" rows="5" class="form-control" required="" placeholder="Mensaje" ></textarea>
							  </div>
						  </div>
						  <div class="col-lg-12">
							  <button type="button"  class="btn btn-primary" onclick="contact()"> Enviar</button>
						  </div>

						</div>
				</div>
				<div class="col-md-5 col-12 mt-30 mt-md-0">
					<div class="box box-body p-40 mb-0"style="background-color:#0082ca" >
						<h2 class="box-title text-white">Informacion de Contacto</h2>
						<p>Somos una escuela dedicada a formar grandes lideres del mañana</p>
						<div class="widget fs-18 my-20 py-20 by-1 border-light">	
							<ul class="list list-unstyled text-white-80">
								<li class="ps-40"><i class="ti-location-pin"></i>123, Av.Leguia,Chiclayo<br></li>
								<li class="ps-40 my-20"><i class="ti-mobile"></i>(+51)930123266</li>
								<li class="ps-40"><i class="ti-email"></i>virgenguadalupe@gmail.com</li>
							</ul>
						</div>
						<h4 class="mb-20">Redes Sociales</h4>
						<ul class="list-unstyled d-flex gap-items-1">
							<li><a href="#" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-linkedin"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-youtube"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.30596552044!2d-74.25986763304465!3d40.69714941412697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1537364999769" class="map" style="border:0" allowfullscreen></iframe>
				</div>
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
	
	<script type="text/javascript">
		
function contact(u){

	if($('#nombre').val() !=""){
		if($('#apellido').val() !=""){
			if($('#email').val() !=""){
				if($('#telefono').val() !=""){
					if($('#message').val() !=""){

		var parametros = { "Nombre" : $('#nombre').val(), 'Apellido' : $('#apellido').val(), "Email" : $('#email').val(), "Telefono": $('#telefono').val(), "Mensaje" : $('#message').val() };
    $.ajax({
        data:  parametros,
        url:   'controles/code=contacto.php',
        type:  'post',
        beforeSend: function () { $('#msg').html('Enviando mensaje'); },
        success:  function (response) { $('#msg').html(response); }
    });

					}else{ $('#msg').html('Complete el campo Mensaje'); }
				}else{ $('#msg').html('Complete el campo Telefono'); }
			}else{ $('#msg').html('Complete el campo Email'); }
		}else{ $('#msg').html('Complete el campo Apellido'); }
	}else{ $('#msg').html('Complete el campo Nombre'); }

}
	</script>
	
</body>
</html>
