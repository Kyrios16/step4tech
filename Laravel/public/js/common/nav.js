/**
 * Click Profile Icon to open Profile Dropdown
 */
$(document).on("click",".profile-ico", toggleNavProfileDropdown);

/**
 * Toggle Profile Dropdown
 */
function toggleNavProfileDropdown() {
    if ($(".profile-dropdown-content").css("display") == "none") {
        $(".profile-ico").addClass("selected");
        $(".profile-dropdown-content").css("display", "block");
    } else {
        $(".profile-ico").removeClass("selected");
        $(".profile-dropdown-content").css("display", "none");
    }
}

/**
 * To close nav dropdown when user clicked outside of the element 
 *
 * @return void
 */
$(document).on("click", function (event) {
    var $trigger = $(".nav-dropdown");
    if ($trigger != event.target && !$trigger.has(event.target).length) {
        $(".profile-ico").removeClass("selected");
        $(".profile-dropdown-content").css("display", "none");
    }
});

/**
 * To send search posts view
 *
 * @return void
 */
$(document).ready(function () {
    $(".search").keydown(function (event) {
        // Enter has keyCode = 13
        if (event.keyCode == 13) {
            var searchValue = $(".search").val();
            window.location.href = "/post/search/" + searchValue;
        }
    });
});