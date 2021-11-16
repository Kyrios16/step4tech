@extends('admin.Layouts.app')

@section('content')
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
            <h2>Posts Management</h2>
          </div>
        </div>
        <!-- header-title-container -->
      </header>
      <main>
        @include('admin.common.analytics')
        <div class="table-container">
          <div class="table-header">
            <h3 class="header-title">Posts Table</h3>
          </div>
          <!-- table-header -->
          <div class="posts-table">
            <table>
              <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Content</th>
                  <th scope="col">Photo</th>
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
                @foreach ($posts as $post)
                <tr>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->content }}</td>
                  <td>{{ $post->photo }}</td>
                  <td>{{ $post->created_user_id }}</td>
                  <td>{{ $post->updated_user_id }}</td>
                  <td>{{ $post->deleted_user_id }}</td>
                  <td>{{ $post->created_at }}</td>
                  <td>{{ $post->updated_at }}</td>
                  <td>{{ $post->deleted_at }}</td>
                  <td>
                    <a href="" class="icon-btn-info"><i class="far fa-eye"></i></a> |
                    <a href="" class="icon-btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                    <button type="submit" class="icon-btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- post-table -->
          <a href="{{ route('export.posts') }}" class="btn btn-info">Export&nbsp;&nbsp;<i class="fas fa-file-export"></i></a>
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