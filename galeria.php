<?php  session_start(); 

include "controles/code=conexion.php";

if (isset($_SESSION['usuario=cole'])) {
    
    $detallesU = $conexion->prepare("SELECT * FROM usuarios WHERE USUARIO=:user");
    $detallesU -> bindParam(':user', $_SESSION["usuario=cole"], PDO::PARAM_STR);
    $detallesU->execute();

    $info = $detallesU->fetch(PDO::FETCH_ASSOC);

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/images/logo1.png">

    <title>Galeria</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/styleG.css">
	<!-- Vendors Style-->
	<link rel="stylesheet" href="assets/css/vendors_css.css">

	<!-- Style-->  
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/skin_color.css">
     
  </head>
<body class="theme-primary">
	
<?php  include "nav.php"; ?>

    
    <section class="bg-img pt-500 pb-140" style="background-image: url(assets/images/portada-1.jpg); background-position: top center;">
	</section>
	<section class="py-50">
        <hr style="
            width: 80%;
            padding: 1px;
            padding-bottom: 5px;
            box-shadow: -5px 0 10px -15px black;
            background-color:#46a2fd;
            border-radius: 6px;
            position: relative;
            overflow: hidden;"></hr>
     
        <div class="contenedor-imagenes">
            <div class="imagen">
                <img src="assets/images/gallery/img1.1.jpg" alt="">
                <div class="overlay">
                    <h2>Suscribete</h2>
                </div>
            </div>
            <div class="imagen">
                <img src="assets/images/gallery/img2.jpg" alt="">
                <div class="overlay">
                    <h2>Suscribete</h2>
                </div>
            </div>
            <div class="imagen">
                <img src="assets/images/gallery/img3.jpg" alt="">
                <div class="overlay">
                    <h2>Suscribete</h2>
                </div>
            </div>
            <div class="imagen">
                <img src="assets/images/gallery/img5.jpg" alt="">
                <div class="overlay">
                    <h2>Suscribete</h2>
                </div>
            </div>
            <div class="imagen">
                <img src="assets/images/gallery/img6.jpg" alt="">
                <div class="overlay">
                    <h2>Taller de Karate</h2>
                </div>
            </div>
            <div class="imagen">
                <img src="assets/images/gallery/img7.jpg" alt="">
                <div class="overlay">
                    <h2>Taller de Nataciòn</h2>
                </div>
            </div>
            <div class="imagen">
                <img src="assets/images/gallery/img8.1.jpg" alt="">
                <div class="overlay">
                    <h2>Equipo de Futbol Femenino</h2>
                </div>
            </div>
            <div class="imagen">
                <img src="assets/images/gallery/img9.1.jpg" alt="">
                <div class="overlay">
                    <h2>Equipo de Futbol Masculino </h2>
                </div>
            </div>
            <div class="imagen">
                <img src="assets/images/gallery/img10.1.png" alt="">
                <div class="overlay">
                    <h2>Sub campeona en Ajederez</h2>
                </div>
            </div>
            <div class="imagen">
                <img src="assets/images/gallery/img11.1.jpg" alt="">
                <div class="overlay">
                    <h2>Campeones en Voley</h2>
                </div>
            </div>
            <div class="imagen">
                <img src="assets/images/gallery/img12.1.jpg" alt="">
                <div class="overlay">
                    <h2>Subcampeones en Voley</h2>
                </div>
            </div>
            <div class="imagen">
                <img src="assets/images/gallery/img13.1.jpg" alt="">
                <div class="overlay">
                    <h2>Suscriberte</h2>
                </div>
            </div>
            <div class="imagen">
                <img src="assets/images/gallery/img14.1.jpg" alt="">
                <div class="overlay">
                    <h2>Suscriberte</h2>
                </div>
            </div>
            <div class="imagen">
                <img src="assets/images/gallery/img15.1.jpg" alt="">
                <div class="overlay">
                    <h2>Suscriberte</h2>
                </div>
            </div><div class="imagen">
                <img src="assets/images/gallery/img2-1.jpg" alt="">
                <div class="overlay">
                    <h2>Suscriberte</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
include "footer.php";
?>
	<!-- Vendor JS -->
	<script src="assets/js/vendors.min.js"></script>	
	<!-- Corenav Master JavaScript -->
    <script src="assets/corenav-master/coreNavigation-1.1.3.js"></script>
    <script src="assets/js/nav.js"></script>
	<script src="assets/vendor_components/OwlCarousel2/dist/owl.carousel.js"></script>
	<script src="assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>	
	<script src="assets/vendor_components/select2/dist/js/select2.full.js"></script>
	<script>$('.select2').select2();</script>
	<!-- EduLearn front end -->
	<script src="assets/js/template.js"></script>

</script>
</body>
</html>