//preparacion del DOM
$(document).ready(function(){
//validacion del formulario redes sociales
	$("#contactoUsuario").validate({
		rules:{
			name: "required",
			tel:{
				required: true,
				digits: true
			},
			mail:{
				required: true,
				email: true
			},
			mensaje: "required"			
		},
		messages:{
			name: "Campo requerido",
			tel:{
				required: "Campo requerido",
				digits: "Sólo números por favor"
			},
			mail:{
				required: "Campo requerido",
				email: "Debe ser un email"
			},
			mensaje: "Ponga un mensaje"			
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
                        $("#respuestaAltaV").show(200);
                        $("#alertaRegistro").css("display", "none");
                    }else{
                        $("#respuestaAltaFalso").show(200);
                        $("#alertaRegistro").css("display", "none");
                    }
                }    
			})
		}

	});
});