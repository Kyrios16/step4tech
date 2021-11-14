@extends('admin.Layouts.app')

@section('content')
<!-- script -->
<script src="{{ asset('js/admin-cate-script.js') }}"></script>


<div class="container clearfix">
  <input type="checkbox" name="" id="menu-toggle">
  @include('admin.common.aside')
  <div class="main-container">
    <div class="main-content">
      <header>
        <div class="header-title-container">
          <label for="">
            <span class="fas fa-bars"></span>
          </label>
          <div class="header-title">
            <h2>Categories Management</h2>
          </div>
        </div>
        <!-- header-title-container -->
      </header>
      <main>
        <div class="analytics">
          <div class="analytic-card">
            <div class="analytic-icon icon-first">
              <i class="fas fa-users"></i>
            </div>
            <div class="analytic-info">
              <small>Total Users</small>
              <h2>20k</h2>
            </div>
          </div>
          <div class="analytic-card">
            <div class="analytic-icon icon-sec">
              <i class="fas fa-users"></i>
            </div>
            <div class="analytic-info">
              <small>Total Users</small>
              <h2>20k</h2>
            </div>
          </div>
          <div class="analytic-card">
            <div class="analytic-icon icon-third">
              <i class="fas fa-users"></i>
            </div>
            <div class="analytic-info">
              <small>Total Users</small>
              <h2>20k</h2>
            </div>
          </div>
          <div class="analytic-card">
            <div class="analytic-icon icon-fourth">
              <i class="fas fa-users"></i>
            </div>
            <div class="analytic-info">
              <small>Total Users</small>
              <h2>20k</h2>
            </div>
          </div>
        </div>
        <!-- analytics -->
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
                <input type="submit" class="btn btn-success" value="Add Category">
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
                <!-- <form id="editForm" name="editForm">
                  <input type="hidden" id="id" name="id">
                  <input type="text" id="name" name="name">
                  <button class="btn btn-success" id="editBtn" type="submit">Edit</button>
                </form> -->
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
                  <th scope="col">Deleted At</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <!-- cate-table -->
          <button type="submit" class="btn btn-info">Export</button>
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