<?php
namespace CarloNicora\Minimalism\Services\Encrypter\Configurations;

use CarloNicora\Minimalism\Core\Services\Exceptions\ConfigurationException;
use CarloNicora\Minimalism\Core\Services\Abstracts\AbstractServiceConfigurations;

class EncrypterConfigurations extends AbstractServiceConfigurations {
    /** @var string */
    public string $key;

    /** @var int */
    public int $length;

    /**
     * mailingConfigurations constructor.
     * @throws ConfigurationException
     */
    public function __construct() {
        if (!($this->key = getenv('MINIMALISM_SERVICE_ENCRYPTER_KEY'))){
            throw new ConfigurationException('MINIMALISM_SERVICE_ENCRYPTER_KEY is a required configuration');
        }

        if (!($this->length = getenv('MINIMALISM_SERVICE_ENCRYPTER_LENGTH'))){
            $this->length = 18;
        }
    }
}