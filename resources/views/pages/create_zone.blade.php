@extends('layout.app')
@section('title', 'Business Bench | Create Zone')
@section('main-content')

    <div class="modal-content creation_section">
        <div class="modal-body">
            <button class="creation_of_btn">Creation of Zone</button>

            <form action="api/createzone" method="post" id="add_zone_form">
                @csrf
                <div class="zone-box">
                    <h3 class="my-3">Zone Infomation</h3>
                    <div class="form-input">
                        <label for="">Name</label><span class="text-danger">*</span><br>
                        <input type="textr" class="zone_id_input" name="zone_id" style="width: 95%" autocomplete="off"
                            placeholder="Input Zone Number">
                    </div>
                    <h3 class="my-4">District Infomation</h3>
                    <div class="field_groups">
                        <div class="row extra_fields position-relative">
                            <div class="col-lg-6">
                                <div class="form-input">
                                    <label for="">Name</label><span class="text-danger">*</span><br>
                                    <select class="form-select district_name_input" name="district_name[]">
                                        <option selected value=""> Select District Name</option>
                                        <option value="1">Chennai</option>
                                        <option value="2">Madurai</option>
                                        <option value="3">Trichy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-input">
                                    <label for="">Code</label><span class="text-danger">*</span><br>
                                    <select class="form-select district_code_input" name="district_code[]">
                                        <option selected value="">Select District Code</option>
                                        <option value="1"></option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
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
