<?php
/**
 * Space
 *
 * This file adds support for Gutenberg blocks.
 *
 * @package Space
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/space.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Enqueue assets */
add_action(
	'enqueue_block_editor_assets',
	function () {

		/* Access the wpackio global var */
		global $space_assets;

		/* Locate the config file */
		$appearance = genesis_get_config( 'appearance' );

		/* Enqueue Google Fonts */
		wp_enqueue_style(
			genesis_get_theme_handle() . '-editor-fonts',
			$appearance['fonts-url'],
			[],
			genesis_get_theme_version()
		);

		/* Blocks styles and scripts */
		$space_assets->enqueue( 'theme', 'blocks', [] );

		/* Output link color inline css */
		$color_link = get_theme_mod( 'space_link_color', $appearance['default-colors']['link'] );

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

/* Add support for editor styles */
add_theme_support(
	'editor-styles'
);

/* Locate the config file */
$space_appearance = genesis_get_config( 'appearance' );

/* Add support for editor color palette */
add_theme_support(
	'editor-color-palette',
	$space_appearance['editor-color-palette']
);

/* Disable Custom Colors */
add_theme_support(
	'disable-custom-colors'
);

/* Add support for block alignments */
add_theme_support(
	'align-wide'
);

/* Add support for Responsive Embeds */
add_theme_support(
	'responsive-embeds'
);

/* Disable custom font sizes */
add_theme_support(
	'disable-custom-font-sizes'
);
