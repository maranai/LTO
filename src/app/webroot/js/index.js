var log = function(){
    if(typeof console !== 'undefined') console.log("Lto: " , Array.prototype.slice.call(arguments));
};

var dD = new Date();
var bust = dD.getDate()+""+dD.getMonth()+""+dD.getYear();

require.config({
    baseUrl: '/js',
    paths: {
        bootstrap: 'bootstrap/bootstrap.min'
    },
    shim: {
        'bootstrap':{deps: ['jquery']}
    },
    urlArgs: "bust=" +  bust
});


require(["jquery", "bootstrap",
    "order!/js/jquery-ui-1.8.17.custom.min.js",
    // "order!/js/jquery.ui.datepicker.js",
    "order!/js/jquery.placeholder.js",
    "order!/js/jquery.validate.js",
    "order!/js/jquery.masked.js",
    "order!/js/jquery-ui-timepicker-addon.js",
    "order!/js/jquery.dataTables.min.js",
    "order!/js/jquery.dataTables.lto.js",
    "order!/js/flexcroll.js",
    "order!/js/home.js",
    "order!/js/app.js"],

    function($, bootstrap) {


        App.init();

    });
