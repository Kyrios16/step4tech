<div class="edit-reply">
  <form action="{{ route('update.reply', $data->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <div class=" preview-image-container" id="reply-Img">
        <img id="preview-img" class="preview-img" src="{{ asset('images/image_not_found.gif') }}" alt="preview image">
      </div>
      <label class="uploadLabel">
        <i class="fas fa-folder-plus"></i>
        <input type="file" onchange="showPreview(this)" class="uploadButton" value="{{ $data->reply_photo }}" name="reply_photo" id="reply_photo" placeholder="Upload Image" />
      </label>
      <input type="text" name="reply_content" id="reply_content" value="{{ $data->reply_content }}" class="form-control" placeholder="Edit reply content">
    </div>
    <div class="form-group mt-2">
      <button class="btn btn-warning" type="submit">Update</button>
    </div>
  </form>
</div>