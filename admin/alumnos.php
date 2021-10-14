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
														<h5 class="card-title">Información de usuarios</h5>
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
																		<th scope="col">Contraseña</th>
																		<th scope="col">Correo</th>
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
										<span>Registrar nuevo usuario</span>
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
										<button class="btn btn-primary" type="submit" id="btnRegistrar" onclick="registrarUser();" >Registrar</button>
									</div>
									<p id="msm" ></p>
								
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
  
   <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="../doc/" target="_blank">Documentación</a>
		  </li>
		</ul>
    </div>
	  &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://virgen_de_guadalupe.com">Virgen de Guadalupe</a>. Todos los derechos reservados.
  </footer>
  <!-- Side panel -->

  <!-- quick_user_toggle -->
  <div class="modal modal-right fade" id="quick_user_toggle" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content slim-scroll3">
		  <div class="modal-body p-30 bg-white">
			<div class="d-flex align-items-center justify-content-between pb-30">
				<h4 class="m-0">User Profile
				<small class="text-fade fs-12 ms-5">12 messages</small></h4>
				<a href="#" class="btn btn-icon btn-danger-light btn-sm no-shadow" data-bs-dismiss="modal">
					<span class="fa fa-close"></span>
				</a>
			</div>
            	<div>
                <div class="d-flex flex-row">
                    <div class=""><img src="../assets/images/avatar/avatar-13.png" alt="user" class="rounded bg-danger-light w-150" width="100"></div>
                    <div class="ps-20">
                        <h5 class="mb-0">Nil Yeager</h5>
                        <p class="my-5 text-fade">Manager</p>
                        <a href="mailto:dummy@gmail.com"><span class="icon-Mail-notification me-5 text-success"><span class="path1"></span><span class="path2"></span></span> dummy@gmail.com</a>
                        <button class="btn btn-success-light btn-sm mt-5"><i class="ti-plus"></i> Follow</button>
                    </div>
                </div>
							</div>
              <div class="dropdown-divider my-30"></div>
              <div>
                <div class="d-flex align-items-center mb-30">
                    <div class="me-15 bg-primary-light h-50 w-50 l-h-60 rounded text-center">
                          <span class="icon-Library fs-24"><span class="path1"></span><span class="path2"></span></span>
                    </div>
                    <div class="d-flex flex-column fw-500">
                        <a href="extra_profile.html" class="text-dark hover-primary mb-1 fs-16">My Profile</a>
                        <span class="text-fade">Account settings and more</span>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-30">
                    <div class="me-15 bg-danger-light h-50 w-50 l-h-60 rounded text-center">
                        <span class="icon-Write fs-24"><span class="path1"></span><span class="path2"></span></span>
                    </div>
                    <div class="d-flex flex-column fw-500">
                        <a href="mailbox.html" class="text-dark hover-danger mb-1 fs-16">My Messages</a>
                        <span class="text-fade">Inbox and tasks</span>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-30">
                    <div class="me-15 bg-success-light h-50 w-50 l-h-60 rounded text-center">
                        <span class="icon-Group-chat fs-24"><span class="path1"></span><span class="path2"></span></span>
                    </div>
                    <div class="d-flex flex-column fw-500">
                        <a href="setting.html" class="text-dark hover-success mb-1 fs-16">Settings</a>
                        <span class="text-fade">Accout Settings</span>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-30">
                    <div class="me-15 bg-info-light h-50 w-50 l-h-60 rounded text-center">
                        <span class="icon-Attachment1 fs-24"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                    </div>
                    <div class="d-flex flex-column fw-500">
                        <a href="extra_taskboard.html" class="text-dark hover-info mb-1 fs-16">Project</a>
                        <span class="text-fade">latest tasks and projects</span>
                    </div>
                </div>
              </div>
              <div class="dropdown-divider my-30"></div>
              <div>
                <div class="media-list">
                    <a class="media media-single px-0" href="#">
                      <h4 class="w-50 text-gray fw-500">10:10</h4>
                      <div class="media-body ps-15 bs-5 rounded border-primary">
                        <p>Morbi quis ex eu arcu auctor sagittis.</p>
                        <span class="text-fade">by Johne</span>
                      </div>
                    </a>

                    <a class="media media-single px-0" href="#">
                      <h4 class="w-50 text-gray fw-500">08:40</h4>
                      <div class="media-body ps-15 bs-5 rounded border-success">
                        <p>Proin iaculis eros non odio ornare efficitur.</p>
                        <span class="text-fade">by Amla</span>
                      </div>
                    </a>

                  </div>
            </div>
		  </div>
		</div>
	  </div>
  </div>
  <!-- /quick_user_toggle --> 

  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>	
	 </div>
