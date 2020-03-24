/* Trigger AJAX request to save state when the WooCommerce notice is dismissed */

jQuery(document).on( 'click', '.zen-woocommerce-notice .notice-dismiss', function() {

    jQuery.ajax({
        url: ajaxurl,
        data: {
            action: 'zen_dismiss_woocommerce_notice',
        },
    })

})
