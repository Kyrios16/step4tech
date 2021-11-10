@extends('layouts.app')

@section('sidebar')
<!-- Styles -->
<link href="{{ asset('css/common/sidebar.css') }}" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/css/fontawesome.min.css">

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/js/all.min.js" integrity="sha512-KAubXJ25Ga0L3yytUtDzBpDbP2usQw1dtfmph2QkpIGxFYkdLaXg90k5KVagC7WDZdxwdVzfps9XUrNPnrA++A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/common/sidebar.js') }}"></script>
<div class="main-container">
    <div class="sidebar-container">
        <div class="sidebar-content">
            <div class="sidebar-items">
                <span>
                    <span class="icon"><i class="fas fa-home"></i></span>
                    <h2 class="sidebar-title">Home</h2>
                </span>

            </div>
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
            <div class="sidebar-items">
                <span>
                    <span class="icon"><i class="far fa-thumbs-up"></i></span>
                    <h2 class="sidebar-title">Liked Posts</h2>
                </span>

            </div>
            <div class="sidebar-items">
                <span>
                    <span class="icon"><i class="fas fa-trash"></i></span>
                    <h2 class="sidebar-title">Trash</h2>
                </span>

            </div>
            <div class="sidebar-categories">
                <span onclick="categories()" id="categories-btn" class="categories-btn">
                    <span class="icon"><i class="fas fa-th"></i></span>
                    <h2 class="sidebar-title">Categories</h2>
                </span>
                <div class="categories-container show" id="categories-container">
                    <div class="categories-item">
                        <h4>JavaScript</h4>
                        <span class="add"><i class="fas fa-plus"></i></span>

                    </div>
                    <div class="categories-item">
                        <h4>PHP</h4>
                        <span class="add"><i class="fas fa-plus"></i></span>
                    </div>
                    <div class="categories-item">
                        <h4>Html</h4>
                        <span class="add"><i class="fas fa-plus"></i></span>
                    </div>
                    <div class="categories-item">
                        <h4>Laravel</h4>
                        <span class="add"><i class="fas fa-plus"></i></span>
                    </div>
                    <div class="categories-item">
                        <h4>CSS</h4>
                        <span class="add"><i class="fas fa-plus"></i></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>