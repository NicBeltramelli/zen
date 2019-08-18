<?php
/**
 * Genesis Advanced
 *
 * This file adds the desired theme supports
 *
 * @package Genesis Advanced
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/genesis-advanced.git
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
		'primary'   => __( 'Header Menu', 'genesis-advanced' ),
		'secondary' => __( 'Footer Menu', 'genesis-advanced' ),
	],
];
