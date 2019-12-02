<?php
/**
 * Space
 *
 * This file adds the responsive menus settings (Requires Genesis 3.0+).
 *
 * @package Space
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/space.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

return [
	'script' => [
		'mainMenu'         => __( '', 'space' ), // phpcs:ignore
		'menuIconClass'    => 'dashicons-before dashicons-menu',
		'subMenu'          => __( 'Submenu', 'space' ),
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
