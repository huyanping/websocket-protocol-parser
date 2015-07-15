<?php
/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 2015/7/10
 * Time: 17:09
 */

namespace Jenner\WebSocket;


interface MessageInterface
{
    /**
     * 接收数据包
     * @param $client_id
     * @param $data
     * @return mixed
     */
    public function append($client_id, $data);

    /**
     * 处理粘包
     * 回调$callback
     * @param $data
     * @return array array('status'=>boolean, 'message'=>string, 'last'=>string)
     * status = true 需要回调
     * status = false 不需要回调
     * @throws \Exception 无法处理的错误，抛出异常
     */
    public function checkPackage(ConnectionInterface $server, $data);
}