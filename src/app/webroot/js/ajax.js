function doPost(url, parameters, successCallback, errorCallback, options) {
    if (options == null) {
        options = {};
    }

    if (options.dataType == null){
        options.dataType = 'html';
    }
    options.type = 'POST';

    doAjax(url, parameters, successCallback, errorCallback, options);
}

function doGet(url, parameters, successCallback, errorCallback, options) {
    if (options == null) {
        options = {};
    }

    if (options.dataType == null){
        options.dataType = 'html';
    }
    options.type = 'GET';

    doAjax(url, parameters, successCallback, errorCallback, options);
}

function doJSONGet(url, parameters, successCallback, errorCallback, options) {
    if (options == null) {
        options = {};
    }

    if (options.dataType == null){
        options.dataType = 'json';
    }
    options.type = 'GET';
    options.contentType = 'json';

    doAjax(url, parameters, successCallback, errorCallback, options);
}

function doJSONPost(url, parameters, successCallback, errorCallback, options) {
    if (options == null) {
        options = {};
    }

    if (options.dataType == null){
        options.dataType = 'json';
    }
    options.type = 'POST';
    options.contentType = 'json';

    doAjax(url, parameters, successCallback, errorCallback, options);
}


function doAjax(url, parameters, successCallback, errorCallback, options) {
    /* http://api.jquery.com/jQuery.ajax/ */
    if (options == null) {
        options = {};
    }

    jQuery.ajax({
                type: (options.type == null) ? 'GET' : options.type,
                url: url,
                data: parameters,
                dataType: (options.dataType == null) ? 'html' : options.dataType,
                contentType: (options.contentType == 'json') ? "application/json" : $.ajax().contentType,
                success: function(data, status, xmlHttpRequest) {
                    if (successCallback != null) {
                        successCallback(data, status, XMLHttpRequest);
                    }
                },
                error: function(xmlHttpRequest, errorCode, exception) {
                    alert(errorCode + ' ' + exception);
                    $("#error_dialog").html(errorCode + ' ' + exception);
                    $("#error_dialog").dialog({modal: true});
                    if (errorCallback != null) {
                        errorCallback(xmlHttpRequest, errorCode, exception);
                    }
                }
            });
}