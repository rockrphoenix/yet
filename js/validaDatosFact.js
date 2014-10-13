//preparacion del DOM
$(document).ready(function(){
//validacion de formulario datos de facturcion
	$("#datosFact").validate({
		rules:{
			nombreRs:"required",
			rfc:"required",
			cp:"required",
			calle:"required",
			numero:"required",
			//no_interior:"required",
			colonia:"required",
			delegacion:"required",
			estado:"required",
			ciudad:"required",
			telefono:{
				required:true,
				minlength:8,
				maxlength:13
			},
			mail:{
				required:true,
				email:true
			},
		},
		messages:{
			nombreRs:"Debe ingresar un nombre o razon social",
			rfc:"Debe ingresar un rfc",
			cp:"Debe ingresar un código postal",
			calle:"Debe ingresar el nombre de la calle",
			numero:"Debe ingresar el número de la propiedad",
			//no_interior:"Debe ingresar el número interior de la propiedad",
			colonia:"Debe ingresar una colonia",
			delegacion:"Debe ingresar una delegación",
			estado:"Debe ingresar un estado",
			ciudad:"Debe ingresar una ciudad",
			telefono:{
				required:"Debe ingresar un número telefonico ",
				minlength:"el número debe tener mas de 8 dígitos",
				maxlength:"el número debe tener menos de 13 dígitos"
			},
			mail:{
				required:"Debe ingresar un e-mail",
				email:"El e-mail debe ser valido"
			}
		},
		submitHandler: function(form){
			$.ajax({
				type:$(form).attr('method'),
				url:$(form).attr('action'),
				data:$(form).serialize(),
				beforeSend:function(){
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

	$("#eddatosFact").validate({
			rules:{
				nombreRs:"required",
				rfc:"required",
				cp:"required",
				calle:"required",
				numero:"required",
				//no_interior:"required",
				colonia:"required",
				delegacion:"required",
				estado:"required",
				ciudad:"required",
				telefono:{
					required:true,
					minlength:8,
					maxlength:13
				},
				mail:{
					required:true,
					email:true
				},
			},
			messages:{
				nombreRs:"Debe ingresar un nombre o razon social",
				rfc:"Debe ingresar un rfc",
				cp:"Debe ingresar un código postal",
				calle:"Debe ingresar el nombre de la calle",
				numero:"Debe ingresar el número de la propiedad",
				//no_interior:"Debe ingresar el número interior de la propiedad",
				colonia:"Debe ingresar una colonia",
				delegacion:"Debe ingresar una delegación",
				estado:"Debe ingresar un estado",
				ciudad:"Debe ingresar una ciudad",
				telefono:{
					required:"Debe ingresar un número telefonico ",
					minlength:"el número debe tener mas de 8 dígitos",
					maxlength:"el número debe tener menos de 13 dígitos"
				},
				mail:{
					required:"Debe ingresar un e-mail",
					email:"El e-mail debe ser valido"
				}
			},
			submitHandler: function(form){
				$.ajax({
					type:$(form).attr('method'),
					url:$(form).attr('action'),
					data:$(form).serialize(),
					beforeSend:function(){
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