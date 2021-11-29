<div class="edit-reply">
  <div class="form-group">
    <input type="text" name="content" id="content" value="{{ $data->content }}" class="form-control" placeholder="Edit reply content">
  </div>
  <div class="form-group mt-2">
    <button class="btn btn-warning" onClick="update({{ $data->id }})">Update</button>
  </div>
</div>