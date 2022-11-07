AOS.init(); // AOS Initialze

// Sliders
$(".content-slider").slick({
    dots: true,
    infinite: true,
    autoplaySpeed: 2000,
    cssEase: "ease-in",
    autoplay: true,
    arrows: false,
});

$(".radius_shape_slider").slick({
    infinite: true,
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ],
});

// Password Shown
$(document).on("click", ".eye", function () {
    if ($(".eye i").hasClass("far fa-eye-slash")) {
        $(".eye i").removeClass("far fa-eye-slash");
        $(".eye i").addClass("far fa-eye");
        $(".login_password").attr("type", "text");
    } else {
        $(".eye i").removeClass("far fa-eye");
        $(".eye i").addClass("far fa-eye-slash");
        $(".login_password").attr("type", "password");
    }
});

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

// Add area --> taluk appends code
$(document).on("click", ".taluk_plus", function () {
    var html = `
            <div class="row extra_fields position-relative mt-3">
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
                <div class="taluk_remove_row"><i class="fas fa-times"></i></div>
        </div>
    `;
    $(".taluk_field_groups").append(html);
    removeErrorLabels();
});

$(document).on("click", ".remove_row", function () {
    $(this).closest(".row").remove();
});

// Add Area --> taluk remove code
$(document).on("click", ".taluk_remove_row", function () {
    $(this).closest(".row").remove();
});

if ($("#add_area_form").length) {
    const areaValidation = new JustValidate("#add_area_form");
    areaValidation
        .addField(".district_name", [
            {
                rule: "required",
                errorMessage: "This Field is required",
            },
        ])
        .addField(".district_code", [
            {
                rule: "required",
                errorMessage: "This Field is required",
            },
        ])
        .addField(".taluk_name_input", [
            {
                rule: "required",
                errorMessage: "This Field is required",
            },
        ])
        .addField(".taluk_code_input", [
            {
                rule: "required",
                errorMessage: "This Field is required",
            },
        ])
        .onSuccess((event) => {
            $("#add_area_form").submit();
        });
}

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
function removeErrorLabels() {
    $(".just-validate-error-label").remove();
}

$(document).ready(function () {
    $("#example").DataTable({
        dom: "Bfrtip",
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
    });
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(".saveuser").click(function () {
    var name = $("#name").val();
    var email = $("#email").val();
    var mobilenumber = $("#mobilenumber").val();
    var password = $("#password").val();
    var profilepic = $("#profilepic").val();
    var role = $("#role").val();
    var projectmenu = $("#projectmenu").val();
    var zonemenu = $("#zonemenu").val();
    var regionmenu = $("#regionmenu").val();
    var areamenu = $("#areamenu").val();
    var usersmenu = $("#usersmenu").val();
    var clientsmenu = $("#clientsmenu").val();
    var estimatemenu = $("#estimatemenu").val();

    $.ajax({
        method: "POST",
        url: "/api/createUser",
        data: {
            name: name,
            email: email,
            mobilenumber: mobilenumber,
            password: password,
            profilepic: profilepic,
            role: role,
            projectmenu: projectmenu,
            zonemenu: zonemenu,
            regionmenu: regionmenu,
            areamenu: areamenu,
            usersmenu: usersmenu,
            clientsmenu: clientsmenu,
            estimatemenu: estimatemenu,
        },
        success: function (data) {
            if ($.isEmptyObject(data.error)) {
                // alert(data.success);
                $(".error-text").text("");
                name = $("#name").val("");
                email = $("#email").val("");
                mobilenumber = $("#mobilenumber").val("");
                password = $("#password").val("");
                role = $("#role").val("");
                $("#projectmenu").attr("checked", "false");
                $("#zonemenu").attr("checked", "false");

                // $("#successmodal").modal('show');
                alert("data saved");
            } else {
                printErrorMsg(data.error);
            }
        },
    });

    function printErrorMsg(msg) {
        $.each(msg, function (key, value) {
            console.log(key);
            $("." + key + "_error").text(value);
        });
    }
});
