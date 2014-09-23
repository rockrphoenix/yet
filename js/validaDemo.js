//preparacion del DOM
$(document).ready(function(){
//validacion del formulario redes sociales
	$("#demo").validate({
		rules:{
			name: "required",
			tel:{
				required: true,
				digits: true,
				minlength:8,
				maxlength:13
			},
			mail:{
				required: true,
				email: true
			}			
		},
		messages:{
			name: "Campo requerido",
			tel:{
				required: "Campo requerido",
				digits: "Sólo números por favor",
				minlength:"el número debe contener almenos 8 dígitos",
				maxlength:"el número debe contener menos de 13 dígitos"
			},
			mail:{
				required: "Campo requerido",
				email: "Debe ser un email"
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