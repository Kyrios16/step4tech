<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Step4Tech</title>

  <!-- style -->
  <link rel="stylesheet" href="{{ asset('css/common/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common/grid.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->


  <!-- fonts -->
  <link rel="stylesheet" href="{{ asset('css/library/fontawesome.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

  <!-- script -->
  <script src="{{ asset('js/library/fontawesome.js') }}"></script>
  <script src="{{ asset('js/library/jquery.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
</head>

<body>
  @yield('content')
</body>

</html>