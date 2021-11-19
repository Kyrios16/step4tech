@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/post/list.css') }}">
<link rel="stylesheet" href="{{ asset('css/user/user-view.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/post/like-btn.js') }}"></script>
<script>
  var viewedUserId = {{ $viewUser->id }};
</script>
<script src="{{ asset('js/user/user-view.js') }}"></script>
@endsection

@section('content')
<div class="container">
  <div class="user-view-wrapper">
    <div class="cover-img">
      <img src="{{ URL::to('/') }}/images/cover/{{ $viewUser->cover_img }}" class="cover" alt="COVER">
    </div>
    <div class="profile-info">
      <div class="profile-img">
        <img src="{{ URL::to('/') }}/images/profile/{{ $viewUser->profile_img }}" class="profile" alt="PROFILE">
      </div>
      @auth
      @if($viewUser->id == Auth::user()->id)
      <a href="{{ route('edit-user') }}" class="setting" align="right">
        <i class="fas fa-cog"></i>
      </a>
      @endif
      @endauth
      <div class="name-bio">
        <h1 class="name">{{ $viewUser->name }}</h1>
        <p class="bio">{{ $viewUser->bio }}</p>
        <p class="dob"><i class="fas fa-birthday-cake"></i> {{ $viewUser->date_of_birth }}</p>
      </div>
      <div class="profile-data">
        <div class="link-group clearfix">
          <p class="left">
            <i class="fab fa-linkedin"></i>
            <a href="{{ $viewUser->linkedin }}">{{ $viewUser->linkedin }}</a>
          </p>
          <p class="right">
            <i class="fab fa-github-square"></i>
            <a href="{{ $viewUser->github }}">{{ $viewUser->github }}</a>
          </p>
        </div>
        <div class="data-group clearfix">
          <p class="left"><i class="fas fa-briefcase"></i>{{$viewUser->position }}</p>
          <p class="right">
            <i class="fas fa-phone-square-alt"></i>
            <a href="tel:{{ $viewUser->ph_no }}"> {{ $viewUser->ph_no }}</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="user-postlist-wrapper">    
  </div>
</div>
@endsection