<?php
namespace CarloNicora\Minimalism\Services\Encrypter;

use CarloNicora\Minimalism\Abstracts\AbstractService;
use CarloNicora\Minimalism\Interfaces\Encrypter\Interfaces\EncrypterInterface;
use Hashids\Hashids;

class Encrypter extends AbstractService implements EncrypterInterface
{
    /** @var Hashids|null */
    private ?Hashids $hashids=null;

    public function __construct(
        private string $MINIMALISM_SERVICE_ENCRYPTER_KEY,
        private ?int $MINIMALISM_SERVICE_ENCRYPTER_LENGTH=18,
    )
    {
        parent::__construct();
    }

    /**
     * @return string|null
     */
    public static function getBaseInterface(
    ): ?string
    {
        return EncrypterInterface::class;
    }

    /**
     * @return Hashids
     */
    private function hashids() : Hashids {
        if ($this->hashids === null) {
            $this->hashids = new Hashids($this->MINIMALISM_SERVICE_ENCRYPTER_KEY, $this->MINIMALISM_SERVICE_ENCRYPTER_LENGTH);
        }

        return $this->hashids;
    }

    /**
     * @param int $id
     * @return string
     */
    public function encryptId(int $id): string {
        return $this->hashids()->encodeHex($id);
    }

    /**
     * @param string $encryptedId
     * @return int
     */
    public function decryptId(string $encryptedId): int {
        return (int)$this->hashids()->decodeHex($encryptedId);
    }

    /**
     * @param string $id
     * @param string $key
     * @param int $length
     * @return string
     */
    public function encryptByKey(string $id, string $key, int $length=18) : string {
        return (new Hashids($key, $length))->encodeHex($id);
    }

    /**
     * @param string $encryptedId
     * @param string $key
     * @param int $length
     * @return string
     */
    public function decryptByKey(string $encryptedId, string $key, int $length=18) : string {
        return (new Hashids($key, $length))->decodeHex($encryptedId);
    }
}