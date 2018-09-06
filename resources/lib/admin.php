<?php
/**
 * Genesis Advanced
 *
 * This file adds the admin dashboard setting.
 *
 * @package Genesis Advanced
 * @author  NicBeltramelli
 * @license GPL-2.0+
 * @link    https://github.com/NicBeltramelli/genesis-advanced.git
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Removes output of unused admin settings metaboxes
 *
 * @since 2.6.0
 *
 * @param string $_genesis_admin_settings The admin screen to remove meta boxes from.
 */
add_action( 'genesis_theme_settings_metaboxes', function ( $_genesis_admin_settings ) {

	remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
	remove_meta_box( 'genesis-theme-settings-nav', $_genesis_admin_settings, 'main' );

} );
