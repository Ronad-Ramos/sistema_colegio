
//Ejecutar mostar cursos=>
mostrarCursos();

//registro de cursos =>
function registrarCurso(){

	var image = $('#imagenCurso');
    var image_data = image.prop('files')[0];
     
    var formData = new FormData();
    formData.append('image', image_data);

    formData.append('tipo'        , "r");
    formData.append('titulo'     , $('#titulo').val() );
    formData.append('texto'   , $('#texto').val());
    
    $.ajax({
        data:  formData,
        url:   'controles/code=cursos.php',
        type:  'post',
        contentType:false,
        cache: false,
        processData: false,
        beforeSend: function () {
           $('#btnRegistrar').css('display', 'none');
        },
        success:  function (response) { console.log(response);

            $('#btnRegistrar').css('display', 'block');

            var dataObj = JSON.parse(response);
            $("#msm").html(dataObj[0].mensaje);

            if(dataObj[0].valor ==1){
                mostrarCursos();
                $('#registrar').removeClass('show');
                $('#registrar').css('display', 'block');

                $('#msm,#titulo,#texto').val(''); 
                image.val('');

            }else{
                $("#msm").html(dataObj[0].mensaje);
            }
            
        },
        error: function(error){
            console.log(error);
        }
    });

}

function eliminarCurso(e){
	var parametros = { "tipo" : "e", "id" : e};
    $.ajax({
        data:  parametros,
        url:   'controles/code=cursos.php',
        type:  'post',
        beforeSend: function () {
            $('#btnEliminar'+e).css('display','none');
        },
        success:  function (response) { console.log(response);
            $('#btnEliminar'+e).css('display', 'block');
            mostrarCursos();
        }
    });
}

function editarCurso(u){

	var parametros = { "tipo" : "sue", 'curso' : u};
    $.ajax({
        data:  parametros,
        url:   'controles/code=cursos.php',
        type:  'post',
        beforeSend: function () {
            //$('#tbody').html('<p>Cargando...</p>');
        },
        success:  function (response) { 
            
           	var dataObj = JSON.parse(response);

			$('#editar').addClass('show');
			$('#editar').css('display', 'block');

            $('#eiduser').val(dataObj[0].info.ID);
			$('#tituloC').val(dataObj[0].info.TITULO);
    		$('#textC').val(dataObj[0].info.DESCRIPCION);

        }
    });

}

function editCurso(){

	var image = $('#imagenCursoC');
    var image_data = image.prop('files')[0];
     
    var formData = new FormData();
    formData.append('image', image_data);

    formData.append('tipo'        , "a");
    formData.append('tituloC'     , $('#tituloC').val() );
    formData.append('textoC'   , $('#textC').val());
    formData.append('id'   , $('#eiduser').val());
    
    $.ajax({
        data:  formData,
        url:   'controles/code=cursos.php',
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

            if(dataObj[0].valor== 1){
            	
				$('#editar').removeClass('show');
				$('#editar').css('display', 'none');

				//$('#enombresUsuario,#eapellidosUsuario,#ecorreoUsuario,#epasswordUsuario,#efechaUsuario').val('') 
				//image.val('');
				mostrarCursos();
			}else{
				$("#msm").html(dataObj[0].mensaje);
			}
			
        },
        error: function(error){
            console.log(error);
        }
    });
}

function mostrarCursos(){
	
	var parametros = { "tipo" : "m"};
    $.ajax({
        data:  parametros,
        url:   'controles/code=cursos.php',
        type:  'post',
        beforeSend: function () {
            $('#cursos').html('<p>Cargando...</p>');
        },
        success:  function (response) {
            
            $('#cursos').html(response);
                    
        }
    });
}

