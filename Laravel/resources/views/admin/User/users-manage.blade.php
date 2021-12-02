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
          <h2>User Management</h2>
        </div>
      </div>
    </header>
    <main>
      @include('admin.common.analytics')
      <div class="table-container clearfix">
        <div class="table-header">
          <h3 class="header-title">Users Lists</h3>
        </div>
        <div class="users-list">
          @foreach ($users as $user)
          <div class="user-profile">
            <div class="user-info">
              <img src="{{ URL::to('/') }}/images/profile/{{ $user->profile_img }}" alt="">
              <div class="user-detail">
                <h4 class="username">{{ $user->name }}</h4>
                <p class="user-contact">{{ $user->email }} | {{ $user->ph_no }}</p>
                <p class="user-position">Position:&nbsp;{{ $user->position }}</p>
                <p class="dob">DOB:&nbsp;{{ $user->date_of_birth }}</p>
                <div class="links">
                  <a target="_blank" href="{{ $user->linkedin }}"><i class="fab fa-linkedin"></i></a>
                  <a target="_blank" href="{{ $user->github }}"><i class="fab fa-github"></i></a>
                </div>
              </div>
            </div>
            <div class="action">
              <a href="{{ route('user-view', $user->id) }}" class="icon-btn-info"><i class="far fa-eye"></i></a> |
              <button type="submit" class="icon-btn-danger" onclick="deleteUser({{ $user->id }})"><i class="fas fa-trash-alt"></i></button>
            </div>
          </div>
          @endforeach
        </div>
        <a href="{{ route('export.users') }}" class="btn btn-info export-btn">Export&nbsp;&nbsp;<i class="fas fa-file-export"></i></a>
      </div>
    </main>
  </div>
</div>
@endsection