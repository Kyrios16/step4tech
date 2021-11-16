<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Update</title>

  <!--style-->
  <link href="{{ asset('css/common/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/user/user-form.css') }}" rel="stylesheet">
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
      <form method="post" action="{{ route('update-user',$user->id) }}" class="user-form" enctype="multipart/form-data">
        @csrf

        <div class="cover-img">
          <input type="file" class="file-upload" name="cover_img" onchange="preview_cover(event)">
          <img src="{{ URL::to('/') }}/images/cover/{{ $user->cover_img }}" id="cover_preview" class="cover">
        </div> 

        <div class="profile-data">
          <div class="profile-img">
            <input type="file" class="file-upload" name="profile_img" onchange="preview_profile(event)">
            <img src="{{ URL::to('/') }}/images/profile/{{ $user->profile_img }}" id="profile_preview" class="profile">
          </div>

          <div class="formdata-control">
          <label for="name">Username <span>*</span></label><br>
            <input type="text" class="form-input" name="name" value="{{ $user->name }}">
          </div>

          <div class="formdata-control">
          <label for="email">Email Address <span>*</span></label><br>
            <input type="email" class="form-input" name="email" value="{{ $user->email }}">
          </div>
           
          <div class="formdata-control">
          <label for="dob">Date of Birth <span>*</span></label><br>
            <input type="date" class="form-input" name="date_of_birth" value="{{ $user->date_of_birth }}">
          </div>

          <div class="formdata-control">
          <label for="bio">Biography </label><br>
            <input type="text" class="form-input" name="bio" value="{{ $user->bio }}">
          </div>

          <div class="formdata-control">
          <label for="position">Job Position <span>*</span></label><br>
            <input type="text" class="form-input" name="position" value="{{ $user->position }}">
          </div>

          <div class="formdata-control">
          <label for="linkedin">LinkedIn Link (Optional)</label><br>
            <input type="text" class="form-input" name="linkedin" value="{{ $user->linkedin }}">
          </div>

          <div class="formdata-control">
          <label for="github">Github Link (Optional)</label><br>
            <input type="text" class="form-input" name="github" value="{{ $user->github }}">
          </div>

          <div class="formdata-control">
          <label for="ph_no">Phone Number (Optional)</label><br>
            <input type="text" class="form-input" name="ph_no" value="{{ $user->ph_no }}">
          </div>

          <div class="formdata-control">
            <a href="{{ route('change-password-view',$user->id) }}" class="link-text">Change Password?</a>
          </div>
          
          <div class="formdata-control">
            <div class="btn-group clearfix">
              <input type="submit" class="btn btn-success" name="create" value="Update">
              <a href="{{ route('user-view',$user->id) }}" class="btn btn-cancel" name="cancel_btn">Cancel</a>
            </div>
          </div>

        </div>
      </form>
    </div>
  </div>
</body>

</html>