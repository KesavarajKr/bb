AOS.init(); // AOS Initialze

$(window).load(function () {
    $(".preloader").fadeOut("300");
});

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

$(document).ready(function () {
    document.getElementById("example") &&
        $("#example thead tr")
            .clone(true)
            .addClass("filters")
            .prependTo("#example thead");

    document.getElementById("example") &&
        $("#example").DataTable({
            dom: "Bfrtip",
            buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
            aaSorting: [],
            orderCellsTop: true,
            fixedHeader: true,
            initComplete: function () {
                const api = this.api();

                // For each column
                api.columns()
                    .eq(0)
                    .each(function (colIdx) {
                        // Set the header cell to contain the input element
                        const cell = $(".filters th").eq(
                            $(api.column(colIdx).header()).index()
                        );
                        const title = $(cell).text();
                        $(cell).html(
                            '<input type="text" placeholder="Search By ' +
                                title +
                                ' ..." />'
                        );
                        // On every keypress in this input
                        $(
                            "input",
                            $(".filters th").eq(
                                $(api.column(colIdx).header()).index()
                            )
                        )
                            .off("keyup change")
                            .on("change", function (e) {
                                // Get the search value
                                $(this).attr("title", $(this).val());
                                var regexr = "({search})"; //$(this).parents('th').find('select').val();

                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api.column(colIdx)
                                    .search(
                                        this.value != ""
                                            ? regexr.replace(
                                                  "{search}",
                                                  "(((" + this.value + ")))"
                                              )
                                            : "",
                                        this.value != "",
                                        this.value == ""
                                    )
                                    .draw();
                            })
                            .on("keyup", function (e) {
                                e.stopPropagation();

                                $(this).trigger("change");
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(
                                        cursorPosition,
                                        cursorPosition
                                    );
                            });
                    });
            },
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
