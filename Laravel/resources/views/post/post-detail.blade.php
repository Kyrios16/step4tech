@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/post/post-detail.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/post/list.js') }}"></script>
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
            <a href="#" class="upload-user-info">
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
            <button class="post-btn" onclick="togglePostLike(this)"><i class="far fa-thumbs-up"></i> Like</button>
            <a href="/post/detail/${post.id}" class="post-btn"><i class="far fa-comment-alt"></i> {{count($feedbackList)}} Feedbacks</a>
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
            @error('content')
            <span class="form-error">
                <div>{{ $message }}</div>
            </span>
            @enderror
            <label class="uploadLabel">
                <i class="fas fa-folder-plus"></i>

                <input type="file" class="uploadButton @error('photo') is-invalid @enderror" name="photo" id="image" placeholder="Upload Image" />
            </label>
            @error('photo')
            <span class="form-error">
                <div>{{ $message }}</div>
            </span>
            @enderror
            <button class="feedback-send">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
        @endauth
        @foreach($feedbackList as $feedback)
        <div class="feedback-container">
            <div class="upload-user clearfix feedback-upload-user">
                <a href="#" class="upload-user-info">
                    <img class="profile-img" class="preview-img" src="{{ URL::to('/') }}/images/profile/{{ $feedback->profile_img }}" alt="user image">
                    <p class="upload-user-name">{{$feedback->name}}</p>
                </a>
                <p class="feedback-time">{{$feedback->time}}</p>
            </div>
            <p class="feedback-content">{{$feedback->content}}</p>
            @if($feedback->photo != NULL)
            <div class="feedback-img-container">
                <img class="feedback-img" class="feedback-img" src="{{ URL::to('/') }}/images/feedbacks/{{ $feedback->photo }}" alt=" feedback image">

            </div>

            @endif


        </div>

        @endforeach
    </div>
</div>
@endsection