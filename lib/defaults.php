<?php
/**
 * Zen
 *
 * This file configures the default theme settings.
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
 * Set Simple Social Icon defaults
 *
 * @param array $defaults Social style defaults.
 * @return array Modified social style defaults.
 */
add_filter(
	'simple_social_default_styles',
	function ( $defaults ) {

		$args = genesis_get_config( 'simple-social-icons-settings' );

		return wp_parse_args( $args, $defaults );
	}
);
