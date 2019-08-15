<?php
/**
 * Genesis Advanced
 *
 * This file configures paths for assets.
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
 * Define paths for assets
 *
 * @since 3.0.0
 */
class Genesis_Advanced_Manifest {

	/**
	 * Asset path
	 *
	 * @var array manifest Asset path.
	 */
	private $manifest;

	/**
	 * Init asset path
	 *
	 * @param string $manifest_path Path of the json manifest file.
	 */
	public function __construct( $manifest_path ) {

		if ( file_exists( $manifest_path ) ) {

			// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents, WordPress.WP.AlternativeFunctions.file_system_read_file_get_contents
			$this->manifest = json_decode( file_get_contents( $manifest_path ), true );

		} else {

			$this->manifest = [];
		}
	}

	/**
	 * Return asset path object
	 */
	public function get() {

		return $this->manifest;
	}
}

/**
 * Get paths for assets
 *
 * @since 3.0.0
 *
 * @param string $filename Asset file name.
 */
function genesis_advanced_asset_path( $filename ) {

	$dist_path = get_theme_file_uri() . '/dist/';

	static $manifest;

	if ( empty( $manifest ) ) :

		$manifest_path = get_theme_file_path() . '/dist/assets.json';
		$manifest      = new Genesis_Advanced_Manifest( $manifest_path );
	endif;

	if ( array_key_exists( $filename, $manifest->get() ) ) :

		return $dist_path . $manifest->get()[ $filename ];

	endif;

	return $dist_path . $filename;

}
