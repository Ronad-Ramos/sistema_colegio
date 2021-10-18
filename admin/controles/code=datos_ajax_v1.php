<?php
	session_start();
	include 'code=conexion.php'; 

	  //$db_host="localhost";//Nombre del host
	  //$db_user="root";//Usuario de la base de datos u322810524_doolpool
	  //$db_pass="";//Contraseña de usuario de base de datos DoolPool@10.db.pe
	  //$db_name="colegio"; //Nombre de la base de datos u322810524_doolpool
	  //$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	 
	  //if ($conn->connect_error) { die("Conexión falló: " . $conn->connect_error);}

	  //set timezone
	  date_default_timezone_set('America/Lima');
	  $year = date('Y');
	  $total=array();
	  for ($month = 1; $month <= 12; $month ++){

	  	$detallesUs = $conexion->prepare("select *, count(*) as total from usuarios where month(FECHA_REGISTRO)='$month' and year(FECHA_REGISTRO)='$year'");
	    $detallesUs->execute();
	    $row = $detallesUs->fetch(PDO::FETCH_ASSOC);

	    //$sql="select *, sum(TOTAL) as total from usuarios where month(FECHA_REGISTRO)='$month' and year(FECHA_REGISTRO)='$year'";
	    //$query=$conn->query($sql);
	    //$row=$query->fetch_array();

	    $total[]=$row['total'];
	  }

	  $tjan = $total[0];
	  $tfeb = $total[1];
	  $tmar = $total[2];
	  $tapr = $total[3];
	  $tmay = $total[4];
	  $tjun = $total[5];
	  $tjul = $total[6];
	  $taug = $total[7];
	  $tsep = $total[8];
	  $toct = $total[9];
	  $tnov = $total[10];
	  $tdec = $total[11];

	  $pyear = $year - 1;
	  $pnum=array();


	if($tjan == NULL){ $tjan = "0"; }else{ $tjan = $total[0]; }
	if($tfeb == NULL){ $tfeb = "0"; }else{ $tfeb = $total[1]; }
	if($tmar == NULL){ $tmar = "0"; }else{ $tmar = $total[2]; }
	if($tapr == NULL){ $tapr = "0"; }else{ $tapr = $total[3]; }
	if($tmay == NULL){ $tmay = "0"; }else{ $tmay = $total[4]; }
	if($tjun == NULL){ $tjun = "0"; }else{ $tjun = $total[5]; }
	if($tjul == NULL){ $tjul = "0"; }else{ $tjul = $total[6]; }
	if($taug == NULL){ $taug = "0"; }else{ $taug = $total[7]; }
	if($tsep == NULL){ $tsep = "0"; }else{ $tsep = $total[8]; }
	if($toct == NULL){ $toct = "0"; }else{ $toct = $total[9]; }
	if($tnov == NULL){ $tnov = "0"; }else{ $tnov = $total[10];}
	if($tdec == NULL){ $tdec = "0"; }else{ $tdec = $total[11];}

	$etiquetas = ["Enero", "Febrero", "Marzo", "Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
	$datosVentas = [ $tjan,$tfeb,$tmar,$tapr,$tmay,$tjun,$tjul,$taug,$tsep,$toct,$tnov,$tdec ];

	$respuesta = [ "etiquetas" => $etiquetas, "datos" => $datosVentas ];
	echo json_encode($respuesta);

?>
