<main><main>
<?php  session_start();
if(isset($_SESSION['usuario=cole']) AND $_SESSION['usuario=cole'] !="") { header('Location: index.php'); } 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIRGEN DE GUADALUPE</title>
    <link rel="shortcut icon" href="assets/images/logo1.png">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <script type="text/javascript" src="https://doolpool.com/assets/js/jquery-3.6.0.min.js"></script>
   </head> 

<body>
            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo Electronico" id="correo_login" required>
                        <input type="password" placeholder="Contraseña" id="password_login" required>
                        <button type="button" onclick="loginAuth()" id="btnlogin">Entrar</button>
                    </form>

                    <!--Register-->
                    <form class="formulario__register">
                        <h2>Regístrarse</h2>
                        <input type="text" placeholder="Nombre" id="nombre_register" required>
                        <input type="text" placeholder="Apellido" id="apellido_register" required>
                        <input type="text" placeholder="Correo Electronico" id="correo_register" required>
                        <input type="password" placeholder="Contraseña" id="password_register" required>
                        <button type="button" onclick="registroAuth();" id="btnRegis">Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>
        <script src="assets/js/auth.js"></script>
        <script src="assets/js/script_1.js"></script>
</body>
</html>