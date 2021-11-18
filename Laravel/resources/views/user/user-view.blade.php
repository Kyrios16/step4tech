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
        <img src="{{ URL::to('/') }}/images/cover/{{ $user->cover_img }}" class="cover" alt="COVER">
      </div>
      <div class="profile-info">
        <div class="profile-img">
          <img src="{{ URL::to('/') }}/images/profile/{{ $user->profile_img }}" class="profile" alt="PROFILE">
        </div>
        <a href="{{ route('edit-user') }}" class="setting" align="right">
          <i class="fas fa-cog"></i>
        </a>
        <div class="name-bio">
          <h1 class="name">{{ $user->name }}</h1>
          <p class="bio">{{ $user->bio }}</p>
          <p class="dob"><i class="fas fa-birthday-cake"></i> {{ $user->date_of_birth }}</p>
        </div>
        <div class="profile-data">
          <div class="link-group clearfix">
            <p class="left">
              <i class="fab fa-linkedin"></i>
              <a href="{{ $user->linkedin }}">{{ $user->linkedin }}</a>
            </p>
            <p class="right">
              
              <i class="fab fa-github-square"></i>
              <a href="{{ $user->github }}">{{ $user->github }}</a>
            </p>
          </div>
          <div class="data-group clearfix">
            <p class="left"><i class="fas fa-briefcase"></i>{{$user->position }}</p>
            <p class="right">
              <i class="fas fa-phone-square-alt"></i> 
              <a href="tel:{{ $user->ph_no }}"> {{ $user->ph_no }}</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>