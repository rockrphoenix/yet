//preparacion del DOM
$(document).ready(function(){
//validacion del formulario Modificar Perfil
	$("#mod_perf").validate({
		rules:{
			nombre:"required",
			paterno:"required",
			materno:"required",
			telefono:{
				required:true,
				minlength:8
			},
			celular:{
				required:true,
				minlength:10
			}
		},
		messages:{
			nombre:"Debe ingresar su nombre",
			paterno:"Debe ingresar su primer apellido",
			materno:"Debe ingresar su segundo apellido",
			telefono:{
				required:"Debe ingresar un número telefonico",
				minlength:"El número no debe tener menos de 8 dígitos",
				maxlength:"El número no debe tener mas de 8 dígitos"
			},
			celular:{
				required:"Debe ingresar un número celular",
				minlength:"El número no debe tener menos de 13 dígitos",
				maxlength:"El número no debe tener mas de 13 dígitos"
			}	
		},
		submitHandler: function(form){
            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                beforeSend: function(){
                    $("#alertaRegistro").html("<img src='images/cargando.gif'>");
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
            });
        }

	});
});