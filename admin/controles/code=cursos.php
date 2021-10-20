<?php 
session_start();
include 'code=conexion.php'; 
ini_set('date.timezone','America/Lima'); 

if(isset($_POST['tipo']) AND $_POST['tipo'] != "" ){

	if($_POST['tipo'] == "r"){

        if(isset($_POST["titulo"]) and $_POST["titulo"] != ""){
        	if(isset($_POST["texto"]) and $_POST["texto"] != ""){
        		
		if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
				        
			$imgFile = $_FILES['image']['name'];
			$tmp_dir = $_FILES['image']['tmp_name'];
			$imgSize = $_FILES['image']['size'];

			$upload_dir = '../../assets/images/courses/'; // upload directory
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
						              
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

			// rename uploading image //rand(1000,1000000)
			$result = str_replace(" ", "_", $_POST["titulo"]);

			$img = $result.".".$imgExt;
						                
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){   

				move_uploaded_file($tmp_dir,$upload_dir.$img);

				$sentencia = $conexion->prepare("INSERT INTO `curso`(`ID`, `TITULO`, `IMAGEN`, `DESCRIPCION`) VALUES (NULL,?,?,?)");
			    $resultado = $sentencia->execute([$_POST['titulo'],$img,$_POST['texto']]); 

			    $message = 'Cargado correctamente'; $valor = '1';

			}else{ $message = 'Solo se permiten jpg - png - jpeg.'; $valor = '0'; }
		}else{ $message = 'Inserte una imagen!'; $valor = '0'; }

        	}else{ $message = 'Inserte un Texto!'; $valor = '0';}
        }else{ $message = 'Inserte un Titulo!'; $valor = '0';}

        $return_arr[] = array("mensaje" => $message, "valor" => $valor);
        echo json_encode($return_arr);
	}

	if($_POST['tipo'] == "m"){

		$detallesUs = $conexion->prepare("SELECT * FROM curso  ORDER BY ID DESC");
        $detallesUs->execute();
        $curs = $detallesUs->fetchAll(PDO::FETCH_ASSOC);
		$valor = '';
		foreach($curs as $cursos){

		$valor .='				<div class="media align-items-center">';
		$valor .='				  <span class="badge badge-dot badge-danger"></span>';
		$valor .='				  <a class="avatar avatar-lg status-success" href="#">';
		$valor .='					<img src="../assets/images/courses/'.$cursos['IMAGEN'].'" alt="...">';
		$valor .='				  </a>';
		$valor .='				  <div class="media-body">';
		$valor .='					<p>';
		$valor .='					  <a href="#"><strong>'.$cursos['TITULO'].'</strong></a>';
		$valor .='					  <small class="sidetitle">'.$cursos['ID'].'</small>';
		$valor .='					</p>';
		$valor .='					<p>'.$cursos['DESCRIPCION'].'</p>';
		$valor .='				  </div>';
		$valor .='				  <div class="media-right gap-items">';
		$valor .='					<a class="media-action lead" onclick="editarCurso('.$cursos['ID'].');"  data-bs-toggle="tooltip" title="Edit"><i class="mdi mdi-lead-pencil"></i></a>';
		$valor .='					<a class="media-action lead" onclick="eliminarCurso('.$cursos['ID'].');" data-bs-toggle="tooltip" title="Delete"><i class="mdi mdi-close-circle"></i></a>';
		$valor .='				  </div>';
		$valor .='				</div>';

		}
		echo $valor;
	}

	if($_POST['tipo'] == "a"){ $message = '';

		$detallesU = $conexion->prepare("SELECT * FROM curso WHERE ID =:d");
    	$detallesU -> bindParam(':d', $_POST['id'], PDO::PARAM_STR);
    	$detallesU->execute();

    	$info = $detallesU->fetch(PDO::FETCH_ASSOC);

		//Si el archivo contiene algo y es diferente de vacio
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        
            $imgFile = $_FILES['image']['name'];
            $tmp_dir = $_FILES['image']['tmp_name'];
            $imgSize = $_FILES['image']['size'];

            $upload_dir = '../../assets/images/courses/'; // upload directory
 
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
                            $message .= 'Tu archivo es demasiado grande.'; $valor = '0';
                            
                        } else {
                            // File within size restrictions
                            move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                            
                            $rest = substr($info['IMAGEN'], 0, 10);
                            
                            unlink('../../assets/images/courses/'.$rest);

                            $photo = $userpic."?user=".$info['ID'];
                            $sentencia = $conexion->prepare("UPDATE `curso` SET `IMAGEN`=? WHERE `ID`=?");
                            $resultado = $sentencia->execute([$photo,$info['ID']]);

                          	$message .= 'Actualizo su foto de curso exitozamente'; $valor = '0';
                            
                        }
                    }else{
                        $message .= 'Solo se permiten archivos JPG, JPEG, PNG y GIF'; $valor = '0'; 
                    }
        }else{
           $sentencia = $conexion->prepare("UPDATE `curso` SET `IMAGEN`=? WHERE `ID`=?");
           $resultado = $sentencia->execute([$info['IMAGEN'],$info['ID']]); 
           $message .= 'Información actualizada correctamente'; $valor = '1';
        }

		if (isset($_POST['tituloC']) AND $_POST['tituloC'] != "") {
			$sentencia = $conexion->prepare("UPDATE `curso` SET `TITULO`=? WHERE `ID`=?");
            $resultado = $sentencia->execute([$_POST['tituloC'],$info['ID']]);
            $message .= 'Información actualizada correctamente'; $valor = '1';
		}
		if (isset($_POST['textoC']) AND $_POST['textoC'] != "") {
			$sentencia = $conexion->prepare("UPDATE `curso` SET `DESCRIPCION`=? WHERE `ID`=?");
            $resultado = $sentencia->execute([$_POST['textoC'],$info['ID']]);
            $message .= 'Información actualizada correctamente'; $valor = '1';
		}
		
		$return_arr[] = array("mensaje" => $message, "valor" => $valor);
        echo json_encode($return_arr);

	}

	if($_POST['tipo'] == "e"){
		$sentencia = $conexion->prepare("DELETE FROM `curso` WHERE ID = :i");
        $resultado = $sentencia->execute(['i'=>$_POST['id']]);
	}

	if($_POST['tipo'] == "sue"){
		
		$detallesU = $conexion->prepare("SELECT * FROM curso WHERE ID =:d");
    	$detallesU -> bindParam(':d', $_POST['curso'], PDO::PARAM_STR);
    	$detallesU->execute();

    	$info = $detallesU->fetch(PDO::FETCH_ASSOC);

    	$return_arr[] = array("info" => $info);
        echo json_encode($return_arr);
	}
	
}

?>