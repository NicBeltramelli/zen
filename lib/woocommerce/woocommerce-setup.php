<?php
/**
 * Genesis Advanced
 *
 * This file adds the WooCommerce setup functions.
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
 * Enqueue custom WooCommerce style
 *
 * @since 3.0.0
 */
add_action(
	'wp_enqueue_scripts',
	function () {

		if ( class_exists( 'woocommerce' ) ) {

			wp_enqueue_style(
				genesis_get_theme_handle() . '-woocommerce-styles',
				genesis_advanced_asset_path( 'styles/woocommerce.css' ),
				[],
				genesis_get_theme_version()
			);

		}
	},
	99
);

/**
 * Print an inline script to the footer to keep products the same height
 *
 * @since 3.0.0
 */
add_action(
	'wp_enqueue_scripts',
	function () {

		if ( ! class_exists( 'WooCommerce' ) ||
			! is_shop() &&
			! is_product_category() &&
			! is_product_tag() &&
			! is_product() &&
			! is_cart() ) {

			return;

		}

		wp_add_inline_script(
			genesis_get_theme_handle() . '-scripts',
			"jQuery(document).ready( function() { jQuery( '.product .woocommerce-LoopProduct-link').matchHeight(); });"
		);

	},
	99
);

/* Add product gallery support */
if ( class_exists( 'WooCommerce' ) ) {

	add_theme_support(
		'wc-product-gallery-lightbox'
	);
	add_theme_support(
		'wc-product-gallery-slider'
	);
	add_theme_support(
		'wc-product-gallery-zoom'
	);

}

/**
 * Modify the WooCommerce breakpoints
 *
 * @since 3.0.0
 *
 * @return string Pixel width of the theme's breakpoint.
 */
add_filter(
	'woocommerce_style_smallscreen_breakpoint',
	function () {

		$current = genesis_site_layout();
		$layouts =
		[
			'one-sidebar' =>
			[
				'content-sidebar',
				'sidebar-content',
			],
		];

		if ( in_array( $current, $layouts['one-sidebar'], true ) ) {

			return '600px';

		}

		return '600px'; // Show mobile styles immediately.

	}
);

/**
 * Set the default products per page
 *
 * @since 3.0.0
 *
 * @return int Number of products to show per page.
 */
add_filter(
	'genesiswooc_products_per_page',
	function () {

		return 8;

	}
);

/**
 * Update the next and previous arrows to the default Genesis style
 *
 * @since 3.0.0
 *
 * @param array $args The previous and next text arguments.
 * @return array New next and previous text arguments.
 */
add_filter(
	'woocommerce_pagination_args',
	function ( $args ) {

		$args['prev_text'] = sprintf( '&laquo; %s', __( 'Previous Page', 'genesis-advanced' ) );
		$args['next_text'] = sprintf( '%s &raquo;', __( 'Next Page', 'genesis-advanced' ) );

		return $args;

	}
);

/**
 * Define WooCommerce image sizes on theme activation
 *
 * @since 3.0.0
 */
add_action(
	'after_switch_theme',
	function () {

		global $pagenow;

		// Check conditionally to see if we're activating the current theme and that WooCommerce is installed.
		if ( ! isset( $_GET['activated'] ) || 'themes.php' !== $pagenow || ! class_exists( 'WooCommerce' ) ) { // phpcs:ignore WordPress.CSRF.NonceVerification.NoNonceVerification -- low risk, follows official snippet at https://goo.gl/nnHHQa.
			return;
		}

		genesis_advanced_update_woocommerce_image_dimensions();

	},
	1
);

/**
 * Define the WooCommerce image sizes on WooCommerce activation
 *
 * @since 3.0.0
 *
 * @param string $plugin The path of the plugin being activated.
 */
add_action(
	'activated_plugin',
	function ( $plugin ) {

		// Checks to see if WooCommerce is being activated.
		if ( 'woocommerce/woocommerce.php' !== $plugin ) {
			return;
		}

		genesis_advanced_update_woocommerce_image_dimensions();

	},
	10,
	2
);

/**
 * Update WooCommerce image dimensions
 *
 * @since 3.0.0
 */
function genesis_advanced_update_woocommerce_image_dimensions() {

	/* Update image size options */
	update_option( 'woocommerce_single_image_width', 655 );    // Single product image.
	update_option( 'woocommerce_thumbnail_image_width', 500 ); // Catalog image.

	/* Update image cropping option */
	update_option( 'woocommerce_thumbnail_cropping', '1:1' );

}

/**
 * Filter the WooCommerce gallery image dimensions
 *
 * @since 3.0.0
 *
 * @param array $size The gallery image size and crop arguments.
 * @return array The modified gallery image size and crop arguments.
 */
add_filter(
	'woocommerce_get_image_size_gallery_thumbnail',
	function ( $size ) {

		$size =
		[
			'width'  => 180,
			'height' => 180,
			'crop'   => 1,
		];

		return $size;

	}
);

/**
 * Change number of thumbnails per row on product gallery
 *
 * @since 3.1.1
 *
 * @param array $wrapper_classes The number of thumbnails per row.
 * @return array The modified number of thumbnails per row.
 */
add_filter(
	'woocommerce_single_product_image_gallery_classes',
	function ( $wrapper_classes ) {

		$columns            = 5;
		$wrapper_classes[2] = 'woocommerce-product-gallery--columns-' . absint( $columns );

		return $wrapper_classes;

	}
);
