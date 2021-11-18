<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!--style-->
  <link href="{{ asset('css/common/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/auth/user-form.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
  <!--script-->
  <script src="{{ asset('js/preview-img.js') }}"></script>

</head>

<body>

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

          <div class="formdata-control">
            <label for="name">Username <span>*</span></label><br>
            <input type="text" class="form-input" name="name" placeholder="Enter Username" value="{{ old('name') }}">
          </div>

          <div class="formdata-control">
            <label for="email">Email Address <span>*</span></label><br>
            <input type="email" class="form-input" name="email" placeholder="Enter Email" value="{{ old('email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="formdata-control">
            <label for="password">Password <span>*</span></label><br>
            <input type="password" class="form-input" name="password" placeholder="Enter Password">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="formdata-control">
            <label for="password_confirmatoion">Password Confirmation<span>*</span></label><br>
            <input type="password" class="form-input" name="password_confirmation" placeholder="Enter Password Again">
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="formdata-control">
            <label for="dob">Date of Birth <span>*</span></label><br>
            <input type="date" class="form-input" name="date_of_birth" value="{{ old('dob') }}">
          </div>

          <div class="formdata-control">
            <label for="bio">Biography </label><br>
            <input type="text" class="form-input" name="bio" placeholder="Enter Biography" value="{{ old('bio') }}">
          </div>

          <div class="formdata-control">
            <label for="position">Job Position <span>*</span></label><br>
            <input type="text" class="form-input" name="position" placeholder="Enter Job Position" value="{{ old('position') }}">
          </div>

          <div class="formdata-control">
            <label for="linkedin">LinkedIn Link (Optional)</label><br>
            <input type="text" class="form-input" name="linkedin" placeholder="Enter LinkedIn Link" value="{{ old('linkedin') }}">
          </div>

          <div class="formdata-control">
            <label for="github">GitHub Link (Optional) </label><br>
            <input type="text" class="form-input" name="github" placeholder="Enter GitHub Link" value="{{ old('github') }}">
          </div>

          <div class="formdata-control">
            <label for="ph_no">Phone Number (Optional) </label><br>
            <input type="text" class="form-input" name="ph_no" placeholder="Enter Phone Number " value="{{ old('ph_no') }}">
          </div>

          <div class="formdata-control">
            <p class="text">Already have an account? <a href="{{ route('login')}}" class="link-text">Sign In</a>
            <div class="btn-group clearfix">
              <input type="submit" class="btn btn-success" name="create" value="Create">
              <a href="/" class="btn btn-cancel" name="cancel_btn">Cancel</a>
            </div>
          </div>

        </div>

      </form>
    </div>
  </div>
</body>

</html>