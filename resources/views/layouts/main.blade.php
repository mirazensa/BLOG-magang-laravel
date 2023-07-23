<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>mirazensa BLOG - {{ $title }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="bg-secondary overflow-x-hidden">
    @include('partials.navbar')

    @yield('container')
    <script src="{{ asset('assets/bootstrap-5.3.0/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
