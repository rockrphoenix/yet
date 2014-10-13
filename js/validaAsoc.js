//preparacion del DOM
$(document).ready(function(){
//validacion del formulario redes sociales
	$("#asoci1").validate({
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

	$("#asoci2").validate({
		rules:{
			titulo:"required",
			url:{
				required:true,
				url:true
			}
		},
		messages:{
			titulo:"Debe ingresar un Nombre",
			url:{
				required:"debe ingresar una url valida",
				url:"Url no valida"
			}			
		},
		submitHandler: function(form){
			$.ajax({
				type:$(form).attr('method'),
				url:$(form).attr('action'),
				data:$(form).serialize(),
				beforeSend:function(){
					$("#alertaRegistro2").html("<img src='images/cargando.gif'>");
                    $("#alertaRegistro2").css("display", "block");
				},
				success: function(data){
                    if (data == 1) {
                        $("#msj_suc2").html("Datos ingresados");
                        $("#respuestaAltaV2").show();
                        $("#respuestaAltaV2").css("display", "block");
                        $("#alertaRegistro2").css("display", "none");
                    }else{
                        $("#msj_err2").html("Error al ingresar tus datos");
                        $("#respuestaAltaFalso2").show();
                        $("#respuestaAltaFalso2").css("display", "block");
                        $("#alertaRegistro2").css("display", "none");
                    }
                }  
			});
		}
	});
});