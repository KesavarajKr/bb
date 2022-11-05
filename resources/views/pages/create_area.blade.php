@extends('layout.app')
@section('title', 'Business Bench | Create Area')
@section('main-content')
    <div class="modal-content creation_section">
        <div class="modal-body">
            <button class="creation_of_btn">Creation of Area</button>
            <form action="api/createarea" method="post" id="add_area_form">
                @csrf
                <div class="zone-box">
                    <h3 class="my-3">District Infomation</h3>
                    <div class="field_groups_district">
                        <div class="row extra_fields position-relative">
                            <div class="col-lg-6">
                                <div class="form-input">
                                    <label for="">Name</label><span class="text-danger">*</span><br>
                                    <input type="text" name="district_name" class="district_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-input">
                                    <label for="">Code</label><span class="text-danger">*</span><br>
                                    <input type="text" name="district_code" class="district_code">
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="my-4">Taluk Infomation</h3>
                    <div class="taluk_field_groups">
                        <div class="row extra_fields position-relative">
                            <div class="col-lg-6">
                                <div class="form-input">
                                    <label for="">Name</label><span class="text-danger">*</span><br>
                                    <input type="text" name="taluk_name[]" class="taluk_name_input">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-input">
                                    <label for="">Code</label><span class="text-danger">*</span><br>
                                    <input type="text" name="taluk_code[]" class="taluk_code_input">
                                </div>
                            </div>
                            <div class="taluk_plus"><i class="fas fa-plus"></i></div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="zone_submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
