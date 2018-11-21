/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/* @api */
define([
    'Magento_Checkout/js/view/payment/default',
    'jquery'
], function (Component, $) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'DamNT_LoyaltyCard/payment/checkmo'
        },

        getData: function() {
            return {
                'method': this.item.method,
                'additional_data': {
                    'loyalty_card': $('#checkmo_loyalty_card').val()
                }
            };
        },

        /**
         * Returns send check to info.
         *
         * @return {*}
         */
        getMailingAddress: function () {
            return window.checkoutConfig.payment.checkmo.mailingAddress;
        },

        /**
         * Returns payable to info.
         *
         * @return {*}
         */
        getPayableTo: function () {
            return window.checkoutConfig.payment.checkmo.payableTo;
        }
    });
});
