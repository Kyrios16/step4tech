//To show number of total posts
$.ajax({
    url: "/api/admin/totalpost/",
    type: "GET",
    dataType: "json",
    success: function (data) {
        $("#total-posts").append(data);
    },
});

//To show number of total users
$.ajax({
    url: "/api/admin/totaluser/",
    type: "GET",
    dataType: "json",
    success: function (data) {
        $("#total-users").append(data);
    },
});
