<header> 
	<div class="icon-bar-sticky">
	  <a href="#" class="waves-effect waves-light btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
	  <a href="#" class="waves-effect waves-light btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
	  <a href="#" class="waves-effect waves-light btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
	  <a href="#" class="waves-effect waves-light btn btn-social-icon btn-youtube"><i class="fa fa-youtube-play"></i></a>
	</div>
	
		<nav hidden class="nav" style="background:#fff">
			<div class="nav-header">
				<a href="index.html"> <img src="assets/images/logo.png" style="height:60px;width:250px"alt=""/> </a>
			</div>								
			<ul class="menu"style="color:#000">
				<li>	
					<a href="index.php">Inicio</a>
				</li>							
				<li>
					<a href="courses_categories.php">Cursos</a>
				</li>
				<li>
					<a href="staff.php">Docentes</a>
				</li>
				<li>
					<a href="matricula.php">Admision 2022</a>
				</li>
				<li>
					<a href="galeria.php">Galeria</a>
				</li>
				<li>
					<a href="contact_us.php">Contacto</a>
				</li>
				<?php if(isset($_SESSION['usuario=cole'])) { ?>
				<li>
					<a href="userprofile.php?user=<?php  echo $_SESSION['usuario=cole'];?>">Perfil</a>
				</li>
				<li>
					<a href="controles/code=close.php">Cerrar Sesion</a>
				</li>
				<?php } ?>
			</ul>
		</nav>
</header>