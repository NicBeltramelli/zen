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

/* Add support for HTML5 markup structure */
add_theme_support(
	'html5',
	[
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
	]
);

/* Add support for accessibility */
add_theme_support(
	'genesis-accessibility',
	[
		'404-page',
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links',
	]
);

/* Add viewport meta tag for mobile browsers */
add_theme_support(
	'genesis-responsive-viewport'
);

/**
 * Add custom logo in Customizer > Site Identity
 *
 * @since 3.3.0
 */
add_theme_support(
	'custom-logo',
	[
		'height'      => 120,
		'width'       => 500,
		'flex-height' => true,
		'flex-width'  => true,
	]
);

/* Rename primary and secondary navigation menus */
add_theme_support(
	'genesis-menus',
	[
		'primary'   => __( 'Header Menu', 'genesis-advanced' ),
		'secondary' => __( 'Footer Menu', 'genesis-advanced' ),
	]
);

/* Add support for after entry widget */
add_theme_support(
	'genesis-after-entry-widget-area'
);

/* Add support for 3-column footer widgets */
add_theme_support(
	'genesis-footer-widgets',
	3
);

/* Remove header right widget area */
unregister_sidebar(
	'header-right'
);

/* Remove secondary sidebar */
unregister_sidebar(
	'sidebar-alt'
);
