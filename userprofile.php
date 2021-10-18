<?php
session_start();
include 'controles/code=conexion.php'; 

if (isset($_SESSION['usuario=cole'])) {

    $user= $_SESSION["usuario=cole"];

    $detallesU = $conexion->prepare("SELECT * FROM usuarios WHERE USUARIO=:user");
    $detallesU -> bindParam(':user', $user, PDO::PARAM_STR);
    $detallesU->execute();

    $info = $detallesU->fetch(PDO::FETCH_ASSOC);
}

    $user=$_GET['user'];
    $detallesU = $conexion->prepare("SELECT * FROM usuarios WHERE USUARIO=:user");
    $detallesU -> bindParam(':user', $user, PDO::PARAM_STR);
    $detallesU->execute();

    $infoGet = $detallesU->fetch(PDO::FETCH_ASSOC);

    if (!isset($_GET['user'])) {

       header('Location: ../');

    }else if($user=="0"){

        header('Location: ../');

    }else if($user!=$infoGet['USUARIO']){
        
        header('Location: ../');

    }else if($user==""){
        
        header('Location: ../');

    }else{


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
    <link rel="icon" href="assets/images/favicon.ico">

    <title><?php  echo $infoGet['NOMBRES']." ".$infoGet['APELLIDOS'];?> - Perfil</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="assets/css/vendors_css.css">
		  
	<!-- Style-->  
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/skin_color.css">
     
  </head>

<body class="theme-primary">
	<?php  include "nav.php"; ?>

	<br><br>
	
	<section class="py-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-4 col-12">
					<div class="box position-sticky t-100">
						<div class="box-body text-center">
							<div class="mb-20 mt-20">
								<?php  if( $infoGet['GENERO'] != "" ){ ?>
								<img src="perfil/src=img/<?php  echo $infoGet['FOTO_PERFIL'];?>" width="200" class="rounded-circle bg-info-light" alt="user">
								<?php  }else{ ?>
								<img src="perfil/src=img/perfil.gif" width="200" class="rounded-circle bg-info-light" alt="user">
								<?php } ?>
								<h4 class="mt-20 mb-0"><?php  echo $infoGet['NOMBRES']." ".$infoGet['APELLIDOS'];?></h4>
								<a href="mailto:dummy@gmail.com"><?php  echo $infoGet['CORREO'];?></a>
							</div>

							<?php  
								if($infoGet['GENERO'] == 1 ){ 
									if($infoGet['ROL'] == 1 ){$val = "Administrador";}
									if($infoGet['ROL'] == 2 ){$val = "Usuario";}
									if($infoGet['ROL'] == 3 ){$val = "Alumno";}
									if($infoGet['ROL'] == 4 ){$val = "Apoderado";}
									if($infoGet['ROL'] == 5 ){$val = "Profesor";} ?>
									<div class="badge badge-info-light fs-16"><?php echo $val; ?></div>
								<?php  }else{ 	
							 		if($infoGet['ROL'] == 1 ){$val = "Administradora";}
									if($infoGet['ROL'] == 2 ){$val = "Usuaria";}
									if($infoGet['ROL'] == 3 ){$val = "Alumna";}
									if($infoGet['ROL'] == 4 ){$val = "Apoderada";}
									if($infoGet['ROL'] == 5 ){$val = "Profesora";} ?>
									<div class="badge badge-info-light fs-16"><?php echo $val; ?></div>
								<?php 
							 	} 
							?>

						</div>
						<div class="p-15 bt-1 bb-1">
							<div class="row text-center">
								<div class="col-6 be-1">
									<a href="#" class="link d-flex align-items-center justify-content-center font-medium">
										<span class="icon-Mail fs-20 me-5"></span>Message</a>
								</div>
								<div class="col-6">
									<a href="#" class="link d-flex align-items-center justify-content-center font-medium">
										<span class="icon-Code1 fs-20 me-5"><span class="path1"></span><span class="path2"></span></span>Portfolio</a>
								</div>
							</div>						
						</div>
						<ul class="nav d-block nav-stacked" id="pills-tab23" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-personal-tab" data-bs-toggle="pill" href="#pills-personal" role="tab" aria-controls="pills-personal" aria-selected="true">
									<i class="me-10 mdi mdi-account"></i>Detalles personales
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-courses-tab" data-bs-toggle="pill" href="#pills-courses" role="tab" aria-controls="pills-courses" aria-selected="true">
									<i class="me-10 mdi mdi-book"></i>Cursos <span class="pull-right badge bg-info-light">1310</span>
								</a>
							</li>
							<?php if (isset($_SESSION['usuario=cole']) AND $_SESSION['usuario=cole'] == $infoGet['USUARIO']){ ?>
							<li class="nav-item">
								<a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">
									<i class="me-10 mdi mdi-account"></i>Editar perfil
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-password-tab" data-bs-toggle="pill" href="#pills-password" role="tab" aria-controls="pills-password" aria-selected="true">
									<i class="me-10 mdi mdi-lock"></i>Cambiar contraseña
								</a>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>

				<div class="col-lg-9 col-md-8 col-12">
					<div class="box">
						<div class="box-body">
							<div class="tab-content" id="pills-tabContent23">
							    <div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
									<h4 class="box-title mb-0">
										Personal Details
									</h4>
									<hr>
									<ul class="list-unstyled clearfix">
										<li class="w-md-p50 float-start pb-10">
											<a href="#" class="text-dark d-flex justify-content-between pe-50">
												<span class="fw-500">NOMBRES :</span>
												<span class="text-muted"> <?php  echo $infoGet['NOMBRES'];?></span>
											</a>
										</li>
										<li class="w-md-p50 float-start pb-10">
											<a href="#" class="text-dark d-flex justify-content-between">
												<span class="fw-500">APELLIDOS :</span>
												<span class="text-muted"><?php  echo $infoGet['APELLIDOS'];?></span>
											</a>
										</li>
										
										<li class="w-md-p50 float-start pb-10">
											<a href="#" class="text-dark d-flex justify-content-between pe-50">
												<span class="fw-500">Email :</span>
												<span class="text-muted"><?php  echo $infoGet['CORREO'];?></span>
											</a>
										</li>
										<li class="w-md-p50 float-start pb-10">
											<a href="#" class="text-dark d-flex justify-content-between">
												<span class="fw-500">CELULAR :</span>
												<span class="text-muted"><?php  echo $infoGet['NRO_TELEFONICO'];?></span>
											</a>
										</li>
									</ul>
									<hr>
									<h4 class="box-title mb-0">
										Sobre mi
									</h4>
									<hr>
									<p>
										<?php  echo $infoGet['SOBRE_MI'];?>
									</p>
									<hr>
									
								</div>
							  <div class="tab-pane fade" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
									<div class="row">
										<div class="col-12">
											<h4 class="box-title mb-0">
												Mis cursos
											</h4>
											<hr>
										</div>
										<?php

											$detallesUs = $conexion->prepare("SELECT * FROM user_curso WHERE ID_USUARIO = :i ORDER BY ID DESC");
											$detallesUs -> bindParam(':i', $infoGet['ID']);
				        			$detallesUs->execute();
				        			$curs = $detallesUs->fetchAll(PDO::FETCH_ASSOC);

											foreach($curs as $cursoss){ 

												$detallesUs = $conexion->prepare("SELECT * FROM curso WHERE ID = :id ORDER BY ID DESC");
												$detallesUs -> bindParam(':id', $cursoss['CURSO']);
				        				$detallesUs->execute();
				        				$cursos = $detallesUs->fetch(PDO::FETCH_ASSOC);
										?>
										<div class="col-lg-4 col-12">
											<div class="card">
											  <img class="card-img-top" src="assets/images/courses/<?php echo $cursos['IMAGEN']; ?>" alt="Card image cap">
											  <div class="card-body">
												<h4 class="card-title justify-content-between d-flex align-items-center"><?php echo $cursos['TITULO']; ?>
												   <span class="badge badge-success">Activo</span>
												</h4>
												<p class="card-text"><?php echo $cursos['DESCRIPCION']; ?></p>
											  </div>
											  
											</div>
										</div>
										<?php } ?>
									</div>
								</div>

							  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">									
									<div class="row">
										<div class="col-12">
											<form class="form">
												<div>
													<h4 class="box-title text-info"><i class="ti-user me-15"></i> Editar perfil</h4>
													<hr class="my-15">
													<div class="row">
													  <div class="col-md-6">

														<div class="form-group">
														  <label class="form-label">First Name</label>
														  <input type="text" class="form-control" placeholder="First Name">
														</div>
													  </div>
													  <div class="col-md-6">
														<div class="form-group">
														  <label class="form-label">Last Name</label>
														  <input type="text" class="form-control" placeholder="Last Name">
														</div>
													  </div>
													</div>
													<div class="row">
													  <div class="col-md-6">
														<div class="form-group">
														  <label class="form-label">Company Name</label>
														  <input type="text" class="form-control" placeholder="Company Name">
														</div>
													  </div>
													  <div class="col-md-6">
														<div class="form-group">
														  <label class="form-label">Contact Number</label>
														  <input type="tel" class="form-control" placeholder="Phone">
														</div>
													  </div>
													</div>
													<h4 class="box-title text-info mt-30"><i class="ti-envelope me-15"></i> Información de contacto &amp; Biografia</h4>
													<hr class="my-15">
													<div class="form-group">
													  <label class="form-label">Email</label>
													  <input class="form-control" type="email" placeholder="email">
													</div>
													<div class="form-group">
													  <label class="form-label">Website</label>
													  <input class="form-control" type="url" placeholder="http://">
													</div>
													<div class="form-group">
													  <label class="form-label">Contact Number</label>
													  <input class="form-control" type="tel" placeholder="Contact Number">
													</div>
													<div class="form-group">
													  <label class="form-label">Address</label>
													  <input class="form-control" type="text" placeholder="Address">
													</div>
													<div class="form-group">
													  <label class="form-label">Bio</label>
													  <textarea rows="4" class="form-control" placeholder="Bio"></textarea>
													</div>
													<h4 class="box-title text-info mt-30"><i class="ti-share me-15"></i> Social Profile</h4>
													<hr class="my-15">
													<div class="form-group">
													  <label class="form-label">Facebook</label>
													  <input class="form-control" type="text" placeholder="Facebook">
													</div>
													<div class="form-group">
													  <label class="form-label">Twitter</label>
													  <input class="form-control" type="text" placeholder="Twitter">
													</div>
													<div class="form-group">
													  <label class="form-label">Instagram</label>
													  <input class="form-control" type="text" placeholder="Instagram">
													</div>
													<div class="form-group">
													  <label class="form-label">Linkedin</label>
													  <input class="form-control" type="text" placeholder="Linkedin">
													</div>
													<hr class="my-15">
												</div>
												<div class="d-flex justify-content-end gap-items-2">
													<button type="submit" class="btn btn-success">
													  <i class="ti-save-alt"></i> Save changes
													</button>
													<button type="button" class="btn btn-danger">
													  <i class="ti-trash"></i> Cancel
													</button>
												</div>  
											</form>
										</div>
									</div>
								</div>
							  <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
									<div class="row">
										<div class="col-12">
											<form class="form">
												<div>
													<h4 class="box-title text-info"><i class="ti-user me-15"></i> Cambiar contraseña</h4>
													<hr class="mb-15">
													<div class="form-group">
														<label class="form-label">User Name</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="ti-user"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Username">
														</div>
													</div>
													<div class="form-group">
														<label class="form-label">Email address</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="ti-email"></i></span>
															</div>
															<input type="email" class="form-control" placeholder="Email">
														</div>
													</div>
													<div class="form-group">
														<label class="form-label">Current Password</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="ti-lock"></i></span>
															</div>
															<input type="password" class="form-control" placeholder="Password">
														</div>
													</div>
													<div class="form-group">
														<label class="form-label">Password</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="ti-lock"></i></span>
															</div>
															<input type="password" class="form-control" placeholder="Password">
														</div>
													</div>
													<div class="form-group">
														<label class="form-label">Confirm Password</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="ti-lock"></i></span>
															</div>
															<input type="password" class="form-control" placeholder="Confirm Password">
														</div>
													</div>
													<div class="form-group">
														<div class="checkbox checkbox-success">
															<input id="checkbox1" type="checkbox">
															<label for="checkbox1" class="form-label"> Remember me </label>
														</div>
													</div>
												</div>
												<div class="d-flex justify-content-end gap-items-2">
													<button type="submit" class="btn btn-success">
													  <i class="ti-save-alt"></i> Save changes
													</button>
													<button type="button" class="btn btn-danger">
													  <i class="ti-trash"></i> Cancel
													</button>
												</div>  
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	<?php include "footer.php" ?>
	<!-- Vendor JS -->
	<script src="assets/js/vendors.min.js"></script>	
	<!-- Corenav Master JavaScript -->
    <script src="assets/corenav-master/coreNavigation-1.1.3.js"></script>
    <script src="assets/js/nav.js"></script>
	<script src="assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
	<script src="assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
	
	<!-- EduLearn front end -->
	<script src="assets/js/template.js"></script>
	
	
	
</body>
</html>
