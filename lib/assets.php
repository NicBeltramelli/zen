<?php
/**
 * Genesis Advanced
 *
 * This file enqueues assets.
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
 * Enqueue assets
 *
 * @since 3.2.2
 */
add_action(
	'wp_enqueue_scripts', function () {

		/* Enqueue Google Fonts */
		wp_enqueue_style(
			'genesis-advanced-fonts',
			'//fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,700|Roboto+Mono',
			[],
			CHILD_THEME_VERSION
		);

		/* Enqueue Dashicons */
		wp_enqueue_style( 'dashicons' );

		/* Enqueue main style */
		wp_enqueue_style(
			'genesis-advanced-styles',
			genesis_advanced_asset_path( 'styles/main.css' ),
			[],
			CHILD_THEME_VERSION
		);

		/* Enqueue main script */
		wp_enqueue_script(
			'genesis-advanced-scripts',
			genesis_advanced_asset_path( 'scripts/main.js' ),
			[ 'jquery' ],
			CHILD_THEME_VERSION,
			true
		);

		/* Enqueue comment reply js */
		if (
		is_single() &&
		comments_open() &&
		get_option( 'thread_comments' ) ) {

			wp_enqueue_script( 'comment-reply' );
		}

		/* Localize Genesis Responsive Menu */
		wp_localize_script(
			'genesis-advanced-scripts',
			'genesis_responsive_menu',
			genesis_advanced_responsive_menu_settings()
		);

	}, 99
);
