(function ($) {
    $(document).ready(function () {
        /** Header Scroll */
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll >= 500) {
                $(".site-header").addClass("site-header--black");
            } else {
                if ($('body').hasClass('page-template-homepage')) {
                    $(".site-header").removeClass("site-header--black");
                }
            }
        });
        /** Homepage hero section video */
        $('#play-video').on('click', function () {
            $('.hero-section__video').addClass('active');
            $('body').css('overflow', 'hidden');
        });
        $('#close-video').on('click', function () {
            $('.hero-section__video').removeClass('active');
            $('body').css('overflow', 'visible');
        });
        /** Sliders */
        $('.home-works__slider').slick({
            infinite: true,
            slidesToShow: 3,
            autoplay: true,
            dots: true,
            nextArrow: $('.works-slider-arrow--next'),
            prevArrow: $('.works-slider-arrow--next')
        });
        /** Back to top */
        $('#back-to-top').click(function () {
            $('html, body').animate({scrollTop: 0}, 'slow');
            return false;
        });
        /** Form Placeholders */
        $('.form-row-input input:not([type="checkbox"]), .form-row-input textarea').on('focus', function () {
            let placeholder = $(this).parent().parent().find('label');
            placeholder.addClass('placeholder--active');
        });
        $('.form-row-input input:not([type="checkbox"]), .form-row-input textarea').on('blur', function () {
            let placeholder = $(this).parent().parent().find('label');
            if ($(this).val() === '') {
                placeholder.removeClass('placeholder--active');
            }
        });
        /** Interest form hidden input */
        if ($('input[name="interest-for"]').length) {
            var $title = $('.interest-form').attr('data-name');
            if ($title && $title !== '') {
                $('input[name="interest-for"]').text($title);
                $('input[name="interest-for"]').val($title);
            }
        }
        /** Reveal text @ single-projects.php */
        $('#reveal-text').on('click', function (e) {
            e.preventDefault();
            $(this).text() === 'MORE +' ? $(this).text('LESS -') : $(this).text('MORE +');
            $('.single-projects__details-rest-text').slideToggle();
        });
    });
})(jQuery)
