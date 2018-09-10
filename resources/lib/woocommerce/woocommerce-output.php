<?php
/**
 * Genesis Advanced
 *
 * This file adds the WooCommerce styles and the Customizer additions.
 *
 * @package Genesis Advanced
 * @author  NicBeltramelli
 * @license GPL-2.0+
 * @link    https://github.com/NicBeltramelli/genesis-advanced.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Enqueues the theme's custom WooCommerce styles to the WooCommerce plugin
 *
 * @param array $enqueue_styles The WooCommerce styles to enqueue.
 * @since 2.3.0
 *
 * @return array Modified WooCommerce styles to enqueue.
 */
add_filter( 'woocommerce_enqueue_styles', function ( $enqueue_styles ) {

	$enqueue_styles['genesis-advanced-woocommerce-styles'] = 
	[
		'src'     => get_stylesheet_directory_uri() . '/lib/woocommerce/genesis-advanced-woocommerce.css',
		'deps'    => '',
		'version' => CHILD_THEME_VERSION,
		'media'   => 'screen',
	];

	return $enqueue_styles;

} );

/**
 * Adds the themes's custom CSS to the WooCommerce stylesheet
 *
 * @since 2.3.0
 *
 * @return string CSS to be outputted after the theme's custom WooCommerce stylesheet.
 */
add_action( 'wp_enqueue_scripts', function () {

	// If WooCommerce isn't active, exit early.
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	$color_link   = get_theme_mod( 'genesis_advanced_link_color', genesis_advanced_customizer_get_default_link_color() );
	$color_accent = get_theme_mod( 'genesis_advanced_accent_color', genesis_advanced_customizer_get_default_accent_color() );

	$woo_css = '';

	$woo_css .= ( genesis_advanced_customizer_get_default_link_color() !== $color_link ) ? sprintf(
		'

		.woocommerce div.product p.price,
		.woocommerce div.product span.price,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a:focus,
		.woocommerce ul.products li.product h3:hover,
		.woocommerce ul.products li.product .price,
		.woocommerce .woocommerce-breadcrumb a:hover,
		.woocommerce .woocommerce-breadcrumb a:focus,
		.woocommerce .widget_layered_nav ul li.chosen a::before,
		.woocommerce .widget_layered_nav_filters ul li a::before,
		.woocommerce .widget_rating_filter ul li.chosen a::before {
			color: %s;
		}

	', $color_link
	) : '';

	$woo_css .= ( genesis_advanced_customizer_get_default_accent_color() !== $color_accent ) ? sprintf(
		'
		.woocommerce a.button:hover,
		.woocommerce a.button:focus,
		.woocommerce a.button.alt:hover,
		.woocommerce a.button.alt:focus,
		.woocommerce button.button:hover,
		.woocommerce button.button:focus,
		.woocommerce button.button.alt:hover,
		.woocommerce button.button.alt:focus,
		.woocommerce input.button:hover,
		.woocommerce input.button:focus,
		.woocommerce input.button.alt:hover,
		.woocommerce input.button.alt:focus,
		.woocommerce input[type="submit"]:hover,
		.woocommerce input[type="submit"]:focus,
		.woocommerce span.onsale,
		.woocommerce #respond input#submit:hover,
		.woocommerce #respond input#submit:focus,
		.woocommerce #respond input#submit.alt:hover,
		.woocommerce #respond input#submit.alt:focus,
		.woocommerce.widget_price_filter .ui-slider .ui-slider-handle,
		.woocommerce.widget_price_filter .ui-slider .ui-slider-range {
			background-color: %1$s;
			color: %2$s;
		}

		.woocommerce-error,
		.woocommerce-info,
		.woocommerce-message {
			border-top-color: %1$s;
		}

		.woocommerce-error::before,
		.woocommerce-info::before,
		.woocommerce-message::before {
			color: %1$s;
		}

	', $color_accent, genesis_advanced_color_contrast( $color_accent )
	) : '';

	if ( $woo_css ) {
		wp_add_inline_style( 'genesis-advanced-woocommerce-styles', $woo_css );
	}

} );
