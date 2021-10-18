<?php
 session_start();
 include "code=conexion.php";
 if (isset($_POST["tipo"])){
 	if ($_POST["tipo"]==1){ 
        $detallesU = $conexion->prepare("SELECT * FROM usuarios WHERE CORREO=:c");
        $detallesU -> bindParam(':c', $_POST["correo"], PDO::PARAM_STR);
        $detallesU->execute();

		$detail = $detallesU->fetch(PDO::FETCH_ASSOC);
		$count = $detallesU->rowCount();
 		if($count > 0){
 			if($_POST["password"] === $detail['PASSWORD']){

				$_SESSION["usuario=cole"] = $detail['USUARIO'];
				
				$valor = '1';
				$mensaje = "Iniciando sesion";
				                            
			}else{$valor = '0'; $mensaje = "Contraseña incorrecta";}

 		}else{$valor = '0'; $mensaje = "El usuario no existe";}

 		$return[] = array("mensaje" => $mensaje, "valor" => $valor);
 		echo json_encode($return);

 	}

 	if($_POST["tipo"]==2){ 

 		if(empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["apellido"]) || empty($_POST["correo"]) || empty($_POST["password"])){  

                  $message = ' Todos los campos son requeridos';  //si los campos estan vacios
                  $valor = '0';

            	}else{ //si los campos no estan vacios

              	if(isset($_POST["nombre"]) and $_POST["nombre"] != "" ){
                    		if(isset($_POST["apellido"]) and $_POST["apellido"] != "" ){
                        		if(isset($_POST["correo"]) and $_POST["correo"] != "" ){ 

		                            $variableCorreo = $_POST["correo"];
		                            $query = "SELECT * FROM usuarios WHERE CORREO = :correo";  
		                            $statement = $conexion->prepare($query);  
		                            $statement->execute(array(':correo' => $_POST["correo"]));  
		                            $correo = $statement->rowCount();

		                            if(!filter_var($variableCorreo, FILTER_VALIDATE_EMAIL)){
		                                $message = 'El correo insertado no es valido'; $valor = '0';
		                            }else{ 

		                            	if(isset($_POST["password"]) and $_POST["password"] != ""){
		                                        
                
						              if($correo > 0){ 
						               $message = ' El correo ya esta registrado!!'; $valor = '0';
						              }else{  //si el usuario y correo no son iguales a los de la db

							              $claveC = explode("@", $_POST['correo']);
									$crro = $claveC[0];
									    //password_hash($_POST['password'], PASSWORD_DEFAULT, array("cost"=>10));
							                  $password = $_POST["password"];

							                  $sentencia = $conexion->prepare("
							                          INSERT INTO `usuarios`(`ID`, `ROL`,`NOMBRES`, `APELLIDOS`,`CORREO`, `USUARIO`,  `PASSWORD`,  `GENERO`) 
							                          VALUES (NULL,?,?,?,?,?,?,?)");

							                  $resultado = $sentencia->execute(['2',$_POST['nombre'],$_POST['apellido'],$_POST['correo'],$crro,$password,"0"]);

							                  if ($resultado === TRUE) { 

							                         $_SESSION["usuario=cole"] = $crro; 
							                            
							                         $message = 'Registro correcto';
							                         $valor = '1';

							                  } else { $message = ' Hubo un error al momento de registrar'; $valor = '0';}

						              }

                            			}else{ $message = 'Inserte su contraseña!'; $valor = '0';}
                            		}
                        		}else{ $message = 'Inserte su correo!'; $valor = '0';}
                    		}else{ $message = 'Inserte su apellido!'; $valor = '0';}
              	}else{ $message = 'Inserte su nombre!'; $valor = '0';}
            	}

            	$return_delete[] = array("mensaje" => $message, "valor" => $valor);
            	echo json_encode($return_delete);
 	}
 	
 }
 /*print_r($_POST);*/

 ?>