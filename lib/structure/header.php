<?php
/**
 * Zen
 *
 * This file adds the header setting.
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
 * Remove the link from the hidden site title if a custom logo is in use
 *
 * Without this filter, the site title is hidden with CSS when a custom logo
 * is in use, but the link it contains is still accessible by keyboard.
 *
 * @param string $title  The full title.
 * @param string $inside The content inside the title element.
 * @param string $wrap   The wrapping element name, such as h1.
 * @return string The site title with anchor removed if a custom logo is active.
 */
add_filter(
	'genesis_seo_title',
	function ( $title, $inside, $wrap ) {

		if ( has_custom_logo() ) {
			$inside = get_bloginfo( 'name' );
		}

		return sprintf( '<%1$s class="site-title">%2$s</%1$s>', $wrap, $inside );
	},
	10,
	3
);

/* Display custom logo */
add_action(
	'genesis_site_title',
	'the_custom_logo',
	0
);
