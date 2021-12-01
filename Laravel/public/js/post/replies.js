function showPreview(input, id) {
    id = id || "#preview-img";
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(id).attr("src", e.target.result).width(200).height(150);
        };
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
