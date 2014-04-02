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

    var olvidoUserError = $("#olvidoUserError").val();
    if (olvidoUserError == 1){
        modal = $('#olvido-clave-modal').modal();
        $("#emailUserError").show();
        return false;
    }

    var emailIncorrecto = $("#emailIncorrecto").val();
    if (emailIncorrecto == 1){
        modal = $('#olvido-clave-modal').modal();
        $("#emailFormatError").show();
        return false;
    }

    $.notify('info', 'Este sitio se encuentra en construcción. Pronto estará disponible con funcionalidad útil para todos los transportistas y sus clientes.', 300);


});