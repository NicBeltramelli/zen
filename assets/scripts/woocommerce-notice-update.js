/* Trigger AJAX request to save state when the WooCommerce notice is dismissed */

jQuery(document).on( 'click', '.genesis-advanced-woocommerce-notice .notice-dismiss', function() {

    jQuery.ajax({
        url: ajaxurl,
        data: {
            action: 'genesis_advanced_dismiss_woocommerce_notice',
        },
    })

})
