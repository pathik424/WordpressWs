(function ($){
    $(document).ready(function () {
        let boolSamePage = false;
        const formCheckout = $("form.checkout");

        $(document).on("click", "#place_order", function (e) {_init_icredit_front.submit();});

        const _init_icredit_front = {
            'init': function () {
                if ( $("#method_same_page_option").length > 0 ) {
                    boolSamePage = true;
                    formCheckout.attr('onsubmit', 'return false;');
                    const mt = this.get_payment_method();
                    //$('form.checkout').triggerHandler('checkout_place_order_' + mt.get_payment_method());

                }
            },
            'submit': function () {
                if ( boolSamePage === true ) {

                    console.log('trest');
                }
                console.log('tr2est');
            },
            'get_payment_method': function () {
                return $('form.checkout').find('input[name="payment_method"]:checked').val(); // checkout_place_order_
            },

        };
        _init_icredit_front.init();
    });
})(jQuery);
