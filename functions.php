<?php
/**
 * Genesis Advanced
 *
 * This file adds the function library to Genesis Advanced Theme.
 *
 * @package Genesis Advanced
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/genesis-advanced.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once get_stylesheet_directory() . '/lib/errors.php'; // Display error messages.

require_once get_template_directory() . '/lib/init.php'; // Initialize Genesis Framework.

/**
 * The $genesis_advanced_includes array determines the code library included in your child theme
 *
 * Add or remove files to the array as needed.
 * Please note that missing files will produce a fatal error.
 *
 * @since 2.7.0
 */
$genesis_advanced_includes = [

	/* Classes */
	'lib/classes/class-genesis-advanced-manifest.php', // Configure paths for assets.

	/* Theme Setup */
	'lib/assets.php', // Enqueue assets.
	'lib/defaults.php', // Default theme settings.
	'lib/helpers.php', // Helper functions.
	'lib/customize.php', // Customizer additions.
	'lib/output.php', // Output front-end css.
	'lib/admin.php', // Admin dashboard setting.
	'lib/setup.php', // Localization, constants and features.
	'lib/extras.php', // Custom functions.

	/* Structure */
	'lib/structure/content.php',
	'lib/structure/header.php',
	'lib/structure/layout.php',
	'lib/structure/navigation.php',

	/* WooCommerce */
	'lib/woocommerce/woocommerce-setup.php',
	'lib/woocommerce/woocommerce-output.php',
	'lib/woocommerce/woocommerce-notice.php',

];

foreach ( $genesis_advanced_includes as $file ) {

	if ( ! locate_template( $file, true, true ) ) {

		$genesis_advanced_error(
			sprintf(
				/* translators: %s is replaced with the name of missing file */
				esc_html__(
					'Error locating %s for inclusion.',
					'genesis-advanced'
				),
				sprintf(
					'<code>%s</code>',
					esc_html( $file )
				)
			),
			esc_html__(
				'File not found',
				'genesis-advanced'
			)
		);
	}
}
unset( $file );
