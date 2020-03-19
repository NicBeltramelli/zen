/* Primary JS entry point */

// CSS
import './../styles/main.scss';
import './../styles/animate.scss';

// JS
import $ from 'jquery';

// Scroll to target function.
$('a[href*="#"]') // Select all links with hashes
.not('[href="#"]') // Remove links that don't actually link to anything
.not('[href="#0"]')
.not('[href*="#tab-"]') // Remove WooCommerce tabs
.click(function() {

	if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

		var target = $(this.hash);
		target = target.length ? target : $( '[name=' + this.hash.slice(1) + ']' );

		if (target.length) {

			$( 'html,body' ).animate({
				scrollTop: target.offset().top - 20,
			}, {
				duration: 750,
				complete: function() {
					target.focus();
				},
			});

		return false;

		}
	}

});
