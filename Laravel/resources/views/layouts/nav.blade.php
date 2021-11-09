<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
<link rel="stylesheet" href="{{ asset('css/common/nav.css') }}">

<nav id="nav-bar">
    <div class="nav-wrapper">
        <div class="nav-list">
            <h1><a href="#"><img src="{{ asset('img/img_logo.png') }}" alt="Step4Tech"></a></h1>
            <div class="search-container">
                <input class="search" type="text" placeholder="Search . . ." name="search"><i class="fa fa-search search-ico"></i>
            </div> 
            
            <!-- Before Login -->  
            <!-- <div class="nav-before-login">
                <a href="#" class="nav-btn btn-outline-secondary">Login</a>
                <a href="#" class="nav-btn btn-primary">Create Account</a>
            </div>           -->
            

            <!-- After Login -->
            <div class="nav-dropdown">
                <img src="" class="profile-ico" alt="Profile">
                <button class="nav-dropdown-btn" onclick="openNavProfileDropdown()"><i class="fas fa-caret-down"></i></button>                
                <div class="profile-dropdown-content">
                    <a href="#">View Profile</a>
                    <a href="#">Log out</a>
                </div>
            </div>

        </div>             
    </div>
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/common/nav.js') }}"></script>