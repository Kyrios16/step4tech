$(document).ready(function () {
    $(".menuBtn").click(function () {
        // If the clicked element has the active class, remove the active class from EVERY .menuBtn>.state element
        if ($(this).hasClass("active")) {
            $(".menuBtn").removeClass("active");
        }
        // Else, the element doesn't have the active class, so we remove it from every element before applying it to the element that was clicked
        else {
            $(".menuBtn").removeClass("active");
            $(this).addClass("active");
        }
    });
});

/**
 * To show alert box when delete post by id in dashboard
 * 
 * @param int post id
 * @return void
 */
function deletePost(id) {
    swal({
        title: "Are you sure want to delete?",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: `/api/admin/post/delete/${id}`,
                type: "DELETE",
                success: function (result) {
                    location.reload();
                },
                error: function (result) {
                    alert("Post Deleted Fail");
                },
            });
        } else {
          swal("Your post is safe!");
        }
      });
}

/**
 * To show alert box when delete user by id in dashboard
 * 
 * @param int user id
 * @return void
 */
 function deleteUser(id) {
    swal({
        title: "Are you sure want to delete?",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: `/api/admin/users/${id}`,
                type: "DELETE",
                success: function (result) {
                    location.reload();
                },
                error: function (result) {
                    alert("Post Deleted Fail");
                },
            });
        } else {
          swal("Your post is safe!");
        }
      });
}
