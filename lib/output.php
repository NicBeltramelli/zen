<?php
/**
 * Space
 *
 * This file adds the required CSS to the front end.
 *
 * @package Space
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/space.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Check the settings for the link color, accent color and logo width
 *
 * If any of these value are set the appropriate CSS is output.
 */
add_action(
	'wp_enqueue_scripts',
	function () {

		/* Access the wpackio global var */
		global $space_assets;

		/* Get CSS handle */
		$assets      = $space_assets->getAssets( 'theme', 'main', [] );
		$entry_point = array_pop( $assets['css'] );
		$css_handle  = $entry_point['handle'];

		/* Locate the config file */
		$appearance = genesis_get_config( 'appearance' );

		/* Output inline css */
		$color_link   = get_theme_mod( 'space_link_color', $appearance['default-colors']['link'] );
		$color_accent = get_theme_mod( 'space_accent_color', $appearance['default-colors']['accent'] );
		$logo         = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

		if ( $logo ) {
			$logo_max_width = get_theme_mod( 'space_logo_width', 250 );
		}

		$css = '';

		/* Output link color inline css */
		$css .= ( $appearance['default-colors']['link'] !== $color_link ) ? sprintf(
			'
			.entry a:not(.button):not(.wp-block-button__link),
			.entry a:not(.button):not(.wp-block-button__link):focus,
			.entry a:not(.button):not(.wp-block-button__link):hover,
			.breadcrumb a,
			.breadcrumb a:focus,
			.breadcrumb a:hover,
			.footer-widgets a:not(.button),
			.footer-widgets a:not(.button):focus,
			.footer-widgets a:not(.button):hover {
				color: %s;
			}
			',
			$color_link
		) : '';

		/* Output accent color inline css */
		$css .= ( $appearance['default-colors']['accent'] !== $color_accent ) ? sprintf(
			'
			.button.accent,
			a.button.accent,
			button.accent,
			input[type="button"].accent,
			input[type="reset"].accent,
			input[type="submit"].accent,
			.has-accent-background-color,
			.has-dark-background input[type="submit"] {
				background-color: %1$s;
			}

			.entry-title > a:focus,
			.entry-title > a:hover,
			.pagination-previous > a:focus,
			.pagination-previous > a:hover,
			.pagination-next > a:focus,
			.pagination-next > a:hover,
			.widget-title > a:focus,
			.widget-title > a:hover,
			.sidebar .widget ul li > a:focus,
			.sidebar .widget ul li > a:hover,
			.has-accent-color,
			.genesis-nav-menu .menu-item:focus > a,
			.genesis-nav-menu .menu-item:hover > a,
			.genesis-nav-menu .menu-item:focus > button,
			.genesis-nav-menu .menu-item:hover > button,
			.genesis-nav-menu .menu-item.current-menu-item > a {
				color: %1$s;
			}

			.button.outline.accent,
			a.button.outline.accent,
			button.outline.accent,
			input[type="button"].outline.accent,
			input[type="reset"].outline.accent,
			input[type="submit"].outline.accent {
				border-color: %1$s;
				color: %1$s;
			}

			@media only screen and (min-width: 900px) {
				.genesis-nav-menu > .menu-item.menu-highlight > a,
				.genesis-nav-menu > .menu-item.menu-highlight.current-menu-item > a {
					background-color: %1$s;
				}

				.genesis-nav-menu .sub-menu a:focus,
				.genesis-nav-menu .sub-menu a:hover,
				.genesis-nav-menu .sub-menu .menu-item:focus > a,
				.genesis-nav-menu .sub-menu .menu-item:focus > button,
				.genesis-nav-menu .sub-menu .menu-item:hover > a,
				.genesis-nav-menu .sub-menu .menu-item:hover > button,
				.genesis-nav-menu .sub-menu .menu-item.current-menu-item > a,
				.genesis-nav-menu .sub-menu .menu-item.current-menu-item > a:focus,
				.genesis-nav-menu .sub-menu .menu-item.current-menu-item > a:hover {
					color: %1$s;
				}
			}
			',
			$color_accent,
			space_color_contrast( $color_accent )
		) : '';

		/* Output custom logo inline css */
		$css .= ( has_custom_logo() && ( 250 !== $logo_max_width ) && ( 210 < $logo_max_width ) ) ? sprintf(
			'
			@media only screen and (min-width: 375px) {
				.wp-custom-logo .site-container .title-area {
					max-width: %spx;
				}
			}
			',
			$logo_max_width
		) : '';

		/* Output custom logo inline css */
		$css .= ( has_custom_logo() && ( 250 !== $logo_max_width ) && ( 210 >= $logo_max_width ) ) ? sprintf(
			'
			.wp-custom-logo .site-container .title-area {
				max-width: %spx;
			}
			',
			$logo_max_width
		) : '';

		/* Place menu below logo and center logo once it gets big */
		$css .= ( has_custom_logo() && ( 400 <= $logo_max_width ) ) ?
			'
			.wp-custom-logo .title-area,
			.wp-custom-logo .menu-toggle,
			.wp-custom-logo .nav-primary {
				float: none;
			}

			.wp-custom-logo .title-area {
				margin: 0 auto;
				max-width: 100%;
				text-align: center;

			}

			.wp-custom-logo .title-area img {
				left: 50%;
				top: 50%;
				transform: translate(-50%, -50%);
			}

			.wp-custom-logo .menu-toggle {
				clear: both;
				left: 50%;
				padding-right: 1rem;
				transform: translateX(-50%);
			}

			@media only screen and (min-width: 375px) {
				.wp-custom-logo .title-area {
					padding-left: 0;
				}
			}

			@media only screen and (min-width: 900px) {
				.site-header .wrap {
					flex-direction: column;
					flex-wrap: wrap;
				}
				.wp-custom-logo .nav-primary {
					text-align: center;
				}

				.wp-custom-logo .nav-primary .sub-menu {
					text-align: left;
				}

				.site-header {
					position: static;
				}

				.site-inner {
					margin-top: 0;
				}
			}
			'
		: '';

		if ( $css ) {
			wp_add_inline_style(
				$css_handle,
				$css
			);
		}

	},
	100
);
