<div class="edit-feedback">
  <form action="{{ route('feedback.update', $data->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <div class=" preview-image-container" id="reply-Img">
        <img id="preview-img" class="preview-img" src="{{ asset('images/image_not_found.gif') }}" alt="preview image">
      </div>
      <label class="uploadLabel">
        <i class="fas fa-folder-plus"></i>
        <input type="file" onchange="showPreview(this)" class="uploadButton" value="{{ $data->photo }}" name="photo" id="photo" placeholder="Upload Image" />
      </label>
      <input type="text" name="content" id="content" value="{{ $data->content }}" class="form-control" placeholder="Edit reply content">
    </div>
    <div class="form-group mt-2">
      <button class="btn btn-warning" type="submit">Update</button>
    </div>
  </form>
</div>