@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/common/error404.css') }}">
@endsection

@section('script')
@endsection

@section('content')
<div class="message-container">
  <div class="error404-title-container">
    <h2>Error 404<br>Page is not Found !</h2>
  </div>
</div>
@endsection