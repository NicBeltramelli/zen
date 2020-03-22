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
	'fonts-url'            => 'https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto:400,700|Roboto+Mono&display=optional',
	'ionicons'             => 'https://unpkg.com/ionicons@5.0.0/dist/ionicons.js',
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
];
