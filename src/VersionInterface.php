<?php
/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 2015/7/10
 * Time: 17:38
 */

namespace Jenner\WebSocket;


interface VersionInterface extends MessageInterface
{
    function isProtocol($request);

    function handshake($request);

    function upgradeConnection(ConnectionInterface $conn, MessageInterface $coalescedCallback);
}