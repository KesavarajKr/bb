@extends('layout.app')
@section('title', 'Business Bench | Create Zone')
@section('main-content')

    <div class="modal-content creation_section">


        @if ($errors->any())
            <div class="custom_dismiss_alert">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissible fade show alert_custom_waring">
                        <button type="button" class="btn-close custom_btn_close" data-bs-dismiss="alert"></button>
                        <strong>!!</strong> {{ $error }}
                    </div>
                @endforeach
            </div>
        @endif

        <div class="modal-body">
            <button class="creation_of_btn">Creation of Zone</button>

            <form action="create_zone" method="post" id="add_zone_form">
                @csrf
                <div class="zone-box">
                    <h3 class="my-3">Zone Infomation</h3>
                    <div class="form-input">
                        <label for="">Name</label><span class="text-danger">*</span><br>
                        <input type="text" class="zone_id_input" name="zone_id" style="width: 95%" autocomplete="off"
                            placeholder="Input Zone Number">
                    </div>
                    <h3 class="my-4">District Infomation</h3>
                    <div class="field_groups">
                        <div class="row extra_fields position-relative">
                            <div class="col-lg-6">
                                <div class="form-input">
                                    <label for="">Name</label><span class="text-danger">*</span><br>
                                    <select class="form-select district_name_input zone_district_name_select"
                                        name="district_name[]">
                                        <option selected value="" disabled> Select District Name</option>
                                        <option value="Chennai">Chennai</option>
                                        <option value="Madurai">Madurai</option>
                                        <option value="Trichy">Trichy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-input">
                                    <label for="">Code</label><span class="text-danger">*</span><br>
                                    <select class="form-select  district_code_input zone_district_code_select"
                                        name="district_code[]">
                                        <option selected value="">Select District Code</option>

                                    </select>
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

@endsection
