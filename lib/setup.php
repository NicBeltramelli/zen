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

/* Define child theme constants (do not remove) */
define( 'CHILD_THEME_NAME', 'Genesis Advanced' );
define( 'CHILD_THEME_URL', 'https://thematicpress.com/genesis-advanced/' );
define( 'CHILD_THEME_VERSION', filemtime( get_stylesheet_directory() . '/style.css' ) );

/* Set the content width based on the theme's design and stylesheet */
if ( ! isset( $content_width ) ) {
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$content_width = 702; // Pixels.
}

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

/* Add custom logo in Customizer > Site Identity */
add_theme_support(
	'custom-logo',
	[
		'height'      => 67.5,
		'width'       => 350,
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

/**
 * Add support for Gutenberg editor color palette
 *
 * @since 3.1.0
 */
add_theme_support(
	'editor-color-palette',
	[
		[
			'name'  => __( 'Accent', 'genesis-advanced' ),
			'slug'  => 'accent',
			'color' => get_theme_mod( 'genesis_advanced_accent_color', genesis_advanced_customizer_get_default_accent_color() ),
		],
		[
			'name'  => __( 'Light Soft', 'genesis-advanced' ),
			'slug'  => 'light-soft',
			'color' => '#ffffff',
		],
		[
			'name'  => __( 'Light', 'genesis-advanced' ),
			'slug'  => 'light',
			'color' => '#f4f4f4',
		],
		[
			'name'  => __( 'Light Strong', 'genesis-advanced' ),
			'slug'  => 'light-strong',
			'color' => '#cecece',
		],
		[
			'name'  => __( 'Dark Soft', 'genesis-advanced' ),
			'slug'  => 'dark-soft',
			'color' => '#414141',
		],
		[
			'name'  => __( 'Dark', 'genesis-advanced' ),
			'slug'  => 'dark',
			'color' => '#1b1b1b',
		],
		[
			'name'  => __( 'Dark Strong', 'genesis-advanced' ),
			'slug'  => 'dark-strong',
			'color' => '#000000',
		],
		[
			'name'  => __( 'Info Soft', 'genesis-advanced' ),
			'slug'  => 'info-soft',
			'color' => '#3399ff',
		],
		[
			'name'  => __( 'Info', 'genesis-advanced' ),
			'slug'  => 'info',
			'color' => '#0073e5',
		],
		[
			'name'  => __( 'Info Strong', 'genesis-advanced' ),
			'slug'  => 'info-strong',
			'color' => '#004d99',
		],
		[
			'name'  => __( 'Danger Soft', 'genesis-advanced' ),
			'slug'  => 'danger-soft',
			'color' => '#f36c87',
		],
		[
			'name'  => __( 'Danger', 'genesis-advanced' ),
			'slug'  => 'danger',
			'color' => '#ed254e',
		],
		[
			'name'  => __( 'Danger Strong', 'genesis-advanced' ),
			'slug'  => 'danger-strong',
			'color' => '#b60f31',
		],
		[
			'name'  => __( 'Success Soft', 'genesis-advanced' ),
			'slug'  => 'success-soft',
			'color' => '#00f5af',
		],
		[
			'name'  => __( 'Success', 'genesis-advanced' ),
			'slug'  => 'success',
			'color' => '#00a878',
		],
		[
			'name'  => __( 'Success Strong', 'genesis-advanced' ),
			'slug'  => 'success-strong',
			'color' => '#005c41',
		],
		[
			'name'  => __( 'Warning Soft', 'genesis-advanced' ),
			'slug'  => 'warning-soft',
			'color' => '#f68a6d',
		],
		[
			'name'  => __( 'Warning', 'genesis-advanced' ),
			'slug'  => 'warning',
			'color' => '#f15025',
		],
		[
			'name'  => __( 'Warning Strong', 'genesis-advanced' ),
			'slug'  => 'warning-strong',
			'color' => '#bd320c',
		],
		[
			'name'  => __( 'Star Soft', 'genesis-advanced' ),
			'slug'  => 'star-soft',
			'color' => '#f7ff96',
		],
		[
			'name'  => __( 'Star', 'genesis-advanced' ),
			'slug'  => 'star',
			'color' => '#f2ff49',
		],
		[
			'name'  => __( 'Star Strong', 'genesis-advanced' ),
			'slug'  => 'star-strong',
			'color' => '#eafc00',
		],
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
