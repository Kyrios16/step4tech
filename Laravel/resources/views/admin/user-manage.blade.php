@extends('Layouts.app')

@section('content')
<div class="container">
  <input type="checkbox" name="" id="menu-toggle">
  <div class="sidebar">
    <div class="sidebar-container">
      <div class="brand">
        <h1>
          <a href="#"><img src="{{ asset ('img/logo.png') }}" alt="Logo"></a>
        </h1>
      </div>

      <div class="sidebar-avartar">
        <div>
          <img src="https://img.icons8.com/external-bearicons-glyph-bearicons/64/000000/external-User-essential-collection-bearicons-glyph-bearicons.png" />
        </div>

        <div class="avartar-text">
          <h4>Admin</h4>
          <small>admin123@gmail.com</small>
        </div>

      </div>

      <div class="sidebar-menu">
        <ul>
          <li>
            <a href="">
              <span class="fas fa-sliders-h icon-small"></span>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="" class="active">
              <span class="fas fa-users-cog icon-small"></span>
              <span>User Management</span>
            </a>
          </li>
          <li>
            <a href="">
              <span class="fas fa-list-alt icon-small"></span>
              <span>Post Management</span>
            </a>
          </li>
          <li>
            <a href="">
              <span class="fas fa-list-alt icon-small"></span>
              <span>Categories Management</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="sidebar-card">
        <img src="{{ asset ('img/code.png') }}" alt="Module">
      </div>
    </div>
  </div>

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
      <div class="users-table-container">
        <h3 class="header-title">Users Table</h3>
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
                  <a href="" class="btn btn-info"><i class="far fa-eye"></i></a> |
                  <a href="" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
                  <a href="" class="btn btn-info"><i class="far fa-eye"></i></a> |
                  <a href="" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
                  <a href="" class="btn btn-info"><i class="far fa-eye"></i></a> |
                  <a href="" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="deleted-users-table-container">
        <h3 class="header-title">Deleted-users Table</h3>
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
                  <a href="" class="btn btn-info"><i class="far fa-eye"></i></a> |
                  <a href="" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
                  <a href="" class="btn btn-info"><i class="far fa-eye"></i></a> |
                  <a href="" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
                  <a href="" class="btn btn-info"><i class="far fa-eye"></i></a> |
                  <a href="" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a> |
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

</div>

@endsection