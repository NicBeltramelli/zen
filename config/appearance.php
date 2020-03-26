<?php
/**
 * Zen
 *
 * This file adds the appearance settings.
 *
 * @package Zen
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/zen.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$zen_default_colors = [
	'link'   => '#00a37f',
	'accent' => '#00a37f',
];

$zen_link_color = get_theme_mod(
	'zen_link_color',
	$zen_default_colors['link']
);

$zen_accent_color = get_theme_mod(
	'zen_accent_color',
	$zen_default_colors['accent']
);

return [
	'fonts-url'            => 'https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto:400,700|Roboto+Mono&display=optional',
	'ionicons'             => 'https://unpkg.com/ionicons@5.0.0/dist/ionicons.js',
	'content-width'        => 1800,
	'link-color'           => $zen_link_color,
	'default-colors'       => $zen_default_colors,
	'editor-color-palette' => [
		[
			'name'  => __( 'Accent', 'zen' ),
			'slug'  => 'accent',
			'color' => $zen_accent_color,
		],
		[
			'name'  => __( 'White', 'zen' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		],
		[
			'name'  => __( 'Light', 'zen' ),
			'slug'  => 'light',
			'color' => '#f4f4f4',
		],
		[
			'name'  => __( 'Grey', 'zen' ),
			'slug'  => 'grey',
			'color' => '#cecece',
		],
		[
			'name'  => __( 'Dark', 'zen' ),
			'slug'  => 'dark',
			'color' => '#414141',
		],
		[
			'name'  => __( 'Black', 'zen' ),
			'slug'  => 'black',
			'color' => '#1b1b1b',
		],
		[
			'name'  => __( 'Info', 'zen' ),
			'slug'  => 'info',
			'color' => '#0073e5',
		],
		[
			'name'  => __( 'Danger', 'zen' ),
			'slug'  => 'danger',
			'color' => '#ed254e',
		],
		[
			'name'  => __( 'Success', 'zen' ),
			'slug'  => 'success',
			'color' => '#00a37f',
		],
		[
			'name'  => __( 'Warning', 'zen' ),
			'slug'  => 'warning',
			'color' => '#7c6249',
		],
		[
			'name'  => __( 'Star', 'zen' ),
			'slug'  => 'star',
			'color' => '#f2ff49',
		],
	],
];
