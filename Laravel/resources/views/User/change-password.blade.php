@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/user/user-form.css') }}">
@endsection

@section('content')
<div class="container">
  <div class="create-form-wrapper">
    <div class="changepwd-wrapper">
      <h1 class="title">Change Your Password?</h1>
      <form action="{{ route('change-password') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="formdata">
          <label for="current_password">Current Password</label><br>
          <input type="password" name="current_password" class="form-input" placeholder="Enter current password">
          @error('current_password')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <hr>
        <div class="formdata">
          <label for="new_password">New Password</label><br>
          <input type="password" name="new_password" class="form-input" placeholder="Enter new password">
          @error('new_password')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="formdata">
          <label for="new_confirm_password">Confirm New Password</label><br>
          <input type="password" name="new_confirm_password" class="form-input" placeholder="Enter new password again">
          @error('new_confirm_password')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="button-group clearfix">
          <input type="submit" class="btn btn-success" name="change" value="Change">
          <a href="/user/edit" class="btn cancel-btn" name="cancel_btn">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection