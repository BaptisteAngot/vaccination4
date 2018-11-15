<?php
use Defuse\Crypto\Key;

function loadEncryptionKeyFromConfig()
{
    $keyAscii = "def000005b493811a69f9d6fa04a634c554c11e2be2b770e321dd68e9d66908aa92a5a1593d47c1a9f8f14bea9527e7031acdeca6741c59b7539e0ce6c16b11a0d3d6a49";
    return Key::loadFromAsciiSafeString($keyAscii);
}
