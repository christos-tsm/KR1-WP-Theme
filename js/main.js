(function ($) {
	$(document).ready(function () {
		/** Homepage hero section video */
		$('#play-video').on('click', function () {
			$('.hero-section__video').addClass('active');
		});
		$('#close-video').on('click', function () {
			$('.hero-section__video').removeClass('active');
		});
	});
})(jQuery)