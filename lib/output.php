<?php
/**
 * Genesis Advanced
 *
 * This file adds the required CSS to the front end.
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
 * Check the settings for the link color, accent color and logo width
 *
 * If any of these value are set the appropriate CSS is output.
 *
 * @since 3.0.0
 */
add_action( 'wp_enqueue_scripts', function () {

	$handle = 'genesis-advanced-styles';

	$color_link   = get_theme_mod( 'genesis_advanced_link_color', genesis_advanced_customizer_get_default_link_color() );
	$color_accent = get_theme_mod( 'genesis_advanced_accent_color', genesis_advanced_customizer_get_default_accent_color() );
	$logo         = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

	if ( $logo ) {
		$logo_height           = absint( $logo[2] );
		$logo_max_width        = get_theme_mod( 'genesis_advanced_logo_width', 350 );
		$logo_width            = absint( $logo[1] );
		$logo_ratio            = $logo_width / $logo_height;
		$logo_effective_height = min( $logo_width, $logo_max_width ) / $logo_ratio;
		$logo_padding          = max( 0, ( 60 - $logo_effective_height ) / 2 );
	}

	$css = '';

	/* Output link color inline css */
	$css .= ( genesis_advanced_customizer_get_default_link_color() !== $color_link ) ? sprintf(
		'

		a,
		.entry-title a:focus,
		.entry-title a:hover,
		.genesis-nav-menu a:focus,
		.genesis-nav-menu a:hover,
		.genesis-nav-menu .current-menu-item > a,
		.genesis-nav-menu .sub-menu .current-menu-item > a:focus,
		.genesis-nav-menu .sub-menu .current-menu-item > a:hover,
		.menu-toggle:focus,
		.menu-toggle:hover,
		.sub-menu-toggle:focus,
		.sub-menu-toggle:hover {
			color: %s;
		}

		', $color_link
	) : '';

	/* Output accent color inline css */
	$css .= ( genesis_advanced_customizer_get_default_accent_color() !== $color_accent ) ? sprintf(
		'

		button:focus,
		button:hover,
		input[type="button"]:focus,
		input[type="button"]:hover,
		input[type="reset"]:focus,
		input[type="reset"]:hover,
		input[type="submit"]:focus,
		input[type="submit"]:hover,
		input[type="reset"]:focus,
		input[type="reset"]:hover,
		input[type="submit"]:focus,
		input[type="submit"]:hover,
		.button:focus,
		.button:hover,
		.genesis-nav-menu > .menu-highlight > a:hover,
		.genesis-nav-menu > .menu-highlight > a:focus,
		.genesis-nav-menu > .menu-highlight.current-menu-item > a {
			background-color: %s;
			color: %s;
		}
		', $color_accent, genesis_advanced_color_contrast( $color_accent )
	) : '';

	/* Output custom logo inline css */
	$css .= ( has_custom_logo() && ( 200 <= $logo_effective_height ) ) ?
		'
		.site-header {
			position: static;
		}
		'
	: '';

	/* Output custom logo inline css */
	$css .= ( has_custom_logo() && ( 350 !== $logo_max_width ) ) ? sprintf(
		'
		.wp-custom-logo .site-container .title-area {
			max-width: %spx;
		}
		', $logo_max_width
	) : '';

	/* Place menu below logo and center logo once it gets big */
	$css .= ( has_custom_logo() && ( 600 <= $logo_max_width ) ) ?
		'
		.wp-custom-logo .title-area,
		.wp-custom-logo .menu-toggle,
		.wp-custom-logo .nav-primary {
			float: none;
		}

		.wp-custom-logo .title-area {
			margin: 0 auto;
			text-align: center;
		}

		@media only screen and (min-width: 960px) {
			.wp-custom-logo .nav-primary {
				text-align: center;
			}

			.wp-custom-logo .nav-primary .sub-menu {
				text-align: left;
			}
		}
		'
	: '';

	/* Output custom logo inline css */
	$css .= ( has_custom_logo() && $logo_padding ) ? sprintf(
		'
		.wp-custom-logo .title-area {
			padding-top: %spx;
		}
		', $logo_padding + 5
	) : '';

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}

} );
