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

    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 text-center">
                    <div class="logo">
                        <img src="assets/images/dashboard/business_bench_logo.svg" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="navbar">
                        <ul>
                            <li><a href="javascript:;">Home</a></li>
                            <li><a href="javascript:;">Projects</a></li>
                            <li><a href="javascript:;">Zones</a></li>
                            <li><a href="javascript:;">Region</a></li>
                            <li><a href="javascript:;">Area</a></li>
                            <li><a href="javascript:;">Engineers</a></li>
                            <li><a href="javascript:;">Users</a></li>
                            <li><a href="javascript:;">Clients</a></li>
                            <li><a href="javascript:;">Estimate</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="admin_logo">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </header>

    @section('main-content')

    @show







    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/bootstrap_js/bootstrap.min.js"></script>
    <script src="assets/js/aos.js"></script>

    <script src="assets/js/script.js"></script>

</body>

</html>
