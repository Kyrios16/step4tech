@extends('admin.Layouts.app')

@section('content')
<!-- script -->
<script src="{{ asset('js/admin/admin-cate-script.js') }}"></script>
<script src="{{ asset('js/lib/moment.js') }}"></script>

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
            <h2>Categories Management</h2>
          </div>
        </div>
        <!-- header-title-container -->
      </header>
      <main>
        @include('admin.common.analytics')
        <div class="table-container">
          <div class="table-header clearfix">
            <h3 class="header-title">Categories Table</h3>
            <div class="new-cate">
              @error('name')
              <small>{{$message}}</small>
              @enderror
              <form action="{{ route('add.categories') }}" method="POST">
                {{ csrf_field() }}
                <input type="text" name="name" class="@error ('name') is-invalid @enderror" placeholder="add new category">
                <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New</button>
              </form>
            </div>
            <!-- new-cate -->
          </div>
          <!-- table-header -->
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
            <table>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Created User Id</th>
                  <th scope="col">Updated User Id</th>
                  <th scope="col">Deleted User Id</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Updated At</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <!-- cate-table -->
          <a href="{{ route('export.categories') }}" class="btn btn-info">Export&nbsp;&nbsp;<i class="fas fa-file-export"></i></a>
        </div>
        <!-- table-container -->
      </main>
    </div>
    <!-- main-content -->
  </div>
  <!-- main-container -->
</div>
<!-- container -->
@endsection