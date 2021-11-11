@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/post/list.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/post/list.js') }}"></script>
@endsection

@section('content')
<div class="postlist-container">
    @for ($i = 0; $i < 6; $i++)
    <div class="post">
        <div class="clearfix">
            <div class="img-container">
                <img src="{{ asset('img/img_profile_skeleton.png') }}" class="postprofile-ico span-1-of-8" alt="Profile">
            </div>
            <div class="post-blog">
                <p class="post-username">Username</p>
                <p class="post-date">Nov 1st 2020</p>             
                <h2 class="post-title">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi esse modi dicta aliquid eos, nulla veniam sit molestiae placeat atque.</h2>
                
                <span class="post-category">#JavaScript</span>
                <span class="post-category">#Laravel</span>
            </div> 
        </div>
        <div class="postbtn-container">
            <button class="post-btn" onclick="togglePostLike(this)"><i class="far fa-thumbs-up"></i> Like</button>
            <a href="#" class="post-btn"><i class="far fa-comment-alt"></i> Feedback</a>
        </div>
    </div>
    @endfor
</div>
<a href="/post/create" class="post-create-btn"><i class="fas fa-pencil-alt"></i> Create</a>
@endsection