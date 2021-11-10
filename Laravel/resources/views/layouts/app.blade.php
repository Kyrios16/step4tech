<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles -->
    <link href="{{ asset('css/common/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common/grid.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/css/fontawesome.min.css">
    <link href="{{ asset('css/common/sidebar.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/common/nav.css') }}">
    @yield('style')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/js/all.min.js" integrity="sha512-KAubXJ25Ga0L3yytUtDzBpDbP2usQw1dtfmph2QkpIGxFYkdLaXg90k5KVagC7WDZdxwdVzfps9XUrNPnrA++A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/common/sidebar.js') }}"></script>
    <script src="{{ asset('js/common/nav.js') }}"></script>
    @yield('script')
    <title>Step4Tech</title>
</head>

<body>
    <div class="main-container">
        @include('common.nav')
        <div>
            @include('common.sidebar') 
            @yield('content')
        </div>
    </div>

</body>

</html>