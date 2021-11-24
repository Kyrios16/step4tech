<div id="reply-container">

  @foreach($replies as $reply)
  <div class="feedback-container clearfix">
    <div class="upload-user clearfix feedback-upload-user">
      <a href="#" class="upload-user-info">
        <img class="profile-img" class="preview-img" src="{{ URL::to('/') }}/images/profile/{{ $feedback->profile_img }}" alt="user image">
        <p class="upload-user-name">{{$user->name}}</p>
      </a>
      <p class="feedback-time">{{$reply->time}}</p>
    </div>
    <div class="feedback-content">{{$reply->content}}</div>
    @if($reply->photo != NULL)
    <div class="feedback-img-container">
      <img class="feedback-img" class="feedback-img" src="{{ URL::to('/') }}/images/replies/{{ $reply->photo }}" alt=" reply image">
    </div>
    @endif

    @auth
    @endauth
  </div>
  @endforeach

  @auth
  <!-- {{ dd($post->id, $feedback->id) }} -->
  <form class="reply-box" method="POST" action="{{ route('create.reply', $post->id, $feedback->id) }}" enctype="multipart/form-data">
    @csrf
    <div class=" preview-image-container" id="feedback-preImg">
      <img id="preview-image-before-upload" class="preview-img" src="{{ asset('images/image_not_found.gif') }}" alt="preview image">
    </div>
    <textarea name="content" onkeyup="autoheight(this)" rows="1" class="input-feedback-content @error('content') is-invalid @enderror" placeholder="Enter Your Feedback..."></textarea>
    <label class="uploadLabel">
      <i class="fas fa-folder-plus"></i>
      <input type="file" class="uploadButton @error('photo') is-invalid @enderror" name="photo" id="image" placeholder="Upload Image" />
    </label>

    <button class="feedback-send">
      <i class="fas fa-paper-plane"></i>
    </button>
    @error('content')
    <span class="form-error">
      <div>{{ $message }}</div>
    </span>
    @enderror
    @error('photo')
    <span class="form-error">
      <div>{{ $message }}</div>
    </span>
    @enderror
  </form>
  @endauth
</div>