<?php


if (isset($_POST["Nombre"]) AND isset($_POST["Apellido"])  ANd isset($_POST["Email"])  AND isset($_POST["Telefono"]) ANd isset($_POST["Mensaje"]) ) {
    if ($_POST["Nombre"] != "" ANd $_POST["Apellido"] != "" ANd $_POST["Email"] != "" AND $_POST["Telefono"] != ""ANd $_POST["Mensaje"] != "") {
        

 $destino    = "doolpool.company@gmail.com";

 $nombre     = $_POST["Nombre"];
 $apellidos  = $_POST["Apellido"];
 $correo     = $_POST["Email"];
 $mensaje    = $_POST["Mensaje"];
 
 $telefono   = $_POST["Telefono"];
 
$contenido="Mensaje de contacto "."\n\n".
            "--------------------"."\n\n".
            "\n\n Nombre         : ".$nombre.
            "\n\n Apellidos      : ".$apellidos.
            "\n\n Correo         : ".$correo.
            "\n\n Nro Telefonico : ".$tele."\n\n".
            "--------------------";

mail($destino,"Contacto de Desarrollador : ", $contenido);

echo "Mensaje enviado correctamente!";

    }else{echo "Complete los campos";}
}else{echo "Los campos no existen";}



?>