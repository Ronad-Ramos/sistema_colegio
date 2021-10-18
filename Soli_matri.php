<?php
session_start();

if(isset($_SESSION['usuario']) && $_SESSION['usuario'] !="" ) {
	
}else{
	header("location: auth.php");
}

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
	<title>Formulario de Matricula</title>
	
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
					<!--action="insertar_matri.php"-->
					<form name="f1" id="f1" class="contact-form"  method="POST" enctype="multipart/form-data">
						<div class="text-start mb-30">
							<h2>Matriculate</h2>
							<hr style="
						    
						    padding: 1px;
						    padding-bottom: 5px;
						    box-shadow: -5px 0 10px -15px black;
						    background-color:#46a2fd;
						    border-radius: 6px;
						    position: relative;
						    overflow: hidden;"></hr>
							<p id="msg" >It is a long established fact that a reader will be distracted by the readable content of a page</p>
						</div>
						<div class="row">
						  <div class="col-md-6">
							<div class="form-group">
							<label for="example-fileinput" class="form-label">Apoderado</label>
							  <input type="text" class="form-control" id="Nombre_apo" placeholder="Nombre del apoderado" required>
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
								<label for="example-fileinput" class="form-label"><br></label>
							  <input type="text" class="form-control" id="Apellido_apo"  placeholder="Apellido del apoderado" required>
							</div>
						  </div>
						  <div class="col-md-6">
								<div class="form-group">
								  <input type="text" class="form-control" id="DNI_apo" placeholder="DNI del apoderado"  required>
								</div>
						  </div>
						  <div class="col-md-6">
								<div class="form-group">
								  <input type="tel" class="form-control" id="Telefono_apo"  placeholder="Telefono del apoderado" required>
								</div>
						  </div>
						  <div class="col-md-6">
								<div class="form-group">
								  <input type="text" class="form-control" id="Electronico_apo"  placeholder="Correo electronico del apoderado" required>
								</div>
						  </div>
						  <div class="col-md-6">
								<div class="form-group">
								  <input type="tel" class="form-control" id="Dirección_apo" placeholder="Direción del apoderado"  required>
								</div>
						  </div>

						  <div class="col-md-6">
								<div class="form-group">
									<label for="example-fileinput" class="form-label">Alumno</label>
								  <input type="text" class="form-control" id="Nombres_alu" placeholder="Nombres del alumno">
								</div>
						  </div>
						  <div class="col-md-6">
								<div class="form-group">
									<label for="example-fileinput" class="form-label"><br></label>
								  <input type="text" class="form-control" id="Apellidos_alu" placeholder="Apellidos del alumno">
								</div>
						  </div>
						  <div class="col-md-6">
								<div class="form-group">
								  <input type="text" class="form-control" id="DNI_alu" placeholder="DNI del alumno" required>
								</div>
						  </div>
						  <div class="col-md-6">
								<div class="form-group">
								  <input type="tel" class="form-control" id="Telefono_alu" placeholder="Telefono del alumno" required>
								</div>
						  </div>
						  <div class="col-md-6">
								<div class="form-group">
								  <input type="text" class="form-control" placeholder="Correo" id="Electronico_alu" required>
								</div>
						  </div>
						  <div class="col-md-6">
								<div class="form-group">
								  <input type="tel" class="form-control" id="Dirección_alu" placeholder="Dirección" required>
								</div>
						  </div>
						  
						  <div class="col-md-6">
								<div class="form-group">
									<label for="example-fileinput" class="form-label">Fecha de nacimiento del alumno</label>
								  <input type="date" class="form-control" value="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d');?>"placeholder="Fecha de nacimiento" id="fecha_alu">
								</div>
						  </div>
						  <div class="col-md-6">
								<div class="form-label"><label>Genero</label>
										<select class="form-select" name="genero" id="genero_alu"> 
											<option value="1">Masculino</option>
											<option value="2">Femenino</option>
										</select> 
								</div>
						  </div>

						  <div class="col-md-6">
							  <div class="form-group">
									<label class="form-label">Selecionar Nivel-Grado-Seccion</label>
									<select class="form-select" name="nivel" onchange="cambia_provincia()" id="select_nivel_alu"> 
										<option value="0" selected>Seleccione Nivel </option>
										<option value="1">Primaria</option> 
										<option value="2">Secundaria</option>
									</select>
							   </div>
							</div>

							<div class="col-md-6">
							  <div class="form-group">
							  	<label class="form-label">    </label>
									<select class="form-select" name=grado id="select_grado_alu"> 
										<option value="-">-</option>
								  </select> 
								</div>
							</div>
									<div class="col-md-6">
							  		<div class="form-group">
											<select class="form-select" name=seccion id="select_seccion_alu"> 
													<option value="-" selected>Seleccione Seccion 
							 						<option value="A">A</option>
													<option value="B">B</option>
													<option value="C">C</option>
													<option value="D">D</option>
													<option value="E">E</option>
											</select> 
										</div>
								  </div>	

											  

<script type="text/javascript">
	var nivel_prim=new Array("Selecione grado","1","2","3","4","5","6");
  var nivel_secu=new Array("Selecione grado","1","2","3","4","5");
  var sesiones=new Array("Selecione seccion","A","B","C","D","E","F","G","H");

  var todos_nivel = [
    [],
    nivel_prim,
    nivel_secu,
    sesiones,
  ];

  function cambia_provincia(){ 
   	//tomo el valor del select del nivel elegido 
   	var nivel 
   	nivel = document.f1.nivel[document.f1.nivel.selectedIndex].value 
   	//miro a ver si el nivel está definido 
   	if (nivel != 0) { 
      	//si estaba definido, entonces coloco las opciones de la grado correspondiente. 
      	//selecciono el array de grado adecuado 
      	mis_grados=todos_nivel[nivel]
      	//calculo el numero de grados 
      	num_grados = mis_grados.length 
      	//marco el número de grados en el select 
      	document.f1.grado.length = num_grados 
      	//para cada grado del array, la introduzco en el select 
      	for(i=0;i<num_grados;i++){ 
         	document.f1.grado.options[i].value=mis_grados[i] 
         	document.f1.grado.options[i].text=mis_grados[i]
      	}	
   	}else{ 
      	//si no había grado seleccionada, elimino las grados del select 
      	document.f1.grado.length = 1 
      	//coloco un guión en la única opción que he dejado 
      	document.f1.grado.options[0].value = "-" 
      	document.f1.grado.options[0].text = "-" 
   	} console.log(nivel);
   	//marco como seleccionada la opción primera de grado 
   	document.f1.grado.options[0].selected = true 
}
</script>

							 <div class="mb-3">
								<label for="example-fileinput" class="form-label">Solicitud</label>
								<input type="file" id="example-fileinput" class="form-control" >
							</div>
						  <div class="col-lg-12">
							  <button  type="button" class="btn btn-primary" id="buttonEnviar" onclick="registrarMatricula();">Enviar</button>
						  </div>
						</div>
													
				</div>
				<div class="col-md-5 col-12 mt-30 mt-md-0">
				<img src="assets/images/img2.png" style="width:450px; height:400px;">

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

	<script src="admin/funciones/matricula.js"></script>

	</body>
	</html>