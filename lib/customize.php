<?php
/**
 * Genesis Advanced
 *
 * This file adds the Customizer additions.
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
 * Register settings and controls with the Customizer
 *
 * @since 3.0.0
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
			'genesis_advanced_link_color',
			[
				'default'           => $appearance['default-colors']['link'],
				'sanitize_callback' => 'sanitize_hex_color',
			]
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'genesis_advanced_link_color',
				[
					'description' => __( 'Change the default color of post info links, the hover color of linked titles and menu items, and more.', 'genesis-advanced' ),
					'label'       => __( 'Link Color', 'genesis-advanced' ),
					'section'     => 'colors',
					'settings'    => 'genesis_advanced_link_color',
				]
			)
		);

		/* Accent color addition */
		$wp_customize->add_setting(
			'genesis_advanced_accent_color',
			[
				'default'           => $appearance['default-colors']['accent'],
				'sanitize_callback' => 'sanitize_hex_color',
			]
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'genesis_advanced_accent_color',
				[
					'description' => __( 'Change the default hovers color for buttons.', 'genesis-advanced' ),
					'label'       => __( 'Accent Color', 'genesis-advanced' ),
					'section'     => 'colors',
					'settings'    => 'genesis_advanced_accent_color',
				]
			)
		);

		/* Logo width addition */
		$wp_customize->add_setting(
			'genesis_advanced_logo_width',
			[
				'default'           => 250,
				'sanitize_callback' => 'absint',
				'validate_callback' => 'genesis_advanced_validate_logo_width',
			]
		);

		$wp_customize->add_control(
			'genesis_advanced_logo_width',
			[
				'label'       => __( 'Logo Width', 'genesis-advanced' ),
				'description' => __( 'The maximum width of the logo in pixels.', 'genesis-advanced' ),
				'priority'    => 9,
				'section'     => 'title_tagline',
				'settings'    => 'genesis_advanced_logo_width',
				'type'        => 'number',
				'input_attrs' =>
				[
					'min' => 100,
				],

			]
		);

	}
);

/**
 * Display a message if the entered width is not numeric or greater than 100
 *
 * @since 3.4.0
 *
 * @param object $validity The validity status.
 * @param int    $width The width entered by the user.
 * @return int The new width.
 */
function genesis_advanced_validate_logo_width( $validity, $width ) {

	if ( empty( $width ) || ! is_numeric( $width ) ) {
		$validity->add( 'required', __( 'You must supply a valid number.', 'genesis-advanced' ) );
	} elseif ( $width < 100 ) {
		$validity->add( 'logo_too_small', __( 'The logo width cannot be less than 100.', 'genesis-advanced' ) );
	}

	return $validity;
}
