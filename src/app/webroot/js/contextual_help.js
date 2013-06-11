

function setQtip ($el, options, override) {
    

    var opt = $.extend({
           my: $el.data('my'),
           at: $el.data('at'),
           custom_class: $el.data('customclass')
    }, options);

    var settings = $.extend({
            content: {
                attr: 'data-text',
                title: {
                    button: true
                }
            },
            position: {
                my: opt.my,
                at: opt.at 
            },
            show: {
                event: false,
                ready: true
            },
            hide: false,
            style: {
                classes: 'qtip-shadow qtip-orange ' + opt.custom_class,
                tip: {
                    corner: true,
                    width: 14,
                    height: 8
                }
            },
            events: opt.events
        }, override);

    $el.qtip(settings);
}


$(function () {
    $('.showHelp').each(function() {
        var $this = $(this); 

        setQtip($this);
    });
    $showGradeHelp = $('.showGradeHelp:first');
    setQtip($showGradeHelp, {
        custom_class: 'grade_help',
        events: {
            hide: function () {
                $.post('/classrooms/setFirstRun/'+CLASSROOM_ID);
            }
        }
    });

    $showGradeHelp.on('click', function () {
       $('.grade_help').qtip('hide');
    });


});
