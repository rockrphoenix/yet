//preparacion del DOM
$(document).ready(function(){
//validacion del formulario redes sociales
	$("#testimoniales").validate({
		rules:{
			
		},
		submitHandler: function(form){
			$.ajax({
				type:$(form).attr('method'),
				url:$(form).attr('action'),
				data:$(form).serialize(),
				beforeSend:function(){
					$("#alertaRegistro").html("<img src='../images/cargando.gif'>");
                    $("#alertaRegistro").css("display", "block");
				},
				 success: function(data){
                    if (data == 1) {
                        $("#msj_suc").html("Datos ingresados");
                        $("#respuestaAltaV").show();
                        $("#respuestaAltaV").css("display", "block");
                        $("#alertaRegistro").css("display", "none");
                    }else if (data==0){
                        $("#msj_err").html("Error al ingresar tus datos");
                        $("#respuestaAltaFalso").show();
                        $("#respuestaAltaFalso").css("display", "block");
                        $("#alertaRegistro").css("display", "none");
                    }
                    else{
                        $("#msj_err").html("usted esta intentando dar de alta demasiadas secciones para su plan");
                        $("#respuestaAltaFalso").show();
                        $("#respuestaAltaFalso").css("display", "block");
                        $("#alertaRegistro").css("display", "none");
                    }
                }    
			});
		}

	});

	
});