<?php
/**
 * Zen
 *
 * This file adds the responsive menus settings (Requires Genesis 3.0+).
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
	'script' => [
		'mainMenu'         => __( 'Menu', 'zen' ),
		'menuIconClass'    => 'dashicons-before dashicons-menu',
		'subMenu'          => __( 'Submenu', 'zen' ),
		'subMenuIconClass' => 'dashicons-before dashicons-arrow-down-alt2',

		'menuClasses'      => [
			'combine' => [
				'.nav-secondary',
				'.nav-primary',
			],
			'others'  => [],
		],
	],
	'extras' => [
		'media_query_width' => '900px',
	],
];
