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
    public function send($client_id, $data);
    public function receive($client_id, $data);
    public function close($client_id);

}