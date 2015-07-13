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
     * 添加到缓存
     * @param string
     */
    function addBuffer($buf);
    /**
     * 在分包中，是否是最后一针
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
     * 是否为分包
     * @return bool
     */
    function isCoalesced();
    /**
     * 获取payload长度
     * @return int
     */
    function getPayloadLength();
    /**
     * 获取payload数据
     * @return string
     */
    function getPayload();
    /**
     * 获取二进制数据
     * @return string
     */
    function getContents();
}