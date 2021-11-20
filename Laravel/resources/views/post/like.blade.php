@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/post/list.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/post/like-btn.js') }}"></script>
<script src="{{ asset('js/post/like.js') }}"></script>
@endsection

@section('content')
<div class="postlist-container">
</div>
@endsection