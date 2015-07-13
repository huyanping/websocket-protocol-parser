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
     * @param FrameInterface $fragment
     * @return MessageInterface
     */
    function addFrame(FrameInterface $fragment);
    /**
     * @return int
     */
    function getOpcode();
}