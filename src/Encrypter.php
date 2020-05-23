<?php /** @noinspection UnusedConstructorDependenciesInspection */

namespace CarloNicora\Minimalism\Services\Encrypter;

use CarloNicora\Minimalism\Core\Services\Abstracts\AbstractService;
use CarloNicora\Minimalism\Core\Services\Factories\ServicesFactory;
use CarloNicora\Minimalism\Core\Services\Interfaces\ServiceConfigurationsInterface;
use CarloNicora\Minimalism\Interfaces\EncrypterInterface;
use CarloNicora\Minimalism\Services\Encrypter\Configurations\EncrypterConfigurations;
use Hashids\Hashids;

class Encrypter extends AbstractService implements EncrypterInterface {
    /** @var EncrypterConfigurations  */
    private EncrypterConfigurations $configData;

    /** @var Hashids|null */
    private ?Hashids $hashids=null;

    /**
     * encrypter constructor.
     * @param ServiceConfigurationsInterface $configData
     * @param ServicesFactory $services
     */
    public function __construct(ServiceConfigurationsInterface $configData, ServicesFactory $services) {
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