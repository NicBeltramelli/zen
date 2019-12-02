<?php
/**
 * Space
 *
 * This file adds the Customizer additions.
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
			'space_link_color',
			[
				'default'           => $appearance['default-colors']['link'],
				'sanitize_callback' => 'sanitize_hex_color',
			]
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'space_link_color',
				[
					'description' => __( 'Change the default color of post info links, the hover color of linked titles and menu items, and more.', 'space' ),
					'label'       => __( 'Link Color', 'space' ),
					'section'     => 'colors',
					'settings'    => 'space_link_color',
				]
			)
		);

		/* Accent color addition */
		$wp_customize->add_setting(
			'space_accent_color',
			[
				'default'           => $appearance['default-colors']['accent'],
				'sanitize_callback' => 'sanitize_hex_color',
			]
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'space_accent_color',
				[
					'description' => __( 'Change the default hovers color for buttons.', 'space' ),
					'label'       => __( 'Accent Color', 'space' ),
					'section'     => 'colors',
					'settings'    => 'space_accent_color',
				]
			)
		);

		/* Logo width addition */
		$wp_customize->add_setting(
			'space_logo_width',
			[
				'default'           => 250,
				'sanitize_callback' => 'absint',
				'validate_callback' => 'space_validate_logo_width',
			]
		);

		$wp_customize->add_control(
			'space_logo_width',
			[
				'label'       => __( 'Logo Width', 'space' ),
				'description' => __( 'The maximum width of the logo in pixels.', 'space' ),
				'priority'    => 9,
				'section'     => 'title_tagline',
				'settings'    => 'space_logo_width',
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
 * @param object $validity The validity status.
 * @param int    $width The width entered by the user.
 * @return int The new width.
 */
function space_validate_logo_width( $validity, $width ) {

	if ( empty( $width ) || ! is_numeric( $width ) ) {
		$validity->add( 'required', __( 'You must supply a valid number.', 'space' ) );
	} elseif ( $width < 100 ) {
		$validity->add( 'logo_too_small', __( 'The logo width cannot be less than 100.', 'space' ) );
	}

	return $validity;
}
