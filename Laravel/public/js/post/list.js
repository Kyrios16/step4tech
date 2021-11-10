function togglePostLike(button) {
    if($(button).hasClass("post-liked")) {
        $(button).removeClass("post-liked");
    }
    else {
        $(button).addClass("post-liked");
    }
}