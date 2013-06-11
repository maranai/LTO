function goTo(url){
    window.location = url;
}

function doConfirm(message){
    return confirm(message);
}

/* This method is called from header.jsp for i18n */
function initDataTableAux(tableSelector, oLanguage) {
    var tableOptions = {
        "sPaginationType": "full_numbers",
        "bSort": true,
        "bSortable" : false
    };
    if (oLanguage != null) {
        tableOptions.oLanguage = oLanguage;
    }
    var table = $(tableSelector).dataTable(tableOptions);
}
