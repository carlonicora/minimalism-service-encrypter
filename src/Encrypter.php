<?php /** @noinspection UnusedConstructorDependenciesInspection */

namespace CarloNicora\Minimalism\Services\Encrypter;

use CarloNicora\Minimalism\Core\Services\abstracts\AbstractService;
use CarloNicora\Minimalism\Core\Services\factories\ServicesFactory;
use CarloNicora\Minimalism\Core\Services\interfaces\ServiceConfigurationsInterface;
use CarloNicora\Minimalism\Services\Encrypter\Configurations\EncrypterConfigurations;
use Hashids\Hashids;

class Encrypter extends abstractService {
    /** @var EncrypterConfigurations  */
    private EncrypterConfigurations $configData;

    /** @var Hashids|null */
    private ?Hashids $hashids=null;

    /**
     * encrypter constructor.
     * @param serviceConfigurationsInterface $configData
     * @param servicesFactory $services
     */
    public function __construct(serviceConfigurationsInterface $configData, servicesFactory $services) {
        parent::__construct($configData, $services);

        /** @noinspection PhpFieldAssignmentTypeMismatchInspection */
        $this->configData = $configData;
    }

    private function hashids() : Hashids {
        if ($this->hashids === null) {
            $this->hashids = new Hashids($this->configData->key, $this->configData->length);
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
        $hashid = new Hashids($key, $length);

        return $hashid->encodeHex($id);
    }

    /**
     * @param string $encryptedId
     * @param string $key
     * @param int $length
     * @return string
     */
    public function decryptByKey(string $encryptedId, string $key, int $length=18) : string {
        $hashid = new Hashids($key, $length);

        return $hashid->decodeHex($encryptedId);
    }
}