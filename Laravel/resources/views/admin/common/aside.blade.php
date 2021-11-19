<div class="sidebar">
  <div class="sidebar-container">
    <div class="brand">
      <h1>
        <a href="/"><img src="{{ asset ('images/logo.png') }}" alt="Logo"></a>
      </h1>
    </div>

    <div class="sidebar-avartar">
      <div>
        <img src="https://img.icons8.com/external-bearicons-glyph-bearicons/64/000000/external-User-essential-collection-bearicons-glyph-bearicons.png" />
      </div>
    
      <div class="avartar-text">
        <h4>Admin</h4>
        <small>admin123@gmail.com</small>
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