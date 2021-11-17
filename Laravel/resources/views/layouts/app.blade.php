<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/common/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common/grid.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common/nav.css') }}">
  @yield('style')

  <!-- Script -->
  <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <script src="{{ asset('js/lib/moment.js') }}"></script>
  <script src="{{ asset('js/common/sidebar.js') }}"></script>
  <script src="{{ asset('js/common/nav.js') }}"></script>
  @yield('script')
  <title>Step4Tech | {{$title}}</title>
</head>

<body>
  @include('common.nav')
  <div class="main-container">
    <div class="clearfix">
      @include('common.sidebar')
      @yield('content')
    </div>
  </div>

</body>

</html>
