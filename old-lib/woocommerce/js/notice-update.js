/**
 * Trigger AJAX request to save state when the WooCommerce notice is dismissed.
 *
 * @version 2.3.0
 *
 * @author StudioPress
 * @license GPL-2.0+
 * @package Genesisadvanced
 */

jQuery( document ).on(
	'click', '.genesis-advanced-woocommerce-notice .notice-dismiss', function() {

		jQuery.ajax(
			{
				url: ajaxurl,
				data: {
					action: 'genesis_advanced_dismiss_woocommerce_notice'
				}
			}
		);

	}
);
