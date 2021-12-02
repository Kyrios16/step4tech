@extends('admin.Layouts.app')

@section('content')
@include('admin.common.aside')
<div class="main-container">
  <div class="main-content">
    <header>
      <div class="header-title-container">
        <div class="header-icon">
          <button id="menu-toggle"><span class="fas fa-bars"></span></button>
        </div>
        <div class="header-title">
          <h2>Analytics</h2>
        </div>
      </div>
    </header>
    <main>
      @include('admin.common.analytics')
      <div class="analytic-sec">
        @include('admin.common.chart')
        @foreach($mostPopularUser as $mostPopularUser)
        <div class="popular-user-card">
          <h3 class="user-card-ttl">
            Most Popular User
          </h3>
          <div class="text">
            <img src="{{ URL::to('/') }}/images/profile/{{ $mostPopularUser->profile_img }}" alt="User Profile">
            <h3>{{ $mostPopularUser->name }}</h3>
            <p>{{ $mostPopularUser->position }}</p>
            <div class="card-info">
              <h5 class="info-title">{{ $mostPopularUser->title }}</h5>
              <div class="analytic-card">
                <div class="popular-icon">
                  <i class="fas fa-gem"></i>
                </div>
                <div class="analytic-info">
                  <small>Total Likes</small>
                  <h2>{{ $mostPopularUser->totalLike }}</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="links">
            <a target="_blank" href="{{ $mostPopularUser->github }}"><i class="fab fa-linkedin-in"></i></a>
            <a target="_blank" href="{{ $mostPopularUser->linkedin }}"><i class="fab fa-github"></i></a>
          </div>
        </div>
        @endforeach
      </div>
    </main>
  </div>
</div>
@endsection