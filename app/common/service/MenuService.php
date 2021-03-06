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

namespace app\common\service;

use app\common\constants\MenuConstant;
use think\facade\Db;

class MenuService
{

    /**
     * 管理员ID
     * @var integer
     */
    protected $adminId;

    public function __construct($adminId)
    {
        $this->adminId = $adminId;
        return $this;
    }

    /**
     * 获取首页信息
     * @return array|\think\Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getHomeInfo()
    {
        $data = Db::name('system_menu')
            ->field('title,icon,href')
            ->where("delete_time is null")
            ->where('pid', MenuConstant::HOME_PID)
            ->find();
        !empty($data) && $data['href'] = __url($data['href']);
        return $data;
    }

    /**
     * 获取后台菜单树信息
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getMenuTree()
    {
        list($menuTreeList, $data) = [[], $this->getMenuData()];
        foreach ($data as $vo) {
            if ($vo['pid'] == 0) {
                $child = $this->buildMenuChild($vo['id'], $data);
                if (!empty($child)) {
                    $vo['child'] = $child;
                    $menuTreeList[MenuConstant::MODULE_PREFIX . $vo['id']] = $vo;
                }
            }
        }
        return $menuTreeList;
    }

    /**
     * 构建子菜单信息
     * @param $pid
     * @param $data
     * @return array
     */
    protected function buildMenuChild($pid, $data)
    {
        $menuList = [];
        $authServer = (new AuthService($this->adminId));
        foreach ($data as &$vo) {
            // TODO 后续这里做权限判断
            $check = $authServer->checkNode($vo['href']);
            !empty($vo['href']) && $vo['href'] = __url($vo['href']);
            if ($vo['pid'] == $pid && $check) {
                $child = $this->buildMenuChild($vo['id'], $data);
                !empty($child) && $vo['child'] = $child;
                $menuList[] = $vo;
            }
        }
        return $menuList;
    }

    /**
     * 获取所有菜单数据
     * @return \think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    protected function getMenuData()
    {
        $menuData = Db::name('system_menu')
            ->field('id,pid,title,icon,href,target')
            ->where("delete_time is null")
            ->where([
                ['status', '=', '1'],
                ['pid', '<>', MenuConstant::HOME_PID],
            ])
            ->order([
                'sort' => 'desc',
                'id'   => 'asc',
            ])
            ->select();
        return $menuData;
    }

}