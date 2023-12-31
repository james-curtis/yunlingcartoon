<?php
/**
* 云凌鲸落小说漫画聚合分销CMS系统
* @Author Curtis - 云凌工作室
* @Website http://www.whalefallcms.com
* @Datetime 2020/4/8 下午 05:07
*/


namespace app\user\controller\user\agent\cartoon;


use app\common\controller\Userend;

class Cartoon extends Userend
{
    /**
     * Cartoon模型对象
     * @var \app\common\model\cartoon\Cartoon
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\common\model\cartoon\Cartoon;
        $this->view->assign("statusList", $this->model->getStatusList());
        $this->view->assign("freeTypeList", $this->model->getFreeTypeList());
        $this->view->assign("vipTypeList", $this->model->getVipTypeList());
    }

    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
}