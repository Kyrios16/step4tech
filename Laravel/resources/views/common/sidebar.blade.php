<div class="sidebar-container">
  <div class="sidebar-content">
    <a href="/" class="sidebar-items">
      <span class="{{ Request::is('/') ? 'active': '' }}">
        <span class="icon"><i class="fas fa-home"></i></span>
        <h2 class="sidebar-title">Home</h2>
      </span>
    </a>
    @auth

    <a href="/post/liked-posts" class="sidebar-items">
      <span class="{{ Request::is('post/liked-posts') ? 'active': '' }}">
        <span class="icon"><i class="fas fa-thumbs-up"></i></span>
        <h2 class="sidebar-title">Liked Posts</h2>
      </span>
    </a>
    <a href="/post/trash" class="sidebar-items">
      <span class="{{ Request::is('post/trash') ? 'active': '' }}">
        <span class="icon"><i class="fas fa-trash"></i></span>
        <h2 class="sidebar-title">Trash</h2>
      </span>
    </a>
    @endauth
    <div class="sidebar-categories">
      <span onclick="categories()" id="categories-btn" class="categories-btn">
        <span class="icon"><i class="fas fa-th"></i></span>
        <h2 class="sidebar-title">Categories</h2>
      </span>
      <div class="categories-container show" id="categories-container">
        @foreach ($categories as $category)
        @php($flag=false)
        @foreach($userCategoryList as $userCategory)
        @if($category->id == $userCategory->category_id)
        @php($flag=true)
        @endif
        @endforeach
        @auth
        @if($flag == true)
        <div class="clearfix categories-item {{ Request::is('post/search/' . $category->name) ? 'active': '' }}">
          <a href="/post/search/{{$category->name}}" class="category-name">
            {{$category->name}}
            <a href="{!! route('user.category.delete', ['categoryid'=>$category->id,]) !!}" class="add"><i class="fas fa-check"></i></a>
          </a>
        </div>
        @else
        <div class="clearfix categories-item {{ Request::is('post/search/' . $category->name) ? 'active': '' }}">
          <a href="/post/search/{{$category->name}}" class="category-name">
            {{$category->name}}
          </a>
          <a href="{!! route('user.category', ['categoryid'=>$category->id,]) !!}" class="add"><i class="fas fa-plus"></i></a>
        </div>
        @endif
        @else
        <div class="clearfix categories-item">
          <a href="/post/search/{{$category->name}}" class="category-name">
            {{$category->name}}
          </a>

        </div>
        @endauth
        @endforeach

      </div>
    </div>

  </div>
</div>