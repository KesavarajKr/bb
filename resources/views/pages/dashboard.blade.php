<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

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

    <section class="box-groups">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <div class="box">
                        <div class="icon">
                            <img src="assets/images/dashboard/zone.svg" class="img-fluid" alt="">
                        </div>
                        <p>Total No of Zones</p>
                        <span>00</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box">
                        <div class="icon">
                            <img src="assets/images/dashboard/clients.svg" class="img-fluid" alt="">
                        </div>
                        <p>Total No of Clients</p>
                        <span>00</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box">
                        <div class="icon">
                            <img src="assets/images/dashboard/projects.svg" class="img-fluid project-img"
                                alt="">
                        </div>
                        <p> Active Projects</p>
                        <span>00</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box">
                        <div class="icon">
                            <img src="assets/images/dashboard/projects.svg" class="img-fluid project-img"
                                alt="">
                        </div>
                        <p>Complted Projects</p>
                        <span>00</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box">
                        <div class="icon">
                            <img src="assets/images/dashboard/clients.svg" class="img-fluid" alt="">
                        </div>
                        <p>Total No of Users</p>
                        <span>00</span>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="box">
                        <div class="icon">
                            <img src="assets/images/dashboard/engineering.svg" class="img-fluid" alt="">
                        </div>
                        <p>Total No of Users</p>
                        <span>00</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Button trigger modal -->
    <div class="text-center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Create Zone
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade zone-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="zone-box">
                            <h3 class="my-3">Zone Infomation</h3>
                            <div class="form-input">
                                <label for="">Name</label><span class="text-danger">*</span><br>
                                <input type="text" name="name" style="width: 95%">
                            </div>
                            <h3 class="my-4">District Infomation</h3>
                            <div class="field_groups">
                                <div class="row extra_fields position-relative">
                                    <div class="col-lg-6">
                                        <div class="form-input">
                                            <label for="">Name</label><span class="text-danger">*</span><br>
                                            <input type="text" name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-input">
                                            <label for="">Code</label><span class="text-danger">*</span><br>
                                            <input type="text" name="code">
                                        </div>
                                    </div>
                                    <div class="plus"><i class="fas fa-plus"></i></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="zone_submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/bootstrap_js/bootstrap.min.js"></script>
    <script src="assets/js/aos.js"></script>

    <script src="assets/js/script.js"></script>

</body>

</html>
