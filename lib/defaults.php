<?php
/**
 * Genesis Advanced
 *
 * This file configures the default theme settings.
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
 * Set Simple Social Icon defaults
 *
 * @since 3.0.0
 *
 * @param array $defaults Social style defaults.
 * @return array Modified social style defaults.
 */
add_filter(
	'simple_social_default_styles',
	function ( $defaults ) {

		$args = [
			'alignment'              => 'alignleft',
			'background_color'       => '#f5f5f5',
			'background_color_hover' => '#333333',
			'border_radius'          => 3,
			'border_width'           => 0,
			'icon_color'             => '#333333',
			'icon_color_hover'       => '#ffffff',
			'size'                   => 40,
		];

		$args = wp_parse_args( $args, $defaults );

		return $args;

	}
);
