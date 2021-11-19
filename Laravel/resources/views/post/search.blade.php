@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/post/list.css') }}">
<link rel="stylesheet" href="{{ asset('css/common/likepopup.css') }}">
<link rel="stylesheet" href="{{ asset('css/common/search.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/post/like-btn.js') }}"></script>
<script src="{{ asset('js/common/search.js') }}"></script>
@endsection

@section('content')
<div class="postlist-container">
  <div class="search-title-container">
    <h2>Search results for "<span>{{$searchValue}}</span>"</h2>
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