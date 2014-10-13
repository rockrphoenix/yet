//validacion colores
$(document).ready(function(){
    $("#asesores").validate({
        rules: {
            nombres: "required",
            paterno: "required",
            materno: "required",
            email:{
                required: true,
                email: true
            },
            cemail: {
                required: true,
                equalTo: "#email"
            },
            tel: {
                required: true,
                digits: true
            },
            cel: {
                required: true,
                digits: true
            }
        },
        messages: {
            nombres: "Campo obligatorio",
            paterno: "Campo obligatorio",
            materno: "Campo obligatorio",
            email: {
                required: "Campo obligatorio",
                email: "Debe introducir un email válido"
            },
            cemail:{
                required: "Campo obligatorio",
                equalTo: "La confirmación no coincide"
            },
            tel: {
                required: "Campo obligatorio",
                digit: "Campo de números"
            },
            cel: {
                required: "Campo obligatorio",
                digit: "Campo de números"
            }
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
                    }else if(data==4){
                        $("#msj_err").html("No puede dar de alta mas asesores debido a su plan contratado");
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
    //validación formulario modificacion
    $("#modAsesores").validate({
        rules: {
            nombres: "required",
            paterno: "required",
            materno: "required",
            tel: {
                required: true,
                digits: true
            },
            cel: {
                required: true,
                digits: true
            }
        },
        messages: {
            nombres: "Campo obligatorio",
            paterno: "Campo obligatorio",
            materno: "Campo obligatorio",
            email: {
                required: "Campo obligatorio",
                email: "Debe introducir un email válido"
            },
            cemail:{
                required: "Campo obligatorio",
                equalTo: "La confirmación no coincide"
            }
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
                        $("#msj_suc").html("Datos actualizados");
                        $("#respuestaAltaV").show();
                        $("#respuestaAltaV").css("display", "block");
                        $("#alertaRegistro").css("display", "none");
                    }else if(data==2){
                        $("#msj_err").html("El email ya esta registrado, prueba con otro");
                        $("#respuestaAltaFalso").show();
                        $("#respuestaAltaFalso").css("display", "block");
                        $("#alertaRegistro").css("display", "none");
                    }
                }
            });
        }
    });
    //validación formulario oculta
    $("#ocuAses").validate({
        rules: {
            nombres: "required"
        },
        messages: {
            nombres: "Campo obligatorio"
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
                        $("#msj_suc").html("Datos actualizados");
                        $("#respuestaAltaV").show();
                        $("#respuestaAltaV").css("display", "block");
                        $("#alertaRegistro").css("display", "none");
                    }else if(data==0){
                        $("#msj_err").html("No se pudo actualizar el registro");
                        $("#respuestaAltaFalso").show();
                        $("#respuestaAltaFalso").css("display", "block");
                        $("#alertaRegistro").css("display", "none");
                    }
                }
            });
        }
    });
});