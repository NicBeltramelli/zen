<?php
/**
 * Space
 *
 * This file adds the functions for displaying error messages.
 *
 * @package Space
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/space.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Helper function for prettying up errors
 *
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$space_error = function ( $message, $space_subtitle = '', $title = '' ) {

	$docs_url = 'https://thematicpress.com/space/docs';

	$title = $title ?: esc_html__(
		'Space &rsaquo; Error',
		'space'
	);

	$footer = sprintf(
		'<a href="%s">%s</a>',
		esc_url( $docs_url ),
		esc_html__(
			'Space Documentation',
			'space'
		)
	);

	$message = "<h1>{$title}<br><small>{$space_subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";

	wp_die( $message ); // WPCS: xss ok.
};

/**
 * Ensure compatible version of PHP is used
 */
if ( version_compare( '7.1', phpversion(), '>=' ) ) {

	$space_error(
		esc_html__(
			'You must be using PHP 7.1 or greater.',
			'space'
		),
		esc_html__(
			'Invalid PHP version',
			'space'
		)
	);
}

/**
 * Ensure compatible version of WordPress is used
 */
if ( version_compare( '4.7.0', get_bloginfo( 'version' ), '>=' ) ) {

	$space_error(
		esc_html__(
			'You must be using WordPress 4.7.0 or greater.',
			'space'
		),
		esc_html__(
			'Invalid WordPress version',
			'space'
		)
	);
}

/**
 * Ensure Genesis Framework is installed
 */
$space_parent_theme = wp_get_theme( 'genesis' );

if ( ! $space_parent_theme->exists() ) {

	$space_error(
		esc_html__(
			'You must install Genesis Framework.',
			'space'
		),
		esc_html__(
			'Missing Genesis Framework',
			'space'
		)
	);
}
