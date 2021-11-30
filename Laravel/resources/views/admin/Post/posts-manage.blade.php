@extends('admin.Layouts.app')

@section('content')
<div class="container">
  @include('admin.common.aside')
  <div class="main-container">
    <div class="main-content">
      <header>
        <div class="header-title-container">
          <div class="header-icon">
            <span class="fas fa-bars"></span>
          </div>
          <div class="header-title">
            <h2>Posts Management</h2>
          </div>
        </div>
      </header>
      <main>
        @include('admin.common.analytics')
        <div class="table-container clearfix">
          <div class="table-header">
            <h3 class="header-title">Posts Table</h3>
          </div>
          <div class="posts-table">
            <table class="styled-table">
              <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Content</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Created User Id</th>
                  <th scope="col">Updated User Id</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Updated At</th>
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
                  <td>{{ $post->created_at->format('d-m-Y') }}</td>
                  <td>{{ $post->updated_at->format('d-m-Y') }}</td>
                  <td>
                    <a href="{{ route('detail.post', $post->id) }}" class="icon-btn-info"><i class="far fa-eye"></i></a> |
                    <a href="{{ route('edit.post', $post->id) }}" class="icon-btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                    <button type="submit" class="icon-btn-danger" onclick="deletePost({{$post->id}})"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <a href="{{ route('export.posts') }}" class="btn btn-info export-btn">Export&nbsp;&nbsp;<i class="fas fa-file-export"></i></a>
        </div>
      </main>
    </div>
  </div>
</div>
@endsection