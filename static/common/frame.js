/**
 * Created by m on 17-4-5.
 * 公共封装
 */

var http = {
    apiUrl:'http://api.lihuasheng.cn',
    motheds: 'post.get.put.delete',
    get: function (url, data, fun) {
        this.go('get', url, data, fun);
    },
    post: function (url, data, fun) {
        this.go('post', url, data, fun);
    },
    put: function (url, data, fun) {
        this.go('put', url, data, fun);
    },
    delete: function (url, data, fun) {
        this.go('delete', url, data, fun);
    },
    go: function (mothed, url, data, fun) {
        if (url == '') {
            return 0;
        }
        if (this.motheds.indexOf(mothed) <= 0) {
            return false;
        }
        url = url.substr(0, 7).toLowerCase() == "http://" ? url : this.apiUrl + url;
        fun = (typeof fun != "undefined" && typeof fun == 'function') ? fun : function () {
        };
        $.ajax(
            {
                url: url,
                type: mothed,
                data: data,
                dataType: 'json',
                success: fun
            }
        )
    },
}
