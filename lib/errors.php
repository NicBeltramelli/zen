<?php
/**
 * Genesis Advanced
 *
 * This file adds the functions for displaying error messages.
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
 * Helper function for prettying up errors
 *
 * @since 3.0.0
 *
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$genesis_advanced_error = function ( $message, $genesis_advanced_subtitle = '', $title = '' ) {

	$docs_url = 'https://thematicpress.com/genesis-advanced/docs';

	$title = $title ?: esc_html__(
		'Genesis Advanced &rsaquo; Error',
		'genesis-advanced'
	);

	$footer = sprintf(
		'<a href="%s">%s</a>',
		esc_url( $docs_url ),
		esc_html__(
			'Genesis Advanced Documentation',
			'genesis-advanced'
		)
	);

	$message = "<h1>{$title}<br><small>{$genesis_advanced_subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";

	wp_die( $message ); // WPCS: xss ok.
};

/**
 * Ensure compatible version of PHP is used
 */
if ( version_compare( '5.4', phpversion(), '>=' ) ) {

	$genesis_advanced_error(
		esc_html__(
			'You must be using PHP 5.4 or greater.',
			'genesis-advanced'
		),
		esc_html__(
			'Invalid PHP version',
			'genesis-advanced'
		)
	);
}

/**
 * Ensure compatible version of WordPress is used
 */
if ( version_compare( '4.7.0', get_bloginfo( 'version' ), '>=' ) ) {

	$genesis_advanced_error(
		esc_html__(
			'You must be using WordPress 4.7.0 or greater.',
			'genesis-advanced'
		),
		esc_html__(
			'Invalid WordPress version',
			'genesis-advanced'
		)
	);
}

/**
 * Ensure Genesis Framework is installed
 */
$genesis_advanced_parent_theme = wp_get_theme( 'genesis' );

if ( ! $genesis_advanced_parent_theme->exists() ) {

	$genesis_advanced_error(
		esc_html__(
			'You must install Genesis Framework.',
			'genesis-advanced'
		),
		esc_html__(
			'Missing Genesis Framework',
			'genesis-advanced'
		)
	);
}
