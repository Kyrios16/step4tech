@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/post/list.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/post/list.js') }}"></script>
<script src="{{ asset('js/post/trash.js') }}"></script>
@endsection

@section('content')
<div class="postlist-container">
</div>
@endsection