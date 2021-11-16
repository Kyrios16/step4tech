<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User View</title>

  <link href="{{ asset('css/common/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/user/user-view.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">

</head>

<body>
  <div class="container">
    <div class="user-view-wrapper">
      <div class="cover-img">
        <img src="{{ URL::to('/') }}/images/cover/{{ $user->cover_img }}" class="cover">
      </div>
      <div class="profile-info">
        <div class="profile-img">
          <img src="{{ URL::to('/') }}/images/profile/{{ $user->profile_img }}" class="profile">
        </div>
        <a href="{{ route('profile-detail',$user->id) }}" class="setting" align="right">
          <i class="fas fa-cog"></i>
        </a>
        <div class="name-bio">
          <h1 class="name">{{ $user->name }}</h1>
          <p class="bio">{{ $user->bio }}</p>
        </div>
        <div class="link-group clearfix">
          <div class="linkedin">
            <i class="fab fa-linkedin"></i>
            <a href="{{ $user->linkedin }}">{{ $user->linkedin }}</a>
          </div>
          <div class="github">
            <i class="fab fa-github-square"></i>
            <a href="{{ $user->github }}">{{ $user->github }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>