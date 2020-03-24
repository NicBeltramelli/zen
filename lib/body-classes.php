<?php
/**
 * Zen
 *
 * This file adds body classes to the body tag.
 *
 * @package Zen
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/zen.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add consistent classes to the body tag
 *
 * @param  array $classes Body classes.
 * @return array
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

		if ( 'fixed-header' === get_theme_mod( 'zen_header_options', false ) ) {
			$classes[] = 'has-fixed-header';
		}

		if ( 'floating-header' === get_theme_mod( 'zen_header_options', false ) ) {
			$classes[] = 'has-floating-header';
		}

		if ( is_singular( [ 'post', 'page' ] ) &&
			has_post_thumbnail() ) {
			$classes[] = 'has-featured-image';
		}

		if ( ! is_singular() ||
			! function_exists( 'has_blocks' ) ||
			! function_exists( 'parse_blocks' ) ) {
			return $classes;
		}

		$post_object = get_post( get_the_ID() );
		$blocks      = (array) parse_blocks( $post_object->post_content );

		if ( isset( $blocks[0]['blockName'] ) ) {
			$classes[] = 'first-block-' . str_replace( '/', '-', $blocks[0]['blockName'] );
		}

		if ( isset( $blocks[0]['attrs']['align'] ) ) {
			$classes[] = 'first-block-align-' . $blocks[0]['attrs']['align'];
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
