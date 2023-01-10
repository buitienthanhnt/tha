define(['ko'],function (ko) {
    'use strict';
    return function (config) {
        console.log(123);
        return {
            title: ko.observable("Module Name will return"),
            getModulename : function () {
                return config;
            }
        }
    }
});