$(document).ready(function () {
    searchPost();
});

function searchPost() {
    var searchValue = window.location.pathname.split("/")[3];
    $.ajax({
        url: "/api/post/search/" + searchValue,
        type: "GET",
        dataType: "json",
        success: function (data) {
            //Add post list ordered by date
            if (data.length != 0) {
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
                            '<span class="post-category">#' +
                            categoryName +
                            "</span>";
                    });
                    var getUrl = window.location;
                    var baseUrl = getUrl .protocol + '//' + getUrl.host + '/images/';
                    console.log(getUrl);
                    $(".postlist-container").append(
                        `<div class="post">
                            <div class="clearfix">
                                <div class="img-container">
                                    <img src="${baseUrl + post.profile_img}" class="postprofile-ico span-1-of-8" alt="Profile">
                                </div>
                                <div class="post-blog">
                                    <p class="post-username">${post.name}</p>
                                    <p class="post-date">${created_at}</p>             
                                    <h2 class="post-title">${post.title}</h2>
                                    ${categoriesHtml}
                                </div> 
                            </div>
                            <div class="postbtn-container">
                                <button class="post-btn" onclick="togglePostLike(this)"><i class="far fa-thumbs-up"></i> Like</button>
                                <a href="#" class="post-btn"><i class="far fa-comment-alt"></i> Feedback</a>
                            </div>
                        </div>`
                    );
                });
            } else {
                $(".postlist-container").append(`
                    <div class="search-error-container">
                        <h2>Search data cannot be found !</h2>
                    </div>
                `);
            }
        },
    });
}
