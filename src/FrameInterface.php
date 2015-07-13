<?php
/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 2015/7/10
 * Time: 17:07
 */

namespace Jenner\WebSocket;


interface FrameInterface
{
    /**
     * ��ӵ�����
     * @param string
     */
    function addBuffer($buf);
    /**
     * �ڷְ��У��Ƿ������һ��
     * @return bool
     */
    function isFinal();
    /**
     * Is the payload masked?
     * @return bool
     */
    function isMasked();
    /**
     * @return int
     */
    function getOpcode();
    /**
     * 32-big string
     * @return string
     */
    function getMaskingKey();
    /**
     * �Ƿ�Ϊ�ְ�
     * @return bool
     */
    function isCoalesced();
    /**
     * ��ȡpayload����
     * @return int
     */
    function getPayloadLength();
    /**
     * ��ȡpayload����
     * @return string
     */
    function getPayload();
    /**
     * ��ȡ����������
     * @return string
     */
    function getContents();
}