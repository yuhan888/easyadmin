define(["jquery", "admin", "treetable", "iconPickerFa", "path"], function ($, admin, path) {

    var table = layui.table;
    var form = layui.form;
    var treetable = layui.treetable;
    var iconPickerFa = layui.iconPickerFa;

    var Controller = {
        index: function () {

            var init = {
                index_url: 'system.menu/index',
                add_url: 'system.menu/add',
                del_url: 'system.menu/del',
                modify_url: 'system.menu/modify',
                table: 'currentTable',
            };

            treetable.render({
                treeColIndex: 1,
                treeSpid: 0,
                homdPid: 99999999,
                treeIdName: 'id',
                treePidName: 'pid',
                elem: '#currentTable',
                url: admin.url(init.index_url),
                toolbar: '#toolbar',
                page: false,
                cols: [[
                    {type: 'checkbox'},
                    {field: 'title', width: 250, title: '菜单名称'},
                    {
                        field: 'icon', width: 80, align: 'center', title: '图标', templet: function (d) {
                            return '<i class="' + d.icon + '"></i>';
                        }
                    },
                    {field: 'href', minWidth: 120, title: '菜单链接'},
                    {
                        field: 'is_home', width: 80, align: 'center', title: '类型', templet: function (d) {
                            if (d.pid == 99999999) {
                                return '<span class="layui-badge layui-bg-blue">首页</span>';
                            }
                            if (d.pid == 0) {
                                return '<span class="layui-badge layui-bg-gray">模块</span>';
                            } else {
                                return '<span class="layui-badge-rim">菜单</span>';
                            }
                        }
                    },
                    {field: 'status', title: '状态', width: 85, align: "center", filter: 'status', templet: admin.table.switch},
                    {field: 'status', width: 80, align: 'center', title: '排序'},
                    {
                        width: 200, align: 'center', title: '操作', templet: admin.table.tool, operat: [
                            {
                                class: 'layui-btn layui-btn-xs',
                                text: '添加下级',
                                open: 'system.menu/add',
                                extend: ""
                            },
                            {
                                class: 'layui-btn layui-btn-normal layui-btn-xs',
                                text: '编辑',
                                open: 'system.menu/edit',
                                extend: ""
                            },
                            {
                                class: 'layui-btn layui-btn-danger layui-btn-xs',
                                text: '删除',
                                request: 'system.menu/del',
                                extend: ""
                            }
                        ]
                    }
                ]],
            });

            $('#btn-expand').click(function () {
                treetable.expandAll('#currentTable');
            });

            $('#btn-fold').click(function () {
                treetable.foldAll('#currentTable');
            });

            //头工具栏事件
            table.on('toolbar(currentTable)', function (obj) {
                var checkStatus = table.checkStatus(obj.config.id);
                switch (obj.event) {
                    case 'deleteAll':
                        var data = checkStatus.data;
                        layer.alert(JSON.stringify(data));
                        break;
                }
            });

            // 监听开关切换
            admin.table.listenSwitch({filter: 'status', url: init.modify_url});

            //监听工具条
            table.on('tool(currentTable)', function (obj) {
                var data = obj.data;
                var layEvent = obj.event;

                if (layEvent === 'del') {
                    layer.msg('删除' + data.id);
                } else if (layEvent === 'edit') {
                    layer.msg('修改' + data.id);
                }
            });
            admin.listen();
        },
        add: function () {
            iconPickerFa.render({
                elem: '#icon',
                url: PATH_CONFIG.iconLess,
                limit: 12,
                click: function (data) {
                    $('#icon').val('fa ' + data.icon);
                },
                success: function (d) {
                    console.log(d);
                }
            });
            admin.listen(function (url, data) {
                admin.api.form(url, data, function (res) {
                    admin.msg.success(res.msg, function () {
                        admin.api.closeCurrentOpen({
                            refreshTable: true,
                            refreshFrame: true
                        });
                    });
                });
                return false;
            });
        },
        edit: function () {
            iconPickerFa.render({
                elem: '#icon',
                url: PATH_CONFIG.iconLess,
                limit: 12,
                click: function (data) {
                    $('#icon').val('fa ' + data.icon);
                },
                success: function (d) {
                    console.log(d);
                }
            });
            admin.listen(function (url, data) {
                admin.api.form(url, data, function (res) {
                    admin.msg.success(res.msg, function () {
                        admin.api.closeCurrentOpen({
                            refreshTable: true,
                            refreshFrame: true
                        });
                    });
                });
                return false;
            });
        }
    };
    return Controller;
});