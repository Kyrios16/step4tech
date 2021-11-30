@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/post/list.css') }}">
<link rel="stylesheet" href="{{ asset('css/common/likepopup.css') }}">
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
      <div class="setting">
        <a href="{{ route('edit-user') }}">
          <i class="fas fa-cog"></i>
        </a>
      </div>
      @endif
      @endauth
      <div class="name-bio">
        <h1 class="name">{{ $viewUser->name }}</h1>
        @if( $viewUser->bio == null)
        <p class="bio">404 Bio Not Found</p>
        @else <p class="bio">{{ $viewUser->bio }}</p>
        @endif
        <p class="dob"><i class="fas fa-birthday-cake"></i> {{ $viewUser->dob }}</p>
      </div>
      <div class="profile-data">
        <p><i class="fas fa-briefcase"></i>{{$viewUser->position }}</p>
        <p><i class="fas fa-envelope"></i><a href="mailto:{{ $viewUser->email }}">{{$viewUser->email }}</a></p>
      </div>
      @if( $viewUser->linkedin || $viewUser->github || $viewUser->ph_no != null )
      <div class="media">
        @if( $viewUser->linkedin != null )
        <a href="{{ $viewUser->linkedin }}">
          <i class="fab fa-linkedin"></i>
        </a>
        @endif
        @if( $viewUser->github != null )
        <a href="{{ $viewUser->github }}">
          <i class="fab fa-github-square"></i>
        </a>
        @endif
        @if( $viewUser->ph_no != null )
        <a href="tel:{{ $viewUser->ph_no }}">
          <i class="fas fa-phone-square-alt"></i>
        </a>
        @endif
      </div>
      @endif
    </div>
  </div>
  <div class="user-postlist-wrapper">
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
<div class="deletepopup-container">
  <div class="deletepopup-content">
    <div class="deletepopup-header">
      <h2>Delete Warning</h2>
    </div>
    <div class="deletepopup-body">
    </div>
  </div>
</div>
@endsection