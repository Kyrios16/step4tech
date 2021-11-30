@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/post/post-detail.css') }}">
<link rel="stylesheet" href="{{ asset('css/common/likepopup.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/post/like-btn.js') }}"></script>
<script src="{{ asset('js/post/post-detail.js') }}"></script>
<script src="{{ asset('js/post/post-create.js') }}"></script>
<script src="{{ asset('js/post/replies-edit.js') }}"></script>
<script>
  /**
   * To show edit popup model
   *
   * @param int $id
   * @return void
   */
  function showEditFeedbackModel(id) {
    $.get("{{ url('feedback/show') }}/" + id, {}, function(data, status) {
      $("#exampleModalLabel").html("Edit Feedback");
      $("#page").html(data);
      $("#exampleModal").modal("show");
      $("#exampleModal").css("margin-top", 100);
    });
  }

  /**
   * To update feedback
   *
   * @param int $id
   * @return void
   */
  function updateFeedback(id) {
    let photo = $("#photo").val();
    let content = $("#content").val();
    let data = {
      photo: photo,
      content: content,
    };
    $.ajax({
      type: "get",
      url: "{{ url('feedback/update') }}/" + id,
      data: data,
      success: function(data) {
        location.reload();
      },
    });
  }
</script>
@endsection

@section('content')
<div class="detail-container">
    <div class="detail-body">
        <h2 class="detail-title">
            {{$post->title}}
        </h2>

        <div class="cate-container">
            @foreach ($postCategory as $category)

            <a href="/post/search/{{$category->name}}" class="category">#{{$category->name}}</a>

            @endforeach
        </div>
        <div class="upload-user postUpload-user clearfix">
            <a href="/user/view/{{$post->created_user_id}}" class="postupload-user-info">
                <img class="profile-img" class="preview-img" src="{{ URL::to('/') }}/images/profile/{{ $post->profile_img }}" alt="user image">
                <p class="upload-user-name">{{$post->name}}</p>
            </a>
            <div class="detail-time">
                {{$date}}
            </div>
        </div>
        <div class="detail-img-container">
            <img class="detail-img" class="preview-img" src="{{ URL::to('/') }}/images/posts/{{ $post->photo }}" alt="detail image">
        </div>
        <div class="content-container">
            <p class="content">
                {!!$post->content!!}
            </p>
        </div>
        <div class="postbtn-container">
            @php($flag=false)
            @auth
            @if(count($voteList) > 0)
            @foreach($voteList as $voteUserId)
            @if($voteUserId->user_id == $user->id)
            @php($flag=true)
            @endif
            @endforeach
            @endif
            @endauth
            @if($flag == true)
            <button class="post-btn post-liked" onclick="togglePostLike(this, {{$post->id}})"><i class="fa fa-thumbs-up"></i> {{count($voteList)}} Likes</button>
            @else
            <button class="post-btn" onclick="togglePostLike(this, {{$post->id}})"><i class="far fa-thumbs-up"></i> {{count($voteList)}} Likes</button>
            @endif
            <button class="post-btn" id="feedbackBtn" onclick="showMsg()"><i class="far fa-comment-alt"></i> {{count($feedbackList)}} Feedbacks</button>
        </div>
    </div>
    <div class="detail-body">
        <h2 class="feedback-header">Feedbacks</h2>
        @auth
        <form class="feedback-txtfield" method="POST" action="{{ route('feedback.post',$post->id) }}" enctype="multipart/form-data">
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
        @foreach($feedbackList as $feedback)
        <div class="wrapper">
            @auth
            @if(Auth::user()->id == $post->created_user_id)

            <a class="greenmark" href="/feedback/greenmark/{{$feedback->id}}">
                @if($feedback->green_mark == true)
                <i class="far fa-check-square green"></i>
                @else
                <i class="far fa-square grey"></i>
                @endif
            </a>

            @else

            <a class="greenmark">
                @if($feedback->green_mark == true)
                <i class="far fa-check-square green"></i>
                @endif
            </a>
            
            @endif
            @else

            <a class="greenmark">
                @if($feedback->green_mark == true)
                <i class="far fa-check-square green"></i>
                @endif
            </a>
            @endauth

            <div class="feedback-container clearfix">
                <div class="upload-user clearfix feedback-upload-user">
                    <a href="/user/view/{{ $feedback->created_user_id }}" class="upload-user-info">
                        <img class="profile-img" class="preview-img" src="{{ URL::to('/') }}/images/profile/{{ $feedback->profile_img }}" alt="user image">
                        <p class="upload-user-name">{{$feedback->name}}</p>
                    </a> 
                    <p class="feedback-time">{{$feedback->time}}</p>
                </div>
                <div class="feedback-content">{{$feedback->content}}</div>
                @if($feedback->photo != NULL)
                <div class="feedback-img-container">
                    <img class="feedback-img" class="feedback-img" src="{{ URL::to('/') }}/images/feedbacks/{{ $feedback->photo }}" alt=" feedback image">
                </div>
                @endif

                @auth
                @if(Auth::user()->id == $feedback->created_user_id)
                <div class="action">
                  <button class="icon-btn-warning" onClick="showEditFeedbackModel({{ $feedback->id }})"><i class="fas fa-edit"></i></button>
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                          <div id="page" class="edit-feedback"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a class="delete-icn" href="{!! route('feedback.delete', ['id'=>$feedback->id,]) !!}"><i class="fas fa-trash-alt"></i></a>
                </div>
                @endif
                @endauth
                <button class="replyBtn" data-id="{{ $feedback->id }}">
                    <i class="fas fa-reply-all"></i>&nbsp;<span class="replyBtn-txt">Replies</span>
                </button>
            </div>
        </div>
        @include('post.replies')
        @endforeach
      
</div>
<div class="likepopup-container">
    <div class="likepopup-content">
        <div class="likepopup-header">
            <button class="close" onclick="closeLikePopup()">&times;</button>
            <h2>Process Failed !</h2>
        </div>
        <div class="likepopup-body">
            <p>Please log in to continue ...</p>
            <a href="/login" class="login-btn btn-success">Login</a>
        </div>
    </div>
</div>
@endsection