<?php
/**
 * Genesis Advanced
 *
 * This file adds the responsive menus settings (Requires Genesis 3.0+).
 *
 * @since 3.4.0
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
 * Genesis responsive menus settings
 */
return [
	'script' => [
		'mainMenu'         => __( 'Menu', 'genesis-advanced' ),
		'menuIconClass'    => 'dashicons-before dashicons-menu',
		'subMenu'          => __( 'Submenu', 'genesis-advanced' ),
		'subMenuIconClass' => 'dashicons-before dashicons-arrow-down-alt2',

		'menuClasses'      => [
			'combine' => [
				'.nav-primary',
			],
			'others'  => [],
		],
	],
	'extras' => [
		'media_query_width' => '900px',
	],
];
