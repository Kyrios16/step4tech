<nav id="nav-bar">
  <div class="nav-wrapper">
    <div class="nav-list">
      <h1><a href="/"><img src="{{ asset('images/img_logo.png') }}" alt="Step4Tech"></a></h1>
      @if(!Request::is('user/register'))
      <div class="search-container">
        <input class="search" type="text" placeholder="Search . ." name="search"><i class="fa fa-search search-ico"></i>
      </div>
      @auth
      <!-- After Login -->
      <div class="nav-dropdown">
        <img src="{{ asset('images/profile/' . $user->profile_img) }}" class="profile-ico" alt="Profile">
        <button class="nav-dropdown-btn" onclick="toggleNavProfileDropdown()"><i class="fas fa-caret-down"></i></button>
        <div class="profile-dropdown-content">
          @auth
          @if ($user->role == 0)
          <a href="/admin">Admin</a>
          @endif
          <a href="{{ route('user-view', $user->id) }}">View Profile</a>
          @endauth
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
      @endif
    </div>
  </div>
</nav>