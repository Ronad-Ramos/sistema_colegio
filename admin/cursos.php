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

    <title>Cursos - Administrador  </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="src/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="src/css/style.css">
	<link rel="stylesheet" href="src/css/skin_color.css">	

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
					<h4 class="page-title">Cursos</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="../Admin/"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Academico</li>
								<li class="breadcrumb-item active" aria-current="page">Cursos</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-lg-9 col-md-8">
					<div class="box">
					  <div class="media-list media-list-divided media-list-hover" id="cursos"></div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4">
					<div class="box no-shadow">
						<div class="box-body">
						  <a class="btn btn-outline btn-success mb-5 d-flex justify-content-between" href="javascript:void(0)">Cursos <span class="pull-right">-</span></a>
						  <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-success mt-10 d-block text-center">+ Añadir nuevo curso</a>
					  </div>
					  <div class="box-body"><p id="msm"></p></div>
					  
					</div>
				</div>				
			</div>
		</section>
		<!-- /.content -->
	<!-- Popup Model Plase Here -->
	<div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Añadir curso</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
						<div class="form-group">
							<label class="col-md-12 form-label">Titulo</label>
							<div class="col-md-12">
								<input type="text" class="form-control" id="titulo">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12 form-label">Imagen</label>
							<div class="col-md-12">
								<input type="file" class="form-control" accept="image/*" id="imagenCurso">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12 form-label">Descripción</label>
							<div class="col-md-12">
								<textarea class="form-control" rows="5" id="texto"></textarea>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="registrarCurso();">Añadir</button>
					<button type="button" class="btn btn-danger float-end" data-bs-dismiss="modal">Cancelar</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<!-- Popup Model Plase Here -->
	<div id="editar" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Añadir curso</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
						<div class="form-group">
							<label class="col-md-12 form-label">Titulo</label>
							<div class="col-md-12">
								<input type="text" class="form-control" id="tituloC">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12 form-label">Imagen</label>
							<div class="col-md-12">
								<input type="file" class="form-control" accept="image/*" id="imagenCursoC">
								<input type="hidden" id="eiduser" value="" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12 form-label">Descripción</label>
							<div class="col-md-12">
								<textarea class="form-control" rows="5" id="textC"></textarea>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="editCurso();">Editar</button>
					<button type="button" class="btn btn-danger float-end" data-bs-dismiss="modal" onclick="$('#editar').removeClass('show');
				$('#editar').css('display', 'none');">Cancelar</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	  </div>
  </div>
  <!-- /.content-wrapper -->
	<?php include 'controles/vista=footer.php'; ?>
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
	 </div>

	<!-- Vendor JS -->
	<script src="src/js/vendors.min.js"></script>
	<script src="src/js/pages/chat-popup.js"></script>
    <script src="../assets/icons/feather-icons/feather.min.js"></script>	
	
	<!-- edulearn App -->
	<script src="src/js/demo.js"></script>
	<script src="src/js/template.js"></script>
	
	<script src="funciones/cursos.js"></script>

</body>
</html>
