<?php
/**
 * Zen
 *
 * This file adds the desired theme supports
 *
 * @package Zen
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/zen.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

return [
	'html5'                           => [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
	],
	'genesis-accessibility'           => [
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links',
	],
	'custom-logo'                     => [
		'height'      => 120,
		'width'       => 500,
		'flex-height' => true,
		'flex-width'  => true,
	],
	'genesis-after-entry-widget-area' => '',
	'genesis-footer-widgets'          => 3,
	'genesis-menus'                   => [
		'primary'   => __( 'Header Right', 'zen' ),
		'secondary' => __( 'Header Left', 'zen' ),
		'tertiary'  => __( 'Footer', 'zen' ),
	],
];
