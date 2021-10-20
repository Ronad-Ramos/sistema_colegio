
//Ejecutar mostar alumnos=>
mostrarTransferencia();

//registro de alumnos =>
function registrarTransferencia(){

    if($('#dtoNeutral').val() == 1 ){ var urld = "controles/code=transferencias.php";}else{ var urld = "admin/controles/code=transferencias.php";}

	var file = $('#example-fileinput');
    var file_data = file.prop('files')[0];
     
    var formData = new FormData(); 
    formData.append('file', file_data);
    //tipo de accion
    formData.append('tipo'        , "r");
    //datos apoderado
    formData.append('dni_apoderado'         , $('#DNI_apo').val());
    formData.append('correo_apoderado'      , $('#Electronico_apo').val()); 
    //datos de alumno
    formData.append('dni_alumno'         , $('#DNI_alu').val());
    formData.append('correo_alumno'      , $('#Electronico_alu').val());
    
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

                mostrarTransferencia();
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

function eliminarTransferencia(e){
	var parametros = { "tipo" : "e", "id" : e};
    $.ajax({
        data:  parametros,
        url:   'controles/code=transferencias.php',
        type:  'post',
        beforeSend: function () {
            $('#btnEliminar'+e).css('display','none');
        },
        success:  function (response) { console.log(response);

            $('#btnEliminar'+e).css('display', 'block');
            mostrarTransferencia();
        }
    });
}

function editarTransferencia(u){ 

	var parametros = { "tipo" : "sue", 'user' : u};
    $.ajax({
        data:  parametros,
        url:   'controles/code=transferencias.php',
        type:  'post',
        beforeSend: function () {
            $('#btnEdit').html('Editando...');
        },
        success:  function (response) { //console.log(response);

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

function editTransferencia(){  
     
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
        url:   'controles/code=transferencias.php',
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
				mostrarTransferencia();
            }else{ $("#msme").html(dataObj[0].mensaje); }
        },
        error: function(error){
            console.log(error);
        }
    });
}

function mostrarTransferencia(){
	
	var parametros = { "tipo" : "m"};
    $.ajax({
        data:  parametros,
        url:   'controles/code=transferencias.php',
        type:  'post',
        beforeSend: function () {
            $('#tbody').html('<p>Cargando...</p>');
        },
        success:  function (response) { console.log(response);
            
            $('#tbody').html(response);
                    
        }
    });
}

