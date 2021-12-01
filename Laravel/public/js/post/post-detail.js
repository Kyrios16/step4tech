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

/**
 * To show edit popup model
 *
 * @param int $id feedback id
 * @return void
 */
function showEditFeedbackModel(id) {
    $.get("/feedback/show/" + id, {}, function (data, status) {
        $("#exampleModalLabel").html("Edit Feedback");
        $("#page").html(data);
        $("#exampleModal").modal("show");
        $("#exampleModal").css("margin-top", 100);
    });
}
