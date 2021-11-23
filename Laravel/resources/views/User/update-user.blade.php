@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/user/user-form.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/preview-img.js') }}"></script>
@endsection

@section('content')
<div class="container">
  <div class="create-form-wrapper">
    <form method="POST" class="user-form" enctype="multipart/form-data">
      @csrf
      <div class="cover-img">
        <input type="file" class="file-upload" name="cover_img" onchange="preview_cover(event)">
        <img src="{{ URL::to('/') }}/images/cover/{{ $user->cover_img }}" id="cover_preview" class="cover" alt="COVER">
      </div>

      <div class="profile-data">
        <div class="profile-img">
          <input type="file" class="file-upload" name="profile_img" onchange="preview_profile(event)">
          <img src="{{ URL::to('/') }}/images/profile/{{ $user->profile_img }}" id="profile_preview" class="profile" alt="PROFILE">
        </div>

        <div class="formdata-group">
          <div class="formdata-control">
            <label for="name">Username <span>*</span></label><br>
            <input type="text" class="form-input @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
            @error('name')
            <span role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="formdata-control">
            <label for="email">Email Address <span>*</span></label><br>
            <input type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
            @error('email')
            <span role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="formdata-group">
          <div class="formdata-control">
            <label for="dob">Date of Birth <span>*</span></label><br>
            <input type="date" class="form-input @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $user->date_of_birth }}">
            @error('date_of_birth')
            <span role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="formdata-control">
            <label for="position">Job Position <span>*</span></label><br>
            <input type="text" class="form-input @error('position') is-invalid @enderror" name="position" value="{{ $user->position }}">
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
            <input type="text" class="form-input @error('bio') is-invalid @enderror" name="bio" value="{{ $user->bio }}">
            @error('bio')
            <span role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="formdata-control">
            <label for="ph_no">Phone Number (Optional)</label><br>
            <input type="text" class="form-input" name="ph_no" value="{{ $user->ph_no }}">
          </div>
        </div>

        <div class="formdata-group">
          <div class="formdata-control">
            <label for="linkedin">LinkedIn Link (Optional)</label><br>
            <input type="text" class="form-input" name="linkedin" value="{{ $user->linkedin }}">
          </div>
          <div class="formdata-control">
            <label for="github">Github Link (Optional)</label><br>
            <input type="text" class="form-input" name="github" value="{{ $user->github }}">
          </div>
        </div>

        <div class="formdata-control">
          <a href="{{ route('change-password-view') }}" class="link-text">Change Password?</a>
        </div>

        <div class="button-group clearfix">
          <input type="submit" class="btn btn-success" name="create" value="Update">
          <a href="{{ route('user-view', $user->id) }}" class="btn cancel-btn" name="cancel_btn">Cancel</a>
        </div>

      </div>
    </form>
  </div>
</div>
@endsection