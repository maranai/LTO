var App = function () {

    function init() {
        initDatatables();
        initPlugins();
    }
    function initDatatables () {

        var iDisplayLength = 100;
        /* Table initialisation */
        $('#children_list').dataTable( {
            "bLengthChange":true,
            "iDisplayLength": iDisplayLength,
            "bPaginate": true,
            "sDom": "<'row-fluid span12'<'span6'f><'offset1 span5 by-right'p>r>t<'row-fluid'<'span8'><'span8'>>",
            "sPaginationType": "lto",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            },
            "bDestroy": true,
            "aoColumnDefs": [
            { "sTitle": "Program Partner", "aTargets": [ "program" ] }
            ]
        });

        $('#user_list, #university_list, #program_list, #classroom_list, #user_attendance_list').dataTable( {
            "bLengthChange":true,
            "iDisplayLength": iDisplayLength,
            "bPaginate": true,
            "sDom": "<'row-fluid span12'<'span6'f><'offset1 span5 by-right'p>r>t<'row-fluid'<'span8'><'span8'>>",
            "sPaginationType": "lto",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            }
        });

        $('#classroom_list').dataTable( {
            "bLengthChange":true,
            "iDisplayLength": iDisplayLength,
            "bPaginate": true,
            "sDom": "<'row-fluid span12'<'span6'f><'offset1 span5 by-right'p>r>t<'row-fluid'<'span8'><'span8'>>",
            "sPaginationType": "lto",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            },
            "bDestroy": true,
            "aoColumnDefs": [
            { "sTitle": "Program Partner", "aTargets": [ 1 ] }
            ]
        });

    }
    function initPlugins () {
      $('#updateUserAttendanceModal').modal();
    }
    function bindEvents() {
        $('.header').on('click', function () {
            document.location.href ="/";
        });
    }


    return {
        init: init
    }
}();