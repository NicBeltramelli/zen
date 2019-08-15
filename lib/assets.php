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
 * @since 3.0.0
 */
add_action(
	'wp_enqueue_scripts',
	function () {

		/* Enqueue Google Fonts */
		wp_enqueue_style(
			genesis_get_theme_handle() . '-fonts',
			'//fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,700|Roboto+Mono',
			[],
			genesis_get_theme_version()
		);

		/* Enqueue Dashicons */
		wp_enqueue_style(
			'dashicons'
		);

		/* Enqueue main style */
		wp_enqueue_style(
			genesis_get_theme_handle() . '-styles',
			genesis_advanced_asset_path( 'styles/main.css' ),
			[],
			genesis_get_theme_version()
		);

		/* Enqueue main script */
		wp_enqueue_script(
			genesis_get_theme_handle() . '-scripts',
			genesis_advanced_asset_path( 'scripts/main.js' ),
			[ 'jquery' ],
			genesis_get_theme_version(),
			true
		);

		/* Enqueue comment reply js */
		if (
		is_single() &&
		comments_open() &&
		get_option( 'thread_comments' ) ) {

			wp_enqueue_script(
				'comment-reply'
			);
		}

	},
	99
);
