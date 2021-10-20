<?php  session_start(); 

include "controles/code=conexion.php";

if (isset($_SESSION['usuario=cole'])) {
	
    $detallesU = $conexion->prepare("SELECT * FROM usuarios WHERE USUARIO=:user");
    $detallesU -> bindParam(':user', $_SESSION["usuario=cole"], PDO::PARAM_STR);
    $detallesU->execute();

    $info = $detallesU->fetch(PDO::FETCH_ASSOC);

    if($info['ROL'] == 1 ){ header("location: admin/"); }
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
    <link rel="shortcut icon" href="assets/images/logo1.png">

    <title>Virgen de Guadalupe</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="assets/css/vendors_css.css">

	  
	<!-- Style-->  
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/skin_color.css">
     
  </head>

<body class="theme-primary">
	
<?php 
include "nav.php";
?>

    
    <section class="bg-img pt-500 pb-140" style="background-image: url(assets/images/portada-1.jpg); background-position: top center;">
	</section>
	<section class="py-50">
<hr style="
    width: 80%;
    padding: 1px;
    padding-bottom: 4px;
    box-shadow: -5px 0 10px -15px black;
    background-color:#46a2fd;
    border-radius: 6px;
    position: relative;
    overflow: hidden;"></hr>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-12">
					<h2 class="mb-10">Bienvenida</h2><hr>
					<h4 class="fw-400">Me gustaría extender una cálida bienvenida a todos nuestros padres, estudiantes y futuros padres que visiten nuestro sitio web. Al considerar la educación futura de su hijo, elegir la facultad de educación correcta para su hijo es una de las decisiones más importantes que deben tomar los padres.
					<br><br> Aquí en el Colegio Peruano Británico encontrará maestros, administradores y miembros del personal profesionales y calificados, todos los cuales están enfocados en ayudar a sus hijos a aprender a crecer y ocupar su lugar en la sociedad. Me siento privilegiado de dirigir una escuela con un pasado rico y un futuro emocionante y espero conocerte algún día cuando tengas la oportunidad de visitarnos. Nicholas Hiscocks, director.</p>
				</div>
				<div class="col-lg-6 col-12 position-relative">
					<div class="popup-vdo mt-30 mt-md-0">
						<img src="assets/images/img1.1.jpg" class="img-fluid rounded" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="py-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<a href="#" class="pull-up">
						<div class="p-10">
							<h3 class="my-15">Mision</h3><hr>
							<div class="text-fade fs-16 mb-10">Brindar una educación basada en valores que desarrolle la personalidad y autoestima de cada estudiante, generando el conocimiento y creatividad para ser personas críticas y abiertas al diálogo.</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-6 col-12" ><img class="card-img-top" src="assets/images/mision.jpeg">	
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<a href="#" class="pull-up">
						<div class="p-10">
							<h3 class="my-15">Vision</h3><hr>
							<div class="text-fade fs-16 mb-10">Ser un colegio en valores reconocido por formar personas competentes y con calidad humana, líderes responsables preparados para las exigencias y siempre comprometidos con el desarrollo social de su entorno.</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-6 col-12" ><img class="card-img-top" src="assets/images/vision.jpeg">	
				</div>
			</div>
		</div>
	</section><section class="py-50">
		<div class="container">
			<div class="row align-items-center">
			<div class="col-lg-6 col-12 position-relative">
					<div class="popup-vdo mt-30 mt-md-0">
						<img src="assets/images/valores.jpeg" class="img-fluid rounded" alt="">
					</div>
				</div>
				<div class="col-lg-6 col-12">
					<h2 class="mb-10">Valores</h2>
					<hr>
					<h4 class="fw-400">Dirigimos nuestra metodología hacia el desarrollo de la personalidad de nuestros estudiantes, invitándolos a explorar su creatividad y a descubrir sus talentos desde su individualidad. Desarrollamos proyectos educativos en constante cambio según las necesidades de los estudiantes y el contexto social, fomentando las experiencias como factor importante en su formación.</p>
				</div>
				
			</div>
		</div>
	</section>


<section class="py-50 countnm-bx" style="background-color:#0d47a1;" data-overlay="5" data-aos="fade-up">
	<h1 class="text-center" style="color: white">Les ofrecemos</h1>
	<hr>
<div class="separador"style="width: 50px;
    height: 30px;
    margin: 0 auto;
    border-top: 4px solid #ffffff;
    margin-bottom: 30px;
    margin-top: 10px";></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<div class="text-center">
						<div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center mx-auto">
							<span class="text-white fs-40 icon-User"><span class="path1"></span><span class="path2"></span></span>
						</div>
						<h3><div class="text-uppercase text-white">Excelencia Educativa</div></h3>
					</div>
				</div>	
				<div class="col-lg-3 col-md-6 col-12">
					<div class="text-center">
						<div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center mx-auto">
							<span class="text-white fs-40 icon-Book"></span>
						</div>
						<h3><div class="text-uppercase text-white">Innovacion tecnologica</div></h3>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="text-center">
						<div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center mx-auto">
							<span class="text-white fs-40 icon-Group"><span class="path1"></span><span class="path2"></span></span>
						</div>
						<h3><div class="text-uppercase text-white">Educacion en valores</div></h3>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="text-center">
						<div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center mx-auto">
							<span class="text-white fs-40 icon-Globe"><span class="path1"></span><span class="path2"></span></span>
						</div>
						<h3><div class="text-uppercase text-white">16 años de experiencia</div></h3>
					</div>
				</div>			
			</div>
		</div>
	</section>
	
	
	
	<section class="py-50">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2>Testimonios de alumnos y exalumnos</h2>
					<hr>
				</div>
			</div>
	<div class="row">				
				<div class="col-md-6 col-12 position-relative">
					<div class="testimonial-bx mb-30">
						<div class="testimonial-thumb">
							<img src="assets/images/avatar/avatar-1.png" alt="">
						</div>
						<div class="testimonial-info">
							<h4 class="name">Javier Rodriguez</h4>
							<p></p>
						</div>
						<div class="testimonial-content">
							<p class="fs-16">"Luego de dejar el colegio en el 2015, me gradué -con First Class Honours- como Periodista en la Universidad de Kent en el 2019. Esta institución tiene una de las mejores facultades de periodismo en el Reino Unido. El colegio me ayudó y asesoró cuando aplicaba a universidades inglesas para estudiar periodismo.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-12 position-relative">
					<div class="testimonial-bx mb-30">
						<div class="testimonial-thumb">
							<img src="assets/images/avatar/avatar-2.png" alt="">
						</div>
						<div class="testimonial-info">
							<h4 class="name">Sofia Velasquez</h4>
						
						</div>
						<div class="testimonial-content">
							<p class="fs-16">Cuando hago memoria de todas mis vivencias, es imposible no recordar al colegio con una sonrisa. Gran parte de lo que soy, empezó y se formó en sus aulas. Fue mi lugar de aprendizaje por 13 años, donde junto a los profesores, amigos y personal del colegio he construido mis mejores vivencias y lecciones.</p>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<section class="bg-img pt-200 pb-80" style="background-image:url(assets/images/frase1.jpg); background-position: top center;" data-overlay="5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="text-center text-white">
						<h1><div class="fa fa-quote-right"></h1>
						<h2><div class="testimonial-info">Formamos personas íntegras, creativas, bilingües, con capacidades y actitudes que les aseguren el éxito en un mundo globalizado en permanente cambio.</div></h2>
					</div>
				</div>	
					
			</div>
		</div>
	</section>


	<section class="pb-50">
		<div class="container">
			<h1><div class="text-center">   Nuestros Niveles</div></h1>
			<hr class="w-100 bg-primary">
		<div class="row">
				<div class="col-md-5 col-12" style="margin-left: 150px;">
					<div class="card">
					  	<img class="card-img-top img-responsive p-20" src="assets/images/primaria.jpg" alt="Card image cap">
						<div class="card-body bt-1">            	
							<h4 class="card-title">Primaria</h4>
							<p class="card-text">El nivel Primario, está concebido para preparar a nuestros estudiantes dentro de todas sus etapas, optimizando su desarrollo de acuerdo a su edad mental y cronológica</p>
							<a href="#" class="btn btn-primary">Learn More</a>
						</div>
				    </div>
				</div>
				<div class="col-md-5 col-12">
					<div class="card">
					  	<img class="card-img-top img-responsive p-25" src="assets/images/secundaria.jpg" alt="Card image cap">
						<div class="card-body bt-1">            	
							<h4 class="card-title">Secundaria</h4>
							<p class="card-text">Nuestro modelo académico para el nivel secundario está pensado para formar alumnos de calidad basándose en una propuesta educativa sólida y competente, acorde a los requerimientos nacionales y mundiales.</p>
							<a href="#" class="btn btn-primary">Learn More</a>
						</div>
				    </div>
				</div>
			</div>
			</div>
	</section>
	
	<br>
	<br>

	<?php  include "footer.php"; ?>
	
	<!-- Vendor JS -->
	<script src="assets/js/vendors.min.js"></script>	
	<!-- Corenav Master JavaScript -->
  <script src="assets/corenav-master/coreNavigation-1.1.3.js"></script>
  <script src="assets/js/nav.js"></script>
	<script src="assets/vendor_components/OwlCarousel2/dist/owl.carousel.js"></script>
	<script src="assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>	
	<script src="assets/js/chat_bot.js"></script>
	<script src="assets/vendor_components/select2/dist/js/select2.full.js"></script>
	<script>$('.select2').select2();</script>
	<!-- EduLearn front end -->
	<script src="assets/js/template.js"></script>
	
	
</body>
</html>