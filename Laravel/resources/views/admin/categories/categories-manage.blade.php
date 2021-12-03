@extends('admin.Layouts.app')

@section('script')
<script src="{{ asset('js/lib/moment.js') }}"></script>
<script src="{{ asset('js/admin/admin-cate-script.js') }}"></script>
<script src="{{ asset('js/lib/sweetalert.min.js') }}"></script>
@endsection

@section('content')
@include('admin.common.aside')
<div class="main-container">
  <div class="main-content">
    <header>
      <div class="header-title-container">
        <div class="header-icon sp">
          <button id="menu-toggle"><span class="fas fa-bars"></span></button>
        </div>
        <div class="header-icon pc">
          <span class="fas fa-bars pc" id="menu-toggle"></span>
        </div>
        <div class="header-title">
          <h2>Categories Management</h2>
        </div>
      </div>
    </header>
    <main>
      @include('admin.common.analytics')
      <div class="category-table-container clearfix">
        <div class="table-header clearfix">
          <h3 class="header-title">Categories Table</h3>
          <div class="new-cate">
            @error('name')
            <small id="error-msg">{{$message}}</small>
            @enderror
            <form action="{{ route('add.categories') }}" method="POST">
              {{ csrf_field() }}
              <input type="text" name="name" class="@error('name') is-invalid @enderror" placeholder="add new category">
              <button type="submit" class="btn btn-success" onclick="createBtn()"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</button>
            </form>
          </div>
        </div>
        <div class="cate-table">
          <div class="popup" id="popup-1">
            <div class="overlay"></div>
            <div class="content">
              <div class="close-btn" onclick="closeBox()">&times;</div>
              <h4 class="header-title">Edit Category</h4>
              <input type="hidden" id="id" name="id">
              <input type="text" id="name" name="name">
              <button class="btn btn-success" id="btnEdit" onclick="updateCategory()">Edit</button>
            </div>
          </div>
          <table class="styled-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Created User Id</th>
                <th scope="col">Updated User Id</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

        <a href="{{ route('export.categories') }}" class="btn btn-info export-btn">Export&nbsp;&nbsp;<i class="fas fa-file-export"></i></a>
      </div>
    </main>
  </div>
</div>
@endsection