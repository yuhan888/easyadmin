<?php

// +----------------------------------------------------------------------
// | EasyAdmin
// +----------------------------------------------------------------------
// | PHP交流群: 763822524
// +----------------------------------------------------------------------
// | 开源协议  https://mit-license.org 
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/zhongshaofa/EasyAdmin
// +----------------------------------------------------------------------

namespace app\admin\controller\system;


use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use app\common\controller\AdminController;

/**
 * Class Menu
 * @package app\admin\controller\system
 * @ControllerAnnotation(title="菜单管理",auth=true)
 */
class Menu extends AdminController
{

    /**
     * @NodeAnotation(title="菜单列表",auth=true)
     */
    public function index()
    {
        if ($this->request->isAjax()) {
            $data = <<<EOT
{
  "code": 0,
  "msg": "",
  "count": 19,
  "data": [
    {
      "authorityId": 1,
      "authorityName": "系统管理",
      "orderNumber": 1,
      "menuUrl": null,
      "menuIcon": "layui-icon-set",
      "createTime": "2018/06/29 11:05:41",
      "authority": null,
      "checked": 0,
      "updateTime": "2018/07/13 09:13:42",
      "isMenu": 0,
      "parentId": -1
    },
    {
      "authorityId": 2,
      "authorityName": "用户管理",
      "orderNumber": 2,
      "menuUrl": "system/user",
      "menuIcon": null,
      "createTime": "2018/06/29 11:05:41",
      "authority": null,
      "checked": 0,
      "updateTime": "2018/07/13 09:13:42",
      "isMenu": 0,
      "parentId": 1
    },
    {
      "authorityId": 3,
      "authorityName": "查询用户",
      "orderNumber": 3,
      "menuUrl": "",
      "menuIcon": "",
      "createTime": "2018/07/21 13:54:16",
      "authority": "user:view",
      "checked": 0,
      "updateTime": "2018/07/21 13:54:16",
      "isMenu": 1,
      "parentId": 2
    },
    {
      "authorityId": 4,
      "authorityName": "添加用户",
      "orderNumber": 4,
      "menuUrl": null,
      "menuIcon": null,
      "createTime": "2018/06/29 11:05:41",
      "authority": "user:add",
      "checked": 0,
      "updateTime": "2018/07/13 09:13:42",
      "isMenu": 1,
      "parentId": 2
    },
    {
      "authorityId": 5,
      "authorityName": "修改用户",
      "orderNumber": 5,
      "menuUrl": null,
      "menuIcon": null,
      "createTime": "2018/06/29 11:05:41",
      "authority": "user:edit",
      "checked": 0,
      "updateTime": "2018/07/13 09:13:42",
      "isMenu": 1,
      "parentId": 2
    },
    {
      "authorityId": 6,
      "authorityName": "删除用户",
      "orderNumber": 6,
      "menuUrl": null,
      "menuIcon": null,
      "createTime": "2018/06/29 11:05:41",
      "authority": "user:delete",
      "checked": 0,
      "updateTime": "2018/07/13 09:13:42",
      "isMenu": 1,
      "parentId": 2
    },
    {
      "authorityId": 7,
      "authorityName": "角色管理",
      "orderNumber": 7,
      "menuUrl": "system/role",
      "menuIcon": null,
      "createTime": "2018/06/29 11:05:41",
      "authority": null,
      "checked": 0,
      "updateTime": "2018/07/13 09:13:42",
      "isMenu": 0,
      "parentId": 1
    },
    {
      "authorityId": 8,
      "authorityName": "查询角色",
      "orderNumber": 8,
      "menuUrl": "",
      "menuIcon": "",
      "createTime": "2018/07/21 13:54:59",
      "authority": "role:view",
      "checked": 0,
      "updateTime": "2018/07/21 13:54:58",
      "isMenu": 1,
      "parentId": 7
    },
    {
      "authorityId": 9,
      "authorityName": "添加角色",
      "orderNumber": 9,
      "menuUrl": "",
      "menuIcon": "",
      "createTime": "2018/06/29 11:05:41",
      "authority": "role:add",
      "checked": 0,
      "updateTime": "2018/07/13 09:13:42",
      "isMenu": 1,
      "parentId": 7
    },
    {
      "authorityId": 10,
      "authorityName": "修改角色",
      "orderNumber": 10,
      "menuUrl": "",
      "menuIcon": "",
      "createTime": "2018/06/29 11:05:41",
      "authority": "role:edit",
      "checked": 0,
      "updateTime": "2018/07/13 09:13:42",
      "isMenu": 1,
      "parentId": 7
    },
    {
      "authorityId": 11,
      "authorityName": "删除角色",
      "orderNumber": 11,
      "menuUrl": "",
      "menuIcon": "",
      "createTime": "2018/06/29 11:05:41",
      "authority": "role:delete",
      "checked": 0,
      "updateTime": "2018/07/13 09:13:42",
      "isMenu": 1,
      "parentId": 7
    },
    {
      "authorityId": 12,
      "authorityName": "角色权限管理",
      "orderNumber": 12,
      "menuUrl": "",
      "menuIcon": "",
      "createTime": "2018/06/29 11:05:41",
      "authority": "role:auth",
      "checked": 0,
      "updateTime": "2018/07/13 15:27:18",
      "isMenu": 1,
      "parentId": 7
    },
    {
      "authorityId": 13,
      "authorityName": "权限管理",
      "orderNumber": 13,
      "menuUrl": "system/authorities",
      "menuIcon": null,
      "createTime": "2018/06/29 11:05:41",
      "authority": null,
      "checked": 0,
      "updateTime": "2018/07/13 15:45:13",
      "isMenu": 0,
      "parentId": 1
    },
    {
      "authorityId": 14,
      "authorityName": "查询权限",
      "orderNumber": 14,
      "menuUrl": "",
      "menuIcon": "",
      "createTime": "2018/07/21 13:55:57",
      "authority": "authorities:view",
      "checked": 0,
      "updateTime": "2018/07/21 13:55:56",
      "isMenu": 1,
      "parentId": 13
    },
    {
      "authorityId": 15,
      "authorityName": "添加权限",
      "orderNumber": 15,
      "menuUrl": "",
      "menuIcon": "",
      "createTime": "2018/06/29 11:05:41",
      "authority": "authorities:add",
      "checked": 0,
      "updateTime": "2018/06/29 11:05:41",
      "isMenu": 1,
      "parentId": 13
    },
    {
      "authorityId": 16,
      "authorityName": "修改权限",
      "orderNumber": 16,
      "menuUrl": "",
      "menuIcon": "",
      "createTime": "2018/07/13 09:13:42",
      "authority": "authorities:edit",
      "checked": 0,
      "updateTime": "2018/07/13 09:13:42",
      "isMenu": 1,
      "parentId": 13
    },
    {
      "authorityId": 17,
      "authorityName": "删除权限",
      "orderNumber": 17,
      "menuUrl": "",
      "menuIcon": "",
      "createTime": "2018/06/29 11:05:41",
      "authority": "authorities:delete",
      "checked": 0,
      "updateTime": "2018/06/29 11:05:41",
      "isMenu": 1,
      "parentId": 13
    },
    {
      "authorityId": 18,
      "authorityName": "登录日志",
      "orderNumber": 18,
      "menuUrl": "system/loginRecord",
      "menuIcon": null,
      "createTime": "2018/06/29 11:05:41",
      "authority": null,
      "checked": 0,
      "updateTime": "2018/06/29 11:05:41",
      "isMenu": 0,
      "parentId": 1
    },
    {
      "authorityId": 19,
      "authorityName": "查询登录日志",
      "orderNumber": 19,
      "menuUrl": "",
      "menuIcon": "",
      "createTime": "2018/07/21 13:56:43",
      "authority": "loginRecord:view",
      "checked": 0,
      "updateTime": "2018/07/21 13:56:43",
      "isMenu": 1,
      "parentId": 18
    }
  ]
}
EOT;
            return json(json_decode($data));
        }
        return $this->fetch();
    }

    /**
     * @NodeAnotation(title="添加菜单",auth=true)
     */
    public function add()
    {
        return $this->fetch();
    }

    /**
     * @NodeAnotation(title="编辑菜单",auth=true)
     */
    public function edit()
    {
        return $this->fetch();
    }

    /**
     * @NodeAnotation(title="删除菜单",auth=true)
     */
    public function del()
    {
        return $this->fetch();
    }

}