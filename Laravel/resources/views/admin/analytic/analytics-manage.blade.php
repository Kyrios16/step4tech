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

                @include('admin.common.chart')
            </main>
        </div>
        <!-- main-content -->
    </div>
    <!-- main-container -->
</div>
<!-- container -->

@endsection