$(document).ready(function () {
    showDeletedPostList();
});

//Intial
function showDeletedPostList() {
    var data = {
        userId: userId,
    };
    $.ajax({
        url: "/api/post/trash",
        type: "GET",
        data: data,
        dataType: "json",
        success: function (data) {
            if (data.length != 0) {
                //Add deleted post list
                data.forEach((post) => {
                    var created_at = moment(
                        post.created_at,
                        "YYYY-MM-DD HH:mm:ss"
                    ).format("MMM Do, YYYY");
                    var categories = post.post_categories;
                    var categoriesArray = categories.split(",");
                    var categoriesHtml = "<div>";
                    categoriesArray.forEach((categoryName) => {
                        categoriesHtml +=
                            "<a class='post-category' href='/post/search/" +
                            categoryName +
                            "'>#" +
                            categoryName +
                            "</a>";
                    });
                    categoriesHtml += "</div>";
                    var getUrl = window.location;
                    var baseUrl =
                        getUrl.protocol +
                        "//" +
                        getUrl.host +
                        "/images/profile/";
                    var likeCount = 0;
                    var islikedClass = "";
                    var thumbFillClass = "far";
                    if (post.post_voted_userid != null) {
                        var likedUserIdArray =
                            post.post_voted_userid.split(",");
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
                                    <a href="/user/view/${post.userId}" class="post-username">${
                                            post.name
                                        }</a>
                                    <button class="recover-btn" onclick="toggleRecoverPostDropdown(this)"><i class="fas fa-caret-down"></i></button>
                                    <div class="recover-post-dropdown-content">     
                                        <button onclick="recoverPost(${
                                            post.id
                                        })">Recover</button>
                                    </div>
                                    <p class="post-date">${created_at}</p>             
                                    <p class="post-title">${post.title}</p>
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
            } else {
                $(".postlist-container").append(`
                    <div class="no-list-container">
                        <h2>Your deleted posts will appear here !</h2>
                    </div>
                `);
            }
        },
    });
}

function toggleRecoverPostDropdown(button) {
    if (
        $(button)
            .parent(".post-blog")
            .children(".recover-post-dropdown-content")
            .css("display") == "none"
    ) {
        $(button)
            .parent(".post-blog")
            .children(".recover-post-dropdown-content")
            .css("display", "block");
    } else {
        $(button)
            .parent(".post-blog")
            .children(".recover-post-dropdown-content")
            .css("display", "none");
    }
}

//Close Personal Post Dropdown when click outside of the element
$(document).on("click", function (event) {
    var $trigger = $(".recover-btn");
    if ($trigger != event.target && !$trigger.has(event.target).length) {
        $(".recover-post-dropdown-content").css("display", "none");
    }
});

function recoverPost(id) {
    $.ajax({
        url: "/api/post/recover/" + id,
        type: "POST",
        success: function (msg) {
            location.reload();
        },
    });
}
