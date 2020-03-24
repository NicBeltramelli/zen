<?php
/**
 * Zen
 *
 * Template Name: Privacy Page
 *
 * @package Zen
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/zen.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

/* Display privacy sidebar menu */
add_action(
	'genesis_sidebar',
	function() {

		genesis_widget_area( 'privacy',
			[
				'before' => '<div id="privacy" class="privacy" tabindex="-1"><div class="widget-area">',
				'after'  => '</div></div>',
			]
		);
	}
);

/* Run the Genesis loop */
genesis();
