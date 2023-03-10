/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * @api
 */
 define(
    [
        'mage/url',
        'Magento_Checkout/js/model/full-screen-loader'
    ],
    function (url, fullScreenLoader) {
        'use strict';

        return {
            redirectUrl: window.checkoutConfig.defaultSuccessPageUrl,

            /**
             * Provide redirect to page
             */
            execute: function () {
                fullScreenLoader.startLoader();
                window.location.replace(this.redirectUrl.indexOf("___store=") != -1 ? url.build(this.redirectUrl) : this.redirectUrl);
            }
        };
    }
);
