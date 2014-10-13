//preparacion del DOM
$(document).ready(function(){
//validacion del formulario redes sociales
	$("#redSoc").validate({
		rules:{
<<<<<<< HEAD
			
=======
			face:{
				required:true,
				url:true
			},
			twitter:{
				required:true,
				url:true
			}
			
		},
		messages:{
			face:{
				required:"Campo obligatorio",
				url:"Debe ingresar una direccion URL válida"
			},
			twitter:{
				required:"Campo obligatorio",
				url:"Debe ingresar una direccion URL válida"
			}
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
			
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
                    }else{
                        $("#msj_err").html("Error al ingresar tus datos");
                        $("#respuestaAltaFalso").show();
                        $("#respuestaAltaFalso").css("display", "block");
                        $("#alertaRegistro").css("display", "none");
                    }
                }    
			})
		}

	});
});