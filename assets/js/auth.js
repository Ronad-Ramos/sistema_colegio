function loginAuth(){ 

	if($('#correo_login').val()!="") {
   		if($('#password_login').val()!=""){
        
       		var datos={"tipo":"1", "correo":$('#correo_login').val(),"password":$('#password_login').val()};
        	$.ajax({
        		data: datos,
        		url:  "controles/code=auth.php",
        		type: "post",
        		beforeSend: function (){
        		   $('#btnlogin').html('Cargando...');
        		},
        		success: function(respuesta){

    			  $('#btnlogin').html('Entrar');

    			  var dataObj = JSON.parse(respuesta)

    			  if(dataObj[0].valor = 0 ){
                  	console.log(dataObj[0].mensaje ); 
                  }else{
                  	window.location.href="index.php"; 
                  }

				}
        	});

    	}else{ console.log("Inserte la contraseña"); }
	}else{console.log("Inserte su correo"); }
}


function registroAuth(){

if ($('#nombre_register').val()!="") {
	if($('#apellido_register').val()!=""){
		if($('#correo_register').val()!="") {
   			if($('#password_register').val()!=""){
        
       			var datos={"tipo":"2","nombre":$('#nombre_register').val(),"apellido":$('#apellido_register').val(),
       			"correo":$('#correo_register').val(),"password":$('#password_register').val()};
	        		$.ajax({
	        			data: datos,
		        		url:  "controles/code=auth.php",
		        		type: "post",
		        		beforeSend: function (){
		        		  $('#btnRegis').html('Cargando...');
		        		},
		        		success: function(respuesta){  console.log(respuesta);
		    			  
		    			  var dataObj = JSON.parse(respuesta)
		    			  $('#btnRegis').html('Registrarse');

		    			  if(dataObj[0].valor = 0){
                  			console.log(dataObj[0].mensaje); 
		                  }else{
			                window.location.href="index.php"; 
		                  }

		        		}
        			})


    		}else{ console.log("Inserte la contraseña"); }
		}else{ console.log("Inserte su correo"); }
	}else{ console.log("Inserte su apellido"); }
}else{ console.log("Inserte su nombre"); }

}