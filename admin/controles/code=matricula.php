<?php 
session_start();
include 'code=conexion.php'; 
ini_set('date.timezone','America/Lima'); 

if (isset($_SESSION['usuario=cole'])) {

    $user= $_SESSION["usuario=cole"];

    $detallesU = $conexion->prepare("SELECT * FROM usuarios WHERE USUARIO=:user");
    $detallesU -> bindParam(':user', $user, PDO::PARAM_STR);
    $detallesU->execute();

    $info = $detallesU->fetch(PDO::FETCH_ASSOC);
}

//Contraseña por defecto
$passD = "micolegio2021";

if(isset($_POST['tipo']) AND $_POST['tipo'] != "" ){

	if($_POST['tipo'] == "r"){
		
		//Validamos datos del apoderado
        if(isset($_POST["nombres_apoderado"]) and $_POST["nombres_apoderado"] != ""){
        	if(isset($_POST["apellidos_apoderado"]) and $_POST["apellidos_apoderado"] != ""){
        		if(isset($_POST["dni_apoderado"]) and $_POST["dni_apoderado"] != ""){
        			if(isset($_POST["telefono_apoderado"]) and $_POST["telefono_apoderado"] != ""){
		        		if(filter_var($_POST['correo_apoderado'], FILTER_VALIDATE_EMAIL)){
		        			$claveApoo = explode("@", $_POST['correo_apoderado']);
		          			$userApoo = $claveApoo[0];
		          			if(isset($_POST["direccion_apoderado"]) and $_POST["direccion_apoderado"] != ""){

		//Validamos datos del alumno
        if(isset($_POST["nombres_alumno"]) and $_POST["nombres_alumno"] != ""){
        	if(isset($_POST["apellidos_alumno"]) and $_POST["apellidos_alumno"] != ""){
        		if(isset($_POST["dni_alumno"]) and $_POST["dni_alumno"] != ""){
        			if(isset($_POST["telefono_alumno"]) and $_POST["telefono_alumno"] != ""){
		        		if(filter_var($_POST['correo_alumno'], FILTER_VALIDATE_EMAIL)){
		        			$claveAlum = explode("@", $_POST['correo_alumno']);
		          			$userAlum = $claveAlum[0];
		          			if(isset($_POST["direccion_alumno"]) and $_POST["direccion_alumno"] != ""){
		          				if(isset($_POST["fecha_nac_alumno"]) and $_POST["fecha_nac_alumno"] != ""){
		          					if(isset($_POST["genero_alumno"]) and $_POST["genero_alumno"] != ""){

		          						if($_POST["nivel_alumno"] != "" AND $_POST["grado_alumno"] !="" AND $_POST["seccion_alumno"] !=""){

		          				if($_POST["nivel_alumno"]==1){$n="primaria";}else{$n="secundaria";}

						        $detallesUs = $conexion->prepare("SELECT * FROM grado");
						        $detallesUs->execute();
						        $g = $detallesUs->fetchAll(PDO::FETCH_ASSOC);

								foreach($g as $gradx){
									if($gradx['NIVEL']==$n AND $gradx['GRADO']==$_POST["grado_alumno"] AND $gradx['SECCION']==$_POST["seccion_alumno"] AND $gradx['TOTAL_MAX'] <= 15){
										$idG = $gradx['ID']; }
								}

if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "" && $_FILES['file']['tmp_name'] != "") {

	$imgFile = $_FILES['file']['name'];
	$tmp_dir = $_FILES['file']['tmp_name'];
	$imgSize = $_FILES['file']['size'];

	$upload_dir = '../../archivos/matricula/'; // upload directory
	$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get file extension
						              
	// valid file extensions
	$valid_extensions = array('docx', 'pdf', 'png', 'jpg','jpeg'); // valid extensions

	// rename uploading file //
	$file = $userAlum.rand(1000,1000000).".".$imgExt;
						                
	// allow valid file file formats
	if(in_array($imgExt, $valid_extensions)){ 

		if(move_uploaded_file($tmp_dir,$upload_dir.$file)){

			if(isset($info['ID']) && $info['ID'] !=""){

			//Apoderado
			$sentencia = $conexion->prepare("INSERT INTO `usuarios`(`ID`, `ROL`, `NOMBRES`, `APELLIDOS`, `CORREO`, `USUARIO`, `PASSWORD`, `FECHA_REGISTRO`, `DNI`, `NRO_TELEFONICO`, `DIRECCION`) VALUES (NULL,?,?,?,?,?,?,NOW(),?,?,?)");
			$resultado = $sentencia->execute(["4",$_POST["nombres_apoderado"],$_POST["apellidos_apoderado"],$_POST['correo_alumno'],$userApoo,$passD,$_POST["dni_apoderado"],$_POST["telefono_apoderado"],$_POST["direccion_apoderado"]]); 
			$idApoderado = $conexion->lastInsertId();

			$sentencia = $conexion->prepare("INSERT INTO `usuarios`(`ID`, `ROL`, `NOMBRES`, `APELLIDOS`, `CORREO`, `USUARIO`, `PASSWORD`, `GENERO`, `FECHA_REGISTRO`, `FECHA_NACIMIENTO`, `ID_GRADO`, `DNI`, `NRO_TELEFONICO`, `DIRECCION`) VALUES (NULL,?,?,?,?,?,?,?,NOW(),?,?,?,?,?)");
			$resultado = $sentencia->execute(["3",$_POST["nombres_alumno"],$_POST["apellidos_alumno"],$_POST['correo_alumno'],$userAlum,$passD,$_POST["genero_alumno"],$_POST["fecha_nac_alumno"],$idG,$_POST["dni_alumno"],$_POST["telefono_alumno"],$_POST["direccion_alumno"]]); 
			$idAlumno = $conexion->lastInsertId();

			$sentencia = $conexion->prepare("INSERT INTO `matriculas`(`ID`, `ID_USUARIO`, `ID_ALUMNO`, `ID_APODERADO`, `FECHA`, `ARCHIVO`) VALUES (NULL,?,?,?,NOW(),?)");
			$resultado = $sentencia->execute([$info['ID'],$idAlumno,$idApoderado,$file]); 

			$message = 'Enviado correctamente'; $valor = '1';

			}else{ $message = 'Inicia sesion para registar una matricula => <a href="auth.php">Aqui</<>'; $valor = '0'; }

		}else{
			$message = $tmp_dir.$upload_dir.$file.'Ocurrio un problema al cargar el archivo, porfavor vuelva a subirlo'; $valor = '0';
		}

	}else{ $message = 'Solo se permiten jpg - png - jpeg.'; $valor = '0'; }
}else{ $message = 'Selecione su documento de matricula'; $valor = '0';}


		          						}else{ $message = 'Selecione Nivel-Grado-Seccion'; $valor = '0';}

		          					}else{ $message = 'Selecione el genero del alumno'; $valor = '0';}
		          				}else{ $message = 'Inserte la fecha de nacimiento del alumno'; $valor = '0';}
		          			}else{ $message = 'Complete el campo de direccion del alumno'; $valor = '0';}
		          		}else{ $message = 'El correo electronico del alumno que se inserto no es valido'; $valor = '0';}
          			}else{ $message = 'Inserte el telefono de contacto del alumno'; $valor = '0';}
	        	}else{$message = 'Inserte el DNI del alumno'; $valor = '0';}
        	}else{ $message = 'Inserte el apellido del alumno'; $valor = '0';}
        }else{ $message = 'Inserte el  nombre del alumno!'; $valor = '0';}

		          			}else{ $message = 'Complete el campo de direccion del apoderado'; $valor = '0';}
		          		}else{ $message = 'El correo electronico del apoderado que se inserto no es valido'; $valor = '0';}
          			}else{ $message = 'Inserte el telefono de contacto del apoderado'; $valor = '0';}
	        	}else{$message = 'Inserte el DNI del apoderado'; $valor = '0';}
        	}else{ $message = 'Inserte el apellido del apoderado'; $valor = '0';}
        }else{ $message = 'Inserte el  nombre del apoderado!'; $valor = '0';}

		$return_arr[] = array("mensaje" => $message, "valor" => $valor);
        echo json_encode($return_arr);
	}

	if($_POST['tipo'] == "m"){

		$detallesUs = $conexion->prepare("SELECT * FROM usuarios WHERE TIPO = 2 ORDER BY ID DESC");
        $detallesUs->execute();
        $userE = $detallesUs->fetchAll(PDO::FETCH_ASSOC);
		$valor = '';
		foreach($userE as $usuario){
			$detallesUs = $conexion->prepare("SELECT * FROM grado WHERE ID = :d");
			$detallesUs -> bindParam(':d', $usuario['GRADO'],); 
			$detallesUs->execute();
			$grd = $detallesUs->fetch(PDO::FETCH_ASSOC);

		$valor .='<tr>';
		$valor .='	<th scope="row">'.$usuario['ID'].'</th>';
		$valor .='	<td >';
		if($usuario['FOTO_PERFIL']!=""){
		$valor .='<img src="../perfil/src=img/'.$usuario['FOTO_PERFIL'].'" width="30" height="30" class="bg-light rounded-circle me-2" alt="Avatar">';
		}else{
		$valor .='<img src="../perfil/src=img/perfil.gif" width="30" height="30" class="bg-light rounded-circle me-2" alt="Avatar">';
		}
		$valor .='	<td class="text-fade">'.$usuario['NOMBRES'].'</td>';
		$valor .='	<td class="text-fade">'.$usuario['APELLIDOS'].'</td>';
		$valor .='	<td class="text-fade">'.$usuario['USUARIO'].'</td>';
		$valor .='	<td class="text-fade">'.$usuario['CORREO'].'</td>';
		if($usuario['GENERO'] == 1){
		$valor .='	<td class="text-fade">Masculino</td>';
		}else{
		$valor .='	<td class="text-fade">Femenino</td>';
		}
		$valor .='	<td class="text-fade">'.$grd['NIVEL'].'</td>';
		$valor .='	<td class="text-fade">'.$grd['GRADO'].'</td>';
		$valor .='	<td class="text-fade">'.$grd['SECCION'].'</td>';

		$valor .='	<td class="table-action">';
		$valor .='		<button id="btnEditar'.$usuario['ID'].'" type="button" onclick="editarUser('.$usuario['ID'].');" class="waves-effect waves-circle btn btn-circle btn-success mb-5"><i class="mdi mdi-lead-pencil"></i></button>';
		$valor .='		<button id="btnEliminar'.$usuario['ID'].'" type="button" onclick="eliminarUser('.$usuario['ID'].');" class="waves-effect waves-circle btn btn-circle btn-danger mb-5"><i class="mdi mdi-close-circle"></i></button>';
		$valor .='	</td>';
		$valor .='</tr>';
		}
		echo $valor;
	}

	if($_POST['tipo'] == "a"){ $message = '';

		$detallesU = $conexion->prepare("SELECT * FROM usuarios WHERE ID =:d");
    	$detallesU -> bindParam(':d', $_POST['id'], PDO::PARAM_STR);
    	$detallesU->execute();

    	$info = $detallesU->fetch(PDO::FETCH_ASSOC);

		//Si el archivo contiene algo y es diferente de vacio
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        
            $imgFile = $_FILES['image']['name'];
            $tmp_dir = $_FILES['image']['tmp_name'];
            $imgSize = $_FILES['image']['size'];

            $upload_dir = '../../perfil/src=img/'; // upload directory
 
               $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
              
               // valid image extensions
               $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

               // rename uploading image
               $userpic = rand(1000,1000000).".".$imgExt;
                
                    // allow valid image file formats
                    if(in_array($imgExt, $valid_extensions)){   
                        // Check file size '5MB'
                        if($_FILES['image']['size'] > 5000000) { //5 MB (size is also in bytes)

                            // File too big
                            $message .= '<p>Tu archivo es demasiado grande.</p>'; $valor = '0';
                            
                        } else { 

                        	move_uploaded_file($tmp_dir,$upload_dir.$userpic);

                        	$rest = substr($info['FOTO_PERFIL'], 0, 10);
                            unlink('../../perfil/src=img/'.$rest);
                        	
                            $photo = $userpic."?user=".$info['USUARIO'];
                            $sentencia = $conexion->prepare("UPDATE `usuarios` SET `FOTO_PERFIL`=? WHERE `USUARIO`=?");
                            $resultado = $sentencia->execute([$photo,$info['USUARIO']]);

                          	$message .= '<p>Actualizo su foto de perfil exitozamente.</p>'; $valor = '0';
                            
                        }
                    }else{
                        $message .= '<p>Solo se permiten archivos JPG, JPEG, PNG y GIF.</p>'; $valor = '0'; 
                    }
        }else{
           $sentencia = $conexion->prepare("UPDATE `usuarios` SET `FOTO_PERFIL`=? WHERE `ID`=?");
           $resultado = $sentencia->execute([$info['FOTO_PERFIL'],$info['ID']]); 
           $message .= '<p>Información actualizada correctamente</p>'; $valor = '1';
        }

		if (isset($_POST['nombres']) AND $_POST['nombres'] != "") {
			$sentencia = $conexion->prepare("UPDATE `usuarios` SET `NOMBRES`=? WHERE `ID`=?");
            $resultado = $sentencia->execute([$_POST['nombres'],$info['ID']]);
            $message .= '<p>Información actualizada correctamente</p>'; $valor = '1';
		}
		if (isset($_POST['apellidos']) AND $_POST['apellidos'] != "") {
			$sentencia = $conexion->prepare("UPDATE `usuarios` SET `APELLIDOS`=? WHERE `ID`=?");
            $resultado = $sentencia->execute([$_POST['apellidos'],$info['ID']]);
            $message .= '<p>Información actualizada correctamente</p>'; $valor = '1';
		}
		if (isset($_POST['correo']) AND $_POST['correo'] != "") {
			if(filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)){
				$sentencia = $conexion->prepare("UPDATE `usuarios` SET `CORREO`=? WHERE `ID`=?");
            	$resultado = $sentencia->execute([$_POST['correo'],$info['ID']]);

            	$clave = explode("@", $_POST['correo']);
          		$user = $clave[0];

          		$sentencia = $conexion->prepare("UPDATE `usuarios` SET `USUARIO`=? WHERE `ID`=?");
            	$resultado = $sentencia->execute([$user ,$info['ID']]);

            	$message .= '<p>Correo y usuario actualizado correctamente</p>'; $valor = '1';

            }else{
        		$message .= '<p>El correo no es valido</p>'; $valor = '0';
            }
		}
		
		if (isset($_POST['password']) AND $_POST['password'] != "") {
			$sentencia = $conexion->prepare("UPDATE `usuarios` SET `PASSWORD`=? WHERE `ID`=?");
            $resultado = $sentencia->execute([$_POST['password'],$info['ID']]);
            $message .= '<p>Información actualizada correctamente</p>'; $valor = '1';
		}
		if (isset($_POST['nacimiento']) AND $_POST['nacimiento'] != "") {
			$sentencia = $conexion->prepare("UPDATE `usuarios` SET `FECHA_NACIMIENTO`=? WHERE `ID`=?");
            $resultado = $sentencia->execute([$_POST['nacimiento'],$info['ID']]);
            $message .= '<p>Información actualizada correctamente</p>'; $valor = '1';
		}

		$return_arr[] = array("mensaje" => $message, "valor" => $valor);
        echo json_encode($return_arr);

	}

	if($_POST['tipo'] == "e"){
		$sentencia = $conexion->prepare("DELETE FROM `usuarios` WHERE ID = :i");
        $resultado = $sentencia->execute(['i'=>$_POST['id']]);
	}

	if($_POST['tipo'] == "sue"){
		
		$detallesU = $conexion->prepare("SELECT * FROM usuarios WHERE ID =:d");
    	$detallesU -> bindParam(':d', $_POST['user'], PDO::PARAM_STR);
    	$detallesU->execute();

    	$info = $detallesU->fetch(PDO::FETCH_ASSOC);

    	$return_arr[] = array("info" => $info);
        echo json_encode($return_arr);
	}
	
}

?>