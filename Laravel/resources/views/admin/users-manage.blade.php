@extends('admin.Layouts.app')

@section('content')
<div class="container clearfix">
  <input type="checkbox" name="" id="menu-toggle">
  @include('admin.common.aside')
  <div class="main-container">
    <div class="main-content">
      <header>
        <div class="header-title-container">
          <label for="menu-toggle">
            <span class="fas fa-bars"></span>
          </label>
          <div class="header-title">
            <h2>User Management</h2>
          </div>
        </div>
        <!-- header-title-container -->
      </header>
      <main>
        @include('admin.common.analytics')
        <div class="table-container">
          <div class="table-header">
            <h3 class="header-title">Users Lists</h3>
          </div>
          <!-- table-header -->
          @foreach ($users as $user)
          <div class="users-list">
            <div class="user-profile">
              <div class="user-info">
                <img src="https://www.shareicon.net/data/512x512/2016/09/15/829452_user_512x512.png" alt="">
                <div class="user-detail">
                  <h4 class="username">{{ $user->name }}</h4>
                  <small class="user-position">{{ $user->position }}</small>
                  <p class="user-contact">{{ $user->email }} | {{ $user->ph_no }}</p>
                  <p class="dob">{{ $user->date_of_birth }}</p>
                  <div class="links">
                    <a target="_blank" href="https://codepen.io/l-e-e/"><i class="fab fa-codepen"></i></a>
                    <a target="_blank" href="https://github.com/Leena26"><i class="fab fa-github"></i></a>
                  </div>
                </div>
              </div>
              <div class="action">
                <a href="#" class="icon-btn-info"><i class="far fa-eye"></i></a> |
                <a href="#" class="icon-btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                <form action="{{ url('/admin/users/'.$user->id) }}" method="POST" class="deleteBtn">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="icon-btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>

              </div>
            </div>
          </div>
          @endforeach

          <a href="{{ route('export.categories') }}" class="btn btn-info">Export&nbsp;&nbsp;<i class="fas fa-file-export"></i></a>
        </div>
        <!-- table-container -->
      </main>
    </div>
    <!-- main-content -->
  </div>
  <!-- main-container -->
</div>
<!-- container -->
@endsection