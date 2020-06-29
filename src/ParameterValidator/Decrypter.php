<?php
namespace CarloNicora\Minimalism\Services\Encrypter\ParameterValidator;

use CarloNicora\Minimalism\Interfaces\EncrypterInterface;
use CarloNicora\Minimalism\Services\ParameterValidator\Interfaces\DecrypterInterface;

class Decrypter implements DecrypterInterface
{
    /** @var EncrypterInterface  */
    private EncrypterInterface $encrypter;

    /**
     * Decrypter constructor.
     * @param EncrypterInterface|null $encrypter
     */
    public function __construct(?EncrypterInterface $encrypter)
    {
        $this->encrypter = $encrypter;
    }

    /**
     * @param string $parameter
     * @return int
     */
    public function decryptParameter(string $parameter) : int
    {
        return $this->encrypter->decryptId($parameter);
    }
}