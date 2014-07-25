(function($) {

    $(document).ready(function() {

        $("#FletePropietario").autocomplete({
            minLength: 2,
            source: '/usuarios/ajax_search',
            delay: 2,
            selectFirst: true,
            change:function (event, ui){
                if (!ui.item){
                    $("#FletePropietarioId").val("");
                }
            },
            select:function (event, ui) {
                $("#FletePropietarioId").val(ui.item.id);
            }
        });

        $("#FleteProvinciaOrigenId").on("change", function(){
            $.ajax({
                url: '/admin/ajax_cantones/' + $("#FleteProvinciaOrigenId").val(),
                cache: false,
                type: 'POST',
                dataType: 'HTML',
                success: function (data) {
                    $("#FleteCantonOrigenId").html(data);
                }
            });

        });

        $("#FleteCantonOrigenId").on("change", function(){
            $.ajax({
                url: '/admin/ajax_distritos/' + $("#FleteCantonOrigenId").val(),
                cache: false,
                type: 'POST',
                dataType: 'HTML',
                success: function (data) {
                    $("#FleteDistritoOrigenId").html(data);
                }
            });

        });

        $("#FleteProvinciaDestinoId").on("change", function(){
            $.ajax({
                url: '/admin/ajax_cantones/' + $("#FleteProvinciaDestinoId").val(),
                cache: false,
                type: 'POST',
                dataType: 'HTML',
                success: function (data) {
                    $("#FleteCantonDestinoId").html(data);
                }
            });

        });

        $("#FleteCantonDestinoId").on("change", function(){
            $.ajax({
                url: '/admin/ajax_distritos/' + $("#FleteCantonDestinoId").val(),
                cache: false,
                type: 'POST',
                dataType: 'HTML',
                success: function (data) {
                    $("#FleteDistritoDestinoId").html(data);
                }
            });

        });


    });

})(jQuery);


