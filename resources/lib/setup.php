<?php
/**
 * Genesis Advanced
 *
 * This file sets localization, defines constants and features.
 *
 * @package Genesis Advanced
 * @author  NicBeltramelli
 * @license GPL-2.0+
 * @link    https://github.com/NicBeltramelli/genesis-advanced.git
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Set localization (do not remove)
 *
 * @since 1.0.0
 */
add_action(
	'after_setup_theme', function () {

		load_child_theme_textdomain( CHILD_THEME_TEXT_DOMAIN, get_stylesheet_directory() . '/languages' );
	}
);

// Define child theme constants (do not remove).
define( 'CHILD_THEME_NAME', 'Genesis Advanced' );
define( 'CHILD_THEME_URL', 'https://thematicpress.com/genesis-advanced/' );
define( 'CHILD_THEME_VERSION', filemtime( get_stylesheet_directory() . '/style.css' ) );
define( 'CHILD_THEME_TEXT_DOMAIN', 'genesis-advanced' );

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$content_width = 702; // Pixels.
}

// Add support for HTML5 markup structure.
add_theme_support(
	'html5', array(
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
	)
);

// Add support for accessibility.
add_theme_support(
	'genesis-accessibility', array(
		'404-page',
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links',
	)
);

// Add viewport meta tag for mobile browsers.
add_theme_support(
	'genesis-responsive-viewport'
);

// Add custom logo in Customizer > Site Identity.
add_theme_support(
	'custom-logo', array(
		'height'      => 120,
		'width'       => 700,
		'flex-height' => true,
		'flex-width'  => true,
	)
);

// Rename primary and secondary navigation menus.
add_theme_support(
	'genesis-menus', array(
		'primary'   => __( 'Header Menu', 'genesis-advanced' ),
		'secondary' => __( 'Footer Menu', 'genesis-advanced' ),
	)
);

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Remove header right widget area.
unregister_sidebar( 'header-right' );

// Remove secondary sidebar.
unregister_sidebar( 'sidebar-alt' );
