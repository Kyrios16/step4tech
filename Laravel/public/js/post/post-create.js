// multiple-select button
$(document).ready(function () {
    $("select").selectpicker();
});

$(document).ready(function (e) {
    $("#image").change(function () {
        let reader = new FileReader();

        reader.onload = (e) => {
            $("#preview-image-before-upload").attr("src", e.target.result);
            $("#feedback-preImg").css({
                display: "block",
            });
        };

        reader.readAsDataURL(this.files[0]);
    });
});
