<?php  session_start(); 

include "controles/code=conexion.php";

if (isset($_SESSION['usuario=cole'])) {
	
    $detallesU = $conexion->prepare("SELECT * FROM usuarios WHERE USUARIO=:user");
    $detallesU -> bindParam(':user', $_SESSION["usuario=cole"], PDO::PARAM_STR);
    $detallesU->execute();

    $info = $detallesU->fetch(PDO::FETCH_ASSOC);

}else{header("location: auth.php");}

?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""> 
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/images/logo1.png">
	<title>Formulario de Transferencia</title>
	
	<!-- Vendors Style-->
	<link rel="stylesheet" href="assets/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/skin_color.css">
</head>
<body class="theme-primary">

	<?php include "nav.php"?>
    
    <section class="bg-img pt-500 pb-120" data-overlay="1" style="background-image: url(assets/images/descuento.jpg);">
	</section>

	<section class="py-50">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-7 col-12">
					<!--action="insertar.php"-->
					<form  name="f1" id="f1" class="contact-form"  method="POST" enctype="multipart/form-data">
						<div class="text-start mb-30">
							<h2>Llena tus datos</h2>
							<hr style="
						    
						    padding: 1px;
						    padding-bottom: 5px;
						    box-shadow: -5px 0 10px -15px black;
						    background-color:#46a2fd;
						    border-radius: 6px;
						    position: relative;
						    overflow: hidden;"></hr>
							<p>Envianos tu solicitud mediante el formato => <a href="">Descargar</a> </p>
							<input type="hidden" id="dtoNeutral" value="2">
						</div>
						<div class="row">
						  <div class="col-md-6">
							<div class="form-group">
							<label for="example-fileinput" class="form-label">Apoderado</label>
							  <input type="email" class="form-control" placeholder="Correo electronico" required id="Electronico_apo">
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
								<label for="example-fileinput" class="form-label"><br></label>
							  <input type="number" class="form-control" placeholder="DNI" required id="DNI_apo">
							</div>
						  </div>

						  <div class="col-md-6">
							<div class="form-group">
								<label for="example-fileinput" class="form-label">Alumno</label>
							  <input type="email" class="form-control" placeholder="Correo electronico" id="Electronico_alu">
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
								<label for="example-fileinput" class="form-label"><br></label>
							  <input type="number" class="form-control" placeholder="DNI" id="DNI_alu">
							</div>
						  </div>

							 <div class="mb-3">
								<label for="example-fileinput" class="form-label">Solicitud</label>
								<input type="file" id="example-fileinput" class="form-control" >
							</div>
						  <div class="col-lg-12">
							  <button  type="button" id="buttonEnviar" class="btn btn-primary" onclick="registrarTransferencia();">Enviar</button>
						  </div>
						  <p id="msg"></p>
						</div>
					</form>
				</div>
				<div class="col-md-5 col-12 mt-30 mt-md-0">
						<img src="assets/images/salon.jpg" style="width:600px ; height:400px ;">
						</div>
			</div>

			</div>
		</section>
		<?php include "footer.php";?></div></section>

	<!-- Vendor JS -->
	<script src="assets/js/vendors.min.js"></script>	
	<!-- Corenav Master JavaScript -->
    <script src="assets/corenav-master/coreNavigation-1.1.3.js"></script>
    <script src="assets/js/nav.js"></script>
	<script src="assets/vendor_components/OwlCarousel2/dist/owl.carousel.js"></script>
	<script src="assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
	
	
	<!-- EduLearn front end -->
	<script src="assets/js/template.js"></script>

	<script src="admin/funciones/transferencias.js"></script>
	</body>
	</html>