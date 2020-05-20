<?php


namespace Library\Session;

use function Common\DI;

/**
 * SESSION Redis存储方式
 * Class Redis
 * @package Library\Session
 */
class Redis extends Basic
{
    //session-lifetime
    private $lifeTime;

    protected function cache()
    {
        // TODO: Implement cache() method.
        return new \Library\Cache\Redis(DI()->config->get('sys.cache.redis'));
    }


}
