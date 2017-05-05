/**
 * Created by m on 17-5-2.
 */
layui.use(['tree', 'layer'], function () {
    //同步组织架构
    var organizationBtn = $('#organization_put');
    organizationBtn.on('click', '', function () {
        http.put('/member/api/organizations','',function (data) {
            if(data.code===1){

            }else {

            }
        })
    });
    layui.tree({
        elem: '#index_tree'
        , nodes: [{ //节点数据
            name: '节点A'
            , children: [{
                name: '节点A1'
            }]
        }, {
            name: '节点B'
            , children: [{
                name: '节点B1'
                , alias: 'bb' //可选
                , id: '123' //可选
            }, {
                name: '节点B2'
            }]
        }]
        , click: function (node) {
            console.log(node) //node即为当前点击的节点数据
        }
    });
});