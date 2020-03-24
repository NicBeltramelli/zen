<?php
/**
 * Zen
 *
 * This file adds the functions for displaying error messages.
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
 * Helper function for prettying up errors
 *
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$zen_error = function ( $message, $zen_subtitle = '', $title = '' ) {

	$docs_url = 'https://github.com/NicBeltramelli/zen.git/';

	$title = $title ?: esc_html__(
		'Zen &rsaquo; Error',
		'zen'
	);

	$footer = sprintf(
		'<a href="%s">%s</a>',
		esc_url( $docs_url ),
		esc_html__(
			'Zen Documentation',
			'zen'
		)
	);

	$message = "<h1>{$title}<br><small>{$zen_subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";

	wp_die( $message ); // WPCS: xss ok.
};

/**
 * Ensure compatible version of PHP is used
 */
if ( version_compare( '7.1', phpversion(), '>=' ) ) {

	$zen_error(
		esc_html__(
			'You must be using PHP 7.1 or greater.',
			'zen'
		),
		esc_html__(
			'Invalid PHP version',
			'zen'
		)
	);
}

/**
 * Ensure compatible version of WordPress is used
 */
if ( version_compare( '5.0', get_bloginfo( 'version' ), '>=' ) ) {

	$zen_error(
		esc_html__(
			'You must be using WordPress 5.0 or greater.',
			'zen'
		),
		esc_html__(
			'Invalid WordPress version',
			'zen'
		)
	);
}

/**
 * Ensure Genesis Framework is installed
 */
$zen_parent_theme = wp_get_theme( 'genesis' );

if ( ! $zen_parent_theme->exists() ) {

	$zen_error(
		esc_html__(
			'You must install Genesis Framework.',
			'zen'
		),
		esc_html__(
			'Missing Genesis Framework',
			'zen'
		)
	);
}
