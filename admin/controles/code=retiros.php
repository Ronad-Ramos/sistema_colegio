<?php 
session_start();
include 'code=conexion.php'; 
ini_set('date.timezone','America/Lima'); 

if (isset($_SESSION['usuario=cole'])) {

    $detallesU = $conexion->prepare("SELECT * FROM usuarios WHERE USUARIO=:user");
    $detallesU -> bindParam(':user', $_SESSION["usuario=cole"], PDO::PARAM_STR);
    $detallesU->execute();
    $info = $detallesU->fetch(PDO::FETCH_ASSOC);
}

//Contraseña por defecto
$passD = "micolegio2021";

if(isset($_POST['tipo']) AND $_POST['tipo'] != "" ){

	if($_POST['tipo'] == "r"){
		
		//Validamos datos del apoderado
        if(isset($_POST["dni_apoderado"]) and $_POST["dni_apoderado"] != ""){   		
		    if(filter_var($_POST['correo_apoderado'], FILTER_VALIDATE_EMAIL)){
		        $claveApoo = explode("@", $_POST['correo_apoderado']);

        		if(isset($_POST["dni_alumno"]) and $_POST["dni_alumno"] != ""){

		        	if(filter_var($_POST['correo_alumno'], FILTER_VALIDATE_EMAIL)){
		        		$claveAlum = explode("@", $_POST['correo_alumno']);
		          			

if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "" && $_FILES['file']['tmp_name'] != "") {

	$imgFile = $_FILES['file']['name'];
	$tmp_dir = $_FILES['file']['tmp_name'];
	$imgSize = $_FILES['file']['size'];

	$upload_dir = '../../archivos/retiros/'; // upload directory
	$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get file extension
						              
	// valid file extensions
	$valid_extensions = array('docx', 'pdf', 'png', 'jpg','jpeg'); // valid extensions

	// rename uploading file //rand(1000,1000000)
	$file = $_POST["dni_alumno"].".".$imgExt;
						                
	// allow valid file file formats
	if(in_array($imgExt, $valid_extensions)){ 

		if(move_uploaded_file($tmp_dir,$upload_dir.$file)){

			if(isset($info['ID']) && $info['ID'] !=""){

				$detallesAppo = $conexion->prepare("SELECT * FROM usuarios WHERE DNI = :dni AND CORREO = :c AND ROL = 4");
    			$detallesAppo -> bindParam(':dni' , $_POST["dni_apoderado"]);
    			$detallesAppo -> bindParam(":c" , $_POST['correo_apoderado']);
    			$detallesAppo -> execute();
    			$infoAp = $detallesAppo->fetch(PDO::FETCH_ASSOC);

    			$detallesAllu = $conexion->prepare("SELECT * FROM usuarios WHERE DNI = :dni AND CORREO = :c AND ROL = 3");
    			$detallesAllu -> bindParam(':dni', $_POST["dni_alumno"]);
    			$detallesAllu -> bindParam(":c" , $_POST['correo_alumno']);
    			$detallesAllu -> execute();
    			$infoAl = $detallesAllu->fetch(PDO::FETCH_ASSOC);

    			if ($infoAp > 0) {
 					if ($infoAl > 0) {

 						$sentencia = $conexion->prepare("INSERT INTO `retiro`(`ID_RETIRO`, `ID_USUARIO`, `ID_ALUMNO`, `ID_APODERADO`, `FECHA`, `ARCHIVO`) VALUES (NULL,?,?,?,NOW(),?)");
						$resultado = $sentencia->execute([$info['ID'],$infoAl['ID'],$infoAp['ID'],$file]); 

						$message = 'Enviado correctamente'; $valor = '1';
 
     				}else{ $message = 'La Información ingresada del alumno no existe!'; $valor = '0';}
     			}else{ $message = 'La Información ingresada del apoderado no existe!'; $valor = '0';}
			}else{ $message = 'Inicia sesion para registar una retiro => <a href="auth.php">Aqui</<>'; $valor = '0'; }
		}else{$message = 'Ocurrio un problema al cargar el archivo, porfavor vuelva a subirlo'; $valor = '0';}
	}else{ $message = 'Solo se permiten jpg - png - jpeg.'; $valor = '0'; }
}else{ $message = 'Selecione su documento de retiro'; $valor = '0';}


		          	}else{ $message = 'El correo electronico del alumno que se inserto no es valido'; $valor = '0';}
	        	}else{$message = 'Inserte el DNI del alumno'; $valor = '0';}
		    }else{ $message = 'El correo electronico del apoderado que se inserto no es valido'; $valor = '0';}
	    }else{$message = 'Inserte el DNI del apoderado'; $valor = '0';}

		$return_arr[] = array("mensaje" => $message, "valor" => $valor);
        echo json_encode($return_arr);
	}

	if($_POST['tipo'] == "m"){

		$detallesUs = $conexion->prepare("SELECT * FROM retiro ORDER BY ID_RETIRO DESC");
        $detallesUs->execute();
        $dagta = $detallesUs->fetchAll(PDO::FETCH_ASSOC);

		$valor = '';

		foreach($dagta as $matri){

			$detallesUs = $conexion->prepare("SELECT * FROM usuarios WHERE ID = :u ");
			$detallesUs -> bindParam(':u', $matri['ID_USUARIO'],); 
			$detallesUs->execute();
			$userName = $detallesUs->fetch(PDO::FETCH_ASSOC);

			$detallesUs = $conexion->prepare("SELECT * FROM usuarios WHERE ID = :a AND ROL = 3");
			$detallesUs -> bindParam(':a', $matri['ID_ALUMNO'],); 
			$detallesUs->execute();
			$alum = $detallesUs->fetch(PDO::FETCH_ASSOC);

			$detallesUs = $conexion->prepare("SELECT * FROM usuarios WHERE ID = :p AND ROL = 4");
			$detallesUs -> bindParam(':p', $matri['ID_APODERADO'],); 
			$detallesUs->execute();
			$apod = $detallesUs->fetch(PDO::FETCH_ASSOC);

			$detallesUs = $conexion->prepare("SELECT * FROM grado WHERE ID = :p ");
			$detallesUs -> bindParam(':p', $alum['ID_GRADO'],); 
			$detallesUs->execute();
			$grd = $detallesUs->fetch(PDO::FETCH_ASSOC);

			$valor .='<tr>';
			$valor .='	<th scope="row">'.$matri['ID_RETIRO'].'</th>';

			$valor .='	<td class="text-fade">'.$apod['NOMBRES'].'</td>';
			$valor .='	<td class="text-fade">'.$apod['APELLIDOS'].'</td>';

			$valor .='	<td class="text-fade">'.$alum['NOMBRES'].'</td>';
			$valor .='	<td class="text-fade">'.$alum['APELLIDOS'].'</td>';

			$valor .='	<td class="text-fade">'.$grd['NIVEL'].' </td>';
			$valor .='	<td class="text-fade">'.$grd['GRADO'].' </td>';
			$valor .='	<td class="text-fade">'.$grd['SECCION'].' </td>';

			$valor .='	<td class="text-fade">'.$matri['FECHA'].'</td>';
			$valor .='	<td class="text-fade"><a href="../archivos/retiros/'.$matri['ARCHIVO'].'"> '.$matri['ARCHIVO'].'</a></td>';

			$valor .='	<td class="table-action">';
			$valor .='		<button id="btnEditar'.$matri['ID_RETIRO'].'" type="button" onclick="editarRetiro('.$matri['ID_RETIRO'].');" class="waves-effect waves-circle btn btn-circle btn-success mb-5"><i class="mdi mdi-lead-pencil"></i></button>';
			$valor .='		<button id="btnEliminar'.$matri['ID_RETIRO'].'" type="button" onclick="eliminarRetiro('.$matri['ID_RETIRO'].');" class="waves-effect waves-circle btn btn-circle btn-danger mb-5"><i class="mdi mdi-close-circle"></i></button>';
			$valor .='	</td>';
			$valor .='</tr>';
		}

		echo $valor;
	}

	if($_POST['tipo'] == "a"){

		$detallesU = $conexion->prepare("SELECT * FROM retiro WHERE ID_RETIRO =:d");
    	$detallesU -> bindParam(':d', $_POST['idd']);
    	$detallesU->execute();

    	$retiro = $detallesU->fetch(PDO::FETCH_ASSOC);

		//Apoderado
		if (isset($_POST['nombres_apoderado_ac']) AND $_POST['nombres_apoderado_ac'] != "") {

			$sentencia = $conexion->prepare("UPDATE `usuarios` SET `NOMBRES`=? WHERE `ID`=?");
            $resultado = $sentencia->execute([$_POST['nombres_apoderado_ac'],$retiro['ID_APODERADO']]);
            $message = '<p>Información actualizada correctamente</p>'; $valor = '1';
		}

		if (isset($_POST['apellidos_apoderado_ac']) AND $_POST['apellidos_apoderado_ac'] != "") {

			$sentencia = $conexion->prepare("UPDATE `usuarios` SET `APELLIDOS`=? WHERE `ID`=?");
            $resultado = $sentencia->execute([$_POST['apellidos_apoderado_ac'],$retiro['ID_APODERADO']]);
            $message = '<p>Información actualizada correctamente</p>'; $valor = '1';
		}
		//alumno
		if (isset($_POST['nombres_alumno_ac']) AND $_POST['nombres_alumno_ac'] != "") {

			$sentencia = $conexion->prepare("UPDATE `usuarios` SET `NOMBRES`=? WHERE `ID`=?");
            $resultado = $sentencia->execute([$_POST['nombres_alumno_ac'],$retiro['ID_ALUMNO']]);
            $message = '<p>Información actualizada correctamente</p>'; $valor = '1';
		}

		if (isset($_POST['apellidos_alumno_ac']) AND $_POST['apellidos_alumno_ac'] != "") {

			$sentencia = $conexion->prepare("UPDATE `usuarios` SET `APELLIDOS`=? WHERE `ID`=?");
            $resultado = $sentencia->execute([$_POST['apellidos_alumno_ac'],$retiro['ID_ALUMNO']]);
            $message = '<p>Información actualizada correctamente</p>'; $valor = '1';
		}

		if($_POST["nivel_alumno_ac"] != "" AND $_POST["grado_alumno_ac"] !="" AND $_POST["seccion_alumno_ac"] !=""){

		    if($_POST["nivel_alumno_ac"]==1){$n="primaria";}else{$n="secundaria";}

				$detallesUs = $conexion->prepare("SELECT * FROM grado");
				$detallesUs->execute();
				$g = $detallesUs->fetchAll(PDO::FETCH_ASSOC);

				foreach($g as $gradx){

					if($gradx['NIVEL']==$n AND $gradx['GRADO']==$_POST["grado_alumno_ac"] AND $gradx['SECCION']==$_POST["seccion_alumno_ac"] AND $gradx['TOTAL_MAX'] <= 15){
						$idG = $gradx['ID']; 
					}
				}

				$sentencia = $conexion->prepare("UPDATE `usuarios` SET `ID_GRADO`=? WHERE `ID`=?");
            	$resultado = $sentencia->execute([$idG,$retiro['ID_ALUMNO']]);
           		$message = '<p>Información actualizada correctamente</p>'; $valor = '1';

		}

		$return_arr[] = array("mensaje" => $message, "valor" => $valor);
        echo json_encode($return_arr);

	}

	if($_POST['tipo'] == "e"){ 

		$detallesUs = $conexion->prepare("SELECT * FROM retiro WHERE ID_RETIRO = :u ");
		$detallesUs -> bindParam(':u', $_POST['id']); 
		$detallesUs -> execute();
		$retiro = $detallesUs->fetch(PDO::FETCH_ASSOC);

		$sentencia = $conexion->prepare("DELETE FROM `retiro` WHERE ID_RETIRO = :i");
        $resultado = $sentencia->execute([ ':i' => $_POST['id'] ]);

		unlink('../../archivos/retiros/'.$retiro['ARCHIVO']);  

	}

	if($_POST['tipo'] == "sue"){
		
		$detallesU = $conexion->prepare("SELECT * FROM retiro WHERE ID_RETIRO =:d");
    	$detallesU -> bindParam(':d', $_POST['user'], PDO::PARAM_STR);
    	$detallesU->execute();

    	$retiro = $detallesU->fetch(PDO::FETCH_ASSOC);

    	$detallesApod = $conexion->prepare("SELECT * FROM usuarios WHERE ID =:d");
    	$detallesApod -> bindParam(':d', $retiro['ID_APODERADO'], PDO::PARAM_STR);
    	$detallesApod->execute();
    	$infoApoderado = $detallesApod->fetch(PDO::FETCH_ASSOC);


    	$detallesAlum = $conexion->prepare("SELECT * FROM usuarios WHERE ID =:d");
    	$detallesAlum -> bindParam(':d', $retiro['ID_ALUMNO'], PDO::PARAM_STR);
    	$detallesAlum->execute();
    	$infoAlumno = $detallesAlum->fetch(PDO::FETCH_ASSOC);

    	
    	$detallesGrado = $conexion->prepare("SELECT * FROM grado WHERE ID =:g");
    	$detallesGrado -> bindParam(':g', $infoAlumno['ID_GRADO'], PDO::PARAM_STR);
    	$detallesGrado->execute();
    	$infoGrado = $detallesGrado->fetch(PDO::FETCH_ASSOC);


    	$return_arr[] = array("infoApoderado" => $infoApoderado , "infoAlumno" => $infoAlumno, "idMatri" => $retiro['ID_RETIRO'], "grado" => $infoGrado);
        echo json_encode($return_arr);
	}
	
}

?>