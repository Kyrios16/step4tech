@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/post/list.css') }}">
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
@endsection