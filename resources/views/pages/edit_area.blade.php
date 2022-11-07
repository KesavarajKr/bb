<div class="row">
    <div class="col-lg-12">
        <form id="edit_area_form">
            @csrf
            <div class="zone-box">
                <h3 class="my-3">District Infomation</h3>
                <div class="field_groups_district">
                    <div class="row extra_fields position-relative">
                        <div class="col-lg-6">
                            <div class="form-input">
                                <label for="">Name</label><span class="text-danger">*</span><br>
                                <input type="text" name="district_name" class="district_name"
                                    value="{{ $data->district_name }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-input">
                                <label for="">Code</label><span class="text-danger">*</span><br>
                                <input type="text" name="district_code" class="district_code"
                                    value="{{ $data->district_code }}" required>
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
                                <input type="text" name="taluk_name" class="taluk_name_input taluk_name"
                                    value="{{ $data->taluk_name }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-input">
                                <label for="">Code</label><span class="text-danger">*</span><br>
                                <input type="text" name="taluk_code" class="taluk_code_input taluk_code"
                                    value="{{ $data->taluk_code }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary editarea">Save changes</button>
            </div>
        </form>
    </div>
</div>