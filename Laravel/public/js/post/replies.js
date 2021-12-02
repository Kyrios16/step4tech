function showPreview(input, id) {
    console.log(typeof (id));
    idname = id.toString();
    console.log(typeof (idname));
    // var element = document.getElementsByClassName("preview-img");
    const element = document.querySelector('.reply-preview-img');
    console.log(element);
    element.id = idname;
    // console.log(element.classList.length);
    console.log(element);
    console.log(id);
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(".reply-preview-img").attr("src", e.target.result);
        };

        const element = document.querySelector('.reply-preview-img');
        console.log(element);
        $("#reply-Img").css({
            display: "block",
        });

        reader.readAsDataURL(input.files[0]);
    }
}

/**
 * To show edit popup model
 *
 * @param int $id
 * @return void
 */
function show(id) {
    $.get("/show/" + id, {}, function (data, status) {
        $("#exampleModalLabel").html("Edit Reply");
        $("#page").html(data);
        $("#exampleModal").modal("show");
        $("#exampleModal").css("margin-top", 100);
    });
}

/**
 * To show alert box when delete reply by id
 *
 * @param int reply id
 * @return void
 */
function deleteReply(id) {
    swal({
        title: "Are you sure want to delete?",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: `/api/reply/delete/${id}`,
                type: "DELETE",
                success: function (result) {
                    location.reload();
                },
                error: function (result) {
                    alert("Reply Deleted Fail");
                },
            });
        } else {
            swal("Your reply is safe!");
        }
    });
}
