<div class="sidebar">
  <div class="sidebar-container">
    <div class="brand">
      <h1 class="logo">
        <a href="/"><img src="{{ asset ('images/logo.png') }}" alt="Logo"></a>
      </h1>
    </div>

    <div class="sidebar-avartar">
      <div id="admin-profile">
        <img src="{{ URL::to('/') }}/images/profile/{{ Auth::user()->profile_img }}" alt="admin profile" />
      </div>
      <div class="avartar-text">
        <h4>{{ Auth::user()->name }}</h4>
        <small>{{ Auth::user()->email }}</small>
      </div>
    </div>

    <div class="sidebar-menu">
      <ul id="sidebar-list">
        <li>
          <a href="{{ url('/admin') }}" id="menuBtn" class="{{ Request::is('admin') ? 'active' : null }}">
            <span class="fas fa-sliders-h icon-small"></span>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/admin/users') }}" id="menuBtn" class="{{ Request::is('admin/users') ? 'active':'' }}">
            <span class="fas fa-users-cog icon-small"></span>
            <span>Users Management</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/admin/posts') }}" id="menuBtn" class="{{ Request::is('admin/posts') ? 'active':'' }}">
            <span class="fas fa-stream icon-small"></span>
            <span>Posts Management</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/admin/categories') }}" id="menuBtn" class="{{ Request::is('admin/categories') ? 'active':'' }}">
            <span class="fas fa-list-alt icon-small"></span>
            <span>Categories Management</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>