<?php
/**
 * Zen
 *
 * This file adds the widgets settings.
 *
 * @package Zen
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/zen.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Remove header right widget area */
unregister_sidebar(
	'header-right'
);

/* Remove secondary sidebar */
unregister_sidebar(
	'sidebar-alt'
);

/* Register privacy widget area */
genesis_register_sidebar(
	[
		'id'          => 'privacy',
		'name'        => __( 'Privacy', 'zen' ),
		'description' => __( 'This area is designed to display the Privacy sidebar menu.', 'zen' ),
	]
);
