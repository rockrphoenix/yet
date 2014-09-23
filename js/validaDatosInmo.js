//preparacion del DOM
$(document).ready(function(){
//validacion de formulario Datos de  Inmobiliaria
	$("#datos_inmo").validate({
		rules:{
			nombre:"required",
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
			}
		},
		messages:{
			nombre:"Debe ingresar un Nombre",
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
				}
			})
		}
	});	
});