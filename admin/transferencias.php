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
						<h5 class="card-title">Información de matriculas</h5>
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
										<span>Registrar nuevo retiro</span>
										<input type="hidden" id="dtoNeutral" value="1">
									</a>
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
									<button class="btn btn-primary" type="submit" id="btnEdit" onclick="editTransferencia();" >Editar</button>
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
	<script type="text/javascript" src="funciones/transferencias.js"></script>
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
