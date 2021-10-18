<?php session_start(); include 'controles/code=conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../assets/images/favicon.ico">

    <title>Virgen de Guadalupe - Dashboard</title>
    
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
		<!-- Main content -->
		<section class="content">
			<div class="row">

				<div class="col-xl-12 col-12">
					<div class="row">
						<?php $detallesUs = $conexion->prepare("SELECT *, count(*) as totalUs FROM usuarios WHERE ROL = 2");
        				$detallesUs->execute();
        				$userE = $detallesUs->fetch(PDO::FETCH_ASSOC); ?>
						<div class="col-3">
							<div class="box bg-warning">
								<div class="box-body">									
									<h2 class="my-0 fw-600 text-white"><?php echo $userE['totalUs'] ; ?>+</h2>
									<p class="mb-10 text-white-80">Total de usuarios</p>
									<div class="d-flex align-items-center justify-content-between">
										<p class="mb-0 text-white-70">Ver todos los usuarios</p>
										<button onclick="window.location = 'usuarios.php' "; type="button" class="waves-effect waves-circle btn btn-circle btn-warning-light"><i class="mdi mdi-arrow-top-right"></i></button>
									</div>
								</div>
							</div>
						</div>
						<?php $detallesUs = $conexion->prepare("SELECT *, count(*) as totalAl FROM usuarios WHERE ROL = 3");
        				$detallesUs->execute();
        				$userE = $detallesUs->fetch(PDO::FETCH_ASSOC); ?>
        		<div class="col-3">
							<div class="box bg-danger">
								<div class="box-body">									
									<h2 class="my-0 fw-600 text-white"><?php echo $userE['totalAl'] ; ?>+</h2>
									<p class="mb-10 text-white-80">Total de alumnos</p>
									<div class="d-flex align-items-center justify-content-between">
										<p class="mb-0 text-white-70">Ver todos los alumnos</p>
										<button onclick="window.location = 'alumnos.php' "; type="button" class="waves-effect waves-circle btn btn-circle btn-warning-light"><i class="mdi mdi-arrow-top-right"></i></button>
									</div>
								</div>
							</div>
						</div>
						<?php $detallesUs = $conexion->prepare("SELECT *, count(*) as totalPro FROM usuarios WHERE ROL = 4");
        				$detallesUs->execute();
        				$userE = $detallesUs->fetch(PDO::FETCH_ASSOC); ?>
        		<div class="col-3">
							<div class="box bg-info">
								<div class="box-body">									
									<h2 class="my-0 fw-600 text-white"><?php echo $userE['totalPro'] ; ?>+</h2>
									<p class="mb-10 text-white-80">Total de apoderados</p>
									<div class="d-flex align-items-center justify-content-between">
										<p class="mb-0 text-white-70">Ver todos los apoderados</p>
										<button onclick="window.location = 'apoderados.php' "; type="button" class="waves-effect waves-circle btn btn-circle btn-warning-light"><i class="mdi mdi-arrow-top-right"></i></button>
									</div>
								</div>
							</div>
						</div>
						<?php $detallesUs = $conexion->prepare("SELECT *, count(*) as totalDoc FROM usuarios WHERE ROL = 5");
        				$detallesUs->execute();
        				$userE = $detallesUs->fetch(PDO::FETCH_ASSOC); ?>
        		<div class="col-3">
							<div class="box bg-dark">
								<div class="box-body">									
									<h2 class="my-0 fw-600 text-white"><?php echo $userE['totalDoc'] ; ?>+</h2>
									<p class="mb-10 text-white-80">Total de docentes</p>
									<div class="d-flex align-items-center justify-content-between">
										<p class="mb-0 text-white-70">Ver todos los docentes</p>
										<button onclick="window.location = 'docentes.php' "; type="button" class="waves-effect waves-circle btn btn-circle btn-warning-light"><i class="mdi mdi-arrow-top-right"></i></button>
									</div>
								</div>
							</div>
						</div>

						

					</div>
				</div>

				<div class="col-xl-8 col-12">
					<div class="box">
						<div class="box-body">
							<div style="max-width: 100%; margin: 1em;" id="contenedorGrafica"></div>
						</div>
					</div>
				</div>

				<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
				<script type="text/javascript" src="funciones/chart=v1.js"></script>

				
				<div class="col-xl-4 col-12">
					<div class="box">
						<div class="box-header no-border">
							<h3 class="box-title">Noticias</h3>
						</div>
						<div class="box-body p-0">
							<div class="act-div">
							  <div class="media-list media-list-hover">
								<div class="media bar-0">
								  <span class="avatar avatar-lg bg-primary-light rounded"><i class="fa fa-user"></i></span>
								  <div class="media-body">
									<p class="d-flex align-items-center justify-content-between">
									  <a class="hover-success fs-16" href="#">Nuevo profesor</a>
									  <span class="text-fade fs-12">Hoy día</span>
									</p>
									<p class="text-fade">Es un hecho establecido desde hace mucho tiempo que un lectordistraído por lo legible</span>...</p>
								  </div>
								</div>

								<div class="media bar-0">
								  <span class="avatar avatar-lg bg-danger-light rounded"><i class="fa fa-money"></i></span>
								  <div class="media-body">
									<p class="d-flex align-items-center justify-content-between">
									  <a class="hover-success fs-16" href="#">Nueva estructura de tarifas</a>
									  <span class="text-fade fs-12">12 de Oct</span>
									</p>
									<p class="text-fade">Es un hecho establecido desde hace mucho tiempo que un lectordistraído por lo legible</span>...</p>
								  </div>
								</div>

								<div class="media bar-0">
								 <span class="avatar avatar-lg bg-success-light rounded"><i class="fa fa-book"></i></span>
								  <div class="media-body">
									<p class="d-flex align-items-center justify-content-between">
									  <a class="hover-success fs-16" href="#">Plan de estudios actualizado</a>
									  <span class="text-fade fs-12">11 de Oct</span>
									</p>
									<p class="text-fade">Es un hecho establecido desde hace mucho tiempo que un lectordistraído por lo legible</span>...</p>
								  </div>
								</div>

								<div class="media bar-0">
								  <span class="avatar avatar-lg bg-info-light rounded"><i class="fa fa-graduation-cap"></i></span>
								  <div class="media-body">
									<p class="d-flex align-items-center justify-content-between">
									  <a class="hover-success fs-16" href="#">Nuevo curso</a>
									  <span class="text-fade fs-12">10 de Oct</span>
									</p>
									<p class="text-fade">Es un hecho establecido desde hace mucho tiempo que un lectordistraído por lo legible</span>...</p>
								  </div>
								</div>

								<div class="media bar-0">
								  <span class="avatar avatar-lg bg-danger-light rounded"><i class="fa fa-money"></i></span>
								  <div class="media-body">
									<p class="d-flex align-items-center justify-content-between">
									  <a class="hover-success fs-16" href="#">Nueva estructura de tarifas</a>
									  <span class="text-fade fs-12">09 de Oct</span>
									</p>
									<p class="text-fade">Es un hecho establecido desde hace mucho tiempo que un lectordistraído por lo legible</span>...</p>
								  </div>
								</div>

							  </div>
							</div>
						</div>
						<div class="box-footer text-center p-20">
							<a href="extra_taskboard.html" class="btn w-p100 btn-primary-light p-5">Ver todos</a>
						</div>
					</div>
				</div>
				<!--
				<div class="col-xl-6 col-12">
					<div class="box">
						<div class="box-header no-border">
							<h3 class="box-title">Top 5 School Performance</h3>
						</div>
						<div class="box-body">
							<div id="performance_chart"></div>
						</div>
					</div>
				</div>

				<div class="col-xl-3 col-12">
					<div class="box">
						<div class="box-header no-border">
							<h3 class="box-title">Overall Pass Percentage</h3>
						</div>
						<div class="box-body" style="min-height: 275px;">
							<div id="pass_chart"></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-12">
					<div class="box">
						<div class="box-header no-border">
							<h3 class="box-title">Content Usage</h3>
						</div>
						<div class="box-body text-center pt-60">
							<p class="text-primary">12.5% higher than last month</p>
							<div id="usage_chart"></div>
						</div>
					</div>
				</div>				
				-->
			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
	<?php include 'controles/vista=footer.php'; ?>
	<?php include 'controles/vista=post_footer.php'; ?>
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>	
	
</div>

	<!-- Vendor JS -->
	<script src="src/js/vendors.min.js"></script>
	<script src="src/js/pages/chat-popup.js"></script>
    <script src="../assets/icons/feather-icons/feather.min.js"></script>
	
	<script src="../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	<script src="../assets/vendor_components/moment/min/moment.min.js"></script>
	<script src="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>	
	
	<!-- edulearn App -->
	<script src="src/js/demo.js"></script>
	<script src="src/js/template.js"></script>
	<script src="src/js/pages/dashboard.js"></script>
	
</body>
</html>
