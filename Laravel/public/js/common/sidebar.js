/**
 * Toggle categories container
 *
 * @return void
 */
function categories() {
    document.getElementById("categories-container").classList.toggle("show");
    // document.getElementById("categories-btn").classList.toggle("active");
}

/**
 * To send search posts view
 *
 * @return void
 */
 $(document).ready(function () {
    $(".sidebar-search").keydown(function (event) {
        // Enter has keyCode = 13
        if (event.keyCode == 13) {
            var searchValue = $(".sidebar-search").val();
            window.location.href = "/post/search/" + searchValue;
        }
    });
});