@extends('layout.app')
@section('title', 'Dashboard')
@section('main-content')

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
                            <img src="assets/images/dashboard/projects.svg" class="img-fluid project-img" alt="">
                        </div>
                        <p> Active Projects</p>
                        <span>00</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box">
                        <div class="icon">
                            <img src="assets/images/dashboard/projects.svg" class="img-fluid project-img" alt="">
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

@endsection
