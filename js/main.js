jQuery(document).ready(function($) {
	

	var resizeTimer;
	$(window).on('resize', function(e) {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function() {
			if (($(window).width() > 550)) {
				$('.menu').show('slow');
			}
		});
	});

	function toggleMenu() {
		if (($('.menu').is(':visible'))) {
			$('.menu').slideToggle('slow');
		} else {
			$('.menu').slideToggle('slow');
		}
	}

	$('.burguer').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		toggleMenu();
	});
	
});