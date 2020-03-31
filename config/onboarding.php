<?php
/**
 * Zen
 *
 * Onboarding config to load plugins and sample contents on theme activation.
 *
 * @package Zen
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/zen.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

return [
	'dependencies' => [
		'plugins' => [
			[
				'name'       => __( 'Genesis Connect for WooCommerce', 'zen' ),
				'slug'       => 'genesis-connect-woocommerce/genesis-connect-woocommerce.php',
				'public_url' => 'https://wordpress.org/plugins/genesis-connect-woocommerce/',
			],
			[
				'name'       => __( 'Simple Social Icons', 'zen' ),
				'slug'       => 'simple-social-icons/simple-social-icons.php',
				'public_url' => 'https://wordpress.org/plugins/simple-social-icons/',
			],
			[
				'name'       => __( 'WooCommerce', 'zen' ),
				'slug'       => 'woocommerce/woocommerce.php',
				'public_url' => 'https://wordpress.org/plugins/woocommerce/',
			],
		],
	],
	'content'      => [
		'homepage' => [
			'post_title'     => 'Zen',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/zen.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'page_template'  => 'page-templates/page-landing.php',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [
				'_genesis_hide_title'       => true,
				'_genesis_hide_breadcrumbs' => true,
			],
		],
	],
	'widgets'      => [
		'footer-1' => [
			[
				'type' => 'text',
				'args' => [
					'title'  => 'Footer 1',
					'text'   => '<p>Maecenas convallis ultrices ex ut bibendum. Nam placerat mi ac purus maximus, nec tincidunt elit posuere. Donec facilisis urna id egestas hendrerit. Etiam in leo ullamcorper, efficitur libero et, egestas quam.</p>',
					'filter' => 1,
					'visual' => 1,
				],
			],
		],
		'footer-2' => [
			[
				'type' => 'text',
				'args' => [
					'title'  => 'Footer 2',
					'text'   => '<p>Maecenas convallis ultrices ex ut bibendum. Nam placerat mi ac purus maximus, nec tincidunt elit posuere. Donec facilisis urna id egestas hendrerit. Etiam in leo ullamcorper, efficitur libero et, egestas quam.</p>',
					'filter' => 1,
					'visual' => 1,
				],
			],
		],
		'footer-3' => [
			[
				'type' => 'text',
				'args' => [
					'title'  => 'Footer 3',
					'text'   => '<p>Maecenas convallis ultrices ex ut bibendum. Nam placerat mi ac purus maximus, nec tincidunt elit posuere. Donec facilisis urna id egestas hendrerit. Etiam in leo ullamcorper, efficitur libero et, egestas quam.</p>',
					'filter' => 1,
					'visual' => 1,
				],
			],
		],
	],
];
