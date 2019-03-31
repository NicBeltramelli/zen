<?php
/**
 * Genesis Advanced
 *
 * This file adds the content setting.
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
 * Modify the size of the Gravatar in the author box
 *
 * @since 3.0.0
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
add_filter(
	'genesis_author_box_gravatar_size',
	function ( $size ) {

		return 80;

	}
);

/**
 * Modify the size of the Gravatar in the entry comments
 *
 * @since 3.0.0
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
add_filter(
	'genesis_comment_list_args',
	function ( $args ) {

		$args['avatar_size'] = 80;
		return $args;

	}
);

/**
 * Add single post navigation
 *
 * @since 3.0.0
 */
add_action(
	'genesis_before_while',
	function () {

		if ( is_singular( 'post' ) ) {
			genesis_prev_next_post_nav();
		}

	}
);

/**
 * Disable Comments URL field
 *
 * @since 3.0.0
 *
 * @param array $fiels Default comment fields.
 * @return array Comment form fields.
 */
add_filter(
	'comment_form_default_fields',
	function ( $fields ) {

		unset( $fields['url'] );
		return $fields;

	}
);

/* Display author box on single posts */
add_filter(
	'get_the_author_genesis_author_box_single',
	'__return_true'
);

/* Display author box on archive pages */
add_filter(
	'get_the_author_genesis_author_box_archive',
	'__return_true'
);
