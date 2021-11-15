$(document).ready(function () {
    $(".menuBtn").click(function () {
        // If the clicked element has the active class, remove the active class from EVERY .menuBtn>.state element
        if ($(this).hasClass("active")) {
            $(".menuBtn").removeClass("active");
        }
        // Else, the element doesn't have the active class, so we remove it from every element before applying it to the element that was clicked
        else {
            $(".menuBtn").removeClass("active");
            $(this).addClass("active");
        }
    });
});
