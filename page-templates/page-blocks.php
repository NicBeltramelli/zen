<?php
/**
 * Space
 *
 * Template Name: Blocks Page
 *
 * @package Space
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/space.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Force full width content layout */
add_filter(
	'genesis_site_layout',
	'__genesis_return_full_width_content'
);

/* Remove page title */
remove_action(
	'genesis_entry_header',
	'genesis_do_post_title'
);

/* Remove breadcrumbs */
remove_action(
	'genesis_before_loop',
	'genesis_do_breadcrumbs'
);

/* Run the Genesis loop */
genesis();
