$(document).ready(function () {
    showPersonalPostList();
});

//Intial
function showPersonalPostList() {
    var data = {
        userId: viewedUserId,
    };
    $.ajax({
        url: "/api/user/posts",
        type: "GET",
        data: data,
        dataType: "json",
        success: function (data) {
            //Add personal post list
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
                var optionBtnHtml = "";
                if (viewedUserId == userId) {
                    optionBtnHtml =
                        "<button class='option-btn' onclick='togglePersonalPostDropdown(this)'><i class='fas fa-caret-down'></i></button>" +
                        "<div class='personal-post-dropdown-content'>" +
                        "<a href='/post/edit/" +
                        post.id +
                        "'>Edit</a>" +
                        "<button onclick='openDeletePopup(" +
                        post.id +
                        ")'>Delete</button>" +
                        "</div>";
                }
                $(".user-postlist-wrapper").append(
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
                                ${optionBtnHtml}
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

function togglePersonalPostDropdown(button) {
    if (
        $(button)
            .parent(".post-blog")
            .children(".personal-post-dropdown-content")
            .css("display") == "none"
    ) {
        $(button)
            .parent(".post-blog")
            .children(".personal-post-dropdown-content")
            .css("display", "block");
    } else {
        $(button)
            .parent(".post-blog")
            .children(".personal-post-dropdown-content")
            .css("display", "none");
    }
}

//Close Personal Post Dropdown when click outside of the element
$(document).on("click", function (event) {
    var $trigger = $(".option-btn");
    if ($trigger != event.target && !$trigger.has(event.target).length) {
        $(".personal-post-dropdown-content").css("display", "none");
    }
});

function deletePost(id) {
    var data = {
        userId: userId,
    };
    $.ajax({
        url: "/api/post/delete/" + id,
        type: "DELETE",
        data: data,
        success: function (msg) {
            location.reload();
        },
    });
}

function openDeletePopup(id) {
    $(".deletepopup-container").css("display", "block");
    $(".deletepopup-body").html("<p>Are you sure you want to delete this Post?</p>"+
                                "<div class='clearfix'>"+
                                "<button class='delete-yes-btn' onclick='deletePost("+ id + ")'>Yes</button>"+
                                "<button class='delete-no-btn' onclick='closeDeletePopup()'>No</button></div>");
}

function closeDeletePopup() {
    $(".deletepopup-container").css("display", "none");
}
