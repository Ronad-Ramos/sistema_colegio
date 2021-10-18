
//Ejecutar mostar docentes=>
mostrarUsuarios();

//password view
function verPass(i){
	if(i == 1){var tipo = document.getElementById("passwordUsuario"); 
        if(tipo.type == "password"){console.log('si');
            tipo.type = "text";
            $('#eye').html('<span class="mdi mdi-eye-off"></span>');
        }else{console.log('no');
            tipo.type = "password";
            $('#eye').html('<span class="mdi mdi-eye"></span>');
        }
    }

}

//registro de docentes =>
function registrarUser(){

	var image = $('#fotoUsuario');
    var image_data = image.prop('files')[0];
     
    var formData = new FormData();
    formData.append('image', image_data);

    formData.append('tipo'        , "r");
    formData.append('nombres'     , $('#nombresUsuario').val() );
    formData.append('apellidos'   , $('#apellidosUsuario').val());
    formData.append('correo'      , $('#correoUsuario').val());
    formData.append('password'    , $('#passwordUsuario').val());
    formData.append('nacimiento'  , $('#fechaUsuario').val()); 
    
    $.ajax({
        data:  formData,
        url:   'controles/code=docentes.php',
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

            if(dataObj[0].valor = 1){
            	mostrarUsuarios();
				$('#registrar').removeClass('show');
				$('#registrar').css('display', 'block');

				$('#msm,#nombresUsuario,#apellidosUsuario,#correoUsuario,#passwordUsuario,#fechaUsuario').val('') 
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

function eliminarUser(e){
	var parametros = { "tipo" : "e", "id" : e};
    $.ajax({
        data:  parametros,
        url:   'controles/code=docentes.php',
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

function editarUser(u){

	var parametros = { "tipo" : "sue", 'user' : u};
    $.ajax({
        data:  parametros,
        url:   'controles/code=docentes.php',
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

function editUser(){

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
        url:   'controles/code=docentes.php',
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

function mostrarUsuarios(){
	
	var parametros = { "tipo" : "m"};
    $.ajax({
        data:  parametros,
        url:   'controles/code=docentes.php',
        type:  'post',
        beforeSend: function () {
            $('#tbody').html('<p>Cargando...</p>');
        },
        success:  function (response) {
            
            $('#tbody').html(response);
                    
        }
    });
}

