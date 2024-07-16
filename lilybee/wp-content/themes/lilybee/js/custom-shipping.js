jQuery(document).ready(function($) {
    function showLoader() {
        $('.loader').show();
    }

    function hideLoader() {
        $('.loader').hide();
    }

    // Update shipping methods when quantity changes
    $(document).on('change', '.qty', function() {
        showLoader();
        $.ajax({
            type: 'POST',
            url: custom_shipping.ajax_url,
            data: {
                action: 'update_shipping_methods',
                wc_ajax_nonce: custom_shipping.wc_ajax_nonce
            },
            success: function(response) {
                if (response.success) {
                    $(document.body).trigger('update_checkout');
                }
            },
            complete: function() {
                hideLoader();
            }
        });
    });

    // Ensure loader is shown during update
    $(document.body).on('updated_cart_totals', function() {
        hideLoader();
    });

    $(document.body).on('updated_checkout', function() {
        hideLoader();
    });

    // Show loader on cart quantity change
    $(document.body).on('change input', 'input.qty', function() {
        showLoader();
    });
});
