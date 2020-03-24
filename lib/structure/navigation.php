<?php
/**
 * Zen
 *
 * This file adds the navigation setting.
 *
 * @package Zen
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/zen.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register the responsive menus
 *
 * See config file at `config/responsive-menus.php`.
 */
if ( function_exists( 'genesis_register_responsive_menus' ) ) {
	genesis_register_responsive_menus(
		genesis_get_config(
			'responsive-menus'
		)
	);
}

/* Reposition primary navigation menu */
remove_action(
	'genesis_after_header',
	'genesis_do_nav'
);
add_action(
	'genesis_header',
	'genesis_do_nav',
	10
);

/* Reposition the secondary navigation menu */
remove_action(
	'genesis_after_header',
	'genesis_do_subnav'
);
add_action(
	'genesis_header',
	'genesis_do_subnav',
	5
);

/**
 * Reduce tertiary navigation menu to one level depth
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
add_filter(
	'wp_nav_menu_args',
	function ( $args ) {

		if ( 'tertiary' !== $args['theme_location'] ) {

			return $args;
		}

		$args['depth'] = 1;

		return $args;
	}
);

/* Add attributes for navigation elements */
add_filter( 'genesis_attr_nav-custom', 'genesis_attributes_nav' );

/**
 * Add ID markup to custom navigation
 *
 * @param array $attributes Existing attributes for custom navigation element.
 * @return array Amended attributes for custom navigation element.
 */
add_filter(
	'genesis_attr_nav-custom', function ( $attributes ) {

		$attributes['id'] = 'genesis-nav-tertiary';

		return $attributes;
	}
);

/**
 * Add skip link for tertiary navigation
 *
 * @param array $links Existing skiplinks.
 * @return array Amended skiplinks.
 */
add_filter(
	'genesis_skip_links_output', function ( $links ) {

		if ( genesis_nav_menu_supported( 'tertiary' ) &&
			has_nav_menu( 'tertiary' ) ) :

			$links['genesis-nav-tertiary'] = __( 'Skip to tertiary navigation', 'zen' );

		endif;

		return $links;
	}
);

/* Display the tertiary menu */
add_action(
	'genesis_after_footer', function () {

		// Do nothing if menu not supported.
		if ( ! genesis_nav_menu_supported( 'tertiary' ) ||
			! has_nav_menu( 'tertiary' ) ) :

			return;

		endif;

		$class = 'menu genesis-nav-menu menu-tertiary';

		if ( genesis_superfish_enabled() ) :

			$class .= ' js-superfish';

		endif;

		$menu_name = 'tertiary';
		$locations = get_nav_menu_locations();
		$menu_id   = $locations[ $menu_name ];
		wp_get_nav_menu_object( $menu_id );

		$menu_obj = wp_get_nav_menu_object( $menu_id );

		echo '<div id="tertiary-menu-wrapper" class="tertiary-menu-wrapper">';

		echo '<h3 class="tertiary-menu-name">' . esc_html( $menu_obj->name ) . '</h3>';

		genesis_nav_menu(
			[
				'theme_location'  => 'tertiary',
				'menu_class'      => $class,
				'container'       => 'div',
				'container_class' => 'wrap',
			]
		);

		echo '</div>';

	}, 10
);
