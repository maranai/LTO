(function($) {

    $(document).ready(function() {

        $("#CargaProvinciaOrigenId").on("change", function(){
            $.ajax({
                url: '/admin/ajax_cantones/' + $("#CargaProvinciaOrigenId").val(),
                cache: false,
                type: 'POST',
                dataType: 'HTML',
                success: function (data) {
                    $("#CargaCantonOrigenId").html(data);
                }
            });

        });

        $("#CargaCantonOrigenId").on("change", function(){
            $.ajax({
                url: '/admin/ajax_distritos/' + $("#CargaCantonOrigenId").val(),
                cache: false,
                type: 'POST',
                dataType: 'HTML',
                success: function (data) {
                    $("#CargaDistritoOrigenId").html(data);
                }
            });

        });

        $("#CargaProvinciaDestinoId").on("change", function(){
            $.ajax({
                url: '/admin/ajax_cantones/' + $("#CargaProvinciaDestinoId").val(),
                cache: false,
                type: 'POST',
                dataType: 'HTML',
                success: function (data) {
                    $("#CargaCantonDestinoId").html(data);
                }
            });

        });

        $("#CargaCantonDestinoId").on("change", function(){
            $.ajax({
                url: '/admin/ajax_distritos/' + $("#CargaCantonDestinoId").val(),
                cache: false,
                type: 'POST',
                dataType: 'HTML',
                success: function (data) {
                    $("#CargaDistritoDestinoId").html(data);
                }
            });

        });

    });

})(jQuery);


