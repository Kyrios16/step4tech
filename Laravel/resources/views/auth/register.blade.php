@extends('layouts.app')

@section('style')
<link href="{{ asset('css/user/user-form.css') }}" rel="stylesheet">
@endsection

@section('script')
<script src="{{ asset('js/preview-img.js') }}"></script>
@endsection

@section('content')
<div class="container">
  <div class="create-form-wrapper">
    <form method="post" action="{{ route('submit-register') }}" class="user-form" enctype="multipart/form-data">
      @csrf

      <div class="cover-img">
        <input type="file" class="file-upload" name="cover_img" onchange="preview_cover(event)">
        <img id="cover_preview" class="cover" alt="">
      </div>

      <div class="profile-data">
        <div class="profile-img">
          <input type="file" class="file-upload" name="profile_img" onchange="preview_profile(event)">
          <img id="profile_preview" class="profile" alt="">
        </div>

        <div class="formdata-group">
          <div class="formdata-control">
            <label for="name">Username <span>*</span></label><br>
            <input type="text" class="form-input @error('name') is-invalid @enderror" name="name" placeholder="Enter Username" value="{{ old('name') }}" autocomplete="name">
            @error('name')
            <span role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="formdata-control">
            <label for="email">Email Address <span>*</span></label><br>
            <input type="email" class="form-input @error('email') is-invalid @enderror" name="email" placeholder="Enter Email" value="{{ old('email') }}" autocomplete="email">
            @error('email')
            <span role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="formdata-group">
          <div class="formdata-control">
            <label for="password">Password <span>*</span></label><br>
            <input type="password" class="form-input @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" autocomplete="new-password">
            @error('password')
            <span role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="formdata-control">
            <label for="password_confirmatoion">Password Confirmation<span>*</span></label><br>
            <input type="password" class="form-input @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Enter Password Again" autocomplete="new-password">
            @error('password_confirmation')
            <span role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="formdata-group">
          <div class="formdata-control">
            <label for="dob">Date of Birth <span>*</span></label><br>
            <input type="date" class="form-input @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('dob') }}" autocomplete="date_of_birth">
            @error('date_of_birth')
            <span role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="formdata-control">
            <label for="position">Job Position <span>*</span></label><br>
            <input type="text" class="form-input @error('position') is-invalid @enderror" name="position" placeholder="Enter Job Position" value="{{ old('position') }}" autocomplete="position">
            @error('position')
            <span role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="formdata-group">
          <div class="formdata-control">
            <label for="bio">Biography (Optional)</label><br>
            <input type="text" class="form-input @error('bio') is-invalid @enderror" name="bio" placeholder="Enter Biography" value="{{ old('bio') }}" autocomplete="bio">
            @error('bio')
            <span role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="formdata-control">
            <label for="ph_no">Phone Number (Optional) </label><br>
            <input type="text" class="form-input" name="ph_no" placeholder="Enter Phone Number " value="{{ old('ph_no') }}" autocomplete="ph_no">
          </div>
        </div>

        <div class="formdata-group">
          <div class="formdata-control">
            <label for="linkedin">LinkedIn Link (Optional)</label><br>
            <input type="text" class="form-input" name="linkedin" placeholder="Enter LinkedIn Link" value="{{ old('linkedin') }}" autocomplete="linkedin">
          </div>

          <div class="formdata-control">
            <label for="github">GitHub Link (Optional) </label><br>
            <input type="text" class="form-input" name="github" placeholder="Enter GitHub Link" value="{{ old('github') }}" autocomplete="github">
          </div>
        </div>

        <div class="formdata-control">
          <p class="text">Already have an account? <a href="{{ route('login')}}" class="link-text">Sign In</a>
        </div>

        <div class="button-group clearfix">
          <input type="submit" class="btn btn-success" name="create" value="Create">
          <a href="/" class="btn cancel-btn" name="cancel_btn">Cancel</a>
        </div>

      </div>

    </form>
  </div>
</div>
@endsection