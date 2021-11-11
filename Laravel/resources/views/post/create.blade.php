@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/post/post-create.css') }}">
@endsection

@section('script')
{{-- <script src="{{ asset('js/post/post-create.js') }}"></script> --}}
@endsection

@section('content')
<div class="postCreate-container">
    <div class="postCreate">
        <div class="user-info">
            <img src="{{ asset('img/img_profile_skeleton.png') }}" class="user-profile" alt="Profile">
            <a class="user-name">User Name</a>
        </div>
        <form class="create-form">
            <input type="text" id="title" name="title" placeholder="Post Title" class="title">
        </form>
    </div>
</div>
@endsection