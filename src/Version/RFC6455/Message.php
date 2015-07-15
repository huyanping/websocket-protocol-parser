<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/10
 * Time: 17:12
 */

namespace Jenner\WebSocket\VERSION\RFC6455;

use Jenner\WebSocket\AbstractMessage;
use Jenner\WebSocket\ConnectionInterface;

class Message extends AbstractMessage
{

    /**
     * ����ճ��
     * �ص�$callback
     * @param $data
     * @return array array('status'=>boolean, 'message'=>string, 'last'=>string)
     * @throws \Exception �޷�����Ĵ����׳��쳣
     */
    public function checkPackage(ConnectionInterface $server, $data)
    {
        // ���ݳ���
        $recv_len = strlen($data);
        // ���Ȳ���
        if ($recv_len < 6) {
            return $this->result(false, null, $data);
        }

        // ���ֽ׶οͻ��˷���HTTPЭ��
        if (0 === strpos($data, 'GET')) {
            // �ж�\r\n\r\n�߽�
            if (strlen($data) - 4 === strpos($data, "\r\n\r\n")) {
                $this->shakeHand($data);
                return $this->result(true, null, null);
            }
        }

        // websocket����������
        $data_len = ord($data[1]) & 127;
        $head_len = 6;
        if ($data_len === 126) {
            $pack = unpack('ntotal_len', substr($data, 2, 2));
            $data_len = $pack['total_len'];
            $head_len = 8;
        } else if ($data_len === 127) {
            $arr = unpack('N2', substr($data, 2, 8));
            $data_len = $arr[1] * 4294967296 + $arr[2];
            $head_len = 14;
        }
        $remain_len = $head_len + $data_len - $recv_len;

        if($remain_len === 0){
            return $this->result(true, $data);
        }elseif($remain_len > 0){
            return $this->result(false, null, $data);
        }else{
            $message = substr($data, 0, $remain_len);
            $last = substr($data, $remain_len);
            return $this->result(true, $message, $last);
        }
    }

    protected function switchOpcode(ConnectionInterface $server, $message){
        $opcode = $this->getOpcode($message);
        switch($opcode){

        }
    }

    protected function shakeHand($message)
    {

    }

    protected function getMessage($buffer)
    {
        $len = $masks = $data = $message = null;
        $len = ord($buffer[1]) & 127;

        if ($len === 126) {
            $masks = substr($buffer, 4, 4);
            $data = substr($buffer, 8);
        } else if ($len === 127) {
            $masks = substr($buffer, 10, 4);
            $data = substr($buffer, 14);
        } else {
            $masks = substr($buffer, 2, 4);
            $data = substr($buffer, 6);
        }

        for ($index = 0; $index < strlen($data); $index++) {
            $message .= $data[$index] ^ $masks[$index % 4];
        }

        return $message;
    }

    protected function getOpcode($data)
    {
        return ord($data[0]) & 0xf;
    }

    protected function result($status, $message=null, $last=null){
        return array('status'=>$status, 'message'=>$message, 'last'=>$last);
    }
}