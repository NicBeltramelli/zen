<?php
/**
 * Zen
 *
 * This file overrides `genesis/config/layouts.php` to set default theme layouts.
 *
 * @package Zen
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/zen.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$zen_layouts = array();

$zen_layouts_config = PARENT_DIR . '/config/layouts.php';

if ( is_readable( $zen_layouts_config ) ) {
	$zen_layouts = require $zen_layouts_config;
	unset( $zen_layouts['content-sidebar-sidebar'] );
	unset( $zen_layouts['sidebar-sidebar-content'] );
	unset( $zen_layouts['sidebar-content-sidebar'] );
}

return $zen_layouts;
