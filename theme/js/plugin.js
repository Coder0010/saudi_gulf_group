
// window.location.href.substr(0, window.location.href.indexOf('#'))

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > 200) {
        $('.navbar').addClass('fixed');
        $('.up-to-top').fadeIn();
    } else {
        $('.navbar').removeClass('fixed');
        $('.up-to-top').fadeOut();
    }
});

$('.service-carousel').owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
    items: 1,
    autoplay: false,
    autoplayTimeout: 4000,
    autoplayHoverPause: true
})


$('.portfolio-carousel').owlCarousel({
    center: true,
    items: 5,
    loop: true,
    margin: 10,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 3,
        },
        1000: {
            items: 4,
        }
    }
});


$('.portfolio-item-carousel').owlCarousel({
    center: true,
    items: 3,
    loop: true,
    margin: 10,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },

    }
});

$('.clients-carousel').owlCarousel({
    center: true,
    loop: true,
    margin: 10,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 4,
        },
        1000: {
            items: 7,
        },

    }
});

$('.menu, .overlay').click(function () {
    $('.menu').toggleClass('clicked');

    $('#nav').toggleClass('show');

});

$("a[href='#top']").click(function () {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
});

AOS.init();

$(document).on('click', '[data-toggle="lightbox"]', function (event) {
    event.preventDefault();
    // $(this).ekkoLightbox();
    $(this).ekkoLightbox({
        wrapping: false
    });
});
