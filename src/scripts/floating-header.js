/* Floating header JS */

// Import headroom.js
import 'headroom.js/dist/headroom.min';
import 'headroom.js/dist/jQuery.headroom.min';

import $ from 'jquery';

import Headroom from 'headroom.js';

// Grab the element
const header = document.querySelector(".site-header");

// Construct an instance of Headroom, passing the element
const headroom  = new Headroom(header, {
	"offset": 60,
	"tolerance": 5,
	"classes": {
		"pinned": "slideInDown",
		"unpinned": "slideOutUp",
		// when above offset
		"top" : "header-top",
		// when below offset
		"notTop" : "header-not-top",
		// when at bottom of scoll area
		"bottom" : "header-bottom",
		// when not at bottom of scroll area
		"notBottom" : "header-not-bottom",
	},
});

if ($(window).width() > 900){
	$( ".site-header" ).addClass( "animated" );
	headroom.init();
}
