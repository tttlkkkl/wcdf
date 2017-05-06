var nowDOM = document.getElementById('now');
var hours = new Date().getHours();
var isLogin=0;//标记是否登录
function getTime() {
    var min = new Date().getMinutes();
    var sec = new Date().getSeconds();
    var now = hours + ':' + min + ':' + sec;
    return now;
}
nowDOM.innerHTML = getTime();
setInterval(function () {
    nowDOM.innerHTML = getTime();
}, 1000);


var year = new Date().getFullYear();
var month = new Date().getMonth() + 1;
var day = new Date().getDate();

var today = year + '-' + month + '-' + day;
document.getElementById('today').innerHTML = today;

var gps = new Location();
var address = null;
var punchBtn = document.getElementById('punchBtn');

punchBtn.addEventListener('click', function () {
    gps.bLocation(function (rs) {
        address = this.address;
        console.log('880', this);

    })
});
$(function(){
   //获取用户信息
    http.get('/system/api/oAuth','',function(data){
        if(data.code===0){
            if(data.data.result===1){
                isLogin=1;
                var user = data.data.user;
                var avatar = $('#avatar');
                var userName = $('#user_name');
                if (user.avatar !== null && user.avatar !== undefined && user.avatar !== '') {
                    avatar.attr('src', user.avatar);
                }
                if (user.name !== null && user.name !== undefined && user.name !== '') {
                    userName.text(user.name);
                }
            }else {
                layer.open({
                    content: '您未登入系统，是否前往登录?'
                    ,btn: ['去登录', '朕知道了']
                    ,yes: function(index){
                        layer.close(index);
                        location.href='/mobile/';
                    }
                });
            }
        }else {
            layer.open({
                content:data.msg || '鉴权失败!'
                ,skin: 'msg'
                ,time: 2 //2秒后自动关闭
            });
        }
    })
});
