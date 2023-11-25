<!doctype html>

<html>

<head>

   @include('layout.head')

</head>

<body>

<div>

    @include('layout.header')

    @yield('content')
        
    @include('layout.footer')

</div>

</body>

</html>
