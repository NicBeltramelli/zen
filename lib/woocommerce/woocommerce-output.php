<?php
/**
 * Zen
 *
 * This file adds the WooCommerce inline styles.
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
 * Add the themes's custom CSS to the WooCommerce stylesheet
 *
 * @return string CSS to be outputted after the theme's custom WooCommerce stylesheet.
 */
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

		/* Get CSS handle */
		$assets      = $zen_assets->getAssets( 'woocommerce', 'main', [] );
		$entry_point = array_pop( $assets['css'] );
		$css_handle  = $entry_point['handle'];

		/* Locate the config file */
		$appearance = genesis_get_config( 'appearance' );

		$color_link   = get_theme_mod( 'zen_link_color', $appearance['default-colors']['link'] );
		$color_accent = get_theme_mod( 'zen_accent_color', $appearance['default-colors']['accent'] );

		$woo_css = '';

		$woo_css .= ( $appearance['default-colors']['link'] !== $color_link ) ? sprintf(
			'
			.woocommerce .summary a:not(:focus):not(:hover),
			.woocommerce .woocommerce-breadcrumb a:hover,
			.woocommerce .woocommerce-breadcrumb a:focus,
			.woocommerce .widget_layered_nav ul li.chosen a::before,
			.woocommerce .widget_layered_nav_filters ul li a::before,
			.woocommerce .widget_rating_filter ul li.chosen a::before {
				color: %s;
			}
			',
			$color_link
		) : '';

		$woo_css .= ( $appearance['default-colors']['accent'] !== $color_accent ) ? sprintf(
			'
			.woocommerce a.button.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce input.button.alt,
			.woocommerce a.button.alt:hover,
			.woocommerce a.button.alt:focus,
			.woocommerce button.button.alt:hover,
			.woocommerce button.button.alt:focus,
			.woocommerce input.button.alt:hover,
			.woocommerce input.button.alt:focus,
			.woocommerce span.onsale,
			.woocommerce.widget_price_filter .ui-slider .ui-slider-handle,
			.woocommerce.widget_price_filter .ui-slider .ui-slider-range {
				background-color: %1$s;
			}

			.woocommerce-info,
			.woocommerce-message {
				border-top-color: %1$s;
			}

			.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
			.woocommerce div.product .woocommerce-tabs ul.tabs li a:focus,
			.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
			.woocommerce-info::before,
			.woocommerce-message::before,
			.woocommerce a.button.loading::after {
				color: %1$s;
			}

			.woocommerce-account .woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link.is-active > a,
			.woocommerce-account .woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link a:focus,
			.woocommerce-account .woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link a:hover {
				color: %1$s !important;
			}
			',
			$color_accent,
			zen_color_contrast( $color_accent )
		) : '';

		if ( $woo_css ) {
			wp_add_inline_style(
				$css_handle,
				$woo_css
			);
		}

	},
	100
);
