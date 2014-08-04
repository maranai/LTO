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

        $(function () {
            $(".datepicker").datepicker({minDate: '0'});
        });

        $("#CargaTipoId").on("change", function(){

            if ($("#CargaTipoId").val() == 11){
                $("#newTipoCarga").slideDown();
            } else {
                $("#newTipoCarga").slideUp();
            }
        });


        $("#CargaPropiedadDimensiones").on("change", function(){
            $("#CargaVolumen").attr("disabled", "disabled");
            $("#CargaUnidadVolumen").attr("disabled", "disabled");
            $("#CargaAlto").removeAttr("disabled");
            $("#CargaAncho").removeAttr("disabled");
            $("#CargaLargo").removeAttr("disabled");
            $("#CargaUnidadDimensiones").removeAttr("disabled");
            $("#CargaVolumen").val("");

        });

        $("#CargaPropiedadVolumen").on("change", function(){
            $("#CargaVolumen").removeAttr("disabled");
            $("#CargaUnidadVolumen").removeAttr("disabled");
            $("#CargaAlto").attr("disabled", "disabled");
            $("#CargaAncho").attr("disabled", "disabled");
            $("#CargaLargo").attr("disabled", "disabled");
            $("#CargaUnidadDimensiones").attr("disabled", "disabled");

            $("#CargaAlto").val("");
            $("#CargaAncho").val("");
            $("#CargaLargo").val("");
        });

        $("#CargaFechaParaCarga").on("change", function(){

            if ($("#CargaFechaParaCarga").val() == 1){
                $("#especificar_fecha").slideDown();
                $("#especificar_rango").slideUp();
            } else {
                if ($("#CargaFechaParaCarga").val() == 5){
                    $("#especificar_rango").slideDown();
                    $("#especificar_fecha").slideUp();
                } else {
                    $("#especificar_fecha").slideUp();
                    $("#especificar_rango").slideUp();
                }
            }
        });

        $("#CargaVolumen").attr("disabled", "disabled");
        $("#CargaUnidadVolumen").attr("disabled", "disabled");



    });

})(jQuery);


