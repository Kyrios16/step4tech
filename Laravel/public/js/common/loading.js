/**
 * Show Loading Screen when Ajax Start
 *
 * @return void
 */
$(document).ajaxStart(function () {
    $(".loading-panel").show();
});

/**
 * Hide Loading Screen after Ajax Stop
 *
 * @return void
 */
$(document).ajaxStop(function () {
    $(".loading-panel").animate({ opacity: 0.0 }, 500, function () { $(".loading-panel").hide(); });
});

/**
 * Auto Hide Loading Screen
 *
 * @return void
 */
$(function() {
    setTimeout(function() {
        $(".loading-panel").animate({ opacity: 0.0 }, 500, function () { $(".loading-panel").hide(); });
    }, 600);
});
