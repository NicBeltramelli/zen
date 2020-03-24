<?php
/**
 * Zen
 *
 * This file sets localization, defines constants and features.
 *
 * @package Zen
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/zen.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Set localization */
add_action(
	'after_setup_theme',
	function () {

		load_child_theme_textdomain( 'zen', get_stylesheet_directory() . '/languages' );

	}
);

/**
 * Add theme supports
 *
 * See config file at `config/theme-supports.php`.
 */
add_action(
	'after_setup_theme',
	function () {

		$theme_supports = genesis_get_config( 'theme-supports' );
		foreach ( $theme_supports as $feature => $args ) {
			add_theme_support( $feature, $args );
		}
	},
	9
);

add_action(
	'after_setup_theme',
	'zen_content_width',
	0
);

/**
 * Set the maximum allowed width for any embedded content
 */
function zen_content_width() {

	/* Locate the config file */
	$appearance = genesis_get_config( 'appearance' );

	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- See https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/924
	$GLOBALS['content_width'] = apply_filters( 'zen_content_width', $appearance['content-width'] );

}
