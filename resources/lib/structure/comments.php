<?php
/**
 * Genesis Advanced
 *
 * This file adds the comments setting.
 *
 * @package Genesis Advanced
 * @author  NicBeltramelli
 * @license GPL-2.0+
 * @link    https://github.com/NicBeltramelli/genesis-advanced.git
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Modify size of the Gravatar in the entry comments
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
add_filter( 'genesis_comment_list_args', function ( $args ) {

	$args['avatar_size'] = 60;
	return $args;

} );
