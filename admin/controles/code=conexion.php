<?php 

$host = "localhost";
$user= "root"; //u322810524_doolpool
$pass = ""; //DoolPool@10.db.pe
$db = "colegio"; //u322810524_doolpool

try {
 
	//aqui realizas la conexion con la bd
	$conexion = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass);

	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexion->query("SET CHARACTER SET utf8");
	
} catch (PDOException $e) {

    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();

}

?>