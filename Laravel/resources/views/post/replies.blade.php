<div class="reply-container" id="replycomment-{{ $feedback->id }}">
  @foreach($replies as $reply)
  @if($reply->feedback_id == $feedback->id)
  <div class="feedback-container clearfix">
    <div class="upload-user clearfix feedback-upload-user">
      <a href="#" class="upload-user-info">
        <img class="profile-img" class="preview-img" src="{{ URL::to('/') }}/images/profile/{{ $reply->profile_img }}" alt="user image">
        <p class="upload-user-name">{{$reply->name}}</p>
      </a>
      <p class="feedback-time">{{$reply->time}}</p>
    </div>
    <div class="feedback-content">{{$reply->content}}</div>

    @if($reply->photo != NULL)
    <div class="feedback-img-container">
      <img class="feedback-img" class="feedback-img" src="{{ URL::to('/') }}/images/feedbacks/{{ $feedback->photo }}" alt=" feedback image">
    </div>

    @endif
    @auth
    @if(Auth::user()->id == $reply->created_user_id)
    <a class="delete-icn" href="{{ route('delete.reply', $reply->replyId) }}"><i class="fas fa-trash-alt"></i></a>
    @endif
    @endauth
  </div>
  @endif
  @endforeach

  @auth
  <form class="feedback-txtfield" method="POST" action="/post/{{ $post->id }}/feedback/{{ $feedback->id }}/reply" enctype="multipart/form-data">
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