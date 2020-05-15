<?php
namespace carlonicora\minimalism\services\encrypter\configurationsS;

use carlonicora\minimalism\core\services\exceptions\configurationException;
use carlonicora\minimalism\core\services\abstracts\abstractServiceConfigurations;

class encrypterConfigurations extends abstractServiceConfigurations {
    /** @var string */
    public string $key;

    /** @var int */
    public int $length;

    /**
     * mailingConfigurations constructor.
     * @throws configurationException
     */
    public function __construct() {
        if (!($this->key = getenv('MINIMALISM_SERVICE_ENCRYPTER_KEY'))){
            throw new configurationException('encrypter', 'MINIMALISM_SERVICE_ENCRYPTER_KEY is a required configuration');
        }

        if (!($this->length = getenv('MINIMALISM_SERVICE_ENCRYPTER_LENGTH'))){
            $this->length = 18;
        }
    }
}