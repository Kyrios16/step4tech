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
                            <form action="{{ route('add.categories') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" name="name" class="@error ('name') is-invalid @enderror" placeholder="add new category">
                                @error('name')
                                <div class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </div>
                                @enderror
                                <input type="submit" class="btn btn-success" value="Add Category">
                            </form>
                        </div>
                        <!-- new-cate -->
                    </div>
                    <!-- table-header -->
                    <div class="cate-table">
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
                                @foreach($categories as $cate)
                                <tr>
                                    <td>{{ $cate->id }}</td>
                                    <td>{{ $cate->name }}</td>
                                    <td>{{ $cate->created_user_id }}</td>
                                    <td>{{ $cate->updated_user_id }}</td>
                                    <td>{{ $cate->deleted_user_id }}</td>
                                    <td>{{ $cate->created_at }}</td>
                                    <td>{{ $cate->updated_at }}</td>
                                    <td>{{ $cate->deleted_at }}</td>
                                    <td>
                                        <a href="" class="icon-btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                                        <form action="{{ url('/admin/categories/'.$cate->id) }}" method="POST" class="delete-btn">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="icon-btn-danger" onclick="return confirm('Are you sure want to delete?')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
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