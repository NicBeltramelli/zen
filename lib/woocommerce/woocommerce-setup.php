<?php
/**
 * Zen
 *
 * This file adds the WooCommerce setup functions.
 *
 * @package Zen
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/zen.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Conditionally load WooCommerce assets */
add_action(
	'get_header',
	function () {

		if ( ! class_exists( 'WooCommerce' ) ) {

			return;

		}

		if ( is_woocommerce() ||
			is_cart() ||
			is_checkout() ||
			is_account_page() ) {

			return;

		}

		// phpcs:disable
		remove_action( 'wp_enqueue_scripts', [ WC_Frontend_Scripts::class, 'load_scripts' ] );
		remove_action( 'wp_print_scripts', [ WC_Frontend_Scripts::class, 'localize_printed_scripts' ], 5 );
		remove_action( 'wp_print_footer_scripts', [ WC_Frontend_Scripts::class, 'localize_printed_scripts' ], 5 );
		// phpcs:enable
	}
);

/* Enqueue custom WooCommerce style */
add_action(
	'wp_enqueue_scripts',
	function () {

		if ( ! class_exists( 'WooCommerce' ) ) {

			return;

		}

		if ( ! is_woocommerce() &&
			! is_cart() &&
			! is_checkout() &&
			! is_account_page() ) {

			return;

		}

		/* Access the wpackio global var */
		global $zen_assets;

		/* Main styles */
		$zen_assets->enqueue( 'woocommerce', 'main', [] );
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
 * @return string Pixel width of the theme's breakpoint.
 */
add_filter(
	'woocommerce_style_smallscreen_breakpoint',
	function () {

		$current = genesis_site_layout( false );
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
 * @param array $args The previous and next text arguments.
 * @return array New next and previous text arguments.
 */
add_filter(
	'woocommerce_pagination_args',
	function ( $args ) {

		$args['prev_text'] = sprintf( '&laquo; %s', __( 'Previous Page', 'zen' ) );
		$args['next_text'] = sprintf( '%s &raquo;', __( 'Next Page', 'zen' ) );

		return $args;

	}
);

/**
 * Change number of thumbnails per row on product gallery
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

/**
 * Filter the WooCommerce gallery image dimensions
 *
 * @param array $size The gallery image size and crop arguments.
 * @return array The modified gallery image size and crop arguments.
 */
add_filter(
	'woocommerce_get_image_size_gallery_thumbnail',
	function ( $size ) {

		$size =
		[
			'width'  => 150,
			'height' => 150,
			'crop'   => 1,
		];

		return $size;

	}
);
