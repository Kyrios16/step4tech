function autoheight(x) {
    x.style.height = "5px";
    x.style.height = 15 + x.scrollHeight + "px";
}

$(document).ready(function () {
    $(".reply-container").hide();
    $(".replyBtn").click(function () {
        var $toggle = $(this);
        var id = "#replycomment-" + $toggle.data("id");
        $(id).toggle();
    });
});
