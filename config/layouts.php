<?php
/**
 * Space
 *
 * This file overrides `genesis/config/layouts.php` to set default theme layouts.
 *
 * @package Space
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/space.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$space_layouts = array();

$space_layouts_config = PARENT_DIR . '/config/layouts.php';

if ( is_readable( $space_layouts_config ) ) {
	$space_layouts = require $space_layouts_config;
	unset( $space_layouts['content-sidebar-sidebar'] );
	unset( $space_layouts['sidebar-sidebar-content'] );
	unset( $space_layouts['sidebar-content-sidebar'] );
}

return $space_layouts;
