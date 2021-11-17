<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>

  <!--style-->
  <link href="{{ asset('css/common/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/user/user-form.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">

</head>

<body>
  <div class="container">
    <div class="create-form-wrapper">
      <div class="changepwd-wrapper">
        <h1 class="title">Change Your Password?</h1>
        <form action="{{ route('change-password') }}" method="post" enctype="multipart/form-data">
          @csrf
          {{-- @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
          @endforeach --}}
          <div class="formdata-control">
            <label for="current_password">Current Password</label><br>
            <input type="password" name="current_password" class="form-input" placeholder="Enter current password">
            @error('current_password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
          <div class="formdata-control">
            <label for="new_password">New Password</label><br>
            <input type="password" name="new_password" class="form-input" placeholder="Enter new password">
            @error('new_password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
          </div>
          <div class="formdata-control">
            <label for="new_confirm_password">Confirm New Password</label><br>
            <input type="password" name="new_confirm_password" class="form-input" placeholder="Enter new password again">
            @error('new_confirm_password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
          </div>
          <div class="formdata-control">
            <input type="submit" name="submit" class="change-btn" value="Change Password">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>