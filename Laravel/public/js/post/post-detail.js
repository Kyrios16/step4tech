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

/**
 * To show alert box when delete feedback by id
 *
 * @param int feedback id
 * @return void
 */
function deleteFeedback(id) {
    console.log(id);
    swal({
        title: "Are you sure want to delete?",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: `/api/feedback/delete/${id}`,
                type: "DELETE",
                success: function (result) {
                    location.reload();
                },
                error: function (result) {
                    alert("Feedback Deleted Fail");
                },
            });
        } else {
            swal("Your feedback is safe!");
        }
    });
}
