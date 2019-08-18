<?php
/**
 * Genesis Advanced
 *
 * This file adds support for Gutenberg blocks.
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
 * @since 3.3.0
 */
add_action(
	'enqueue_block_editor_assets',
	function () {

		/* Locate the config file */
		$appearance = genesis_get_config( 'appearance' );

		/* Enqueue Google Fonts */
		wp_enqueue_style(
			genesis_get_theme_handle() . '-editor-fonts',
			$appearance['fonts-url'],
			[],
			genesis_get_theme_version()
		);

		/* Enqueue editor style */
		wp_enqueue_style(
			genesis_get_theme_handle() . '-editor-style',
			genesis_advanced_asset_path( 'styles/editor.css' ),
			[],
			genesis_get_theme_version()
		);

		/* Enqueue blocks script */
		wp_enqueue_script(
			genesis_get_theme_handle() . '-blocks-scripts',
			genesis_advanced_asset_path( 'scripts/blocks.js' ),
			[ 'wp-blocks', 'wp-dom' ],
			genesis_get_theme_version(),
			true
		);

		/* Output link color inline css */
		$color_link = get_theme_mod( 'genesis_advanced_link_color', $appearance['default-colors']['link'] );

		$css = '';

		$css .= ( $appearance['default-colors']['link'] !== $color_link ) ? sprintf(
			'
			.editor-styles-wrapper a,
			.editor-styles-wrapper a:focus,
			.editor-styles-wrapper a:focus {
				color: %s;
			}
			',
			$color_link
		) : '';

		if ( $css ) {
			wp_add_inline_style(
				genesis_get_theme_handle() . '-editor-style',
				$css
			);
		}
	}
);

/**
 * Add support for editor styles
 *
 * @since 3.3.0
 */
add_theme_support(
	'editor-styles'
);

/**
 * Locate the config file
 *
 * @since 3.4.0
 */
$genesis_advanced_appearance = genesis_get_config( 'appearance' );

/**
 * Add support for editor color palette
 *
 * @since 3.3.0
 */
add_theme_support(
	'editor-color-palette',
	$genesis_advanced_appearance['editor-color-palette']
);

/**
 * Disable Custom Colors
 *
 * @since 3.3.0
 */
add_theme_support(
	'disable-custom-colors'
);

/**
 * Add support for block alignments
 *
 * @since 3.3.0
 */
add_theme_support(
	'align-wide'
);

/**
 * Add support for Responsive Embeds
 *
 * @since 3.3.0
 */
add_theme_support(
	'responsive-embeds'
);

/**
 * Add support for Editor Text Size Palette
 *
 * @since 3.3.0
 */
add_theme_support(
	'editor-font-sizes',
	$genesis_advanced_appearance['editor-font-sizes']
);

/**
 * Disable custom font sizes
 *
 * @since 3.3.0
 */
add_theme_support(
	'disable-custom-font-sizes'
);
