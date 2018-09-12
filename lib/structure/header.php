<?php
/**
 * Genesis Advanced
 *
 * This file adds the header setting.
 *
 * @package Genesis Advanced
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/genesis-advanced.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Display custom logo */
add_action( 'genesis_site_title', 'the_custom_logo', 0 );
