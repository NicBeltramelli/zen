<?php
/**
 * Space
 *
 * This file adds the front page template.
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

genesis();
