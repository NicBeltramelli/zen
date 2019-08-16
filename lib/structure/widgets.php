<?php
/**
 * Genesis Advanced
 *
 * This file adds the widgets settings.
 *
 * @package Genesis Advanced
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/genesis-advanced.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Remove header right widget area */
unregister_sidebar(
	'header-right'
);

/* Remove secondary sidebar */
unregister_sidebar(
	'sidebar-alt'
);
