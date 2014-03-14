jQuery(function ($) {

    var modal;

    // Load dialog on click
    $('#olvidoClave').click(function (e) {
        modal = $('#olvido-clave-modal').modal();
        return false;
    });

    $('.btnCancelar').click(function (e) {
        modal.close();
    });

    var emailSent = $("#emailSentConfirm").val();
    if (emailSent == 1){
        modal = $('#olvido-clave-confirm').modal();
        return false;

    }

});