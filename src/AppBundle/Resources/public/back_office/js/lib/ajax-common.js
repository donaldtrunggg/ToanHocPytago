var AjaxCommon = AjaxCommon || {};
AjaxCommon = {
    get: function(url, data, async, callback, errorCallback) {
        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            async : async,
            beforeSend : function() {
                $.blockUI();
            },
            complete: function () {
                $.unblockUI();
            },
            success: function (result) {
                callback(result);
            },
            error: function () {
                $.unblockUI();
                if(typeof errorCallback != 'undefined') {
                    errorCallback();
                }
            }
        })
    },

    post: function(url, data, callback, errorCallback) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            beforeSend : function() {
                $.blockUI();
            },
            complete: function () {
                $.unblockUI();
            },
            success: function (result) {
                callback(result);
            },
            error: function () {
                $.unblockUI();
                if(typeof errorCallback != 'undefined') {
                    errorCallback();
                }
            }
        })
    },

    patch: function(url, data, callback, errorCallback) {
        $.ajax({
            url: url,
            type: 'PATCH',
            data: data,
            beforeSend : function() {
                $.blockUI();
            },
            complete: function () {
                $.unblockUI();
            },
            success: function (result) {
                callback(result);
            },
            error: function () {
                $.unblockUI();
                if(typeof errorCallback != 'undefined') {
                    errorCallback();
                }
            }
        })
    }
};