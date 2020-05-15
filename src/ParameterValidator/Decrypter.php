<?php
namespace CarloNicora\Minimalism\Services\Encrypter\ParameterValidator;

use CarloNicora\Minimalism\Services\Encrypter\Encrypter;
use CarloNicora\Minimalism\Services\ParameterValidator\Interfaces\DecrypterInterface;

class Decrypter implements DecrypterInterface
{
    /** @var Encrypter  */
    private Encrypter $encrypter;

    /**
     * Decrypter constructor.
     * @param Encrypter $encrypter
     */
    public function __construct(Encrypter $encrypter)
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