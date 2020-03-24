<?php
/**
 * Zen
 *
 * This file enqueues assets.
 *
 * @package Zen
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/zen.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Enqueue assets */
add_action(
	'wp_enqueue_scripts',
	function () {

		/* Access the wpackio global var */
		global $zen_assets;

		/* Locate the config file */
		$appearance = genesis_get_config( 'appearance' );

		/* Google Fonts */
		wp_enqueue_style(
			genesis_get_theme_handle() . '-fonts',
			$appearance['fonts-url'],
			[],
			genesis_get_theme_version()
		);

		/* Ionicons icons */
		wp_enqueue_script(
			genesis_get_theme_handle() . '-ionicons',
			$appearance['ionicons'],
			[],
			genesis_get_theme_version(),
			true
		);

		/* Dashicons icons */
		wp_enqueue_style(
			'dashicons'
		);

		/* Theme styles and scripts */
		$zen_assets->enqueue(
			'theme',
			'main',
			[]
		);

		/* Blocks animation */
		$zen_assets->enqueue(
			'theme',
			'blocksanimation',
			[
				'css' => false,
			]
		);

		/* Floating header scripts */
		if ( 'floating-header' === get_theme_mod( 'zen_header_options', false ) ) {

			$zen_assets->enqueue(
				'theme',
				'floatingHeader',
				[
					'css' => false,
				]
			);

		}

		/* Comment reply js */
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
