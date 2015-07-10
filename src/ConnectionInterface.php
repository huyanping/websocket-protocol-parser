<?php

/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 2015/7/10
 * Time: 17:05
 */

namespace Jenner\WebSocket;

interface ConnectionInterface
{
    public function send($data);
    public function close();

}