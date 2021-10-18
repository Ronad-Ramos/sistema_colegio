<?php  session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <link rel="shortcut icon" href="assets/images/logo1.png">
	<title>Formulario de Retiro</title>
	
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
				<div class="col-md-5 col-12 mt-30 mt-md-0">
					
						<img src="assets/images/colegio.jpg" style="width:450px ; height:350px ;">
						
			</div>
				<div class="col-md-7 col-12">
					<!--action="insertar.php"-->
					<form name="f1" id="f1" class="contact-form"  method="POST" enctype="multipart/form-data">
						<div class="text-start mb-30">
							<h2>Llena tus Datos</h2>
							<hr style="
						    
						    padding: 1px;
						    padding-bottom: 5px;
						    box-shadow: -5px 0 10px -15px black;
						    background-color:#46a2fd;
						    border-radius: 6px;
						    position: relative;
						    overflow: hidden;"></hr>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
						</div>
						<div class="row">
						  <div class="col-md-6">
							<div class="form-group">
							<label for="example-fileinput" class="form-label">Apoderado</label>
							  <input type="text" class="form-control" placeholder="Nombre" required>
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
								<label for="example-fileinput" class="form-label"><br></label>
							  <input type="text" class="form-control" placeholder="Apellido" required>
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
							  <input type="text" class="form-control" placeholder="DNI" required>
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
							  <input type="tel" class="form-control" placeholder="Telefono" required>
							</div>
						  </div>

						  <div class="col-md-6">
							<div class="form-group">
								<label for="example-fileinput" class="form-label">Alumno</label>
							  <input type="text" class="form-control" placeholder="Nombres">
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
								<label for="example-fileinput" class="form-label"><br></label>
							  <input type="text" class="form-control" placeholder="Apellidos">
							</div>
						  </div>
						   <div class="col-md-6">
							<div class="form-group">
								<label for="example-fileinput" class="form-label">Fecha de nacimiento</label>
							  <input type="date" class="form-control" placeholder="Fecha de nacimiento">
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
								<label for="example-fileinput" class="form-label"><br></label>

							  <input type="text" class="form-control" placeholder="DNI">
							</div>
						  </div>
						 

						  <div class="col-md-6">
							  <div class="form-group">
									<label class="form-label">Selecionar Nivel-Grado-Seccion</label>
									<select class="form-select" name="nivel" onchange="cambia_provincia()"> 
										<option value="0" selected>Seleccione Nivel </option>
										<option value="1">Primaria</option> 
										<option value="2">Secundaria</option>
									</select>
							   </div>
						</div>
								<div class="col-md-6">
							  		<div class="form-group">
							  		<label class="form-label">  </label>
									<select class="form-select" name=grado> 
									<option value="-">-</option>
								    </select> 
									</div>
								</div>
									<div class="col-md-6">
							  		<div class="form-group">
										<select class="form-select" name=seccion> 
												<option value="-" selected>Seleccione Seccion 
						 						<option value="A">A</option>
												<option value="B">B</option>
												<option value="C">C</option>
												<option value="D">D</option>
												<option value="E">E</option>
										</select> 
									</div>
								   </div>	

								   <div class="form-label">Genero</label>
										<select class="form-select" name=genero> 
												<option value="1">Masculino</option>
												<option value="2">Femenino</option>
										</select> 
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
								<input type="file" id="example-fileinput" class="form-control">
							</div>
						  <div class="col-lg-12">
							  <button name="submit" type="submit" value="Submit" class="btn btn-primary">Enviar</button>
						  </div>
						</div>
					</form>
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
	</body>
	</html>