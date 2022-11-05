@extends('layout.app')
@section('title','Dashboard')
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
@endsection
