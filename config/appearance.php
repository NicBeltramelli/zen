<?php
/**
 * Genesis Advanced
 *
 * This file adds the appearance settings.
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
 * Genesis appearance settings
 *
 * @since 3.4.0
 */
$genesis_advanced_default_colors = [
	'link'   => '#0073e5',
	'accent' => '#d30c7b',
];

$genesis_advanced_link_color = get_theme_mod(
	'genesis_advanced_link_color',
	$genesis_advanced_default_colors['link']
);

$genesis_advanced_accent_color = get_theme_mod(
	'genesis_advanced_accent_color',
	$genesis_advanced_default_colors['accent']
);

return [
	'fonts-url'            => 'https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,700|Roboto+Mono',
	'content-width'        => 1200,
	'link-color'           => $genesis_advanced_link_color,
	'default-colors'       => $genesis_advanced_default_colors,
	'editor-color-palette' => [
		[
			'name'  => __( 'Accent', 'genesis-advanced' ),
			'slug'  => 'accent',
			'color' => $genesis_advanced_accent_color,
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
	],
	'editor-font-sizes'    => [
		[
			'name'      => __( 'Small', 'genesis-advanced' ),
			'shortName' => __( 'S', 'genesis-advanced' ),
			'size'      => '15',
			'slug'      => 'small',
		],
		[
			'name'      => __( 'Normal', 'genesis-advanced' ),
			'shortName' => __( 'N', 'genesis-advanced' ),
			'size'      => '18',
			'slug'      => 'normal',
		],
		[
			'name'      => __( 'Medium', 'genesis-advanced' ),
			'shortName' => __( 'M', 'genesis-advanced' ),
			'size'      => '21.6',
			'slug'      => 'medium',
		],
		[
			'name'      => __( 'Large', 'genesis-advanced' ),
			'shortName' => __( 'L', 'genesis-advanced' ),
			'size'      => '25.92',
			'slug'      => 'large',
		],
		[
			'name'      => __( 'Huge', 'genesis-advanced' ),
			'shortName' => __( 'XL', 'genesis-advanced' ),
			'size'      => '44.79',
			'slug'      => 'huge',
		],
	],
];
