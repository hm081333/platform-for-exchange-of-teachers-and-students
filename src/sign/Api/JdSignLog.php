<?php

namespace Sign\Api;

/**
 * 京东签到记录 接口服务类
 * JdSignLog
 * @author LYi-Ho 2018-11-24 16:06:44
 */
class JdSignLog extends \Common\Api\JdSignLog
{
    public function getRules()
    {
        $rules = parent::getRules();
        return $rules;
    }

}
