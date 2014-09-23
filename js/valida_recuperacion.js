//preparación del DOM
$(document).ready(function(){
	//validacion de formulario de recuperacion 
	$("#recuperar").validate({
		rules:{
			email:{
				required:true,
				email:true
			}
		},
		messages:{
			email: {
                required: "Ingrese su email",
                email: "email no valido"
            }
		},
		submitHandler: function(form){
            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                
                beforeSend: function(){
                    $("#alertaLogin").html("<img src='images/cargando.gif'/>");
                    $("#alertaLogin").css("display","block");
                },
                success: function(data){
                    $("#alertaLogin").css("display","none");
                        if (data==1) {
                            $("#msj_suc").html("e-mail enviado satisfactoriamente");
                            $("#respuestaAltaV").css("display", "block");
                            window.location="zona.php";
                        }else{
                            $("#msj_err").html("Dirección de correo invalida");
                            $("#respuestaAltaFalso").css("display", "block"); 
                        }   
                    
                }
            });
        }
	});
	//validacion de formulario contraseña nueva
	$("#recuperar2").validate({
		rules:{
			newpass: {
                minlength: 5,
                required: true
            },
            confnewpass: {
                required: "#newpass",
                minlength: 5,
                equalTo: "#newpass"
            },
			mail:{
				required:true,
				email:true
			}
		},
		messages:{
			newpass: {minlength: "la contraseña debe tener más de 5 caracteres",required: "ingrese su contraseña"},
            confnewpass: {
                required: "confirme la contraseña",
                minlength: "la contraseña debe tener más de 5 caracteres",
                equalTo: "la contraseña no coincide"
            },
			mail: {
                required: "Ingrese su email",
                email: "email no valido"
            }
		},
		submitHandler: function(form){
			$.ajax({
				type:$(form).attr('method'),
				url:$(form).attr('action'),
				data:$(form).serialize(),

				beforeSend: function(){
                    $("#alertaLogin").html("<img src='images/cargando.gif'/>");
                    $("#alertaLogin").css("display","block");
                },
                success: function(data){
                    $("#alertaLogin").css("display","none");
                    if (data==0) {
                        $("#msj_log").html("-el usuario no coincide");
                        $("#respuestaLogin").css("display", "block");    
                    }else if(data==1){

                        $("#msj_suc").html("Contraseña cambiada");
                        $("#respuestaAltaV").css("display", "block");  
                        window.location="zona.php";
                    }
                }
			});
		}
	});

})