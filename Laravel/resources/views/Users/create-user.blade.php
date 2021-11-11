<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Create</title>

  <link href="{{ asset('css/common/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/user-form.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
  
</head>
<body>


@if ($errors->any())
<div>
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="container">
  <div class="create-form-wrapper">
    <form method=" " action="" class="user-form" enctype="multipart/form-data">
      @csrf
      <div class="cover-img">
        <input type="file" class="file-upload" name="cover_img">
      </div>
      <div class="profile-data">
        <div class="profile-img">
          <img src="">
          <input type="file" class="file-upload" name="profile_img">
        </div>
        <div class="formdata-control">
          <input type="text" class="form-input" name="username" placeholder="Username">
        </div>
        <div class="formdata-control">
          <input type="email" class="form-input" name="email" placeholder="Email">
        </div>
        <div class="formdata-control">
          <input type="password" class="form-input" name="password" placeholder="Password">
        </div>
        <div class="formdata-control">
          <input type="date" class="form-input" name="date_od_birth" placeholder="Date of Birth">
        </div>
        <div class="formdata-control">
          <input type="text" class="form-input" name="bio" placeholder="Biography">
        </div>
        <div class="formdata-control">
          <input type="text" class="form-input" name="position" placeholder="Job Position">
        </div>
        <div class="formdata-control">
          <input type="text" class="form-input" name="linkedin" placeholder="LinkedIn Link (Optional)">
        </div>
        <div class="formdata-control">
          <input type="text" class="form-input" name="github" placeholder="GitHub Link (Optional)">
        </div>
        <div class="formdata-control">
          <input type="text" class="form-input" name="ph_no" placeholder="Phone Number (Optional)">
        </div>
        <div class="formdata-control">
          <div class="btn-group clearfix">
            <input type="submit" class="btn btn-success" name="create" value="Create">
            <a href="" class="btn btn-cancel" name="cancel_btn">Cancel</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>
