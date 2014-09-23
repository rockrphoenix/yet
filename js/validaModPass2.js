$(document).ready(function(){
//validacion del formulario cambio de password
	$("#modPassAsesor").validate({
		rules:{
			pswn:{
				minlength:5,
				required:true
			},
			cpswn:{
				required:"#pswn",
				minlength:5,
				equalTo:"#pswn"
			}
		},
		messages:{
			pswn:{
				minlength:"La contraseña debe tener mas de 5 caracteres",
				required:"Debe ingresar su nueva contraseña"
			},
			cpswn:{
				required:"Confirme la contraseña",
				minlength:"La contraseña debe tener mas de 5 caracteres",
				equalTo:"Las contraseñas no coinciden"
			}
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
                        $("#msj_suc").html("El Password es valido");
                        $("#respuestaAltaV").show();
                        $("#respuestaAltaV").css("display", "block");
                        $("#alertaRegistro").css("display", "none");
                    }else{
                        $("#msj_err").html("Password Invalido");
                        $("#respuestaAltaFalso").show();
                        $("#respuestaAltaFalso").css("display", "block");
                        $("#alertaRegistro").css("display", "none");
                    }
                }    
			})
		}

	});
});