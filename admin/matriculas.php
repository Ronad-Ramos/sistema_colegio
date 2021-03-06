<?php  session_start(); 

include "controles/code=conexion.php";

if (isset($_SESSION['usuario=cole'])) {
	
    $detallesU = $conexion->prepare("SELECT * FROM usuarios WHERE USUARIO=:user");
    $detallesU -> bindParam(':user', $_SESSION["usuario=cole"], PDO::PARAM_STR);
    $detallesU->execute();

    $info = $detallesU->fetch(PDO::FETCH_ASSOC);

    if($info['ROL'] != 1 ){ header("location: ../"); }

}else{
	header("location: ../auth.php");
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
    <link rel="icon" href="../assets/images/favicon.ico">

    <title> Usuarios | Virgen De Guadalupe </title>
  
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
					<h4 class="page-title">Matriculas</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Administrar Matriculas</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
			<div class="row">

				<div class="box">
					<div class="card-header">
						<h5 class="card-title">Informaci??n de matriculas</h5>
						<p class="mb-0 card-subtitle text-muted"> <button type="button" class="waves-effect waves-circle btn btn-circle btn-warning  mb-5" data-bs-toggle="modal" data-bs-target="#registrar"><i class="mdi mdi-plus"></i></button></p>
					</div>	
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example" class="table text-fade table-bordered table-hover display nowrap margin-top-10 w-p100">
							<thead>
								<tr class="text-dark">
									<th>ID</th>
									<th>Nombre - Apoderado</th>
									<th>Apellido - Apoderado</th>
									<th>Nombre - Alumno</th>
									<th>Apellido - Alumno</th>
									<th>Nivel</th>
									<th>Grado</th>
									<th>Seccion</th>
									<th>Fecha</th>
									<th>Archivo</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody id="tbody">

							</tbody>
						</table>
						</div>              
					</div>
				</div>

				<div id="registrar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">

							<div class="modal-body">
								<div class="text-center mt-2 mb-4">
									<a class="text-success">
										<span>Registrar nueva matricula</span>
										<input type="hidden" id="dtoNeutral" value="1">
									</a>
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
								  <input type="tel" class="form-control" id="Direcci??n_apo" placeholder="Direci??n del apoderado"  required>
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
								  <input type="tel" class="form-control" id="Direcci??n_alu" placeholder="Direcci??n" required>
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

						<form id="f1" name="f1">
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
						</form>

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

  var todos_nivel = [
    [],
    nivel_prim,
    nivel_secu,
  ];

  function cambia_provincia(){ 
   	//tomo el valor del select del nivel elegido 
   	var nivel 
   	nivel = document.f1.nivel[document.f1.nivel.selectedIndex].value 
   	//miro a ver si el nivel est?? definido 
   	if (nivel != 0) { 
      	//si estaba definido, entonces coloco las opciones de la grado correspondiente. 
      	//selecciono el array de grado adecuado 
      	mis_grados=todos_nivel[nivel]
      	//calculo el numero de grados 
      	num_grados = mis_grados.length 
      	//marco el n??mero de grados en el select 
      	document.f1.grado.length = num_grados 
      	//para cada grado del array, la introduzco en el select 
      	for(i=0;i<num_grados;i++){ 
         	document.f1.grado.options[i].value=mis_grados[i] 
         	document.f1.grado.options[i].text=mis_grados[i]
      	}	
   	}else{ 
      	//si no hab??a grado seleccionada, elimino las grados del select 
      	document.f1.grado.length = 1 
      	//coloco un gui??n en la ??nica opci??n que he dejado 
      	document.f1.grado.options[0].value = "-" 
      	document.f1.grado.options[0].text = "-" 
   	} console.log(nivel);
   	//marco como seleccionada la opci??n primera de grado 
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

								<p id="msg" ></p>
							
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				<div id="editar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">

							<div class="modal-body">
								<div class="text-center mt-2 mb-4">
									<a class="text-success">
										<span>Editar Matricula</span>
										<input type="hidden" id="eiduser">
									</a>
								</div>

								<div class="mb-3">
									<label for="simpleinput" class="form-label">Nombres del apoderado</label>
									<input type="text" id="nombreApoderado" class="form-control" value="">
								</div>

								<div class="mb-3">
									<label for="simpleinput" class="form-label">Apellidos del apoderado</label>
									<input type="text" id="apellidoApoderado" class="form-control" value="">
								</div>

								<div class="mb-3">
									<label for="simpleinput" class="form-label">Nombres del alumno</label>
									<input type="text" id="nombreAlumno" class="form-control" value="">
								</div>

								<div class="mb-3">
									<label for="simpleinput" class="form-label">Apellidos del alumno</label>
									<input type="text" id="apellidosAlumno" class="form-control" value="">
									
								</div>

								  <div class="mb-3">
									  <div class="form-group">
											<label class="form-label">Selecionar Nivel - Grado - Seccion</label>
											<select class="form-select"  id="nivel_alu"> 
												<option value="0" selected >Seleccione Nivel </option>
												<option value="1">Primaria</option> 
												<option value="2">Secundaria</option>
											</select>
									   </div>
									</div>

									<div class="mb-3">
									  <div class="form-group">
											<select class="form-select" id="grado_alu"> 
												<option value="-">Selecionar Grado</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
										  </select> 
										</div>
									</div>

									<div class="mb-3">
							  		<div class="form-group">
											<select class="form-select" name=seccion id="seccion_alu"> 
													<option value="-" selected>Seleccione Seccion 
							 						<option value="A">A</option>
													<option value="B">B</option>
													<option value="C">C</option>
													<option value="D">D</option>
													<option value="E">E</option>
											</select> 
										</div>
								  </div>	


								<div class="mb-3 text-center">
									<button class="btn btn-primary" type="submit" id="btnEditc" onclick="$('#editar').removeClass('show');
			$('#editar').css('display', 'none');" >Cancelar</button>
									<button class="btn btn-primary" type="submit" id="btnEdit" onclick="editMatricula();" >Editar</button>
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
</div>
	<!-- Page Content overlay -->
	<script type="text/javascript" src="funciones/matricula.js"></script>
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

	<script src="src/js/pages/data-table.js"></script>
	<script src="../assets/vendor_components/datatable/datatables.min.js"></script>
	
</body>
</html>