<!-- ./wrapper -->
	
	
	<div id="chat-box-body">
		<div id="chat-circle" class="waves-effect waves-circle btn btn-circle btn-sm btn-warning l-h-50">
            <div id="chat-overlay"></div>
            <span class="icon-Group-chat fs-18"><span class="path1"></span><span class="path2"></span></span>
		</div>

		<div class="chat-box">
            <div class="chat-box-header p-15 d-flex justify-content-between align-items-center">
                <div class="btn-group">
                 	<img src="../assets/images/avatar/2.jpg" class="avatar avatar-lg" alt="">
                </div>
                <div class="text-center flex-grow-1">
                    <div class="text-dark fs-18">Mayra Sibley</div>
                    <div>
                        <span class="badge badge-sm badge-dot badge-primary"></span>
                        <span class="text-muted fs-12">Active</span>
                    </div>
                </div>
                <div class="chat-box-toggle">
                    <button id="chat-box-toggle" class="waves-effect waves-circle btn btn-circle btn-danger-light h-40 w-40 rounded-circle l-h-50" type="button">
                      <span class="icon-Close fs-22" style="background: #fff;"><span class="path1"></span><span class="path2"></span></span>
                    </button>                    
                </div>
            </div>
            <div class="chat-box-body">
                <div class="chat-box-overlay">   
                </div>
                <div class="chat-logs">
                    <div class="chat-msg user">
                        <div class="d-flex align-items-center">
                            <span class="msg-avatar">
                                <img src="../assets/images/avatar/2.jpg" class="avatar avatar-lg" alt="">
                            </span>
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
                                <p class="text-muted fs-12 mb-0">2 Hours</p>
                            </div>
                        </div>
                        <div class="cm-msg-text">
                            Hi there, I'm Jesse and you?
                        </div>
                    </div>
                    <div class="chat-msg self">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary fw-bold">You</a>
                                <p class="text-muted fs-12 mb-0">3 minutes</p>
                            </div>
                            <span class="msg-avatar">
                                <img src="../assets/images/avatar/3.jpg" class="avatar avatar-lg" alt="">
                            </span>
                        </div>
                        <div class="cm-msg-text">
                           My name is Anne Clarc.         
                        </div>        
                    </div>
                    <div class="chat-msg user">
                        <div class="d-flex align-items-center">
                            <span class="msg-avatar">
                                <img src="../assets/images/avatar/2.jpg" class="avatar avatar-lg" alt="">
                            </span>
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
                                <p class="text-muted fs-12 mb-0">40 seconds</p>
                            </div>
                        </div>
                        <div class="cm-msg-text">
                            Nice to meet you Anne.<br>How can i help you?
                        </div>
                    </div>
                </div><!--chat-log -->
            </div>
            <div class="chat-input">      
                <form>
                    <input type="text" id="chat-input" placeholder="Send a message..."/>
                    <button type="submit" class="chat-submit" id="chat-submit">
                        <span class="icon-Send fs-22"></span>
                    </button>
                </form>      
            </div>
		</div>
	</div>
	
	<!-- Page Content overlay -->
	<script type="text/javascript" src="funciones/usuarios.js"></script>
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
