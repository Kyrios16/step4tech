function toggleNavProfileDropdown() {
    if ($(".profile-dropdown-content").css("display") == "none") {
        $(".profile-dropdown-content").css("display", "block");
    } else {
        $(".profile-dropdown-content").css("display", "none");
    }
}

//Close NavProfileDropdown when click outside of the element
$(document).on("click", function (event) {
    var $trigger = $(".nav-dropdown");
    if ($trigger != event.target && !$trigger.has(event.target).length) {
        $(".profile-dropdown-content").css("display", "none");
    }
});
