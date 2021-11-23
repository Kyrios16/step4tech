$(document).ready(function () {
    // show categories list
    $.ajax({
        url: "/api/admin/categories/list",
        type: "GET",
        dataType: "json",
        success: function (res) {
            res.forEach((categories) => {
                var created_at = moment(
                    categories.created_at,
                    "YYYY-MM-DD HH:mm:ss"
                ).format("DD-MM-YYYY");
                var updated_at = moment(
                    categories.updated_at,
                    "YYYY-MM-DD HH:mm:ss"
                ).format("DD-MM-YYYY");
                $("tbody").append(
                    `<tr>
                        <td>${categories.id}</td>
                        <td>${categories.name}</td>
                        <td>${categories.created_user_id}</td>
                        <td>${categories.updated_user_id}</td>
                        <td>${created_at}</td>
                        <td>${updated_at}</td>
                        <td>
                            <button class="icon-btn-warning" onClick="editCategory(${categories.id})"><i class="fas fa-edit"></i></button> |
                            <button class="icon-btn-danger" onClick="destroy(${categories.id})"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`
                );
            });
        },
    });
});

// To delete category
function destroy(id) {
    swal({
        title: "Are you sure want to delete?",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: `/api/admin/categories/${id}`,
                type: "DELETE",
                success: function (result) {
                    location.reload();
                },
                error: function (result) {
                    alert("Category Deleted Fail");
                },
            });
        } else {
            swal("Your category is safe!");
        }
    });
}

// To show edit form popup box
function editCategory(id) {
    document.getElementById("popup-1").classList.add("active");
    $.ajax({
        url: "/api/admin/categories/edit/" + id,
        type: "GET",
        dataType: "json", // added data type
        success: function (res) {
            $("#id").val(res.id);
            $("#name").val(res.name);
        },
    });
}

// To update category
function updateCategory() {
    var id = $("#id").val();
    var name = $("#name").val();

    console.log(id);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "post",
        url: "/api/admin/categories/update/" + id,
        data: {
            id: id,
            name: name,
        },
        dataType: "json",
        success: function (data) {
            window.location.replace("/admin/categories");
        },
    });
}

function closeBox() {
    document.getElementById("popup-1").classList.remove("active");
}
