<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Detail</title>

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
        <div class="profile-data">
          <ul>
            <li>Name : {{ $user->name }}</li>
            <li>Email : {{ $user->email }}</li>
            <li>Date of Birth : {{ $user->date_of_birth }}</li>
            <li>Bio : {{ $user->bio }}</li>
            <li>Position : {{ $user->position }}</li>
            <li>LinkedIn (Optional): <a href="{{ $user->linkedin }}">{{ $user->linkedin }}</a></li>
            <li>GitHub (Optional) : <a href="{{ $user->github }}">{{ $user->github }}</a></li>
            <li>Phone (Optional) : {{ $user->ph_no }}</li>
          </ul>
          <div class="btn-group">
            <a href="{{ route('userform-edit',$user->id) }}" class="btn btn-success">Update</a>
            <a href="{{ route('user-view',$user->id) }}" class="btn btn-cancel">Cancel</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>