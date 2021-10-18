<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../assets/images/favicon.ico">

    <title> Alumnos | Virgen De Guadalupe </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="src/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="src/css/style.css">
	<link rel="stylesheet" href="src/css/skin_color.css">
	<!-- Js-->  
	<script type="text/javascript" src="funciones/jquery-3.6.0.min.js"></script>

</head>
<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>
	<?php include 'controles/vista=menu.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Alumnos</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Administrar Alumnos</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
			<div class="row">
			
											<div class="col-12">
												<div class="card">
													<div class="card-header">
														<h5 class="card-title">Información de alumno</h5>
														<p class="mb-0 card-subtitle text-muted"> <button type="button" class="waves-effect waves-circle btn btn-circle btn-warning  mb-5" data-bs-toggle="modal" data-bs-target="#registrar"><i class="mdi mdi-plus"></i></button></p>
													</div>						
													<div class="card-body">
														<div class="table-responsive">
															<table class="table mb-0">
																<thead>
																	<tr>
																		<th scope="col">ID</th>
																		<th scope="col">Foto perfil</th>
																		<th scope="col">Nombres</th>
																		<th scope="col">Apellidos</th>
																		<th scope="col">Usuario</th>
																		<th scope="col">Correo</th>
																		<th scope="col">Genero</th>
																		<th scope="col">Nivel</th>
																		<th scope="col">Grado</th>
																		<th scope="col">Seccion</th>
																		<th scope="col">Opciones</th>
																	</tr>
																</thead>
																<tbody id="tbody">

																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>

				<div id="registrar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">

							<div class="modal-body">
								<div class="text-center mt-2 mb-4">
									<a class="text-success">
										<span>Registrar nuevo Alumno</span>
									</a>
								</div>
												<div class="mb-3">
													<label for="simpleinput" class="form-label">Nombres</label>
													<input type="text" id="nombresUsuario" class="form-control">
												</div>

												<div class="mb-3">
													<label for="simpleinput" class="form-label">Apellidos</label>
													<input type="text" id="apellidosUsuario" class="form-control">
												</div>

												<div class="mb-3">
													<label for="example-email" class="form-label">Correo</label>
													<input type="email" id="correoUsuario" class="form-control">
												</div>

												<div class="mb-3">
													<label for="password" class="form-label">Contraseña</label>
													<div class="input-group input-group-merge">
														<input type="password" id="passwordUsuario" class="form-control" accept="">
														<div class="input-group-text" id="eye" data-password="false" onclick="verPass(1);">
															<span class="mdi mdi-eye"></span>
														</div>
													</div>
												</div>


												<form name="f1" id="f1">
													<div class="mb-3">
														<label class="form-label">Selecionar Nivel-Grado-Seccion</label>
												    <select class="form-select" name="nivel" onchange="cambia_provincia()"> 
													    <option value="0" selected>Seleccione Nivel 
													    <option value="1">Primaria 
													    <option value="2">Secundaria
												    </select>
											    </div>
											    <div class="mb-3">
												    <select class="form-select" name=grado> 
												    	<option value="-">- 
												    </select> 
												  </div>
												  <div class="mb-3">
												    <select class="form-select" name=seccion> 
												    	<option value="-" selected>Seleccione Seccion 
												    	<option value="A">A</option>
												    	<option value="B">B</option>
												    	<option value="C">C</option>
												    	<option value="D">D</option>
												    	<option value="E">E</option>
												    </select> 
												  </div>
												  <div class="mb-3">
														<label class="form-label">Genero</label>
													    <select class="form-select" name=genero> 
													    	<option value="1">Masculino</option>
													    	<option value="2">Femenino</option>
													    </select> 
													 </div>
											  </form>

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
													<label for="example-date" class="form-label">Fecha de nacimiento</label>
													<input type="date" id="fechaUsuario" value="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d');?>" class="form-control">
													<input type="hidden" id="fecha2Usuario" value="<?php echo date('Y-m-d');?>" class="form-control">
												</div>

												<div class="mb-3">
													<label for="example-fileinput" class="form-label">Foto de perfil</label>
													<input type="file" id="fotoUsuario" class="form-control">
												</div>

									<div class="mb-3 text-center">
										<button class="btn btn-primary" type="submit" onclick="registrarUser();" >Registrarr</button>
									</div>
									<p id="msm" ></p>
<script type="text/javascript">

function lo(){
    var dataString = $('#f1').serialize();
    alert('Datos serializados: '+dataString);
} 
</script>							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				<div id="editar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">

							<div class="modal-body">
								<div class="text-center mt-2 mb-4">
									<a class="text-success">
										<span>Editar usuario</span>
									</a>
								</div>
												<div class="mb-3">
													<label for="simpleinput" class="form-label">Nombres</label>
													<input type="text" id="enombresUsuario" class="form-control">
												</div>

												<div class="mb-3">
													<label for="simpleinput" class="form-label">Apellidos</label>
													<input type="text" id="eapellidosUsuario" class="form-control">
												</div>

												<div class="mb-3">
													<label for="example-email" class="form-label">Correo</label>
													<input type="email" id="ecorreoUsuario" class="form-control">
												</div>

												<div class="mb-3">
													<label for="password" class="form-label">Contraseña</label>
													<div class="input-group input-group-merge">
														<input type="password" id="epasswordUsuario" class="form-control" accept="">
														<div class="input-group-text" id="eye" data-password="false" onclick="verPass(1);">
															<span class="mdi mdi-eye"></span>
														</div>
													</div>
												</div>

												<div class="mb-3">
													<label for="example-date" class="form-label">Fecha de nacimiento</label>
													<input type="date" id="efechaUsuario" value="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d');?>" class="form-control">
													<input type="hidden" id="eiduser" value="" class="form-control">
												</div>

												<div class="mb-3">
													<label for="example-fileinput" class="form-label">Foto de perfil</label>
													<input type="file" id="efotoUsuario" class="form-control">
												</div>

									<div class="mb-3 text-center">
										<button class="btn btn-primary" type="submit" id="btnEditc" onclick="$('#editar').removeClass('show');
			$('#editar').css('display', 'none');" >Cancelar</button>
										<button class="btn btn-primary" type="submit" id="btnEdit" onclick="editUser();" >Editar</button>
									</div>
									<p id="msme" ></p>
								
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->


			</div><!-- end row -->
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
	<?php include 'controles/vista=footer.php'; ?>
	<?php include 'controles/vista=post_footer.php'; ?>	
	 </div>
<!-- ./wrapper -->

	<!-- Page Content overlay -->
	<script type="text/javascript" src="funciones/alumnos.js"></script>
	<!-- Vendor JS -->
	<script src="src/js/vendors.min.js"></script>
	<script src="src/js/pages/chat-popup.js"></script>
    <script src="../assets/icons/feather-icons/feather.min.js"></script>	
	<script src="../assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
	<script src="../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
	<script src="../assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
	<script src="../assets/vendor_components/select2/dist/js/select2.full.js"></script>
	<script src="../assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
	<script src="../assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="../assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>
	<script src="../assets/vendor_components/moment/min/moment.min.js"></script>
	<script src="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="../assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="../assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	<script src="../assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<script src="../assets/vendor_plugins/iCheck/icheck.min.js"></script>
	
	<!-- edulearn App -->
	<script src="src/js/demo.js"></script>
	<script src="src/js/template.js"></script>
	
	<script src="src/js/pages/advanced-form-element.js"></script>
	
</body>
</html>
