$(window).on('scroll', function () {
    if ($(this).scrollTop() > 600) {
        $('#searchBar').addClass('sticky');
    } else {
        $('#searchBar').removeClass('sticky');

    }
});

var scrollLink = $('#searchBar ul.nav a[href^="#"]');

// Smooth scrolling
scrollLink.click(function (e) {
    e.preventDefault();
    $('body,html').animate({
        scrollTop: $(this.hash).offset().top - 140
    }, 500);
});


// Active link switching
$(window).scroll(function () {
    var scrollbarLocation = $(this).scrollTop();
    scrollLink.each(function () {

        var sectionOffset = $(this.hash).offset().top - 180;

        if (sectionOffset <= scrollbarLocation) {
            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
        }
    });
});



