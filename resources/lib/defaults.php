<?php
/**
 * Genesis Advanced
 *
 * This file configures the default theme settings.
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
 * Update theme settings on reset
 *
 * @since 2.2.3
 *
 * @param array $defaults Original theme settings defaults.
 * @return array Modified defaults.
 */
add_filter( 'genesis_theme_settings_defaults', function ( $defaults ) {

	$defaults['blog_cat_num']              = 6;
	$defaults['content_archive']           = 'full';
	$defaults['content_archive_limit']     = 0;
	$defaults['content_archive_thumbnail'] = 0;
	$defaults['posts_nav']                 = 'numeric';
	$defaults['site_layout']               = 'content-sidebar';

	return $defaults;

} );

/**
 * Update theme settings on activation
 *
 * @since 2.2.3
 */
add_action( 'after_switch_theme', function () {

	if ( function_exists( 'genesis_update_settings' ) ) {

		genesis_update_settings( [
			'blog_cat_num'              => 6,
			'content_archive'           => 'full',
			'content_archive_limit'     => 0,
			'content_archive_thumbnail' => 0,
			'posts_nav'                 => 'numeric',
			'site_layout'               => 'content-sidebar',
		] );
	}

	update_option( 'posts_per_page', 6 );

} );

/**
 * Set Simple Social Icon defaults
 *
 * @since 1.0.0
 *
 * @param array $defaults Social style defaults.
 * @return array Modified social style defaults.
 */
add_filter( 'simple_social_default_styles', function ( $defaults ) {

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

} );
