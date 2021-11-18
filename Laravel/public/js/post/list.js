function togglePostLike(button, id) {
    if (loggedin) {
        var btnTextArray = $(button).html().split(" ");
        var likeCount = parseInt(btnTextArray[3]);
        if ($(button).hasClass("post-liked")) {
            var data = {
                postId: id,
                userId: userId,
            };
            $.ajax({
                url: "/api/post/unlike",
                type: "POST",
                data: data,
                success: function (res) {
                    //
                },
            });            
            --likeCount;
            if (isNaN(likeCount)) {
                likeCount = 0;
            }
            $(button).removeClass("post-liked");
            $(button).html("<i class='far fa-thumbs-up'></i> " + likeCount + " Likes");
        } else {
            var data = {
                postId: id,
                userId: userId,
            };
            $.ajax({
                url: "/api/post/like",
                type: "POST",
                data: data,
                success: function (res) {
                    //
                },
            });
            if (isNaN(likeCount)) {
                likeCount = 0;
            }
            ++likeCount;
            $(button).addClass("post-liked");            
            $(button).html("<i class='fa fa-thumbs-up'></i> " + likeCount + " Likes");
        }
    }
    //If user is not in log in state
    else {
    }
}
