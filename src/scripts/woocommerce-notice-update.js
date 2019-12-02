/* Trigger AJAX request to save state when the WooCommerce notice is dismissed */

jQuery(document).on( 'click', '.space-woocommerce-notice .notice-dismiss', function() {

    jQuery.ajax({
        url: ajaxurl,
        data: {
            action: 'space_dismiss_woocommerce_notice',
        },
    })

})
