@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/post/list.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/post/list.js') }}"></script>
@endsection

@section('content')
<div class="postlist-container">
    <div class="post">
        <div class="clearfix">
            <div class="img-container">
                <img src="{{ asset('img/img_profile_skeleton.png') }}" class="postprofile-ico span-1-of-8" alt="Profile">
            </div>
            <div class="post-blog">
                <p class="post-username">Username</p>             
                <h2 class="post-title">Title</h2>
                <p class="post-date">November 1st</p>
                <span class="post-category">#JavaScript</span>
                <span class="post-category">#Laravel</span>
            </div> 
        </div>
        <div class="postbtn-container">
            <button class="post-btn" onclick="togglePostLike(this)"><i class="fa fa-thumbs-up"></i> Like</button>
            <a href="#" class="post-btn"><i class="far fa-comment-alt"></i> Feedback</a>
        </div>
    </div>
    <div class="post">
        <div class="clearfix">
            <div class="img-container">
                <img src="{{ asset('img/img_profile_skeleton.png') }}" class="postprofile-ico span-1-of-8" alt="Profile">
            </div>
            <div class="post-blog">
                <p class="post-username">Username</p>             
                <h2 class="post-title">Title</h2>
                <p class="post-date">November 1st</p>
                <span class="post-category">#JavaScript</span>
                <span class="post-category">#Laravel</span>
            </div> 
        </div>
        <div class="postbtn-container">
            <button class="post-btn" onclick="togglePostLike(this)"><i class="fa fa-thumbs-up"></i> Like</button>
            <a href="#" class="post-btn"><i class="far fa-comment-alt"></i> Feedback</a>
        </div>
    </div>
    <div class="post">
        <div class="clearfix">
            <div class="img-container">
                <img src="{{ asset('img/img_profile_skeleton.png') }}" class="postprofile-ico span-1-of-8" alt="Profile">
            </div>
            <div class="post-blog">
                <p class="post-username">Username</p>             
                <h2 class="post-title">Title</h2>
                <p class="post-date">November 1st</p>
                <span class="post-category">#JavaScript</span>
                <span class="post-category">#Laravel</span>
            </div> 
        </div>
        <div class="postbtn-container">
            <button class="post-btn" onclick="togglePostLike(this)"><i class="fa fa-thumbs-up"></i> Like</button>
            <a href="#" class="post-btn"><i class="far fa-comment-alt"></i> Feedback</a>
        </div>
    </div>
    <div class="post">
        <div class="clearfix">
            <div class="img-container">
                <img src="{{ asset('img/img_profile_skeleton.png') }}" class="postprofile-ico span-1-of-8" alt="Profile">
            </div>
            <div class="post-blog">
                <p class="post-username">Username</p>             
                <h2 class="post-title">Title</h2>
                <p class="post-date">November 1st</p>
                <span class="post-category">#JavaScript</span>
                <span class="post-category">#Laravel</span>
            </div> 
        </div>
        <div class="postbtn-container">
            <button class="post-btn" onclick="togglePostLike(this)"><i class="fa fa-thumbs-up"></i> Like</button>
            <a href="#" class="post-btn"><i class="far fa-comment-alt"></i> Feedback</a>
        </div>
    </div>
    <div class="post">
        <div class="clearfix">
            <div class="img-container">
                <img src="{{ asset('img/img_profile_skeleton.png') }}" class="postprofile-ico span-1-of-8" alt="Profile">
            </div>
            <div class="post-blog">
                <p class="post-username">Username</p>             
                <h2 class="post-title">Title</h2>
                <p class="post-date">November 1st</p>
                <span class="post-category">#JavaScript</span>
                <span class="post-category">#Laravel</span>
            </div> 
        </div>
        <div class="postbtn-container">
            <button class="post-btn" onclick="togglePostLike(this)"><i class="fa fa-thumbs-up"></i> Like</button>
            <a href="#" class="post-btn"><i class="far fa-comment-alt"></i> Feedback</a>
        </div>
    </div>
    <div class="post">
        <div class="clearfix">
            <div class="img-container">
                <img src="{{ asset('img/img_profile_skeleton.png') }}" class="postprofile-ico span-1-of-8" alt="Profile">
            </div>
            <div class="post-blog">
                <p class="post-username">Username</p>             
                <h2 class="post-title">Title</h2>
                <p class="post-date">November 1st</p>
                <span class="post-category">#JavaScript</span>
                <span class="post-category">#Laravel</span>
            </div> 
        </div>
        <div class="postbtn-container">
            <button class="post-btn" onclick="togglePostLike(this)"><i class="fa fa-thumbs-up"></i> Like</button>
            <a href="#" class="post-btn"><i class="far fa-comment-alt"></i> Feedback</a>
        </div>
    </div>
</div>
<a href="#" class="post-create-btn"><i class="fas fa-pencil-alt"></i> Create</a>
@endsection