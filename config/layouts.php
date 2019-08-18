<?php
/**
 * Genesis Advanced
 *
 * This file overrides `genesis/config/layouts.php` to set default theme layouts.
 *
 * @package Genesis Advanced
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/genesis-advanced.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$genesis_advanced_layouts = array();

$genesis_advanced_layouts_config = PARENT_DIR . '/config/layouts.php';

if ( is_readable( $genesis_advanced_layouts_config ) ) {
	$genesis_advanced_layouts = require $genesis_advanced_layouts_config;
	unset( $genesis_advanced_layouts['content-sidebar-sidebar'] );
	unset( $genesis_advanced_layouts['sidebar-sidebar-content'] );
	unset( $genesis_advanced_layouts['sidebar-content-sidebar'] );
}

return $genesis_advanced_layouts;
