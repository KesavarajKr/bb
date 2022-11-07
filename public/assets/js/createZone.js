// Append fields
$(document).on("click", ".plus", function () {
    var html = `
            <div class="row extra_fields position-relative mt-3">
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

                <div class="remove_row"><i class="fas fa-times"></i></div>
            </div>
    `;
    $(".field_groups").append(html);
    removeErrorLabels();
});

$(document).on("click", ".remove_row", function () {
    $(this).closest(".row").remove();
});

if ($("#add_zone_form").length) {
    const zoneValidation = new JustValidate("#add_zone_form");
    zoneValidation
        .addField(".zone_id_input", [
            {
                rule: "required",
                errorMessage: "This Field is required",
            },
        ])
        .addField(".district_code_input", [
            {
                rule: "required",
                errorMessage: "This Field is required",
            },
        ])
        .addField(".district_name_input", [
            {
                rule: "required",
                errorMessage: "This Field is required",
            },
        ])
        .onSuccess((event) => {
            $("#add_zone_form").submit();
        });

    $(document).on("input", ".zone_district_name_select", async function () {
        const districtname = this.value;
        const res = await fetch(`api/getTaluk/${districtname}`, {
            method: "POST",
            headers: {
                "X-CSRF-Token": document.querySelector("[name='_token']").value,
            },
        });

        if (res.status != 200) return;

        const data = await res.text();

        $(
            this.closest(".extra_fields").querySelector(
                ".zone_district_code_select"
            )
        ).html(data);
    });
}
