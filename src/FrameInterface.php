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
     * Add incoming data to the frame from peer
     * @param string
     */
    function addBuffer($buf);
    /**
     * Is this the final frame in a fragmented message?
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
     * @return int
     */
    //function getReceivedPayloadLength();
    /**
     * 32-big string
     * @return string
     */
    function getMaskingKey();
}