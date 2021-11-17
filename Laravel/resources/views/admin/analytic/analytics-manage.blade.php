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
                        <h2>Analytics</h2>
                    </div>
                </div>
                <!-- header-title-container -->
            </header>
            <main>
                @include('admin.common.analytics')
                <div class="analytic-sec">
                    @include('admin.common.chart')
                    <div class="popular-user-card">
                        <div class="text">
                            <img src="https://www.shareicon.net/data/512x512/2016/09/15/829452_user_512x512.png" alt="">
                            <h3>Jane Smith</h3>
                            <p>Senior Developer</p>
                            <div class="card-info">
                                <h5 class="info-title">What is Laravel?</h5>
                                <div class="analytic-card">
                                    <div class="popular-icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="analytic-info">
                                        <small>Post Rating</small>
                                        <h2>4.9</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="links">
                            <a target="_blank" href="https://codepen.io/l-e-e/"><i class="fab fa-codepen"></i></a>
                            <a target="_blank" href="https://github.com/Leena26"><i class="fab fa-github"></i></a>
                            <a href="https://facebook.com/pixelsum"><span class="fab fa-facebook-square"></span></a>
                        </div>
                    </div>
                </div>

            </main>
        </div>
        <!-- main-content -->
    </div>
    <!-- main-container -->
</div>
<!-- container -->

@endsection