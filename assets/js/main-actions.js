/**
 * Formulario principal
 * @version 1.0.0
 * @since 1.0.0
 * @author Eduardo Aguilar <eduardo.aguilar@compropago.com>
 */

/**
 * Redireccion final del proseso de compra
 * @type {string}
 */
var redirectURL = "http://localhost/SimpleStoreAjax/views/";

/**
 * Mensaje de instrucciones al final de la compra
 * @type {string}
 */
var successMessage = "Mis instrucciones";


/**
 * Eventos principales
 */
$(document).ready(function(){

    /**
     * Evento que prosesa la orden de compra
     */
    $("#set-cheackout").click(function(){
        setdata();
    });


    /**
     * Evento que genera la redireccion final
     */
    $("#final-redirect").click(function(evt){
        evt.preventDefault();
        window.location.href = redirectURL;
    });

});


/**
 * Funcion principal de compra
 */
function setdata(){

    if(getProvider()){
        $("#display-status").fadeOut();
        $("#checkout").fadeOut();
        $("#load-img").fadeIn();

        $.ajax({
            url: "../src/Simplestore/Controllers/SetPagoController.php",
            type: "post",
            data: $("#form-data").serializeObject(),
            success: function(resp){
                if(resp.stat){

                    $("#compropagodContainer").html('<iframe style="width: 100%; height: 820px;" id="compropagodFrame"  src="https://www.compropago.com/comprobante/?confirmation_id='+resp.resp.id+'"  frameborder="0" scrolling="yes"> </iframe>');

                    $("#text-stats").html("Prosedimiento terminado:<br>"+successMessage);
                    $("#text-stats").removeClass("error");
                    $("#display-status").fadeIn();

                    $("#recibo").fadeIn();

                    $("#checkout").fadeOut();
                    $("#load-img").fadeOut();
                }else{
                    $("#load-img").fadeOut();
                    $("#text-stats").html(resp.msg);
                    $("#text-stats").addClass("error");
                    $("#display-status").fadeIn();
                    $("#checkout").fadeIn();
                }
            }
        });

    }else{
        $("#text-stats").html("No se selecciono un proveedor.");
        $("#text-stats").addClass("error");
        $("#display-status").fadeIn();
    }

}


/**
 * Validacion de seleccion de proveedor
 * @returns {boolean}
 */
function getProvider(){
    var providers = $("[name=compropagoProvider]");
    var flag = false;

    for(var x = 0; x < providers.length; x++){
        if($(providers[x]).is(":checked")){
            flag = true;
            break;
        }
    }

    return flag;
}