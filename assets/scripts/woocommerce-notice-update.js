/**
 * Trigger AJAX request to save state when the WooCommerce notice is dismissed.
 *
 * @package Genesis Advanced
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/genesis-advanced.git
 */

jQuery(document).on( 'click', '.genesis-advanced-woocommerce-notice .notice-dismiss', function() {

    jQuery.ajax({
        url: ajaxurl,
        data: {
            action: 'genesis_advanced_dismiss_woocommerce_notice',
        },
    })

})
