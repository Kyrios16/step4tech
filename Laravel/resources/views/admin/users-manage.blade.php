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
            <h2>User Management</h2>
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
          <div class="table-header">
            <h3 class="header-title">Users Table</h3>
          </div>
          <!-- table-header -->
          <div class="users-table">
            <table>
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Role</th>
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
                <tr>
                  <td>KaungKhantNaing</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>-</td>
                  <td>11/9/2021</td>
                  <td>11/9/2021</td>
                  <td>-</td>
                  <td>
                    <a href="" class="icon-btn-info"><i class="far fa-eye"></i></a> |
                    <a href="" class="icon-btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                    <button type="submit" class="icon-btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Bob</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>-</td>
                  <td>11/9/2021</td>
                  <td>11/9/2021</td>
                  <td>-</td>
                  <td>
                    <a href="" class="icon-btn-info"><i class="far fa-eye"></i></a> |
                    <a href="" class="icon-btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                    <button type="submit" class="icon-btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Paul</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>-</td>
                  <td>11/9/2021</td>
                  <td>11/9/2021</td>
                  <td>-</td>
                  <td>
                    <a href="" class="icon-btn-info"><i class="far fa-eye"></i></a> |
                    <a href="" class="icon-btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                    <button type="submit" class="icon-btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Bob</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>-</td>
                  <td>11/9/2021</td>
                  <td>11/9/2021</td>
                  <td>-</td>
                  <td>
                    <a href="" class="icon-btn-info"><i class="far fa-eye"></i></a> |
                    <a href="" class="icon-btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                    <button type="submit" class="icon-btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Bob</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>-</td>
                  <td>11/9/2021</td>
                  <td>11/9/2021</td>
                  <td>-</td>
                  <td>
                    <a href="" class="icon-btn-info"><i class="far fa-eye"></i></a> |
                    <a href="" class="icon-btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                    <button type="submit" class="icon-btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Bob</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>-</td>
                  <td>11/9/2021</td>
                  <td>11/9/2021</td>
                  <td>-</td>
                  <td>
                    <a href="" class="icon-btn-info"><i class="far fa-eye"></i></a> |
                    <a href="" class="icon-btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                    <button type="submit" class="icon-btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Bob</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>-</td>
                  <td>11/9/2021</td>
                  <td>11/9/2021</td>
                  <td>-</td>
                  <td>
                    <a href="" class="icon-btn-info"><i class="far fa-eye"></i></a> |
                    <a href="" class="icon-btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                    <button type="submit" class="icon-btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Bob</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>-</td>
                  <td>11/9/2021</td>
                  <td>11/9/2021</td>
                  <td>-</td>
                  <td>
                    <a href="" class="icon-btn-info"><i class="far fa-eye"></i></a> |
                    <a href="" class="icon-btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                    <button type="submit" class="icon-btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- users-table -->
          <button type="submit" class="btn btn-info">Export</button>
        </div>
        <!-- table-container -->
        <div class="table-container">
          <div class="table-header">
            <h3 class="header-title">Deleted Users Table</h3>
          </div>
          <!-- table-header -->
          <div class="deleted-users-table">
            <table>
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Role</th>
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
                <tr>
                  <td>Thomas</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>11/9/2021</td>
                  <td>11/9/2021</td>
                  <td>11/10/2021</td>
                  <td>
                    <a href="" class="icon-btn-info"><i class="far fa-eye"></i></a> |
                    <a href="" class="icon-btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                    <button type="submit" class="icon-btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>John</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>11/9/2021</td>
                  <td>11/9/2021</td>
                  <td>11/10/2021</td>
                  <td>
                    <a href="" class="icon-btn-info"><i class="far fa-eye"></i></a> |
                    <a href="" class="icon-btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                    <button type="submit" class="icon-btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Cristiano Ronaldo</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>11/9/2021</td>
                  <td>11/9/2021</td>
                  <td>11/10/2021</td>
                  <td>
                    <a href="" class="icon-btn-info"><i class="far fa-eye"></i></a> |
                    <a href="" class="icon-btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                    <button type="submit" class="icon-btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- deleted-users-table -->
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