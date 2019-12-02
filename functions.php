<?php
/**
 * Space
 *
 * This file adds the function library to Space Theme.
 *
 * @package Space
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/space.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once get_stylesheet_directory() . '/lib/errors.php'; // Display error messages.

require_once get_template_directory() . '/lib/init.php'; // Initialize Genesis Framework.

/**
 * Use the WPackio PHP API to consume assets
 *
 * @see https://wpack.io/guides/using-wpackio-enqueue/
 */
require_once __DIR__ . '/vendor/autoload.php'; // Require composer autoload for access the WPackio API.

$space_assets = new \WPackio\Enqueue( 'space', 'dist', genesis_get_theme_version(), 'theme', false, 'child' ); // Instantiate the WPackio Enqueue class.

/**
 * The $space_includes array determines the code library included in your child theme
 *
 * Add or remove files to the array as needed.
 * Please note that missing files will produce a fatal error.
 */
$space_includes = [

	/* Theme Setup */
	'lib/assets.php', // Enqueue assets.
	'lib/defaults.php', // Default theme settings.
	'lib/helpers.php', // Helper functions.
	'lib/customize.php', // Customizer additions.
	'lib/output.php', // Output front-end css.
	'lib/admin.php', // Admin dashboard setting.
	'lib/setup.php', // Localization, constants and features.
	'lib/body-classes.php', // Body classes.
	'lib/extras.php', // Custom functions.

	/* Gutenberg Blocks */
	'lib/blocks/blocks-setup.php', // Gutenberg blocks theme support.

	/* Structure */
	'lib/structure/content.php',
	'lib/structure/header.php',
	'lib/structure/navigation.php',
	'lib/structure/widgets.php',

	/* WooCommerce */
	'lib/woocommerce/woocommerce-setup.php',
	'lib/woocommerce/woocommerce-output.php',
	'lib/woocommerce/woocommerce-notice.php',

];

foreach ( $space_includes as $space_file ) {

	if ( ! locate_template( $space_file, true, true ) ) {

		$space_error(
			sprintf(
				/* translators: %s is replaced with the name of missing file */
				esc_html__(
					'Error locating %s for inclusion.',
					'space'
				),
				sprintf(
					'<code>%s</code>',
					esc_html( $space_file )
				)
			),
			esc_html__(
				'File not found',
				'space'
			)
		);
	}
}
unset( $space_file );
