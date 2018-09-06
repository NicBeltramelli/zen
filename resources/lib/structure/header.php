<?php
/**
 * Genesis Advanced
 *
 * This file adds the header setting.
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

// Display custom logo.
add_action( 'genesis_site_title', 'the_custom_logo', 0 );