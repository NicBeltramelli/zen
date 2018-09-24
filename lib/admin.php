<?php
/**
 * Genesis Advanced
 *
 * This file adds the admin dashboard setting.
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
 * Remove output of unused admin settings metaboxes
 *
 * @since 3.0.0
 *
 * @param string $_genesis_admin_settings The admin screen to remove meta boxes from.
 */
add_action(
	'genesis_theme_settings_metaboxes', function ( $_genesis_admin_settings ) {

		remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
		remove_meta_box( 'genesis-theme-settings-nav', $_genesis_admin_settings, 'main' );

	}
);

/**
 * Remove output of header settings in the Customizer
 *
 * @since 3.0.0
 *
 * @param array $config Original Customizer items.
 * @return array Filtered Customizer items.
 */
add_filter(
	'genesis_customizer_theme_settings_config', function ( $config ) {

		unset( $config['genesis']['sections']['genesis_header'] );
		return $config;

	}
);
