<?php
/**
 * Genesis Advanced
 *
 * This file sets localization, defines constants and features.
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
 * Set localization (do not remove)
 *
 * @since 3.0.0
 */
add_action(
	'after_setup_theme',
	function () {

		load_child_theme_textdomain( 'genesis-advanced', get_stylesheet_directory() . '/languages' );

	}
);

/**
 * Add theme supports
 *
 * @since 3.4.0
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
	'genesis_advanced_content_width',
	0
);

/**
 * Set the maximum allowed width for any embedded content
 *
 * @since 3.4.0
 */
function genesis_advanced_content_width() {

	/* Locate the config file */
	$appearance = genesis_get_config( 'appearance' );

	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- See https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/924
	$GLOBALS['content_width'] = apply_filters( 'genesis_advanced_content_width', $appearance['content-width'] );

}
