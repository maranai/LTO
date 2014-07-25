(function($) {

    $(document).ready(function() {

        $("#CargaPropietario").autocomplete({
            minLength: 2,
            source: '/usuarios/ajax_search',
            delay: 2,
            selectFirst: true,
            change:function (event, ui){
                if (!ui.item){
                    $("#CargaPropietarioId").val("");
                }
            },
            select:function (event, ui) {
                $("#CargaPropietarioId").val(ui.item.id);
            }
        });

        $("#CargaTipoId").on("change", function(){

            if ($("#CargaTipoId").val() == 11){
                $("#newTipoCarga").slideDown();
            } else {
                $("#newTipoCarga").slideUp();
            }
        });

    });

})(jQuery);


