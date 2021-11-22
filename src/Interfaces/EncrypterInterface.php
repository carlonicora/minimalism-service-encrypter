<?php
namespace CarloNicora\Minimalism\Services\Encrypter\Interfaces;

use CarloNicora\Minimalism\Interfaces\ServiceInterface;

interface EncrypterInterface extends ServiceInterface
{
    /**
     * @param int $id
     * @return string
     */
    public function encryptId(int $id): string;

    /**
     * @param string $encryptedId
     * @return int
     */
    public function decryptId(string $encryptedId): int;
}