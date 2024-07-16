(function ($){
    $(document).ready(function () {
        const _ajax_url = cjpg_ajax_obj.ajaxurl;
        const _nonce = cjpg_ajax_obj.nonce;
        const _message = cjpg_ajax_obj.message;
        const _message_err = cjpg_ajax_obj.message_err;

        $(document).on("click", '#icreditAdminFieldsSections a',function (e) {e.preventDefault();_init_icredit_admin.toggleTab( $(this) );});
        $(document).on("change", '#woocommerce_icredit_payment_show_icons',function (e) {e.preventDefault();_init_icredit_admin.toggleAreas( $(this), 'iconRowTr' );});
        $(document).on("change", '#woocommerce_icredit_payment_subheading21',function (e) {e.preventDefault();_init_icredit_admin.toggleAreas( $(this), 'iconRowTr2' );});
        $(document).on("change", '#woocommerce_icredit_payment_subheading22',function (e) {e.preventDefault();_init_icredit_admin.toggleAreas( $(this), 'iconRowTr3' );});
        $(document).on("click", '#chargeTokenRivhit',function (e) {e.preventDefault();_init_icredit_admin.chargeToken( $(this) );});
        $(document).on("change", '#woocommerce_icredit_payment_SaleType',function (e) {e.preventDefault();_init_icredit_admin.toggleAreasSelect( $(this), 'iconRowTr4' );});
        $(document).on("change", '#woocommerce_icredit_payment_create_token',function (e) {e.preventDefault();_init_icredit_admin.toggleAreas( $(this), 'iconRowTr5' );});

        const mainTarget = $(".icreditAdminFields #mainform table tr");
        const langTarget1 = mainTarget.has('input.iconx');
        const langTarget2 = mainTarget.has('input.shippings');
        const langTarget3 = mainTarget.has('input.transmittedData');
        const langTarget4 = mainTarget.has('.saletypecontroller');
        const langTarget5 = mainTarget.has('.create_token_controller');
        const target = $("#GeneralRivhit").next('table.form-table');

        const _init_icredit_admin = {
            'init': function () {
                if ( target.length > 0 ) {target.addClass('activeTab');}
                $.each( langTarget1, function (k,v) {$(v).addClass('iconRowTr');});
                $.each( langTarget2, function (k,v) {$(v).addClass('iconRowTr2');});
                $.each( langTarget3, function (k,v) {$(v).addClass('iconRowTr3');});
                $.each( langTarget4, function (k,v) {$(v).addClass('iconRowTr4');});
                $.each( langTarget5, function (k,v) {$(v).addClass('iconRowTr5');});
                this.toggleAreas( $("#woocommerce_icredit_payment_show_icons"), 'iconRowTr' );
                this.toggleAreas( $("#woocommerce_icredit_payment_subheading21"), 'iconRowTr2' );
                this.toggleAreas( $("#woocommerce_icredit_payment_subheading22"), 'iconRowTr3' );
                this.toggleAreasSelect( $("#woocommerce_icredit_payment_SaleType"), 'iconRowTr4' );
                this.toggleAreas( $("#woocommerce_icredit_payment_create_token"), 'iconRowTr5' );
            },
            'toggleTab': function ( $this ) {
                if ( $this.hasClass('nav-tab-active') ) return true;
                $.each( $(".rivhit_tab_in"), function (k,v){
                    $(v).removeClass('nav-tab-active');
                    let target = $($(v).attr('href')).next('table.form-table');
                    target.hide(10);
                    target.removeClass('activeTab');
                }).promise().done( function () {
                    $this.addClass('nav-tab-active');
                    let target = $($this.attr('href')).next('table.form-table');
                    target.show(10);
                    target.addClass('activeTab');
                });
            },
            'toggleAreas': function ( $this, className ) {
                const alRows = $("." + className);
                if ( $this.is(':checked') ) {
                    alRows.slideDown();
                } else {
                    alRows.slideUp();
                }
                return true;
            },
            'toggleAreasSelect': function( $this, className ) {
                const alRows = $("." + className);
                if ( $this.val() === '2' ) {
                    alRows.slideDown();
                } else {
                    alRows.slideUp();
                }
                return true;
            },
            'chargeToken': function ( $this ) {
                const fv = this;
                if ( confirm( _message ) ) {
                    $this.attr('disabled', "true");
                    const o_id = $this.attr('data-order');
                    if (o_id) {
                        fv.sendAjax({order_id: o_id}, 'POST', 'rivhit_admin_charge_token', 'charge_token');
                    }
                }
                return true;
            },
            'sendAjax': function ( data, method, action, callback ) {
                let _d = data;
                _d.nonce = _nonce;
                _d.action = action;
                let _l_ajax = $.ajax({
                    url: _ajax_url,
                    data: _d,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    contentType: 'application/json; charset=utf-8',
                    dataType: 'json',
                    type: method,
                });
                _l_ajax.done(function (response, msg) {
                    if ( callback === 'charge_token' ) {
                        window.location.reload();
                    }
                });
                _l_ajax.fail(function (error, textStatus, msg) {
                    console.log(error);
                });
            },
        };
        _init_icredit_admin.init();
    });
})(jQuery);
