<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/15
 * Time: 14:18
 */

namespace Jenner\WebSocket;


abstract class AbstractMessage implements MessageInterface
{

    private $cache;

    private $client_id;

    private $callback;

    private $server;

    public function __construct(ConnectionInterface $server, CacheInterface $cache, $callback)
    {
        $this->server = $server;
        $this->cache = $cache;
        $this->callback = $callback;
    }

    public function append($client_id, $data)
    {
        $this->client_id = $client_id;
        $buffer_key = 'buffer_' . $this->client_id;
        $cache_data = $this->cache->get($buffer_key);
        if (!empty($cache_data)) {
            $data = $cache_data . $data;
        }

        while(true){
            $package = $this->checkPackage($this->server, $data);
            //����ɹ�
            if($package['status'] === true){
                //�ص��û�����
                call_user_func($this->callback, $this->server, $this->client_id, $package['message']);
                //�������ʣ��
                if(!empty($package['last'])){
                    $data = $package['last'];
                    continue;
                }
            }//ȱ��
            elseif($package['status'] === false){
                $this->cache->set($buffer_key, $package['last']);
                break;
            }

            break;
        }
    }
}