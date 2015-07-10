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
     * Determine if the message is complete or still fragmented
     * @return bool
     */
    function isCoalesced();
    /**
     * Get the number of bytes the payload is set to be
     * @return int
     */
    function getPayloadLength();
    /**
     * Get the payload (message) sent from peer
     * @return string
     */
    function getPayload();
    /**
     * Get raw contents of the message
     * @return string
     */
    function getContents();

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