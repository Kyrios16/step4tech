/**
 * Click Profile Icon to open Profile Dropdown
 */
$(document).on("click", ".profile-ico", toggleNavProfileDropdown);

/**
 * Toggle Profile Dropdown
 */
function toggleNavProfileDropdown() {
    var $window = $(window);
    if ($window.width() > 640) {
        if ($(".profile-dropdown-content").css("display") == "none") {
            $(".profile-ico").addClass("nav-selected");
            $(".profile-dropdown-content").css("display", "block");
        } else {
            $(".profile-ico").removeClass("nav-selected");
            $(".profile-dropdown-content").css("display", "none");
        }
    } else {
        var rightVal = 0;
        if ($(".profile-ico").hasClass("nav-selected")) {
            rightVal = -500;
            $(".profile-ico").removeClass("nav-selected");
        } else {
            $(".profile-ico").addClass("nav-selected");
        }
        $(".profile-dropdown-content").stop().animate(
            {
                right: rightVal,
            },
            1000
        );
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
        var $window = $(window);
        if ($window.width() > 640) {
            $(".profile-ico").removeClass("nav-selected");
            $(".profile-dropdown-content").css("display", "none");
        } else {
            $(".profile-ico").removeClass("nav-selected");
            $(".profile-dropdown-content").stop().animate(
                {
                    right: -500,
                },
                1000
            );
        }
    }
});

/**
 * To check nav dropdown style when window resize
 *
 * @return void
 */
$(window).on("resize", function () {
    var $window = $(window);
    if ($window.width() > 640) {
        if ($window.width() > 1040) {
            $(".profile-dropdown-content").css("right", "4.7%");
        } else {
            $(".profile-dropdown-content").css("right", "2%");
        }
        if ($(".profile-ico").hasClass("nav-selected")) {
            $(".profile-dropdown-content").css("display", "block");
        } else {
            $(".profile-dropdown-content").css("display", "none");
        }
    } else {
        $(".profile-dropdown-content").css("display", "block");
        if ($(".profile-ico").hasClass("nav-selected")) {
            $(".profile-dropdown-content").css("right", "0px");
        } else {
            $(".profile-dropdown-content").css("right", "-500px");
        }
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

/**
 * Navigation Menu for SP View
 *
 * @return void
 */
$(function () {
    $(".nav-menu-btn").on("click", function () {
        var leftVal = 0;
        if ($(this).hasClass("menu-active")) {
            leftVal = -500;
            $(this).removeClass("menu-active");
        } else {
            $(this).addClass("menu-active");
        }
        $(".sidebar-container").stop().animate(
            {
                left: leftVal,
            },
            1200
        );
    });
});

/**
 * To close Navigation Menu when user clicked outside of the element
 *
 * @return void
 */
$(document).on("click", function (event) {
    var $trigger = $(".sidebar-container");
    if (
        $trigger != event.target &&
        !$trigger.has(event.target).length &&
        $(".sidebar-container").css("left") == "0px"
    ) {
        $(".nav-menu-btn").removeClass("menu-active");
        $(".sidebar-container").stop().animate(
            {
                left: -500,
            },
            1200
        );
    }
});