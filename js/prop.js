// prepRACION DEL DOM
$(document).ready(function(){
//validcion formulaRIO LOGIN

var tipos = $("#tipoInmueble").val();
if (tipos != "") {
    switch (tipos){
            case "Casa":
                $("#casa").css("display","block");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
            case "Condominio":
                $("#casa").css("display","block");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
            case "Departamento":
                $("#casa").css("display","none");
                $("#departamento").css("display","block");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
            case "Edificio":
                $("#casa").css("display","none");
                $("#departamento").css("display","none");
                $("#edificio").css("display","block");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
            case "Local":
                $("#casa").css("display","none");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","block");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
            case "Oficina":
                $("#casa").css("display","none");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","block");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
            case "Terreno":
                $("#casa").css("display","none");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","block");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
            case "Bodega":
                $("#casa").css("display","none");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","block");
                $("#ranchos").css("display","none");
                break;
            case "Rancho":
                $("#casa").css("display","none");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","block");
                break;
            case "Seleccione":
                $("#casa").css("display","none");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
        }
};

var tipoOpe=$("#tipoOperacion").val();
        switch (tipoOpe){
            case "Venta":
                $(".venta").show("slow");
                $(".renta").hide("slow");
            break;
            case "Renta":
                $(".renta").show("slow");
                $(".venta").hide("slow");
            break;
            case "Venta-Renta":
                $(".venta").show("slow");
                $(".renta").show("slow");
            break;
            case "Traspaso":
                $(".venta").show("slow");
                $(".renta").hide("slow");
            break;
            default:
                $(".venta").hide("slow");
                $(".renta").hide("slow");
            break;   
        }

    $("#tipoInmueble").change(function(){
        var tipo=$("#tipoInmueble").val();
        switch (tipo){
            case "Casa":
                $("#casa").css("display","block");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
            case "Condominio":
                $("#casa").css("display","block");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
            case "Departamento":
                $("#casa").css("display","none");
                $("#departamento").css("display","block");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
            case "Edificio":
                $("#casa").css("display","none");
                $("#departamento").css("display","none");
                $("#edificio").css("display","block");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
            case "Local":
                $("#casa").css("display","none");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","block");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
            case "Oficina":
                $("#casa").css("display","none");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","block");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
            case "Terreno":
                $("#casa").css("display","none");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","block");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
            case "Bodega":
                $("#casa").css("display","none");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","block");
                $("#ranchos").css("display","none");
                break;
            case "Rancho":
                $("#casa").css("display","none");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","block");
                break;
            case "Seleccione":
                $("#casa").css("display","none");
                $("#departamento").css("display","none");
                $("#edificio").css("display","none");
                $("#local").css("display","none");
                $("#oficina").css("display","none");
                $("#terreno").css("display","none");
                $("#bodegas").css("display","none");
                $("#ranchos").css("display","none");
                break;
        }
    });
    $("#chipotecario").change(function(){
        var hipotecario=$("#chipotecario").val();
        if(hipotecario==1){
            //$(".hipotecario").css("display","block");
            $(".hipotecario").show(2000);
        }else{
            //$(".hipotecario").css("display","none");
            $(".hipotecario").hide(2000);
        }
    }); 
    $("#herencia").change(function(){
        var herencia=$("#herencia").val();
        if(herencia==1){
            $(".herencia").show(2000);
        }else{
            $(".herencia").hide(2000);
        }
    }); 
    
    $("#tipoOperacion").change(function(){
        var tipo=$("#tipoOperacion").val();
        switch (tipo){
            case "Venta":
                $(".venta").show("slow");
                $(".renta").hide("slow");
            break;
            case "Renta":
                $(".renta").show("slow");
                $(".venta").hide("slow");
            break;
            case "Venta-Renta":
                $(".venta").show("slow");
                $(".renta").show("slow");
            break;
            case "Traspaso":
                $(".venta").show("slow");
                $(".renta").hide("slow");
            break;
            default:
                $(".venta").hide("slow");
                $(".renta").hide("slow");
            break;   
        }
    });
    
    $("#formprop").validate({
        ignore: "",
        invalidHandler: function(event, validator) {
            // 'this' refers to the form
            var errors = validator.numberOfInvalids();
            if (errors) {
               // alert(errors)
              var message = errors == 1
                ? 'Tienes 1 campo faltante, corr&iacute;gelo'
                : 'Tienes ' + errors + ' campos faltantes, corr&iacute;gelos';
              $(".errores span").html(message);
              $(".errores").show();
            } else {
              $(".errores").hide();
            }
        },
        rules: {
            tipoInmueble: {
                required: true
            },
            cp: {required: true, maxlength:5, minlength:5},
            calle: "required",
            numero: "required",
            tanuncio: "required",
            estatusPropiedad: "required",
            descripcion: "required",
            m2t: "required",
            m2c: "required",
            tipoOperacion: "required",
            pventa: {
                required: function(element){
                    if($("#tipoOperacion").val()=="Venta" || $("#tipoOperacion").val()=="VentaRenta" || $("#tipoOperacion").val()=="Traspaso"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            cventa: {
                required: function(element){
                    if($("#tipoOperacion").val()=="Venta" || $("#tipoOperacion").val()=="VentaRenta" || $("#tipoOperacion").val()=="Traspaso"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            prenta: {
                required: function(element){
                    if($("#tipoOperacion").val()=="Renta" || $("#tipoOperacion").val()=="VentaRenta"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            crenta: {
                required: function(element){
                    if($("#tipoOperacion").val()=="Renta" || $("#tipoOperacion").val()=="VentaRenta"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            m2j:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Casa" || $("#tipoInmueble").val()=="Condominio"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            nrecamaras:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Casa" || $("#tipoInmueble").val()=="Condominio"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            nmedbanos:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Casa" || $("#tipoInmueble").val()=="Condominio"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            ncocherasdesc:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Casa" || $("#tipoInmueble").val()=="Condominio"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            nconstruidos:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Casa" || $("#tipoInmueble").val()=="Condominio"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            nbanos:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Casa" || $("#tipoInmueble").val()=="Condominio"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            cservicio:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Casa" || $("#tipoInmueble").val()=="Condominio"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            //departamento
            tdepto:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Departamento"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            pubicacion:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Departamento"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            m2jd:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Departamento"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            nrecamarasd:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Departamento"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            nmedbanosd:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Departamento"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            ncocherasdescd:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Departamento"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            nconstruidosd:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Departamento"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            nbanosd:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Departamento"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            cserviciod:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Departamento"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            //edificio
            nunidades:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Edificio"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            nnounidades:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Edificio"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            ncocherasdesced:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Edificio"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            ncocherascubed:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Edificio"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            ncocherasvisitased:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Edificio"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            niveldificio:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Edificio"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            cedificio:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Edificio"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            edoconservacioned:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Edificio"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            //Local comercial
            mfrenteloc:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Local"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            mfondoloc:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Local"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            nbanosloc:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Local"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            pisosnivelesloc:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Local"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            nubicacionloc:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Local"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            nestacionamientoloc:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Local"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            edoconservacionloc:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Local"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            //Oficina
            nprivadosof:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Oficina"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            nbanosof:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Oficina"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            ncocherasdescof:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Oficina"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            ncocherascubof:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Oficina"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            ncocherasvisitasof:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Oficina"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            nconstruidosof:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Oficina"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            ubicacionof:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Oficina"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            edoconservacionof:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Oficina"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            //Terreno
            mfrentet:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Terreno"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            mfondot:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Terreno"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            tipoterreno:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Terreno"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            fterreno:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Terreno"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            usosuelo:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Terreno"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            //Bodega
            mfrenteb:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Bodega"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            mfondob:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Bodega"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            cindustrial:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Bodega"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            ferrocarril:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Bodega"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            tmultimodal:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Bodega"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            m2bodega:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Bodega"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            m2oficinab:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Bodega"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            andenes:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Bodega"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            amaniobras:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Bodega"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            altura:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Bodega"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            techo:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Bodega"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            toneladas:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Bodega"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            //Rancho
            hectareas:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            rancho:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            sriego:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            vpanoramica:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            avisitantes:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            lago:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            rio:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            establo:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            m2jr:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            sagicola:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            m2ag:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            spastizal:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            m2pa:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            shabitable:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            m2hab:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            npozos:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            ncasas:{
                required: function(element){
                    if($("#tipoInmueble").val()=="Rancho"){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            //propietario
            // datosprop:{
            //     required: true
            // },
            // nombreprop:{
            //     required: function(element){
            //         if($("#datosprop").val()==1){
            //             return true;
            //         }else{
            //             return false;
            //         }
            //     }
            // },
            // apellidosprop:{
            //     required: function(element){
            //         if($("#datosprop").val()==1){
            //             return true;
            //         }else{
            //             return false;
            //         }
            //     }
            // },
            // cel:{
            //     required: function(element){
            //         if($("#datosprop").val()==1){
            //             return true;
            //         }else{
            //             return false;
            //         }
            //     }
            // },
            // teloficina:{
            //     required: function(element){
            //         if($("#datosprop").val()==1){
            //             return true;
            //         }else{
            //             return false;
            //         }
            //     }
            // },
            // mail:{
            //     required: function(element){
            //         if($("#datosprop").val()==1){
            //             return true;
            //         }else{
            //             return false;
            //         }
            //     }
            // },
        },
        messages: {
            tipoInmueble: { required: "Seleccione una opci&oacute;n"},
            cp: {
                required: "ingrese c&oacute;digo postal",
                maxlength: "Deben ser 5 caracteres",
                minlength: "Deben ser 5 caracteres"
            },
            calle: "ingrese la calle",
            numero: "ingrese número",
            tanuncio: "Ingrese el t&iacute;tulo del anuncio",
            estatusPropiedad: "Seleccione un estatus",
            descripcion: "ingrese la descripci&oacute;n",            
            m2t: "ingrese los metros cuadrados del terreno",
            m2c: "ingrese metros cuadrados de construcción",
            tipoOperacion: "Seleeccione una opci&oacute;n",
            pventa: {
                required: "Ingrese precio de venta"
            },
            cventa: {
                required: "Ingrese comisi&oacute;n de venta"
            },
            prenta: {
                required: "Ingrese precio de renta"
            },
            crenta: {
                required: "Ingrese comisi&oacute;n de renta"
            },
            m2j:{
                required: "ingrese metros cuadrados de jard&iacute;n"
            },
            nrecamaras:{
                required: "ingrese el no. de rec&aacute;maras"
            },
            nmedbanos:{
                required: "ingrese no. de ba&ntilde;os"
            },
            ncocherasdesc:{
                required: "ingrese no. de cocheras descubiertas"
            },
            nconstruidos:{
                required: "ingrese no. de niveles construidos"
            },
            nbanos:{
                required: "ingrese no. de ba&ntilde;os"
            },
            cservicio:{
                required: "seleccione una opci&oacute;n"
            },
            //departamento
            tdepto:{
                required: "seleccione una opci&oacute;n"
            },
            pubicacion:{
                required: "Campo requerido"
            },
            m2jd:{
                required: "Campo requerido"
            },
            nrecamarasd:{
                required: "Campo requerido"
            },
            nmedbanosd:{
                required: "Campo requerido"
            },
            ncocherasdescd:{
                required: "Campo requerido"
            },
            nconstruidosd:{
                required: "Campo requerido"
            },
            nbanosd:{
                required: "Campo requerido"
            },
            cserviciod:{
                required: "seleccione una opci&oacute;n"
            },
            //edificio
            nunidades:{
                required: "Campo requerido"
            },
            nnounidades:{
                required: "Campo requerido"
            },
            ncocherasdesced:{
                required: "Campo requerido"
            },
            ncocherascubed:{
                required: "Campo requerido"
            },
            ncocherasvisitased:{
                required: "Campo requerido"
            },
            niveldificio:{
                required: "Campo requerido"
            },
            cedificio:{
                required: "seleccione una opci&oacute;n"
            },
            edoconservacioned:{
                required: "Campo requerido"
            },
            //local
            mfrenteloc:{
                required: "Campo requerido"
            },
            mfondoloc:{
                required: "Campo requerido"
            },
            nbanosloc:{
                required: "Campo requerido"
            },
            pisosnivelesloc:{
                required: "Campo requerido"
            },
            nubicacionloc:{
                required: "Campo requerido"
            },
            nestacionamientoloc:{
                required: "Campo requerido"
            },
            edoconservacionloc:{
                required: "Campo requerido"
            },
            //Oficina
            nprivadosof:{
                required: "Campo requerido"
            },
            nbanosof:{
                required: "Campo requerido"
            },
            ncocherasdescof:{
                required: "Campo requerido"
            },
            ncocherascubof:{
                required: "Campo requerido"
            },
            ncocherasvisitasof:{
                required: "Campo requerido"
            },
            nconstruidosof:{
                required: "Campo requerido"
            },
            ubicacionof:{
                required: "Campo requerido"
            },
            edoconservacionof:{
                required: "Campo requerido"
            },
            //Terreno
            mfrentet:{
                required: "Campo requerido"
            },
            mfondot:{
                required: "Campo requerido"
            },
            tipoterreno:{
                required: "Seleccione una opci&oacute;n"
            },
            fterreno:{
                required: "Campo requerido"
            },
            usosuelo:{
                required: "Seleccione una opci&oacute;n"
            },
            //Bodega
            mfrenteb:{
                required: "Campo requerido"
            },
            mfondob:{
                required: "Campo requerido"
            },
            cindustrial:{
                required: "Campo requerido"
            },
            ferrocarril:{
                required: "Campo requerido"
            },
            tmultimodal:{
                required: "Campo requerido"
            },
            m2bodega:{
                required: "Campo requerido"
            },
            m2oficinab:{
                required: "Campo requerido"
            },
            andenes:{
                required: "Campo requerido"
            },
            amaniobras:{
                required: "Campo requerido"
            },
            altura:{
                required: "Campo requerido"
            },
            techo:{
                required: "Seleccione una opci&oacute;n"
            },
            toneladas:{
                required: "Campo requerido"
            },
            //Rancho
            hectareas:{
                required: "Campo requerido"
            },
            rancho:{
                required: "Seleccione una opci&oacute;n"
            },
            sriego:{
                required: "Campo requerido"
            },
            vpanoramica:{
                required: "Campo requerido"
            },
            avisitantes:{
                required: "Campo requerido"
            },
            lago:{
                required: "Campo requerido"
            },
            rio:{
                required: "Campo requerido"
            },
            establo:{
                required: "Campo requerido"
            },
            m2jr:{
                required: "Campo requerido"
            },
            sagicola:{
                required: "Campo requerido"
            },
            m2ag:{
                required: "Seleccione una opci&oacute;n"
            },
            spastizal:{
                required: "Campo requerido"
            },
            m2pa:{
                required: "Seleccione una opci&oacute;n"
            },
            shabitable:{
                required: "Campo requerido"
            },
            m2hab:{
                required: "Seleccione una opci&oacute;n"
            },
            npozos:{
                required: "Campo requerido"
            },
            ncasas:{
                required: "Campo requerido"
            },
            descripcionr:{
                required: "Campo requerido"
            },
            //propietario
            datosprop:{
                required: "Seleccione una opci&oacute;n"
            },
            nombre:{
                required: "Campo requerido"
            },
            apellidos:{
                required: "Campo requerido"
            },
            cel:{
                required: "Campo requerido"
            },
            teloficina:{
                required: "Campo requerido"
            },
            mail:{
                required: "Campo requerido"
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                type: 'POST',
                beforeSend: function(){
                    $("#cargando").html('<img src="../images/cargando.gif" />');
                },
                success: function(data){
                    $("#cargando").css("display","none");
                    if(data!=0){
                        $("#carga").attr("href", "sube.php?idProp="+data);
                        alert('Datos guardados, ahora suba las fotos de la propiedad');
                        $("#next").css("display","block");
                    }else{
                        alert('error, intentelo de nuevo');
                    }
                }
            });
        }
    });
    $("#carga").click(function(){
        $("#all").css("display","none");    
        $("#fotovideo").css("display","block");    
    });
    
    $("#datosprop").change(function(){
        if($("#datosprop").val()==1){
            $("#propietariodatos").show(2000);
        }else{
            $("#propietariodatos").hide(3000);
        }
    });
    
    $('input:radio[name="pred"]').live("change",function(){
        var val= $(this).val();
        var shortname = $(this).attr("class");
        var dir=$(this).attr("id");
        $.ajax({
            url: 'procesa/images.php',
            data: 'img='+val+'&shortname='+shortname+'&dir='+dir,
            type: 'POST',
            beforeSend: function(){
                //$("#cargando").html('<img src="../images/cargando.gif" />');
            },
            success: function(data){
                alert('imagen elegida');
                $("#fin").css("display","block");
            }
        });
    });
    
    $("#fin").live("click",function(){
        location.reload();
    });
});

    //autocomplete codigo postal
    $(function () {
        $("#cp").autocomplete({
            source: '../user/procesa/cp.php',
            select: function(event,ui){
                var contenido= ui.item.value.split(',');
                $("#estado").val(contenido[1]);
                $("#municipio").val(contenido[2]);
                $("#ciudad").val(contenido[3]);
                $("#colonia").val(contenido[4]);
                setTimeout(function(){$("#cp").val(contenido[0])},100);
            }
        });
        $("#colonia").autocomplete({
            source: '../user/procesa/col.php',
            minLength: 2,
            select: function(event,ui){
                var contenido2= ui.item.value.split(',');
                $("#estado").val(contenido2[1]);
                $("#municipio").val(contenido2[2]);
                $("#ciudad").val(contenido2[3]);
                $("#cp").val(contenido2[0]);
                setTimeout(function(){$("#colonia").val(contenido2[4])},100);
            }
        });
    });
    $(function () {
        $('#file_upload').fileUploadUI({
            uploadTable: $('#files'),
            downloadTable: $('#files'),
            buildUploadRow: function (files, index) {
                return $('<tr><td>' + files[index].name + '<\/td>' +
                '<td class="file_upload_progress"><div><\/div><\/td>' +
                '<td class="file_upload_cancel">' +
                '<button class="ui-state-default ui-corner-all" title="Cancel">' +
                '<span class="ui-icon ui-icon-cancel">Cancel<\/span>' +
                '<\/button><\/td><\/tr>');
            },
            buildDownloadRow: function (file) {
                console.log(file);
                return $('<tr><td nowrap align="right" class="texto" style="padding-top: 10px;"><input type="radio" name="pred" value="'+file.name+'" class="'+file.shortname+'" id="'+file.dir+'" \/>Predeterminada<\/td>' +
                                        '<td><img src='+ file.name +' \/><\/td>' +
                                        '<\/tr></table>');
            }
        });
    });


