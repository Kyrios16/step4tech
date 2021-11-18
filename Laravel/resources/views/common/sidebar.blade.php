<div class="sidebar-container">
    <div class="sidebar-content">
        <a href="/" class="sidebar-items">
            <span>
                <span class="icon"><i class="fas fa-home"></i></span>
                <h2 class="sidebar-title">Home</h2>
            </span>

        </a>
        <div class="sidebar-items">
            <span onclick="menu()" id="menu">
                <span class="icon"><i class="fas fa-bars"></i></span>
                <h2 class="sidebar-title">Menu</h2>
            </span>
            <div class="menu-items" id="menu-items">
                <span>
                    <span class="menu-icon"><i class="fas fa-comments"></i></span>
                    <h2 class="menu-title">Feedbacks</h2>
                </span>
                <span>
                    <span class="menu-icon"><i class="fas fa-question"></i></span>
                    <h2 class="menu-title">FAQ</h2>
                </span>
                <span>
                    <span class="menu-icon"><i class="fas fa-address-card"></i></span>
                    <h2 class="menu-title">Contact Us</h2>
                </span>
            </div>

        </div>
        <a class="sidebar-items">
            <span>
                <span class="icon"><i class="fas fa-thumbs-up"></i></span>
                <h2 class="sidebar-title">Liked Posts</h2>
            </span>

        </a>
        <a class="sidebar-items">
            <span>
                <span class="icon"><i class="fas fa-trash"></i></span>
                <h2 class="sidebar-title">Trash</h2>
            </span>

        </a>
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
                @if($flag == true)
                <a href="{!! route('user.category.delete', ['categoryid'=>$category->id,]) !!}" class="categories-item">
                    <h4>{{$category->name}}</h4>
                    <span class="add"><i class="fas fa-check"></i></span>

                </a>
                @else
                <a href="{!! route('user.category', ['categoryid'=>$category->id,]) !!}" class="categories-item">
                    <h4>{{$category->name}}</h4>
                    <span class="add"><i class="fas fa-plus"></i></span>

                </a>
                @endif
                @endforeach

            </div>
        </div>

    </div>
</div>