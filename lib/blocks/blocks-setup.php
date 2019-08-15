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
 * @since 3.4.0
 */
add_action(
	'enqueue_block_editor_assets',
	function () {

		/* Enqueue Google Fonts */
		wp_enqueue_style(
			genesis_get_theme_handle() . '-editor-fonts',
			'//fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,700|Roboto+Mono',
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
		$color_link = get_theme_mod( 'genesis_advanced_link_color', genesis_advanced_customizer_get_default_link_color() );

		$css = '';

		$css .= ( genesis_advanced_customizer_get_default_link_color() !== $color_link ) ? sprintf(
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
 * Add support for editor color palette
 *
 * @since 3.3.0
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
			'name'  => __( 'White', 'genesis-advanced' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		],
		[
			'name'  => __( 'Light', 'genesis-advanced' ),
			'slug'  => 'light',
			'color' => '#f4f4f4',
		],
		[
			'name'  => __( 'Grey', 'genesis-advanced' ),
			'slug'  => 'grey',
			'color' => '#cecece',
		],
		[
			'name'  => __( 'Dark', 'genesis-advanced' ),
			'slug'  => 'dark',
			'color' => '#414141',
		],
		[
			'name'  => __( 'Black', 'genesis-advanced' ),
			'slug'  => 'black',
			'color' => '#1b1b1b',
		],
		[
			'name'  => __( 'Info', 'genesis-advanced' ),
			'slug'  => 'info',
			'color' => '#0073e5',
		],
		[
			'name'  => __( 'Danger', 'genesis-advanced' ),
			'slug'  => 'danger',
			'color' => '#ed254e',
		],
		[
			'name'  => __( 'Success', 'genesis-advanced' ),
			'slug'  => 'success',
			'color' => '#00a878',
		],
		[
			'name'  => __( 'Warning', 'genesis-advanced' ),
			'slug'  => 'warning',
			'color' => '#f15025',
		],
		[
			'name'  => __( 'Star', 'genesis-advanced' ),
			'slug'  => 'star',
			'color' => '#f2ff49',
		],
	]
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
	array(
		array(
			'name'      => __( 'Small', 'genesis-advanced' ),
			'shortName' => __( 'S', 'genesis-advanced' ),
			'size'      => '15',
			'slug'      => 'small',
		),
		array(
			'name'      => __( 'Normal', 'genesis-advanced' ),
			'shortName' => __( 'N', 'genesis-advanced' ),
			'size'      => '18',
			'slug'      => 'normal',
		),
		array(
			'name'      => __( 'Medium', 'genesis-advanced' ),
			'shortName' => __( 'M', 'genesis-advanced' ),
			'size'      => '21.6',
			'slug'      => 'medium',
		),
		array(
			'name'      => __( 'Large', 'genesis-advanced' ),
			'shortName' => __( 'L', 'genesis-advanced' ),
			'size'      => '25.92',
			'slug'      => 'large',
		),
		array(
			'name'      => __( 'Huge', 'genesis-advanced' ),
			'shortName' => __( 'XL', 'genesis-advanced' ),
			'size'      => '44.79',
			'slug'      => 'huge',
		),
	)
);

/**
 * Disable custom font sizes
 *
 * @since 3.3.0
 */
add_theme_support(
	'disable-custom-font-sizes'
);
