//validacion colores
$(document).ready(function(){
    $("#colores").validate({
        rules: {
            colora: {
                required: true,
                minlength: 3,
                maxlength: 6
            },
            colorb: {
                required: true,
                minlength: 3,
                maxlength: 6
            }
        },
        messages: {
            colora: {
                required: "Debe ingresar un color",
                minlength: "Mínimo 3 dígitos por color",
                maxlength: "Máximo 6 dígitos por color"
            },
            colorb: {
                required: "Debe ingresar un color",
                minlength: "Mínimo 3 dígitos por color",
                maxlength: "Máximo 6 dígitos por color"
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