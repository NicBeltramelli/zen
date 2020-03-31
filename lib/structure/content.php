<?php
/**
 * Zen
 *
 * This file adds the content setting.
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
 * Modify the size of the Gravatar in the author box
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

/* Add single post navigation */
add_action(
	'genesis_before_while',
	function () {

		if ( is_singular( 'post' ) ) {
			genesis_prev_next_post_nav();
		}

	}
);

/**
 * Disable comments URL field
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

/* Customize the read more text */
add_filter(
	'genesis_more_text',
	function () {

		$more_text = genesis_a11y_more_link( __( '[ Read More ]', 'zen' ) );

		return $more_text;

	}
);

/* Display featured image on page and post */
add_action(
	'genesis_before_content',
	function () {

		if ( ! is_singular( [ 'post', 'page', 'project' ] ) ||
			! has_post_thumbnail() ) {

			return;

		}

		// Display featured image above content.
		$thumb = get_the_post_thumbnail_url(); ?>

		<div class="featured-image-wrapper" style="background-image: url('<?php echo esc_url( $thumb ); ?>')">
		</div>

		<?php
	},
	5
);
