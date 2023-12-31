<?php

namespace app\user\controller;

use app\common\controller\Userend;

/**
 * 控制台
 *
 * @icon fa fa-dashboard
 * @remark 用于展示当前系统中的统计数据、统计报表及重要实时数据
 */
class Dashboard extends Userend
{

    /**
     * 查看
     */
    public function index()
    {
        //获取用户等级信息
        $this->auth->getlevel();
        $seventtime = \fast\Date::unixtime('day', -7);
        $paylist = $createlist = [];
        for ($i = 0; $i < 7; $i++) {
            $day = date("Y-m-d", $seventtime + ($i * 86400));
            $createlist[$day] = mt_rand(20, 200);
            $paylist[$day] = mt_rand(1, mt_rand(1, $createlist[$day]));
        }
        $hooks = config('addons.hooks');
        $uploadmode = isset($hooks['upload_config_init']) && $hooks['upload_config_init'] ? implode(',', $hooks['upload_config_init']) : 'local';
        $this->view->assign([
            'totaluser' => 35200,
            'totalviews' => 219390,
            'totalorder' => 32143,
            'totalorderamount' => 174800,
            'todayuserlogin' => 321,
            'todayusersignup' => 430,
            'todayorder' => 2324,
            'unsettleorder' => 132,
            'sevendnu' => '80%',
            'sevendau' => '32%',
            'paylist' => $paylist,
            'createlist' => $createlist,
            'uploadmode' => $uploadmode
        ]);

        return $this->view->fetch();
    }

}
