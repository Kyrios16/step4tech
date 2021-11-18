//To show total number of posts
$.ajax({
    url: "/api/admin/totalpost/",
    type: "GET",
    dataType: "json",
    success: function (data) {
        $("#total-posts").append(data);
    },
});

//To show total number of users
$.ajax({
    url: "/api/admin/totaluser/",
    type: "GET",
    dataType: "json",
    success: function (data) {
        $("#total-users").append(data);
    },
});

//To show total number of likes
$.ajax({
    url: "/api/admin/totallike/",
    type: "GET",
    dataType: "json",
    success: function (data) {
        $("#total-likes").append(data[Object.keys(data)[0]]);
    },
});
