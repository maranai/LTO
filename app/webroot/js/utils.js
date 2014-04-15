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

    $(document).ready(function() {

        // code to show notification messages
        var messages = $("#app_messages").val();
        var messagesArray = JSON.parse(messages);
        for (var i in messagesArray) {
            $.notify(messagesArray[i].type, messagesArray[i].message, 300);

        }
    });

});