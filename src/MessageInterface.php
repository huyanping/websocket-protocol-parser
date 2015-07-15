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
     * �������ݰ�
     * @param $client_id
     * @param $data
     * @return mixed
     */
    public function append($client_id, $data);

    /**
     * ����ճ��
     * �ص�$callback
     * @param $data
     * @return array array('status'=>boolean, 'message'=>string, 'last'=>string)
     * status = true ��Ҫ�ص�
     * status = false ����Ҫ�ص�
     * @throws \Exception �޷�����Ĵ����׳��쳣
     */
    public function checkPackage(ConnectionInterface $server, $data);
}