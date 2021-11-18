$(document).ready(function () {
    showLikedPostList();
});

//Intial
function showLikedPostList() {
    var data = {
        userId: userId,
    };
    $.ajax({
        url: "/api/post/like",
        type: "GET",
        data: data,
        dataType: "json",
        success: function (data) {
            //Add liked post list
            data.forEach((post) => {
                var created_at = moment(
                    post.created_at,
                    "YYYY-MM-DD HH:mm:ss"
                ).format("MMM Do, YYYY");
                var categories = post.post_categories;
                var categoriesArray = categories.split(",");
                var categoriesHtml = "";
                categoriesArray.forEach((categoryName) => {
                    categoriesHtml +=
                        '<a class="post-category" href="/post/search/' +
                        categoryName +
                        '">#' +
                        categoryName +
                        "</a>";
                });
                var getUrl = window.location;
                var baseUrl =
                    getUrl.protocol + "//" + getUrl.host + "/images/profile/";
                var likeCount = 0;
                var islikedClass = "";
                var thumbFillClass = "far";
                if (post.post_voted_userid != null) {
                    var likedUserIdArray = post.post_voted_userid.split(",");
                    likeCount = likedUserIdArray.length;
                    if (loggedin) {
                        likedUserIdArray.forEach((likedUserId) => {
                            if (likedUserId == userId) {
                                islikedClass = "post-liked";
                                thumbFillClass = "fa";
                            }
                        });
                    }
                }
                $(".postlist-container").append(
                    `<div class="post">
                        <div class="clearfix">
                            <div class="img-container">
                                <img src="${
                                    baseUrl + post.profile_img
                                }" class="postprofile-ico span-1-of-8" alt="Profile">
                            </div>
                            <div class="post-blog">
                                <a href="/user/view/${
                                    post.userId
                                }" class="post-username">${post.name}</a>
                                <p class="post-date">${created_at}</p>             
                                <a class="post-title" href="/post/detail/${
                                    post.id
                                }">${post.title}</a>
                                ${categoriesHtml}
                            </div> 
                        </div>
                        <div class="postbtn-container">
                            <button class="post-btn ${islikedClass}" onclick="togglePostLike(this, ${
                        post.id
                    })"><i class="${thumbFillClass} fa-thumbs-up"></i> ${likeCount} Likes</button>
                            <a href="/post/detail/${
                                post.id
                            }" class="post-btn"><i class="far fa-comment-alt"></i> ${
                        post.no_of_feedbacks
                    } Feedbacks</a>
                        </div>
                    </div>`
                );
            });
        },
    });
}