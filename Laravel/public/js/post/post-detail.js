function autoheight(x) {
    x.style.height = "5px";
    x.style.height = 15 + x.scrollHeight + "px";
}

/**
 * Toggle replies components
 *
 */
$(document).ready(function () {
    $(".reply-container").hide();
    $(".replyBtn").click(function () {
        var $toggle = $(this);
        var id = "#replycomment-" + $toggle.data("id");
        $(id).toggle();
    });
});
