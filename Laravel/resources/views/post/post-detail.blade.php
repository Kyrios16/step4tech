@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/post/post-detail.css') }}">
@endsection

@section('script')
{{-- <script src="{{ asset('js/post/post-detail.js') }}"></script> --}}
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
        <div class="upload-user clearfix">
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
    </div>
    <div class="detail-body">
        <h2 class="feedback-header">Feedbacks</h2>
        @foreach($feedbackList as $feedback)
        <div class="upload-user clearfix feedback-upload-user">
            <a href="#" class="upload-user-info">
                <img class="profile-img" class="preview-img" src="{{ URL::to('/') }}/images/profile/{{ $feedback->profile_img }}" alt="user image">
                <p class="upload-user-name">{{$feedback->name}}</p>
            </a>
        </div>
        <p>{{$feedback->content}}</p>
        @endforeach
    </div>
</div>
@endsection