<?php
/**
 * Space
 *
 * This file adds the appearance settings.
 *
 * @package Space
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/space.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$space_default_colors = [
	'link'   => '#0073e5',
	'accent' => '#d30c7b',
];

$space_link_color = get_theme_mod(
	'space_link_color',
	$space_default_colors['link']
);

$space_accent_color = get_theme_mod(
	'space_accent_color',
	$space_default_colors['accent']
);

return [
	'fonts-url'            => 'https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,700|Roboto+Mono',
	'ionicons'             => 'https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css',
	'content-width'        => 1800,
	'link-color'           => $space_link_color,
	'default-colors'       => $space_default_colors,
	'editor-color-palette' => [
		[
			'name'  => __( 'Accent', 'space' ),
			'slug'  => 'accent',
			'color' => $space_accent_color,
		],
		[
			'name'  => __( 'White', 'space' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		],
		[
			'name'  => __( 'Light', 'space' ),
			'slug'  => 'light',
			'color' => '#f4f4f4',
		],
		[
			'name'  => __( 'Grey', 'space' ),
			'slug'  => 'grey',
			'color' => '#cecece',
		],
		[
			'name'  => __( 'Dark', 'space' ),
			'slug'  => 'dark',
			'color' => '#414141',
		],
		[
			'name'  => __( 'Black', 'space' ),
			'slug'  => 'black',
			'color' => '#1b1b1b',
		],
		[
			'name'  => __( 'Info', 'space' ),
			'slug'  => 'info',
			'color' => '#0073e5',
		],
		[
			'name'  => __( 'Danger', 'space' ),
			'slug'  => 'danger',
			'color' => '#ed254e',
		],
		[
			'name'  => __( 'Success', 'space' ),
			'slug'  => 'success',
			'color' => '#00a878',
		],
		[
			'name'  => __( 'Warning', 'space' ),
			'slug'  => 'warning',
			'color' => '#f15025',
		],
		[
			'name'  => __( 'Star', 'space' ),
			'slug'  => 'star',
			'color' => '#f2ff49',
		],
	],
	'editor-font-sizes'    => [
		[
			'name'      => __( 'Small', 'space' ),
			'shortName' => __( 'S', 'space' ),
			'size'      => '15',
			'slug'      => 'small',
		],
		[
			'name'      => __( 'Normal', 'space' ),
			'shortName' => __( 'N', 'space' ),
			'size'      => '18',
			'slug'      => 'normal',
		],
		[
			'name'      => __( 'Medium', 'space' ),
			'shortName' => __( 'M', 'space' ),
			'size'      => '21.6',
			'slug'      => 'medium',
		],
		[
			'name'      => __( 'Large', 'space' ),
			'shortName' => __( 'L', 'space' ),
			'size'      => '25.92',
			'slug'      => 'large',
		],
		[
			'name'      => __( 'Huge', 'space' ),
			'shortName' => __( 'XL', 'space' ),
			'size'      => '37.325',
			'slug'      => 'huge',
		],
	],
];
