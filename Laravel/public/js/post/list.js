function togglePostLike(button) {
    if($(button).hasClass("post-liked")) {
        $(button).removeClass("post-liked");
        $(button).children('i').removeClass("fa");
        $(button).children('i').addClass("far");
    }
    else {
        $(button).addClass("post-liked");
        $(button).children('i').removeClass("far");
        $(button).children('i').addClass("fa");
    }
}