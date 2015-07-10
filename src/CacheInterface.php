<?php
/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 2015/7/10
 * Time: 17:31
 */

namespace Jenner\WebSocket;


interface CacheInterface
{
    public function get($key);
    public function set($key, $value);
    public function append($key, $value);
}