<?php
/**
 * Genesis Advanced
 *
 * This file adds the layout setting.
 *
 * @package Genesis Advanced
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/genesis-advanced.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Remove site layouts */
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
