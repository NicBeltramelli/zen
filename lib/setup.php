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
 * Add theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 3.4.0
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

/* Remove header right widget area */
unregister_sidebar(
	'header-right'
);

/* Remove secondary sidebar */
unregister_sidebar(
	'sidebar-alt'
);
