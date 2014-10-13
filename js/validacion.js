// prepRACION DEL DOM
$(document).ready(function(){
//validcion formulaRIO LOGIN
    $("#login").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            psw: "required"
        },
        messages: {
            psw: "Ingrese su contraeña",
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
                    if (data==0) {
                        $("#msj_log").html("Usuario o password incorrecto por favor intentelo de nuevo");
                        $("#respuestaLogin").css("display", "block");    
                    }else if(data==2){
                        $("#msj_log").html("Usuario no activado");
                        $("#respuestaLogin").css("display", "block");
                    }else{
                        window.location="user/index.php";
                    }
                }
            });
        }
    });

//validacion formulario registro

    $("#registro").validate({
        rules: {
            nombre: "required",
            paterno: "required",
            materno: "required",
            mail: {
                required: true,
                email: true
            },
            cemail: {
                required: "#mail",
                email: true,
                equalTo: "#mail"
            },
            psw: {
                minlength: 5,
                required: true
            },
            cpsw: {
                required: "#psw",
                minlength: 5,
                equalTo: "#psw"
            },
            ingreso: "required"
        },
        messages: {
            nombre: "debe ingresar el nombre",
            paterno: "Debe ingresar el apellido paterno",
            materno: "Debe ingresar el apellido materno",
            mail: {
                required: "ingrese su email",
                email: "email no valido"
            },
            cemail: {
                required: "ingrese su confirmacion de email",
                email: "email no valido",
                equalTo: "el mail no coincide"
            },
            psw: {minlength: "la contraseña debe tener más de 5 caracteres",required: "ingrese su contraseña"},
            cpsw: {
                required: "ingrese la contraseña",
                minlength: "la contraseña debe tener más de 5 caracteres",
                equalTo: "la contraseña no coincide"
            },
            ingreso: "ingrese la fecha"
        },
        submitHandler: function(form){
            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                type: 'POST',
                beforeSend: function(){
                    $("#alertaRegistro").html("<img src='images/cargando.gif'>");
                    $("#alertaRegistro").css("display", "block");
                },
                success: function(data){
                    if (data==1) {
                        $("#msj_suc").html("Datos ingresados, verifica tu email para completar el registro");
                        $("#respuestaAltaV").show();
                        $("#respuestaAltaV").css("display", "block");
                        $("#alertaRegistro").css("display", "none");
                    }else if(data==2){
                        $("#msj_err").html("El email ya esta registrado, prueba con otro");
                        $("#respuestaAltaFalso").show();
                        $("#respuestaAltaFalso").css("display", "block");
                        $("#alertaRegistro").css("display", "none");
                    }else if(data==3){
                        $("#msj_err").html("No se pudo enviar el correo de confirmación");
                        $("#respuestaAltaFalso").show();
                        $("#respuestaAltaFalso").css("display", "block");
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
    $("#ingreso").datepicker({changeYear: true,yearRange: '-100:+0'});
});
