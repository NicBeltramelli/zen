<?php
/**
 * Genesis Advanced
 *
 * This file adds the navigation setting.
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
 * Register the responsive menus
 *
 * @since 3.4.0
 */
if ( function_exists( 'genesis_register_responsive_menus' ) ) {
	genesis_register_responsive_menus(
		genesis_get_config(
			'responsive-menus'
		)
	);
}

/* Remove output of primary navigation right extras */
remove_filter(
	'genesis_nav_items',
	'genesis_nav_right',
	10,
	2
);
remove_filter(
	'wp_nav_menu_items',
	'genesis_nav_right',
	10,
	2
);

/* Reposition primary navigation menu */
remove_action(
	'genesis_after_header',
	'genesis_do_nav'
);
add_action(
	'genesis_header',
	'genesis_do_nav',
	12
);

/* Reposition the secondary navigation menu */
remove_action(
	'genesis_after_header',
	'genesis_do_subnav'
);
add_action(
	'genesis_after_footer',
	'genesis_do_subnav',
	10
);

/**
 * Reduce secondary navigation menu to one level depth
 *
 * @since 3.0.0
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
add_filter(
	'wp_nav_menu_args',
	function ( $args ) {

		if ( 'secondary' !== $args['theme_location'] ) {

			return $args;
		}

		$args['depth'] = 1;

		return $args;
	}
);
