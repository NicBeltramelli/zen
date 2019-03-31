<?php
/**
 * Genesis Advanced
 *
 * This file adds the WooCommerce inline styles.
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
 * Add the themes's custom CSS to the WooCommerce stylesheet
 *
 * @since 3.2.2
 *
 * @return string CSS to be outputted after the theme's custom WooCommerce stylesheet.
 */
add_action(
	'wp_enqueue_scripts',
	function () {

		$handle = 'genesis-advanced-woocommerce-styles';

		// If WooCommerce isn't active, exit early.
		if ( ! class_exists( 'WooCommerce' ) ) {
			return;
		}

		$color_link   = get_theme_mod( 'genesis_advanced_link_color', genesis_advanced_customizer_get_default_link_color() );
		$color_accent = get_theme_mod( 'genesis_advanced_accent_color', genesis_advanced_customizer_get_default_accent_color() );

		$woo_css = '';

		$woo_css .= ( genesis_advanced_customizer_get_default_link_color() !== $color_link ) ? sprintf(
			'
			.woocommerce .woocommerce-breadcrumb a:hover,
			.woocommerce .woocommerce-breadcrumb a:focus,
			.woocommerce .widget_layered_nav ul li.chosen a::before,
			.woocommerce .widget_layered_nav_filters ul li a::before,
			.woocommerce .widget_rating_filter ul li.chosen a::before {
				color: %s;
			}
			',
			$color_link,
			genesis_advanced_color_contrast( $color_link )
		) : '';

		$woo_css .= ( genesis_advanced_customizer_get_default_accent_color() !== $color_accent ) ? sprintf(
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

			.woocommerce-message {
				border-top-color: %1$s;
			}

			.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
			.woocommerce div.product .woocommerce-tabs ul.tabs li a:focus,
			.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
			.woocommerce-message::before {
				color: %1$s;
			}
			',
			$color_accent,
			genesis_advanced_color_contrast( $color_accent )
		) : '';

		if ( $woo_css ) {
			wp_add_inline_style(
				$handle,
				$woo_css
			);
		}

	},
	100
);
