
//Ejecutar mostar alumnos=>
mostrarMatricula();

//registro de alumnos =>
function registrarMatricula(){

    if($('#dtoNeutral').val() == 1 ){ var urld = "controles/code=matricula.php";}else{ var urld = "admin/controles/code=matricula.php";}

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
        url:   urld,
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


            if(dataObj[0].valor == 1){

                mostrarMatricula();
                $('#registrar').removeClass('show');
                $('#registrar').css('display', 'block');

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
        url:   'controles/code=matricula.php',
        type:  'post',
        beforeSend: function () {
            $('#btnEliminar'+e).css('display','none');
        },
        success:  function (response) { console.log(response);

            $('#btnEliminar'+e).css('display', 'block');
            mostrarMatricula();
        }
    });
}

function editarMatricula(u){ 

	var parametros = { "tipo" : "sue", 'user' : u};
    $.ajax({
        data:  parametros,
        url:   'controles/code=matricula.php',
        type:  'post',
        beforeSend: function () {
            $('#btnEdit').html('Editando...');
        },
        success:  function (response) { console.log(response);

            $('#btnEdit').html('Editar');
            
           	var dataObj = JSON.parse(response);


			$('#editar').addClass('show');
			$('#editar').css('display', 'block');

			$('#eiduser').val(dataObj[0].idMatri);

    		$('#nombreApoderado').val(dataObj[0].infoApoderado.NOMBRES);
    		$('#apellidoApoderado').val(dataObj[0].infoApoderado.APELLIDOS);

    		$('#nombreAlumno').val(dataObj[0].infoAlumno.NOMBRES);
    		$('#apellidosAlumno').val(dataObj[0].infoAlumno.APELLIDOS);

            if(dataObj[0].grado.NIVEL == "primaria"){
                $('#nivel_alu').val(1);
            }else{
                $('#nivel_alu').val(2);
            }
           
            $('#grado_alu').val(dataObj[0].grado.GRADO);
            $('#seccion_alu').val(dataObj[0].grado.SECCION);
            $("#msme").html();
        }
    });

}

function editMatricula(){  
     
    var data = {
        'tipo' : "a",
        'idd'  : $('#eiduser').val(),
        'nombres_apoderado_ac'  : $('#nombreApoderado').val(),
        'apellidos_apoderado_ac': $('#apellidoApoderado').val(),
        'nombres_alumno_ac'     : $('#nombreAlumno').val() ,
        'apellidos_alumno_ac'   : $('#apellidosAlumno').val(),
        'nivel_alumno_ac'       : $('#nivel_alu').val(),
        'grado_alumno_ac'       : $('#grado_alu').val(),
        'seccion_alumno_ac'     : $('#seccion_alu').val() };

    $.ajax({
        data:  data,
        url:   'controles/code=matricula.php',
        type:  'post',
        beforeSend: function () {
           $('#btnEdit').html('Editando...');
        },
        success:  function (response) { console.log(response);

        	$('#btnEdit').html('Editar');

        	var dataObj = JSON.parse(response);
            $("#msme").html(dataObj[0].mensaje);

            if(dataObj[0].valor == 1){
            	
				$('#editar').removeClass('show');
				$('#editar').css('display', 'none');

				//$('#enombresUsuario,#eapellidosUsuario,#ecorreoUsuario,#epasswordUsuario,#efechaUsuario').val('') 
				//image.val('');
				mostrarMatricula();
            }else{ $("#msme").html(dataObj[0].mensaje); }
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
        url:   'controles/code=matricula.php',
        type:  'post',
        beforeSend: function () {
            $('#tbody').html('<p>Cargando...</p>');
        },
        success:  function (response) {
            
            $('#tbody').html(response);
                    
        }
    });
}

