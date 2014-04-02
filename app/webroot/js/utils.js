jQuery(function ($) {


    $.pnotify.defaults.styling = "jqueryui";

//  usage: $.notify('info', 'fasdf aspdifhpasdi ofjpaos df', 300);

    $.notify = function(type, message, width){

        if (type == 'info'){
            var notice = $.pnotify({
                text: message,
                history: false,
                animation: 'fade',
                nonblock: true,
                sticker: false,
                opacity: .9
            }).click(function() {
                    notice.pnotify_remove();
            });
        } else {

                var notice = $.pnotify({
                    text: message,
                    history: false,
                    type: type,
                    animation: 'fade',
                    nonblock: true,
                    sticker: false,
                    opacity: .9
                }).click(function() {
                    notice.pnotify_remove();
                });

        }

    }





});