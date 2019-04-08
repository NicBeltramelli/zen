<?php
/**
 * Genesis Advanced
 *
 * This file adds the Gutenberg blocks theme support.
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
 * Add support for Gutenberg editor color palette
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
			'name'  => __( 'Light Soft', 'genesis-advanced' ),
			'slug'  => 'light-soft',
			'color' => '#ffffff',
		],
		[
			'name'  => __( 'Light', 'genesis-advanced' ),
			'slug'  => 'light',
			'color' => '#f4f4f4',
		],
		[
			'name'  => __( 'Light Strong', 'genesis-advanced' ),
			'slug'  => 'light-strong',
			'color' => '#cecece',
		],
		[
			'name'  => __( 'Dark Soft', 'genesis-advanced' ),
			'slug'  => 'dark-soft',
			'color' => '#414141',
		],
		[
			'name'  => __( 'Dark', 'genesis-advanced' ),
			'slug'  => 'dark',
			'color' => '#1b1b1b',
		],
		[
			'name'  => __( 'Dark Strong', 'genesis-advanced' ),
			'slug'  => 'dark-strong',
			'color' => '#000000',
		],
		[
			'name'  => __( 'Info Soft', 'genesis-advanced' ),
			'slug'  => 'info-soft',
			'color' => '#3399ff',
		],
		[
			'name'  => __( 'Info', 'genesis-advanced' ),
			'slug'  => 'info',
			'color' => '#0073e5',
		],
		[
			'name'  => __( 'Info Strong', 'genesis-advanced' ),
			'slug'  => 'info-strong',
			'color' => '#004d99',
		],
		[
			'name'  => __( 'Danger Soft', 'genesis-advanced' ),
			'slug'  => 'danger-soft',
			'color' => '#f36c87',
		],
		[
			'name'  => __( 'Danger', 'genesis-advanced' ),
			'slug'  => 'danger',
			'color' => '#ed254e',
		],
		[
			'name'  => __( 'Danger Strong', 'genesis-advanced' ),
			'slug'  => 'danger-strong',
			'color' => '#b60f31',
		],
		[
			'name'  => __( 'Success Soft', 'genesis-advanced' ),
			'slug'  => 'success-soft',
			'color' => '#00f5af',
		],
		[
			'name'  => __( 'Success', 'genesis-advanced' ),
			'slug'  => 'success',
			'color' => '#00a878',
		],
		[
			'name'  => __( 'Success Strong', 'genesis-advanced' ),
			'slug'  => 'success-strong',
			'color' => '#005c41',
		],
		[
			'name'  => __( 'Warning Soft', 'genesis-advanced' ),
			'slug'  => 'warning-soft',
			'color' => '#f68a6d',
		],
		[
			'name'  => __( 'Warning', 'genesis-advanced' ),
			'slug'  => 'warning',
			'color' => '#f15025',
		],
		[
			'name'  => __( 'Warning Strong', 'genesis-advanced' ),
			'slug'  => 'warning-strong',
			'color' => '#bd320c',
		],
		[
			'name'  => __( 'Star Soft', 'genesis-advanced' ),
			'slug'  => 'star-soft',
			'color' => '#f7ff96',
		],
		[
			'name'  => __( 'Star', 'genesis-advanced' ),
			'slug'  => 'star',
			'color' => '#f2ff49',
		],
		[
			'name'  => __( 'Star Strong', 'genesis-advanced' ),
			'slug'  => 'star-strong',
			'color' => '#eafc00',
		],
	]
);
