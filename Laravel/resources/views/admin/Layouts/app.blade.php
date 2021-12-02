<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Step4Tech | Dashboard</title>

  <!-- style -->
  <link rel="stylesheet" href="{{ asset('css/common/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/lib/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/admin-style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/admin-common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/admin-query.css') }}">
  @yield('style')


  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

  <!-- script -->
  <script src="{{ asset('js/lib/fontawesome.js') }}"></script>
  <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
  <script src="{{ asset('js/lib/popper.min.js') }}"></script>
  <script src="{{ asset('js/lib/jquery.heightLine.js') }}"></script>
  <script src="{{ asset('js/lib/sweetalert.min.js') }}"></script>
  <script src="{{ asset('js/admin/admin-common.js') }}"></script>
  @yield('script')

</head>

<body>
  <div class="container">
    @yield('content')
  </div>
</body>

</html>