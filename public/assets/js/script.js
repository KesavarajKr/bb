AOS.init(); // AOS Initialze


// Sliders

$('.content-slider').slick({
    dots: true,
    infinite: true,
    autoplaySpeed: 2000,
    cssEase: 'ease-in',
    autoplay: true,
    arrows: false
});

$('.radius_shape_slider').slick({
    infinite: true,
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});


// Password Shown

$(document).on("click", ".eye", function() {
    if ($('.eye i').hasClass("far fa-eye-slash")) {
        $('.eye i').removeClass("far fa-eye-slash");
        $('.eye i').addClass("far fa-eye");
        $(".login_password").attr("type", "text");
    } else {
        $('.eye i').removeClass("far fa-eye");
        $('.eye i').addClass("far fa-eye-slash");
        $(".login_password").attr("type", "password");

    }
});

// Append fields

$(document).on("click", ".plus", function() {
    var html = '<div class="row extra_fields position-relative mt-3"><div class="col-lg-6"><div class="form-input"><label for="">Name</label><span class="text-danger">*</span><br><input type="text" name="name"></div></div><div class="col-lg-6"><div class="form-input"><label for="">Code</label><span class="text-danger">*</span><br><input type="text" name="code"></div></div><div class="plus"><i class="fas fa-plus"></i></div><div class="remove_row"><i class="fas fa-times"></i></div></div>';

    $(".field_groups").append(html);
});

$(document).on("click", ".remove_row", function() {
    $(this).closest(".row").remove();
});
