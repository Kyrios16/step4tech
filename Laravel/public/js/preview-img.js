function preview_cover(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('cover_preview');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function preview_profile(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('profile_preview');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}