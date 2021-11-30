<div class="edit-reply">
  <div class="form-group">
    <input type="text" name="reply_content" id="reply_content" value="{{ $data->reply_content }}" class="form-control" placeholder="Edit reply content">
  </div>
  <div class="form-group mt-2">
    <button class="btn btn-warning" onClick="update({{ $data->id }})">Update</button>
  </div>
</div>