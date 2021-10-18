  <header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">	
		<!-- Logo -->
		<a href="index.html" class="logo">
		  <!-- logo-->
		  <div class="logo-mini w-30">
			  <span class="light-logo"><img src="../assets/images/logo.png" alt="logo"></span>
			  <span class="dark-logo"><img src="../assets/images/logo.png" alt="logo"></span>
		  </div>
		  <div class="logo-lg">
			  <span class="light-logo"><img src="../assets/images/logo.png" alt="logo"></span>
			  <span class="dark-logo"><img src="../assets/images/logo.png" alt="logo"></span>
		  </div>
		</a>	
	</div>   
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light ms-0" data-toggle="push-menu" role="button">
					<i data-feather="menu"></i>
			    </a>
			</li>
			<li class="btn-group d-lg-inline-flex d-none">
				<div class="app-menu">
					<div class="search-bx mx-5">
						<form>
							<div class="input-group">
							  <input type="search" class="form-control" placeholder="Search">
							  <div class="input-group-append">
								<button class="btn" type="submit" id="button-addon3"><i class="icon-Search"><span class="path1"></span><span class="path2"></span></i></button>
							  </div>
							</div>
						</form>
					</div>
				</div>
			</li>
		</ul> 
	  </div>
		
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
			<li class="btn-group d-md-inline-flex d-none">
              <a href="javascript:void(0)" title="skin Change" class="waves-effect skin-toggle waves-light">
			  	<label class="switch">
					<input type="checkbox" data-mainsidebarskin="toggle" id="toggle_left_sidebar_skin">
					<span class="switch-on"><i data-feather="sun"></i></span>
					<span class="switch-off"><i data-feather="moon"></i></span>
				</label>
			  </a>				
      </li>
			<li class="dropdown notifications-menu btn-group">
				<a href="#" class="waves-effect waves-light btn-primary-light svg-bt-icon bg-transparent" data-bs-toggle="dropdown" title="Notifications">
					<i data-feather="bell"></i>
					<div class="pulse-wave"></div>
			    </a>
				<ul class="dropdown-menu animated bounceIn">
				  <li class="header">
					<div class="p-20">
						<div class="flexbox">
							<div>
								<h4 class="mb-0 mt-0">Notifications</h4>
							</div>
							<div>
								<a href="#" class="text-danger">Clear All</a>
							</div>
						</div>
					</div>
				  </li>
				  <li>
					<!-- inner menu: contains the actual data -->
					<ul class="menu sm-scrol">
					  <li>
						<a href="#">
						  <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-user text-primary"></i> Nunc fringilla lorem 
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
						</a>
					  </li>
					</ul>
				  </li>
				  <li class="footer">
					  <a href="#">View all</a>
				  </li>
				</ul>
			</li>
			
			<li class="btn-group nav-item d-xl-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="Full Screen">
					<i data-feather="maximize"></i>
			    </a>
			</li>
<?php if(isset($_SESSION['usuario=cole'])){ ?> 
			<!-- User Account-->
			<li class="dropdown user user-menu">
				<a href="#" class="waves-effect waves-light dropdown-toggle w-auto l-h-12 bg-transparent p-0 no-shadow" title="User" data-bs-toggle="modal" data-bs-target="#quick_user_toggle">
					<div class="d-flex pt-1 align-items-center">
						<div class="text-end me-10">
							<p class="pt-5 fs-14 mb-0 fw-700">Nil Yeager</p>
							<small class="fs-10 mb-0 text-uppercase text-mute">Admin</small>
						</div>
						<img src="../assets/images/avatar/avatar-13.png" class="avatar rounded-circle bg-primary-light h-40 w-40" alt="" />
					</div>
				</a>
			</li>		  
<?php } ?>         
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar style="background-color: #293146;"-->
  <aside class="main-sidebar" >
    <!-- sidebar-->
    <section class="sidebar position-relative"> 
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 97%;">	
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">	
				<li>
				  <a href="../Admin/"><i data-feather="home"></i><span>Inicio</span></a>
				</li>
				<li>
				  <a href="alumnos.php"><i data-feather="users"></i><span>Alumnos</span></a>
				</li>
				<li>
				  <a href="apoderados.php"><i data-feather="user-check"></i><span>Apoderados</span></a>
				</li>
				<li>
				  <a href="docentes.php"><i data-feather="briefcase"></i><span>Docentes</span></a>
				</li>
				<li>
				  <a href="usuarios.php"><i data-feather="users"></i><span>Usuarios</span></a>
				</li>				  
				
				<li class="treeview">
				  <a href="#">
						<i data-feather="book"></i>
						<span>Academico</span>
						<span class="pull-right-container">
						  <i class="fa fa-angle-right pull-right"></i>
						</span>
				  </a>
				  <ul class="treeview-menu">
						<li>
							<a href="cursos.php" ><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Cursos</a>
						</li>	
						<li>
							<a href="matriculas.php" ><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Matriculas</a>
						</li>	
						<li>
							<a href="retiros.php" ><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Retiros</a>
						</li>	
						<li>
							<a href="transferencias.php" ><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Transferencias</a>
						</li>	
				  </ul>
				</li>

				<li>
				  <a href="setting.php"><i data-feather="settings"></i><span>Administrador</span></a>
				</li>	

			  </ul>
			  
			  <div class="sidebar-widgets">
				  <div class="mx-25 mb-30 pb-20 side-bx bg-primary-light rounded20">
					<div class="text-center">
						<img src="../assets/images/svg-icon/color-svg/custom-24.svg" class="sideimg p-5" alt="">
						<h4 class="title-bx text-primary">Virgen de Guadalupe</h4>
					</div>
				  </div>
			  </div>
		  </div>
		</div>
    </section>
  </aside> 