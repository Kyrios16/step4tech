<nav id="nav-bar">
  <div class="nav-wrapper">
    <div class="nav-list">
      @if(Request::is('user/view/*'))
      <p class="nav-menu-btn hidden">      
      @else
      <p class="nav-menu-btn">  
      @endif
      <span></span>
        <span></span>
        <span></span>
      </p>
      <h1><a href="/"><img src="{{ asset('images/logo.png') }}" alt="Step4Tech"></a></h1>
      @if(!Request::is('user/register'))
      <div class="search-container">
        <input class="search" type="text" placeholder="Search . . ." name="search"><i class="fa fa-search search-ico"></i>
      </div>
      @auth
      <div class="nav-dropdown">
        <img src="{{ asset('images/profile/' . $user->profile_img) }}" class="profile-ico" alt="Profile">
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
      <div class="nav-before-login">
        <a href="/login" class="nav-btn btn-outline-secondary">Login</a>
        <a href="/user/register" class="nav-btn btn-success">Sign up</a>
      </div>
      @endauth
      @endif
    </div>
  </div>
</nav>