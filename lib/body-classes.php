<?php
/**
 * Genesis Advanced
 *
 * This file adds body classes to the body tag.
 *
 * @package Genesis Advanced
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/genesis-advanced.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add consistent classes to the body tag
 *
 * @param  array $classes Body classes.
 *
 * @return array
 *
 * @since 3.0.0
 */
add_filter(
	'body_class',
	function ( $classes ) {

		if ( is_home() ) {
			$classes[] = 'page-blog';
		}

		if ( is_front_page() ) {
			$classes[] = 'page-front';
		}

		if ( is_archive() ) {
			$classes[] = 'page-archive';
		}

		if ( is_category() ) {
			$classes[] = 'page-category';
		}

		if ( is_tag() ) {
			$classes[] = 'page-tag';
		}

		if ( is_search() ) {
			$classes[] = 'page-search';
		}

		if ( is_page_template() && get_page_template_slug() !== false ) {

			$template       = basename( get_page_template_slug() );
			$template_class = str_replace( '.php', '', $template );
			$classes[]      = $template_class;
		}

		return $classes;
	}
);

/**
 * Echo out the script that changes 'no-js' class to 'js'
 *
 * Adds a no-js body class to the front end, and a script on the genesis_before
 * hook which immediately changes the class to js if JavaScript is enabled.
 * This is how WP does things on the back end, to allow different styles
 * for the same elements depending if JavaScript is active or not.
 *
 * Outputting the script immediately also reduces a flash of incorrectly styled
 * content, as the page does not load with no-js styles, then switch to js
 * once everything has finished loading.
 *
 * @since  3.0.0
 *
 * @return void
 */
add_action(
	'genesis_before',
	function () {

		?>
	<script>
	//<![CDATA[
	(function(){
		var c = document.body.classList;
		c.remove( 'no-js' );
		c.add( 'js' );
	})();
	//]]>
	</script>
		<?php

	},
	1
);
