<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <script src="https://kit.fontawesome.com/cdcced96ff.js" crossorigin="anonymous"></script>
</head>

<body>

    @include('layout.header')

    @section('main-content')

    @show







    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/bootstrap_js/bootstrap.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="{{ asset('assets/js/just_validate/validate.js') }}"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>
