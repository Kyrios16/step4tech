$(document).ajaxStart(function () {
    $(".loading-panel").show();
});

$(document).ajaxStop(function () {
    $(".loading-panel").animate({ opacity: 0.0 }, 500, function () { $(".loading-panel").css("visibility", "hidden"); });
    // $(".loading-panel").css("display","none");
});
