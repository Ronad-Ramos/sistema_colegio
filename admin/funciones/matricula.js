
//Ejecutar mostar alumnos=>
mostrarUsuarios();

//registro de alumnos =>
function registrarMatricula(){

	var file = $('#example-fileinput');
    var file_data = file.prop('files')[0];
     
    var formData = new FormData(); 
    formData.append('file', file_data);
    //tipo de accion
    formData.append('tipo'        , "r");
    //datos apoderado
    formData.append('nombres_apoderado'     , $('#Nombre_apo').val() );
    formData.append('apellidos_apoderado'   , $('#Apellido_apo').val());
    formData.append('dni_apoderado'         , $('#DNI_apo').val());
    formData.append('telefono_apoderado'    , $('#Telefono_apo').val());
    formData.append('correo_apoderado'      , $('#Electronico_apo').val()); 
    formData.append('direccion_apoderado'  , $('#Dirección_apo').val()); 
    //datos de alumno
    formData.append('nombres_alumno'     , $('#Nombres_alu').val() );
    formData.append('apellidos_alumno'   , $('#Apellidos_alu').val());
    formData.append('dni_alumno'         , $('#DNI_alu').val());
    formData.append('telefono_alumno'    , $('#Telefono_alu').val());
    formData.append('correo_alumno'      , $('#Electronico_alu').val()); 
    formData.append('direccion_alumno'   , $('#Dirección_alu').val()); 
    formData.append('fecha_nac_alumno'   , $('#fecha_alu').val());
    formData.append('genero_alumno'      , $('#genero_alu').val());
    formData.append('nivel_alumno'       , $('#select_nivel_alu').val());
    formData.append('grado_alumno'       , $('#select_grado_alu').val());
    formData.append('seccion_alumno'     , $('#select_seccion_alu').val());
    //formData.append('grado'  , dataString); 
    
    $.ajax({
        data:  formData,
        url:   'admin/controles/code=matricula.php',
        type:  'post',
        contentType:false,
        cache: false,
        processData: false,
        beforeSend: function () {
           $('#buttonEnviar').html('Enviado datos....');
        },
        success:  function (response) { 
            $('#buttonEnviar').html('Enviar');

            console.log(response);

            var dataObj = JSON.parse(response);
            $("#msg").html(dataObj[0].mensaje);


            if(dataObj[0].valor = 1){
                //mostrarUsuarios();
                //$('#registrar').removeClass('show');
                //$('#registrar').css('display', 'block');

                $("#msg").html(dataObj[0].mensaje);
                $('#Nombre_apo,#Apellido_apo,#DNI_apo,#Telefono_apo,#Electronico_apo,#Dirección_apo').val('') ;
                $('#Nombres_alu,#Apellidos_alu,#DNI_alu,#Telefono_alu,#Electronico_alu,#Dirección_alu,#fecha_alu,#genero_alu').val('');
                file.val('');
                

            }else{
                $("#msg").html(dataObj[0].mensaje);
            }

        },
        error: function(error){
            console.log(error);
        }
    });


}

function eliminarMatricula(e){
	var parametros = { "tipo" : "e", "id" : e};
    $.ajax({
        data:  parametros,
        url:   'controles/code=alumnos.php',
        type:  'post',
        beforeSend: function () {
            $('#btnEliminar'+e).css('display','none');
        },
        success:  function (response) { console.log(response);
            $('#btnEliminar'+e).css('display', 'block');
            mostrarUsuarios();
        }
    });
}

function editarMatricula(u){

	var parametros = { "tipo" : "sue", 'user' : u};
    $.ajax({
        data:  parametros,
        url:   'controles/code=alumnos.php',
        type:  'post',
        beforeSend: function () {
            //$('#tbody').html('<p>Cargando...</p>');
        },
        success:  function (response) { 
            
           	var dataObj = JSON.parse(response);

			$('#editar').addClass('show');
			$('#editar').css('display', 'block');

			$('#eiduser').val(dataObj[0].info.ID);
    		$('#enombresUsuario').val(dataObj[0].info.NOMBRES);
    		$('#eapellidosUsuario').val(dataObj[0].info.APELLIDOS);
    		$('#ecorreoUsuario').val(dataObj[0].info.CORREO);
    		$('#epasswordUsuario').val(dataObj[0].info.PASSWORD);
    		$('#efechaUsuario').val(dataObj[0].info.FECHA_NACIMIENTO);

        }
    });

}

function editMatricula(){

	var image = $('#efotoUsuario');
    var image_data = image.prop('files')[0];
     
    var formData = new FormData();
    formData.append('image', image_data);

    formData.append('tipo'        , "a");
    formData.append('id'          , $('#eiduser').val());
    formData.append('nombres'     , $('#enombresUsuario').val() );
    formData.append('apellidos'   , $('#eapellidosUsuario').val());
    formData.append('correo'      , $('#ecorreoUsuario').val());
    formData.append('password'    , $('#epasswordUsuario').val());
    formData.append('nacimiento'  , $('#efechaUsuario').val()); 
    
    $.ajax({
        data:  formData,
        url:   'controles/code=alumnos.php',
        type:  'post',
        contentType:false,
        cache: false,
        processData: false,
        beforeSend: function () {
           $('#btnEdit').css('display', 'none');
        },
        success:  function (response) { //console.log(response);

        	$('#btnEdit').css('display', 'block');

        	var dataObj = JSON.parse(response);
            $("#msme").html(dataObj[0].mensaje);

            if(dataObj[0].valor = 1){
            	
				$('#editar').removeClass('show');
				$('#editar').css('display', 'none');

				//$('#enombresUsuario,#eapellidosUsuario,#ecorreoUsuario,#epasswordUsuario,#efechaUsuario').val('') 
				//image.val('');
				mostrarUsuarios();
			}else{
				$("#msm").html(dataObj[0].mensaje);
			}
			
        },
        error: function(error){
            console.log(error);
        }
    });
}

function mostrarMatricula(){
	
	var parametros = { "tipo" : "m"};
    $.ajax({
        data:  parametros,
        url:   'controles/code=alumnos.php',
        type:  'post',
        beforeSend: function () {
            $('#tbody').html('<p>Cargando...</p>');
        },
        success:  function (response) {
            
            $('#tbody').html(response);
                    
        }
    });
}

