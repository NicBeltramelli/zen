<?php
/**
 * Genesis Advanced
 *
 * This file adds the body classes.
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
	'body_class', function ( $classes ) {

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
