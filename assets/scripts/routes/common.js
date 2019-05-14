export default {
	init() {
		// JavaScript to be fired on all pages
	},
	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired

		// Prevent body from scrolling when responsive menu is opened
		if ($(window).width() < 900){

			$( ".menu-toggle" ).click(function(){

				if ($( "body" ).hasClass("no-scroll")) {
					$( "body" ).removeClass( "no-scroll" );
				} else {
					$( "body" ).addClass( "no-scroll" );
				}
			})
		}
	},
};
