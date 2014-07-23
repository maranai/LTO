(function($) {

    $(document).ready(function() {

        $("#ProvinciaId").on("change", function(){
            $.ajax({
                url: '/admin/ajax_cantones/' + $("#ProvinciaId").val(),
                cache: false,
                type: 'POST',
                dataType: 'HTML',
                success: function (data) {
                    $("#CantonId").html(data);
                }
            });

        });

        $("#CantonId").on("change", function(){
            $.ajax({
                url: '/admin/ajax_distritos/' + $("#CantonId").val(),
                cache: false,
                type: 'POST',
                dataType: 'HTML',
                success: function (data) {
                    $("#DistritoId").html(data);
                }
            });

        });

    });

})(jQuery);


