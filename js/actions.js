$(document).ready(function(){
    $(".cp-provider").click(function(evt){
        $('.cp-provider').removeClass('cp-selected');
        $(this).addClass('cp-selected');
        $('#payment_type').val($(this).attr('data-provider'));
    });

    $("#send-form").click(function(){
        if ($("#order_id").val() != '' && $("#order_name").val() != '' && $("#order_price").val() != '' && $("#customer_name").val() != '' && $("#customer_email").val() != '' && $("#payment_type").val() != '') {
            var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if ( emailRegex.test( $("#customer_email").val() ) ) {
                if (!isNaN($('#order_price').val()) && $('#order_price').val() >= 5) {
                    $("#order-form").submit();
                } else {
                    alert('El monto debe ser un valor numerico mayor o igual a $5');
                }
            } else {
                alert('El email no es valido');
            }
        } else {
            alert('La información no debe de ser vacia');
        }
    });
});
