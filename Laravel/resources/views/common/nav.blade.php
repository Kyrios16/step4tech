<nav id="nav-bar">
  <div class="nav-wrapper">
    <div class="nav-list">
      <h1><a href="/"><img src="{{ asset('images/img_logo.png') }}" alt="Step4Tech"></a></h1>
      <div class="search-container">
        <input class="search" type="text" placeholder="Search . ." name="search"><i class="fa fa-search search-ico"></i>
      </div>

      @auth
      <!-- After Login -->
      <div class="nav-dropdown">
        @if (session('profile_img') != null)
        <img src="{{ asset('images/profile/' . session('profile_img')) }}" class="profile-ico" alt="Profile">
        @else
        <img src="{{ asset('images/profile/profile_default.png')}}" class="profile-ico" alt="Profile">
        @endif
        <button class="nav-dropdown-btn" onclick="toggleNavProfileDropdown()"><i class="fas fa-caret-down"></i></button>
        <div class="profile-dropdown-content">
          <a href="/admin/categories">Admin</a>
          <a href="{{ route('user-view') }}">View Profile</a>
          <a href="{{ route('logout')}}">Log out</a>
        </div>
      </div>
      @else
      <!-- Before Login -->
      <div class="nav-before-login">
        <a href="/login" class="nav-btn btn-outline-secondary">Login</a>
        <a href="/user/register" class="nav-btn btn-success">Create Account</a>
      </div>
      @endauth
    </div>
  </div>
</nav>