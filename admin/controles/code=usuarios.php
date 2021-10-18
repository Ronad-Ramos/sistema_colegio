<?php 
session_start();
include 'code=conexion.php'; 
ini_set('date.timezone','America/Lima'); 

if(isset($_POST['tipo']) AND $_POST['tipo'] != "" ){

	if($_POST['tipo'] == "r"){

		//generar codigo de venta
        $permitted_chars = "123456789".$_POST["nombres"].$_POST['correo'].$_POST["password"];
        function generate_code($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
           $random_character = $input[mt_rand(0, $input_length - 1)];
           $random_string .= $random_character;
        }return $random_string;}
        //codigo generado para confirmación
        $codigo= generate_code($permitted_chars, 6);

        if(isset($_POST["nombres"]) and $_POST["nombres"] != ""){
        	if(isset($_POST["apellidos"]) and $_POST["apellidos"] != ""){
        		if(filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)){
        			$clave = explode("@", $_POST['correo']);
          			$user = $clave[0];
          			if(isset($_POST["password"]) and $_POST["password"] != ""){
          				if(isset($_POST["nacimiento"]) and $_POST["nacimiento"] != ""){
          					
		if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
				        
			$imgFile = $_FILES['image']['name'];
			$tmp_dir = $_FILES['image']['tmp_name'];
			$imgSize = $_FILES['image']['size'];

			$upload_dir = '../../perfil/src=img/'; // upload directory
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
						              
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

			// rename uploading image //rand(1000,1000000)
			$img = $codigo.".".$imgExt;
						                
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){   

				move_uploaded_file($tmp_dir,$upload_dir.$img);

				$sentencia = $conexion->prepare("INSERT INTO `usuarios`(`ID`, `ROL`, `NOMBRES`, `APELLIDOS`, `CORREO`, `USUARIO`, `PASSWORD`, `FECHA_REGISTRO`, `FECHA_NACIMIENTO`, `FOTO_PERFIL`) VALUES (NULL,?,?,?,?,?,?,NOW(),?,?)");
			    $resultado = $sentencia->execute(["2",$_POST['nombres'],$_POST['apellidos'],$_POST['correo'],$user,$_POST['password'],$_POST['nacimiento'],$img]); 

			    $message = 'Cargado correctamente'; $valor = '1';

			}else{ $message = 'Solo se permiten jpg - png - jpeg.'; $valor = '0'; }
		}else{ 
			$sentencia = $conexion->prepare("INSERT INTO `usuarios`(`ID`, `CODIGO`, `ROL`, `NOMBRES`, `APELLIDOS`, `CORREO`, `USUARIO`, `PASSWORD`, `FECHA_REGISTRO`, `FECHA_NACIMIENTO`) VALUES (NULL,?,?,?,?,?,?,?,NOW(),?)");
			$resultado = $sentencia->execute([$codigo,"2",$_POST['nombres'],$_POST['apellidos'],$_POST['correo'],$user,$_POST['password'],$_POST['nacimiento']]); 
			$message = 'Cargado correctamente - sin foto de perfil'; $valor = '1';
		}

          				}else{ $message = 'Inserte su fecha de nacimiento!'; $valor = '0';}
          			}else{ $message = 'Inserte su contraseña!'; $valor = '0';}
	        	}else{$message = 'El correo insertado no es valido'; $valor = '0';}
        	}else{ $message = 'Inserte su apellido!'; $valor = '0';}
        }else{ $message = 'Inserte su nombre!'; $valor = '0';}

        $return_arr[] = array("mensaje" => $message, "valor" => $valor);
        echo json_encode($return_arr);
	}

	if($_POST['tipo'] == "m"){

		$detallesUs = $conexion->prepare("SELECT * FROM usuarios WHERE ROL !=1  ORDER BY ID DESC");
        $detallesUs->execute();
        $userE = $detallesUs->fetchAll(PDO::FETCH_ASSOC);
		$valor = '';
		foreach($userE as $usuario){
		
		$valor .='<tr>';
		$valor .='	<th scope="row">'.$usuario['ID'].'</th>';
		$valor .='	<td >';
		if($usuario['FOTO_PERFIL']!=""){
		$valor .='		<img src="../perfil/src=img/'.$usuario['FOTO_PERFIL'].'" width="30" height="30" class="bg-light rounded-circle me-2" alt="Avatar">';
		}else{
		$valor .='		<img src="../perfil/src=img/perfil.gif" width="30" height="30" class="bg-light rounded-circle me-2" alt="Avatar">';
		}
		$valor .='	</td>';
		$valor .='	<td>'.$usuario['NOMBRES'].'</td>';
		$valor .='	<td>'.$usuario['APELLIDOS'].'</td>';
		$valor .='	<td>'.$usuario['USUARIO'].'</td>';
		$valor .='	<td>'.$usuario['CORREO'].'</td>';
		if($usuario['GENERO'] == 1){
		$valor .='	<td>Masculino</td>';
		}else{
		$valor .='	<td>Femenino</td>';
		}
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
                            // File within size restrictions
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