<?php
/**
 * Zen
 *
 * This file adds the Customizer additions.
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
 * Register settings and controls with the Customizer
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
add_action(
	'customize_register',
	function ( $wp_customize ) {

		/* Locate the config file */
		$appearance = genesis_get_config( 'appearance' );

		/* Link color addition */
		$wp_customize->add_setting(
			'zen_link_color',
			[
				'default'           => $appearance['default-colors']['link'],
				'sanitize_callback' => 'sanitize_hex_color',
			]
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zen_link_color',
				[
					'description' => __( 'Change the default color of post info links, the hover color of linked titles and menu items, and more.', 'zen' ),
					'label'       => __( 'Link Color', 'zen' ),
					'section'     => 'colors',
					'settings'    => 'zen_link_color',
				]
			)
		);

		/* Accent color addition */
		$wp_customize->add_setting(
			'zen_accent_color',
			[
				'default'           => $appearance['default-colors']['accent'],
				'sanitize_callback' => 'sanitize_hex_color',
			]
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zen_accent_color',
				[
					'description' => __( 'Change the default hovers color for buttons.', 'zen' ),
					'label'       => __( 'Accent Color', 'zen' ),
					'section'     => 'colors',
					'settings'    => 'zen_accent_color',
				]
			)
		);

		/* Logo width addition */
		$wp_customize->add_setting(
			'zen_logo_width',
			[
				'default'           => 250,
				'sanitize_callback' => 'absint',
				'validate_callback' => 'zen_validate_logo_width',
			]
		);

		$wp_customize->add_control(
			'zen_logo_width',
			[
				'label'       => __( 'Logo Width', 'zen' ),
				'description' => __( 'The maximum width of the logo in pixels.', 'zen' ),
				'priority'    => 9,
				'section'     => 'title_tagline',
				'settings'    => 'zen_logo_width',
				'type'        => 'number',
				'input_attrs' =>
				[
					'min' => 100,
				],

			]
		);

		/* Header options addition */
		$wp_customize->add_setting(
			'zen_header_options',
			[
				'capability' => 'edit_theme_options',
				'default'    => 'normal',
				'transport'  => 'refresh',
			]
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'zen_header_options',
				[

					'label'    => __( 'Header Options', 'zen' ),
					'settings' => 'zen_header_options',
					'section'  => 'genesis_layout',
					'type'     => 'radio',
					'choices'  =>
					[
						'normal'          => __( 'Normal', 'zen' ),
						'fixed-header'    => __( 'Fixed', 'zen' ),
						'floating-header' => __( 'Floating (active from tablet)', 'zen' ),
					],
				]
			)
		);
	}
);

/**
 * Display a message if the entered width is not numeric or greater than 100
 *
 * @param object $validity The validity status.
 * @param int    $width The width entered by the user.
 * @return int The new width.
 */
function zen_validate_logo_width( $validity, $width ) {

	if ( empty( $width ) || ! is_numeric( $width ) ) {
		$validity->add( 'required', __( 'You must supply a valid number.', 'zen' ) );
	} elseif ( $width < 100 ) {
		$validity->add( 'logo_too_small', __( 'The logo width cannot be less than 100.', 'zen' ) );
	}

	return $validity;
}
