@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/post/post-detail.css') }}">
<link rel="stylesheet" href="{{ asset('css/common/likepopup.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/post/like-btn.js') }}"></script>
<script src="{{ asset('js/post/post-detail.js') }}"></script>
<script src="{{ asset('js/post/post-create.js') }}"></script>

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
      <a href="#" class="postupload-user-info">
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
        {{$post->content}}
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
      <button class="post-btn post-liked" onclick="togglePostLike(this, {{ $post->id }})"><i class="fa fa-thumbs-up"></i> {{count($voteList)}} Likes</button>
      @else
      <button class="post-btn" onclick="togglePostLike(this, {{$post->id}})"><i class="far fa-thumbs-up"></i> {{count($voteList)}} Likes</button>
      @endif
      <a class="post-btn"><i class="far fa-comment-alt"></i> {{count($feedbackList)}} Feedbacks</a>
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
    <div class="feedback-container clearfix">
      <div class="upload-user clearfix feedback-upload-user">
        <a href="#" class="upload-user-info">
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
      <a class="delete-icn" href="{!! route('feedback.delete', ['id'=>$feedback->id,]) !!}"><i class="fas fa-trash-alt"></i></a>
      @endif
      @endauth
    </div>

    @endforeach
  </div>
</div>
<div class="likepopup-container">
  <div class="likepopup-content">
    <div class="likepopup-header">
      <button class="close" onclick="closeLikePopup()">&times;</button>
      <h2>Like Failed !</h2>
    </div>
    <div class="likepopup-body">
      <p>Please log in to continue ...</p>
      <a href="/login" class="login-btn btn-success">Login</a>
    </div>
  </div>
</div>
@endsection