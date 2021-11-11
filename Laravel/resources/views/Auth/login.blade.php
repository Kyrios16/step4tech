<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link href="{{ asset('css\common\reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css\common\grid.css') }}" rel="stylesheet">
  <link href="{{ asset('css\login.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
</head>
<body>
  <div id="sign-in">
    <div class="container">
      <div class="circle-btn" align="right">
        <a href="#" class="round-btn"><i class="fas fa-times"></i></a>
      </div>
      <div class="login-content clearfix">
        <div class="content-sec">
          <h1 class="title">
            Sign In
          </h1>
          <h2 class="ttl">
            New User? 
            <a href="#" class="link-text">Create an account</a>
          </h2>
          <form action="" method="get" class="login-form">
            @csrf
            <input type="text" class="form-input row" name="email" placeholder="  Email Address"><br>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <input type="password" class="form-input row " name="password" placeholder="  Password"><br>
            @error('password')  
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <input type="submit" class="btn" name="signin" value="Sign In">
          </form>
          <div class="forgot-text">
            <a href="#" class="link-text center">
                I forgot my password.
            </a>
          </div>
        </div>
        <div class="img-sec">
          <img src="{{ asset('images/signin_bannar.png') }}" class="signin-bannar">
        </div>
      </div>
    </div>
  </div>
</body>
</html>